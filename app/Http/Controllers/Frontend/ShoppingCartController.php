<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Carbon\Carbon;
use App\Models\Transaction;
use App\Models\Order;


class ShoppingCartController extends Controller
{
    public function index()
    {
        $shopping = \Cart::content();
        $viewData = [
            'title_page' => "Giỏ hàng",
            'shopping'   => $shopping
        ];
        return view('frontend.pages.shopping.index', $viewData);
    }

    public function add($id)
    {
        $product = Product::find($id);

        if($product->pro_number < 1) {
            \Session::flash('toastr', [
                'type' => 'error',
                'message' => 'Số lượng sản phẩm không còn đủ'
            ]);

            return redirect()->back();
        }

        if (!$product)  return redirect()->to('/');

        \Cart::add([
            'id'        => $product->id,
            'name'      => $product->pro_name,
            'qty'       => 1,
            'price'     => number_price($product->pro_price, $product->pro_sale),
            'options'   => [
                'sale'  => $product->pro_sale,
                'price_old' => $product->pro_price,
                'image' => $product->pro_avatar
            ]
        ]);

        \Session::flash('toastr', [
                'type' => 'success',
                'message' => 'Thêm giở hàng thành công'
        ]);

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        if($request->ajax()){
            $qty = $request->qty ?? 1;
            $idProduct = $request->idProduct;
            $product = Product::find($idProduct);

            if(!$product)   return response(['messages' => 'Không tồn tại sản phẩm cần update']);
            if($product->pro_number < $qty)   return response(['messages' => 'Số lượng sản phẩm không đủ để update']);

            \Cart::update($id, $qty);
            return response(['messages' => 'Cập nhật thành công']);
        }
        
        
    }

    public function postPay(Request $request)
    {
        $data = $request->except("_token");
        if (isset(\Auth::user()->id)) {
            $data['tst_user_id'] = \Auth::user()->id;
        }

        $data['tst_total_money'] = str_replace(',', '', \Cart::subtotal());
        $data['created_at'] = Carbon::now();
        $transactionID = Transaction::insertGetId($data);
        if ($transactionID) {
            $shopping = \Cart::content();
            foreach ($shopping as $key => $item) {
                Order::insert([
                    'od_transaction_id' => $transactionID,
                    'od_product_id'     => $item->id,
                    'od_sale'           => $item->options->sale,
                    'od_qty'            => $item->qty,
                    'od_price'          => $item->price
                ]);

                \DB::table('products')->where('id', $item->id)
                                      ->increment("pro_pay");
                //giảm số lượng sp trong kho bằng với sl đặt hàng
                $product = Product::find($item->id);
                $productqty = $product->pro_number - $item->qty;
                $product->update([
                    'pro_number' => $productqty
                ]);
            }
        }

        \Session::flash('toastr', [
                'type' => 'success',
                'message' => 'Đơn hàng của bạn đã được lưu'
        ]);

        \Cart::destroy();
        return redirect()->to('/');
    }

    public function delete($rowId)
    {
        \Cart::remove($rowId);
        \Session::flash('toastr', [
                'type' => 'success',
                'message' => 'Xóa sản phẩm khỏi đơn hàng thành công'
        ]);
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductDetailController extends FrontendController
{
    public function getProductDetail(Request $request, $slug)
    {
        $arraySlug = explode('-', $slug);
        $id = array_pop($arraySlug);

        if($id) {
            $product = Product::with('category:id,c_name,c_slug')->findOrFail($id);
            
            $viewData = [
                'product'          => $product,
                'title_page'       => $product->pro_name,
                'productsSuggests' => $this->getProductSuggests($product->pro_trademark)
            ];
            return view('frontend.pages.product_detail.index', $viewData);
        }
        
        return redirect()->to('/');
    }

    private function getProductSuggests($trademark)
    {
        $product = Product::where([
                'pro_active'    => 1,
                'pro_trademark' => $trademark
            ])->orderByDesc('id')
              ->select('id','pro_name','pro_slug','pro_sale','pro_avatar','pro_price')
              ->limit(3)
              ->get();

        return $product;
    }
}

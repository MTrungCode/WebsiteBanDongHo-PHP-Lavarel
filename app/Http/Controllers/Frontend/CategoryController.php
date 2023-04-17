<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class CategoryController extends Controller
{
    public function index(Request $request, $slug)
    {
        $arraySlug = explode('-', $slug);
        $id = array_pop($arraySlug);
        if ($id) {
            $products = Product::where([
                'pro_active'      => 1,
                'pro_category_id' => $id
            ])
                ->orderByDesc('id')
                ->select('id','pro_name','pro_slug','pro_sale','pro_avatar','pro_price')
                ->paginate(12);

            $viewData = [
                'products' => $products
            ];

            return view('frontend.pages.product.index', $viewData);
        }
    }
}

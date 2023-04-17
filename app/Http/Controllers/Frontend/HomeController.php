<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends FrontendController
{
    public function index()
    {
        $productSale = Product::where('pro_sale', '>=', 10)
            ->orderByDesc('id')
            ->select('id', 'pro_name', 'pro_slug', 'pro_avatar', 'pro_price', 'pro_sale')
            ->get();

        $productNew = Product::where('pro_active',1)
            ->orderByDesc('id')
            ->select('id', 'pro_name', 'pro_slug', 'pro_avatar', 'pro_price', 'pro_sale')
            ->get();

        $productHot = Product::where([
            'pro_active' => 1,
            'pro_hot'    => 1
        ])
            ->orderByDesc('id')
            ->select('id', 'pro_name', 'pro_slug', 'pro_avatar', 'pro_price', 'pro_sale')
            ->get();

        $productTrademark1 = Product::where('pro_trademark', 1)
            ->orderByDesc('id')
            ->select('id', 'pro_name', 'pro_slug', 'pro_avatar', 'pro_price', 'pro_sale')
            ->get();

        $productTrademark3 = Product::where('pro_trademark', 3)
            ->orderByDesc('id')
            ->select('id', 'pro_name', 'pro_slug', 'pro_avatar', 'pro_price', 'pro_sale')
            ->get();

        $productTrademark4 = Product::where('pro_trademark', 4)
            ->orderByDesc('id')
            ->select('id', 'pro_name', 'pro_slug', 'pro_avatar', 'pro_price', 'pro_sale')
            ->get();

        $productTrademark6 = Product::where('pro_trademark', 6)
            ->orderByDesc('id')
            ->select('id', 'pro_name', 'pro_slug', 'pro_avatar', 'pro_price', 'pro_sale')
            ->get();

        $productTrademark7 = Product::where('pro_trademark', 7)
            ->orderByDesc('id')
            ->select('id', 'pro_name', 'pro_slug', 'pro_avatar', 'pro_price', 'pro_sale')
            ->get();

        $viewData = [
            'productNew'        => $productNew,
            'productHot'        => $productHot,
            'productSale'       => $productSale,
            'productTrademark1'  => $productTrademark1,
            'productTrademark3'  => $productTrademark3,
            'productTrademark4'  => $productTrademark4,
            'productTrademark6'  => $productTrademark6,
            'productTrademark7'  => $productTrademark7,
            'title_page'        => "Trang chủ"
        ];
        return view('frontend.pages.home.index', $viewData);
    }
}

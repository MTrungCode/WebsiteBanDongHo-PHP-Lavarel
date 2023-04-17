<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attribute;
use App\Models\Product;

class ProductController extends FrontendController
{
    public function index(Request $request)
    {
        $paramAtbSearch = $request->except('price', 'page', 'k');
        $paramAtbSearch = array_values($paramAtbSearch);

        $products       = Product::where('pro_active', 1);

        if (!empty($paramAtbSearch)) {
            $products->whereHas('attibutes', function($query) use($paramAtbSearch) {
                $query->whereIn('pa_attribute_id', $paramAtbSearch);
            });
        }

        if ($name = $request->k)  $products->where('pro_name','like','%'.$name.'%');    

        if ($request->price){
            $price = $request->price;
            if ($price == 6){
                $products->where('pro_price', '>', 10000000);
            }else {
                $products->where('pro_price', '<=', 1000000 * $price * 2);
            }
        }

        $products = $products->orderByDesc('id')
                ->select('id', 'pro_name', 'pro_slug', 'pro_avatar', 'pro_price', 'pro_sale')
                ->paginate(12);

        $attributes = $this->syncAttributeGroup();

        $viewData = [
            'attributes' => $attributes,
            'products'   => $products,
            'query'      => $request->query()
        ];
        return view('frontend.pages.product.index', $viewData);
    }

    public function syncAttributeGroup()
    {
        $attributes = Attribute::get();
        $groupAttribute = [];
        foreach ($attributes as $key => $attribute) {
            $key = $attribute->getType($attribute->atb_type)['name'];
            $groupAttribute[$key][] = $attribute->toArray();
        }

        return $groupAttribute;
    }
}

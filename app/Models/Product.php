<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [''];

    protected $country = [
        "0" => "[N\A]",
        "1" => "Việt Nam",
        "2" => "Anh",
        "3" => "Mỹ",
        "4" => "Thụy Sỹ",
        "5" => "China"
    ];

    protected $trademark = [
        "1" => "DIAMOND D",
        "2" => "ATLANTIC SWISS",
        "3" => "ARIES GOLD",
        "4" => "JACQUES LEMANS",
        "5" => "Q&Q",
        "6" => "EPOS SWISS",
        "7" => "PHILIPPE AUGUST"
    ];

    public function getCountry()
    {
        return Arr::get($this->country, $this->pro_country, "[N\A]");
    }

    public function getTrademark()
    {
        return Arr::get($this->trademark, $this->pro_trademark, "[N\A]");
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'pro_category_id');
    }

    public function attibutes()
    {
        return $this->belongsToMany(Attribute::class, 'products_attributes', 'pa_product_id', 'pa_attribute_id');
    }
}

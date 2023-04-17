<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Attribute extends Model
{
    use HasFactory;
    protected $guarded = [''];

    protected $type = [
        '1' => [
            'class' => 'label label-info',
            'name'  => 'Đôi'
        ],
        '2' => [
            'class' => 'label label-default',
            'name'  => 'Năng lượng'
        ],
        '3' => [
            'class' => 'label label-success',
            'name'  => 'Loại dây'
        ],
        '4' => [
            'class' => 'label label-danger',
            'name'  => 'Loại vỏ'
        ]
    ];

    public function getType()
    {
        return Arr::get($this->type, $this->atb_type, "[N\A]");
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'atb_category_id');
    }
}

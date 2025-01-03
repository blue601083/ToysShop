<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;
    protected $table = "product";
    protected $primaryKey = "Id";
    protected $fillable = [
        "Id",
        "name",
        "point",
        "photo",
        "category_Id",
        "totalCount",
        "stock",
        "shippingDays",
        "shippingDate",
        "createTime",
        "updateTime",
    ];

    // 與 `Catagory` 的關聯（多對一）
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_Id', 'Id');
    }
    // 與 `Awards` 的關聯（一對一）
    public function award()
    {
        return $this->hasOne(Awards::class, 'productId', 'Id');
    }
}

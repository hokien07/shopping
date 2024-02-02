<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table = "order_details";
    protected $fillable = [
        "order_id",
        "product_id",
        "quantity",
        "note"
    ];


    protected static function booted()
    {
        parent::booted();
        static::created(function($item) {
            $item->created_at = now();
        });
        static::updated(function($item) {
            $item->updated_at = now();
        });
    }
}

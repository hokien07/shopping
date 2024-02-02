<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        "user_id",
        "status",
        "notes"
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

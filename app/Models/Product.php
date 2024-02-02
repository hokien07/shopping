<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = [
        'cat_id',
        'name',
        'slug',
        'status',
        'price',
        'unit'
    ];

    const STATUS = [
        'inactive' => 0,
        'active' => 1
    ];

    public function category () {
        return $this->belongsTo(Category::class, 'cat_id', 'id');
    }

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

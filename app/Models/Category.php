<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = "categories";
    protected $fillable = [
        "name",
        "slug",
        "status",
        "avatar"
    ];

    const STATUS = [
        'inactive' => 0,
        'active' => 1
    ];

    public function products () {
        return $this->hasMany(Product::class, 'cat_id', 'id');
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

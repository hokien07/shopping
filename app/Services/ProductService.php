<?php


namespace App\Services;


use App\Models\Product;
use Illuminate\Http\Request;

class ProductService extends ModelService
{

    public function __construct()
    {
        $this->model = resolve(Product::class);
    }

    public function filter (Request $request) {
        return $this->model->paginate(20);
    }


}

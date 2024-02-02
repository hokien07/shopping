<?php


namespace App\Services;


use App\Models\Category;
use Illuminate\Http\Request;

class CategoryService extends ModelService
{
    public function __construct()
    {
        $this->model = resolve(Category::class);
    }

    public function filter (Request $request) {
        return $this->model->paginate(20);
    }


}

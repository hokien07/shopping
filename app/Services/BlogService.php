<?php


namespace App\Services;


use App\Models\Blog;

class BlogService extends ModelService
{
    public function __construct()
    {
        $this->model = resolve(Blog::class);
    }

}

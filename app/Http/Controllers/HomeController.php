<?php

namespace App\Http\Controllers;

use App\Services\BlogService;
use App\Services\ProductService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private ProductService $productService;
    private BlogService $blogService;

    public function __construct(ProductService $productService, BlogService $blogService)
    {
        $this->productService = $productService;
        $this->blogService = $blogService;
    }

    public function index (Request $request) {
        $title = "Home page";
        $products = $this->productService->getAll();
        $blogs = $this->blogService->getAll();
        return view('home', compact('title', 'products', 'blogs'));
    }
}

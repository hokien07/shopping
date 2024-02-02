<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use App\Services\OrderService;
use App\Services\ProductService;
use App\Services\UserService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private ProductService $productService;
    private CategoryService $categoryService;
    private UserService $userService;
    private OrderService $orderService;

    public function __construct(ProductService $productService, CategoryService $categoryService, UserService $userService, OrderService $orderService)
    {
        $this->categoryService = $categoryService;
        $this->productService = $productService;
        $this->userService = $userService;
        $this->orderService = $orderService;
    }

    public function index () {
        $title = 'Dashboard';
        $products = $this->productService->getAll();
        $categories = $this->categoryService->getAll();
        $users = $this->userService->getAll();
        $orders = $this->orderService->getAllToday();
        return view('dashboards.dashboard', compact('title', 'categories', 'products', 'orders', 'users'));
    }
}

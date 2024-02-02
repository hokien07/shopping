<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\CategoryService;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    private ProductService $service;
    private CategoryService $catService;

    public function __construct(ProductService $service, CategoryService $catService )
    {
        $this->service = $service;
        $this->catService = $catService;
    }

    public function index (Request $request) {
        $products = $this->service->filter($request);
        $title = "Product";
        return view('products.index', compact('products','title'));
    }

    public function add (Request $request) {
        $categories = $this->catService->getAll();
        $title = "Add Product";
        return view('products.add', compact('categories', 'title'));
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required',
            'unit' => 'required',
            'cat_id' => 'required|numeric|exists:categories,id'
        ]);

        if($validator->fails()) {
            toastr()->addError('Save failed!');
            return back()->withInput()->withErrors($validator->errors());
        }

        $payload = [
            'name' => $request->name,
            'cat_id' => $request->cat_id,
            'unit' => $request->unit,
            'price' => $request->price,
            'status' => $request->has('status') ? Product::STATUS['active'] : Product::STATUS['inactive'],
            'slug' => Str::slug($request->name). "-". time()
        ];

        if($this->service->store($payload)) {
            toastr()->addSuccess('Save success!');
            return redirect()->route('admin.product.home');
        }

        toastr()->addError('Save failed!');
        return back()->withInput();
    }

    public function delete (Request $request, $id) {
        if(is_null($id)) {
            return response()->json([
                'code' => 422,
                'status' => false,
                'message' => "Not found"
            ]);
        }

        $product = $this->service->findById($id);
        if(is_null($product)) {
            return response()->json([
                'code' => 422,
                'status' => false,
                'message' => "Not found"
            ]);
        }


        if($this->service->delete($id)) {
            return response()->json([
                'code' => 200,
                'status' => true,
                'message' => "Delete success!"
            ]);
        }

        return response()->json([
            'code' => 500,
            'status' => false,
            'message' => "Can not delete!"
        ]);
    }

    public function edit (Request $request, Product $product) {
        $categories = $this->catService->getAll();
        $title = "Edit Product";
        return view('products.edit', compact('product', 'title', 'categories'));
    }

    public function update(Request $request, Product $product) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required',
            'unit' => 'required',
            'cat_id' => 'required|numeric|exists:categories,id'
        ]);

        if($validator->fails()) {
            toastr()->addError('Update failed!');
            return back()->withInput()->withErrors($validator->errors());
        }

        $payload = [
            'name' => $request->name,
            'cat_id' => $request->cat_id,
            'unit' => $request->unit,
            'price' => $request->price,
            'status' => $request->has('status') ? Product::STATUS['active'] : Product::STATUS['inactive'],
            'slug' => Str::slug($request->name). "-". time()
        ];

        if($this->service->udpate($payload, $product)) {
            toastr()->addSuccess('Update success!');
            return redirect()->route('admin.product.home');
        }

        toastr()->addError('Update failed!');
        return back()->withInput();
    }
}

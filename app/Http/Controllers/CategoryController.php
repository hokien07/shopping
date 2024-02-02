<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    private CategoryService $service;

    public function __construct(CategoryService $service)
    {
        $this->service = $service;

    }

    public function index (Request $request) {
        $categories = $this->service->filter($request);
        $title = "Category List";
        return view('categories.index', compact('categories', 'title'));
    }

    public function add () {
        $title = "Category List";
        return view('categories.add', compact('title'));
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if($validator->fails()) {
            toastr()->addError('Save failed!');
            return back()->withInput()->withErrors($validator->errors());
        }

        $payload = [
            'name' => $request->name,
            'status' => $request->has('status') ? Category::STATUS['active'] : Category::STATUS['inactive'],
            'slug' => Str::slug($request->name). "-". time()
        ];

        if($this->service->store($payload)) {
            toastr()->addSuccess('Save success!');
            return redirect()->route('admin.category.home');
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

        $category = $this->service->findById($id);
        if(is_null($category)) {
            return response()->json([
                'code' => 422,
                'status' => false,
                'message' => "Not found"
            ]);
        }

        if(count($category->products) > 0) {
            return response()->json([
                'code' => 422,
                'status' => false,
                'message' => "Can not delete!"
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

    public function edit (Request $request, Category $category) {
        $title = "Edit Category";
        return view('categories.edit', compact('category', 'title'));
    }

    public function update(Request $request, Category $category) {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if($validator->fails()) {
            toastr()->addError('Update failed!');
            return back()->withInput()->withErrors($validator->errors());
        }

        $payload = [
            'name' => $request->name,
            'status' => $request->has('status') ? Category::STATUS['active'] : $category->status,
            'slug' => Str::slug($request->name). "-". time()
        ];

        if($this->service->udpate($payload, $category)) {
            toastr()->addSuccess('Update success!');
            return redirect()->route('admin.category.home');
        }

        toastr()->addError('Update failed!');
        return back()->withInput();
    }
}

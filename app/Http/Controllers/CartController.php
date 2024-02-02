<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Jackiedo\Cart\Facades\Cart;

class CartController extends Controller
{
    private ProductService $productService;
    private $cart;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
        $this->cart = Cart::name();
    }

    public function getList () {
        $cartItems = $this->cart->getItems();
        $products = $this->productService->getAll();
        $subTotal = $this->cart->getItemsSubtotal();
        $title ="Cart Page";
        return view('cart', compact('cartItems', 'products', 'subTotal', 'title'));
    }

    public function add (Request $request) {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|numeric|exists:products,id'
        ]);

        if($validator->fails()) {
            return response()->json([
                'code' => 500,
                'status' => false,
                'message' => "Can not add to cart"
            ]);
        }

        $product = $this->productService->findById($request->product_id);
        if(is_null($product)) {
            return response()->json([
                'code' => 404,
                'status' => false,
                'message' => "Not found product"
            ]);
        }
        $item = $this->checkCardExist($product->id);
        if(!is_null($item)) {
            $this->cart->updateItem($item->getHash(), [
                'quantity'      => $item->getQuantity() + 1
            ]);
        }else {
            $this->cart->addItem([
                'id' => $request->product_id,
                'title' => $product->name,
                'price' => $product->price,
                'quantity' => 1
            ]);
        }

        return response()->json([
            'code' => 200,
            'status' => true,
            'total' => $this->cart->countItems(),
            'message' => "Add cart success"
        ]);

    }

    public function delete (Request $request) {
        if($this->cart->removeItem($request->hash)) {
            return response()->json([
                'code' => 200,
                'status' => true,
                'message' => "Remove success!"
            ]);
        }

        return response()->json([
            'code' => 500,
            'status' => false,
            'message' => "Remove failed"
        ]);
    }

    public function checkout () {
        $title ="Check Page";
        $cartItems = $this->cart->getItems();
        $subTotal = $this->cart->getItemsSubtotal();
        return view('checkout', compact('title', 'cartItems', 'subTotal'));
    }

    private function checkCardExist (int $id)
    {
        $items = $this->cart->getItems();
        $cartItem = NULL;
        foreach ($items as $item) {
            if($item->getId() == $id) {
                $cartItem = $item;
                break;
            }
        }
        return  $cartItem;
    }
}

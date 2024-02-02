<?php


namespace App\View\Composers;

use Illuminate\View\View;
use Jackiedo\Cart\Facades\Cart;

class CartComposer
{
    private $cart;
    /**
     * Create a new profile composer.
     */
    public function __construct() {
        $this->cart = Cart::name();
    }

    /**
     * Bind data to the view.
     * @param View $view
     */
    public function compose(View $view): void
    {
        $view->with('cartTotal', $this->cart->countItems());
    }
}

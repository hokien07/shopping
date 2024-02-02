<?php


namespace App\Services;


use App\Models\OrderDetail;

class OrderDetailService extends ModelService
{

    public function __construct()
    {
        $this->model = resolve(OrderDetail::class);
    }
}

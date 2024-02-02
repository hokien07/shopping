<?php


namespace App\Services;


use App\Models\Order;
use Carbon\Carbon;

class OrderService extends ModelService
{
    public function __construct()
    {
        $this->model = resolve(Order::class);
    }

    public function getAllToday () {
        $now = Carbon::now()->format('Y-m-d');
        return $this->model->whereDate('created_at', '>=', "{$now} 00:00:00")
            ->whereDate('created_at', '<=', "{$now} 23:59:59")->get();
    }

}

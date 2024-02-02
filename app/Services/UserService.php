<?php


namespace App\Services;


use App\Models\User;

class UserService extends ModelService
{

    public function __construct()
    {
        $this->model = resolve(User::class);
    }
}

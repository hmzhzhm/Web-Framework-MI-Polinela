<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class TentangKami extends BaseController
{
    public function index()
    {
        return view("TentangKami/TentangKami");
    }

    public function all()
    {
        return view("TentangKami/TentangKami");
    }
}
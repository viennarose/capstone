<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;


class PromotionController extends Controller
{
    public function index()
    {
        return view('admin.promotions.index');
    }
}

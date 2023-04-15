<?php

namespace App\Http\Controllers;

use App\Models\Fixes\Category;

class MainController extends Controller
{
    public function index()
    {
        return view('user_side.pricing.pricing-categories', [
            'categories' => Category::onlyParents()->get()
        ]);
    }
}

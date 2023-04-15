<?php

namespace App\Http\Controllers;

use App\Models\Fixes\Category;

class PricingController extends Controller
{
    public function categories()
    {
        return view('user_side.pricing.pricing-categories', [
            'categories' => Category::all()
        ]);
    }

    public function category(Category $category)
    {
        return view('user_side.pricing.pricing-category', [
            'category' => $category->load('prices')
        ]);
    }
}

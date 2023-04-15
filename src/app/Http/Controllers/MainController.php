<?php

namespace App\Http\Controllers;

class MainController extends Controller
{
    public function index()
    {
        return view('user_side.pages.main');
    }
}

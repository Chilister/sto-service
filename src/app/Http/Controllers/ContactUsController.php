<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactUsRequest;

class ContactUsController extends Controller
{
    public function index()
    {
        return view('user_side.contact_us.contact');
    }

    public function saveContactUsRequest(StoreContactUsRequest $request)
    {
        dd($request->all());
    }
}

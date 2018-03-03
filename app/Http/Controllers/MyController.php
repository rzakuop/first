<?php

namespace App\Http\Controllers;

class MyController extends Controller
{
    public function index()
    {
        return view('my.index');
    }

    public function ordered()
    {
        $user = auth()->user();

        return view('my.ordered', [
            'orders' => $user->orders,
        ]);
    }
}

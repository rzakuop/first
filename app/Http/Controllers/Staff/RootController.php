<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;

class RootController extends Controller
{
    public function index()
    {
        return view('staff.root.index');
    }
}

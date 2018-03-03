<?php

namespace App\Http\Controllers\_Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class RootController extends Controller
{
    public function index()
    {
        return view('_admin.root.index');
    }
}

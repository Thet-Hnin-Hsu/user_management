<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // direct home page
    public function index() {
        return view('admin.home.home');
    }
}

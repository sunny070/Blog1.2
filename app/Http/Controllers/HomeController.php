<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // restrict
    // public function __construct()
    // {
    //     return $this->middleware('auth')->only(['index']);
    // }
    public function index(){
        return view('home.index');
    }
}

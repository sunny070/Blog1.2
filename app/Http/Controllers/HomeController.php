<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use DateTime;

class HomeController extends Controller
{
    // restrict
    // public function __construct()
    // {
    //     return $this->middleware('auth')->only(['index']);
    // }
    public function index(){
        $today = new DateTime();
        return view('home.index',[
            'posts' => Post::where('featured', true)
            ->whereNotNull('published_at')
            ->where('published_at', '<=', $today)
            ->latest()
            ->take(3)
            ->get(),
            
        ]);
    }
}

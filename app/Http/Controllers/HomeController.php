<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class HomeController extends Controller
{
    public function index() {
        $categories = Category::where('category_status', 'active')->take(4)->get();
        return view('home.index', compact('categories'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Product;

class LandingController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        $products = Product::all();
        return view('welcome', compact('projects', 'products'));
    }
}
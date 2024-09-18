<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Here you can add logic to fetch data for the dashboard
        return view('admin.dashboard');
    }
}
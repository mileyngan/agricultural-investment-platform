<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->isAdmin()) {
            return redirect()->route('admin.dashboard');
        } elseif ($user->isFirm()) {
            return redirect()->route('firm.dashboard');
        } else {
            return redirect()->route('investor.dashboard');
        }
    }

    public function adminDashboard()
    {
        return view('admin.dashboard');
    }

    public function firmDashboard()
    {
        return view('firm.dashboard');
    }

    public function investorDashboard()
    {
        return view('investor.dashboard');
    }

    public function addFirm()
    {
        return view('admin.add_firm');
    }
}
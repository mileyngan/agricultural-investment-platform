<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalUsers = User::count();
        $totalProjects = Project::count();
        $totalInvestments = Project::sum('current_amount');
        return view('admin.dashboard', compact('totalUsers', 'totalProjects', 'totalInvestments'));
    }

    public function manageProjects()
    {
        $projects = Project::with('user')->paginate(10);
        return view('admin.manage_projects', compact('projects'));
    }

    public function manageUsers()
    {
        $users = User::paginate(10);
        return view('admin.manage_users', compact('users'));
    }

    public function approveProject(Project $project)
    {
        $project->status = 'active';
        $project->save();
        return back()->with('success', 'Project approved successfully!');
    }

    public function rejectProject(Project $project)
    {
        $project->status = 'rejected';
        $project->save();
        return back()->with('success', 'Project rejected successfully!');
    }

    public function manageFirms()
    {
        $firms = Firm::where('status', 'pending')->get();
        return view('admin.firms.manage', compact('firms'));
    }

    public function approveFirm($firm_id)
    {
        $firm = Firm::find($firm_id);
        $firm->status = 'approved';
        $firm->save();

        // Send notification to firm owner that their firm has been approved
        $firmOwnerNotification = new FirmOwnerNotification();
        $firmOwnerNotification->firm_id = $firm_id;
        $firmOwnerNotification->status = 'approved';
        $firmOwnerNotification->save();

        return redirect()->route('firms.manage')->with('success', 'Firm approved successfully.');
    }

    public function rejectFirm($firm_id)
    {
        $firm = Firm::find($firm_id);
        $firm->status = 'rejected';
        $firm->save();

        // Send notification to firm owner that their firm has been rejected
        $firmOwnerNotification = new FirmOwnerNotification();
        $firmOwnerNotification->firm_id = $firm_id;
        $firmOwnerNotification->status = 'rejected';
        $firmOwnerNotification->save();

        return redirect()->route('firms.manage')->with('success', 'Firm rejected successfully.');
    }
}
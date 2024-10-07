<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Firm;
use App\Models\User;
use App\Models\Investment; 
use App\Notifications\AdminNotification; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class FirmController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $projects = Project::where('user_id', $user->id)->get(); // Fetch all projects for the user
    
        $totalProjects = $projects->count();
        $totalInvestments = $projects->sum('target_amount'); // Adjust as needed
        $walletBalance = $user->wallet->balance; // Assuming you have a wallet relationship
    
        $investments = Investment::whereIn('project_id', $projects->pluck('id'))->get(); // Adjust as necessary
    
        return view('firm.dashboard', compact('projects', 'totalProjects', 'totalInvestments', 'walletBalance', 'investments'));
    }

    public function createProject()
    {
        return view('firm.create_project');
    }

    public function storeProject(Request $request)
{
    // Validate the request
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'target_amount' => 'required|numeric|min:0',
    ]);

    // Create the project with default status as 'pending'
    $project = Project::create([
        'title' => $request->title,
        'description' => $request->description,
        'target_amount' => $request->target_amount,
        'status' => 'pending', // Set default status
        'user_id' => auth()->id(), // Assuming you want to associate the project with the user
    ]);

    return redirect()->route('firm.dashboard')->with('success', 'Project created successfully with pending status!');
}

    public function showProject(Project $project)
    {
        return view('firm.show_project', compact('project'));
    }

    public function projects()
    {
        if (Auth::check()) {
            $firm = Auth::user()->firm;

            if ($firm) {
                $projects = Project::where('firm_id', $firm->id)->get();
                return view('firm.projects', compact('projects'));
            }
            
            return redirect()->route('firm.create');
        }
    }

    public function editProject(Project $project)
    {
        return view('firm.edit_project', compact('project'));
    }

    public function updateProject(Request $request, Project $project)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'target_amount' => 'required|numeric|min:0',
        ]);

        $project->update($validatedData);
        return redirect()->route('firm.dashboard')->with('success', 'Project updated successfully!');
    }

    public function create()
    {
        $user = Auth::user(); // Retrieve the authenticated user
        return view('firm.create', compact('user')); // Pass the user variable to the view
    }

    public function store(Request $request)
    {
        $user_id = Auth::id();
        $user = Auth::user(); // Retrieve the authenticated user

        // Check if the user type is 'Firm'
        if ($user->type !== 'Firm') {
            return redirect()->back()->with('error', 'The selected account type is invalid.');
        }

        $validatedData = $request->validate([
            'firm_name' => 'required|string',
            'firm_email' => 'required|email',
            'default_password' => 'required|string|min:8',
            'document1' => 'required|file|mimes:pdf,docx,doc',
            'document2' => 'required|file|mimes:pdf,docx,doc',
        ]);

        $firm = new Firm();
        $firm->user_id = $user_id;
        $firm->name = $validatedData['firm_name'];
        $firm->email = $validatedData['firm_email'];
        $firm->default_password = bcrypt($validatedData['default_password']);
        $firm->document1 = $request->file('document1')->store('firm_documents');
        $firm->document2 = $request->file('document2')->store('firm_documents');
        $firm->save();

        // Send notification to admin to accept or reject the firm
        $adminNotification = new AdminNotification();
        $adminNotification->user_id = $user_id;
        $adminNotification->firm_id = $firm->id;
        $adminNotification->status = 'pending';
        $adminNotification->save();

        return redirect()->route('firm.dashboard')->with('success', 'Firm information submitted successfully. Waiting for admin approval.');
    }
}
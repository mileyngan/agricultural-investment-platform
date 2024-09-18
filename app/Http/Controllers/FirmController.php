<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Firm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FirmController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $projects = Project::where('user_id', $user->id)->get();
        return view('firm.dashboard', compact('projects'));
    }

    public function createProject()
    {
        return view('firm.create_project');
    }

    public function storeProject(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'target_amount' => 'required|numeric|min:0',
        ]);

        $project = new Project($validatedData);
        $project->user_id = Auth::id();
        $project->save();

        return redirect()->route('firm.dashboard')->with('success', 'Project created successfully!');
    }

    public function showProject(Project $project)
    {
        return view('firm.show_project', compact('project'));
    }

    public function projects()
    {
            $firm = optional(auth()->user())->firm;
        
            if (!$firm) {
                // Handle user without firm
                return redirect()->route('firm.create');
            }
        
            $projects = Project::where('firm_id', $firm->id)->get();
            return view('firm.projects', compact('projects'));
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
        return view('firm.create');
    }

    public function store(Request $request, $user_id)
{
    $user = User::find($user_id);

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
<?php

namespace App\Http\Controllers;

use App\Models\Investment;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvestorController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $investments = Investment::where('user_id', $user->id)->with('project')->get();
        $totalInvested = $investments->sum('amount');
        $activeProjects = $investments->where('project.status', 'active')->count();

        return view('investor.dashboard', compact('investments', 'totalInvested', 'activeProjects'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $projects = Project::where('status', 'active')
            ->where(function ($q) use ($query) {
                $q->where('title', 'like', "%$query%")
                  ->orWhere('description', 'like', "%$query%");
            })
            ->paginate(10);

        return view('investor.search', compact('projects'));
    }

    public function showProject($id)
    {
        // Eager load related investments to avoid N+1 query issues
        $project = Project::with('investments.user')->findOrFail($id);
        return view('investor.project', compact('project'));
    }

    public function invest(Request $request, Project $project)
    {
        // Validate the request
        $request->validate([
            'amount' => 'required|numeric|min:1',
        ]);

        $amount = $request->input('amount');
        $user = Auth::user();

        // Check if the user has a wallet
        if (!$user->wallet) {
            return back()->with('error', 'You do not have a wallet associated with your account.');
        }

        // Check if the user has sufficient funds
        if ($user->wallet->balance < $amount) {
            return back()->with('error', 'Insufficient funds in your wallet.');
        }

        // Check if the project is still active
        if ($project->status !== 'active') {
            return back()->with('error', 'This project is no longer active.');
        }

        // Create the investment
        $investment = new Investment([
            'user_id' => $user->id,
            'project_id' => $project->id,
            'amount' => $amount,
        ]);
        $investment->save();

        // Update the user's wallet balance
        $user->wallet->balance -= $amount;
        $user->wallet->save();

        // Update the project's current amount
        $project->current_amount += $amount;
        $project->save();

        return redirect()->route('investor.project', $project->id)->with('success', 'Investment successful!');
    }
}
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
        // Logic to show the project with the given ID
        $project = Project::find($id);
        return view('investor.project', compact('project'));
    }

    public function invest(Request $request, Project $project)
    {
    // dd($request);
    $amount = $request->input('amount');
    $user = Auth::user();

    if (!$user->wallet) {
        return back()->with('error', 'You do not have a wallet associated with your account.');
    }

    if ($user->wallet->balance < $amount) {
        return back()->with('error', 'Insufficient funds in your wallet.');
    }

        $investment = new Investment([
            'user_id' => $user->id,
            'project_id' => $project->id,
            'amount' => $amount,
        ]);

        $investment->save();

        $user->wallet->balance -= $amount;
        $user->wallet->save();

        $project->current_amount += $amount;
        $project->save();

        return redirect()->route('investor.project',$project->id)->with('success', 'Investment successful!');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Affiliation;
use Illuminate\Http\Request;

class AffiliationController extends Controller
{
    public function index()
    {
        $affiliations = auth()->user()->affiliations;
        return view('affiliation.index', compact('affiliations'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'firm_name' => 'required|max:255',
        ]);

        $affiliation = auth()->user()->affiliations()->create($validatedData);

        return back()->with('success', 'Affiliation request submitted successfully.');
    }
}

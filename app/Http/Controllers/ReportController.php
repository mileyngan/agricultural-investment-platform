<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function upload(Request $request, $projectId)
    {
        $request->validate([
            'report' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $project = Project::findOrFail($projectId);

        // Handle file upload
        if ($request->hasFile('report')) {
            $file = $request->file('report');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('reports', $filename, 'public');

            // Save file information to database if needed
            // $project->reports()->create(['file' => $filename, 'name' => $file->getClientOriginalName()]);

            return redirect()->back()->with('success', 'Report uploaded successfully.');
        }

        return redirect()->back()->with('error', 'Failed to upload report.');
    }
}
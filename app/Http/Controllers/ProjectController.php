<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    public function index(int $User_Id)
    {
        $projects = Project::where('personal_data_id', $User_Id)->get();
        return view('projects.index', compact('projects'));
    }


    public function create(int $User_Id)
    {
        return view('projects.create');
    }


    public function store(Request $request, int $User_Id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'technologies' => 'required|string',
            'project_url' => 'required|url',
            'project_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        $project = $request->all();
        $project['personal_data_id'] = $User_Id;

        if ($request->hasFile('project_photo')) {
            $image = $request->file('project_photo');
            $path = $image->store('public/images');
            $photoUrl = Storage::url($path);
            $project['photo'] = $photoUrl;
        }

        Project::create( $project );

        return redirect()->route('projects.index', $User_Id)->with('success', 'Project created successfully.');
    }

    public function edit(int $Id)
    {
        $project = Project::find($Id);

        if (!$project) {
            abort(404, 'Personal Data not found');
        }

        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'technologies' => 'required|string',
            'url' => 'url',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $project->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'technologies' => $request->input('technologies'),
            'url' => $request->input('url'),
        ]);

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $path = $image->store('public/images');
            $photoUrl = Storage::url($path);

            if ($project->photo) {
                $filename = basename($project->photo);

                if (Storage::exists('public/images/' . $filename)) {
                    Storage::delete('public/images/' . $filename);
                }
            }

            $project->update(['photo' => $photoUrl]);
        }

        return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
    }


    public function destroy(int $User_Id, int $Id)
    {

        $project = Project::find($Id);

        if (!$project) {
            abort(404, 'Personal Data not found');
        }

        if ($project->photo) {
            Storage::delete('public/' . $project->photo);
        }

        $project->delete();

        return redirect()->route('projects.index', $User_Id)->with('success', 'Project deleted successfully.');
    }
}



<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function validation($data)
    {
        $validated = validator::make(

            $data,
            [
                'name' => "required | max:50",
                'description' => "required",
                'image' => "required | max:200",
                'creation_date' => "required",
                'supervisor' => "required | max:50",
            ],
            [
                'title.required' => 'devi inserire un titolo'
            ]

        )->validate();
        return $validated;
    }

    public function index()
    {
        $data = Project::all();
        return view('admin.projects.index', compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Project::all();

        return view("admin.projects.create", compact("data"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $data = $request->all();
        $dati_validati = $this->validation($data);

        $project = new Project();
        $project->fill($dati_validati);
        $project->save();

        return redirect()->route('admin.projects.index', $project->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view("admin.projects.show", compact("project"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view("admin.projects.edit", compact("project"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->all();
        $dati_validati = $this->validation($data);
        $project->update($dati_validati);
        return redirect()->route('admin.projects.show', $project->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.index');
    }
}

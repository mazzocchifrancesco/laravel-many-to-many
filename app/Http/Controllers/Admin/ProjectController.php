<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Http\Requests\ProjectRequest;
use App\Http\Controllers\Controller;
use App\Models\Technology;
use App\Models\Type;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // todo ELIMINA 
    // public function validation($data)
    // {
    //     $validated = validator::make(

    //         $data,
    //         [
    //             'name' => "required | max:50",
    //             'description' => "required",
    //             'image' => "required | max:200",
    //             'creation_date' => "required",
    //             'supervisor' => "required | max:50",
    //             'technology' => ""
    //         ],
    //         [
    //             'title.required' => 'devi inserire un titolo'
    //         ]

    //     )->validate();
    //     return $validated;
    // }

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
        $types = Type::all();
        $technologies = Technology::all();
        $data = Project::all();

        return view("admin.projects.create", compact("data", "technologies", "types"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectRequest $request)
    {
        // $data = $request->all();

        $dati_validati = $request->validated();
        $project = new Project();
        $project->fill($dati_validati);
        $project->save();
        if ($request->technologies) {
            $project->technologies()->attach($request->technologies);
        }

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
        $types = Type::all();
        $technologies = Technology::all();
        return view("admin.projects.edit", compact("project", "technologies", "types"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectRequest $request, Project $project)
    {
        $dati_validati = $request->validated();
        $project->update($dati_validati);
        $project->technologies()->attach($request->technologies);
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

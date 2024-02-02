<?php

namespace App\Http\Controllers\Admin;

use App\Models\Type;
use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TypeController extends Controller
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
            ],
            [
                'title.required' => 'devi inserire un titolo'
            ]

        )->validate();
        return $validated;
    }

    public function index()
    {
        $data = Type::all();
        return view('admin.types.index', compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Type::all();

        return view("admin.types.create", compact("data"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTypeRequest $request)
    {
        $data = $request->all();
        $dati_validati = $this->validation($data);

        $type = new Type();
        $type->fill($dati_validati);
        $type->save();

        return redirect()->route('admin.type.index', $type->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        return view("admin.types.show", compact("type"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        return view("admin.types.edit", compact("type"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTypeRequest $request, Type $type)
    {
        $data = $request->all();
        $dati_validati = $this->validation($data);
        $type->update($dati_validati);
        return redirect()->route('admin.type.show', $type->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        $type->delete();

        return redirect()->route('admin.type.index');
    }
}

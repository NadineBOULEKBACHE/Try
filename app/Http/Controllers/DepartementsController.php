<?php

namespace App\Http\Controllers;

use App\Models\departements;
use App\Models\directions;
use Illuminate\Http\Request;

class DepartementsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $directions=directions::all();
        $departements=departements::all();
        return view('departements.departements',compact('directions','departements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        departements::create([
            'Depart_name' => $request->Depart_name,
            'directions_id' => $request->directions_id,
        ]);
        session()->flash('Add', 'Département ajouté avec succès');
        return redirect('/departements');
    }

    /**
     * Display the specified resource.
     */
    public function show(departements $departements)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(departements $departements)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, departements $departements)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(departements $departements)
    {
        //
    }
}

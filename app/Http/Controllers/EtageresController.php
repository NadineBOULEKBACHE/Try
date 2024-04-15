<?php

namespace App\Http\Controllers;

use App\Models\Etagere;
use App\Models\Colone;
use App\Models\Rayon;
use Illuminate\Http\Request;

class EtageresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rayons=Rayon::all();
        $colones=Colone::all();
        $etageres=Etagere::all();
        return view('etageres.etageres',compact('rayons','colones','etageres'));
      
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
        Etagere::create([
            'Etagere_libelle' => $request->Etagere_libelle,
            'rayons_id' => $request->rayons_id,
            'colones_id' => $request->colones_id,
        ]);
        session()->flash('Add', 'Colone ajouté avec succès');
        return redirect('/colones');
    }

    /**
     * Display the specified resource.
     */
    public function show(Etagere $etagere)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Etagere $etagere)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Etagere $etagere)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Etagere $etagere)
    {
        //
    }
}

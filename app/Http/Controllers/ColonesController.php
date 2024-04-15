<?php

namespace App\Http\Controllers;

use App\Models\Colone;
use App\Models\Rayon;
use Illuminate\Http\Request;

class ColonesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rayons=Rayon::all();
        $colones=Colone::all();
        return view('colones.colones',compact('rayons','colones'));
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
        Colone::create([
            'Colone_libelle' => $request->Colone_libelle,
            'rayons_id' => $request->rayons_id,
        ]);
        session()->flash('Add', 'Colone ajouté avec succès');
        return redirect('/colones');
    }

    /**
     * Display the specified resource.
     */
    public function show(Colone $colone)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Colone $colone)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Colone $colone)
    {
    //     $id = rayons::where('libelle', $request->libelle)->first()->id;

    //    $Colones = Colone::findOrFail($request->pro_id);

    //    $Colones->update([
    //    'Colone_libelle' => $request->Colone_libelle,
    
    //    'rayons_id' => $id,
    //    ]);

    //    session()->flash('Edit', 'modification d');
    //    return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Colone $colone)
    {
        //
    }
}

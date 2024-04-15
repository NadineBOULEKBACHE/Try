<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Direction;
use Illuminate\Http\Request;

class DepartementsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $directions=Direction::all();
        $departements=Departement::all();
        // dd($directions);
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
        Departement::create([
            'Depart_name' => $request->Depart_name,
            'directions_id' => $request->directions_id,
        ]);
        session()->flash('Add', 'Département ajouté avec succès');
        return redirect('/departements');
    }

    /**
     * Display the specified resource.
     */
    public function show(Departement $departements)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Departement $departements)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Departement $departements)
    {
        $id = Direction::where('nom', $request->nom)->first()->id;

        $Departements = Departement::findOrFail($request->pro_id);
 
        $Departements->update([
        'Depart_name' => $request->Depart_name,
        'directions_id' => $id,
        ]);
 
        session()->flash('Edit', 'Modifications département faite avec succès');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
         $Departements = Departement::findOrFail($request->pro_id);
         $Departements->delete();
         session()->flash('delete', 'Le département a été supprimé avec succès');
         return back();
    }
    
}

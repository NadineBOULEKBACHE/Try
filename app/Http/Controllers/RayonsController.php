<?php

namespace App\Http\Controllers;

use App\Models\Rayon;
use Illuminate\Http\Request;

class RayonsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rayons=Rayon::all();
        return view('rayons.rayons',compact('rayons'));
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
        $validated = $request->validate([
            'libelle' => 'required|unique:rayons|max:255',
            
        ],[
            'libelle.required' => 'Veuillez saisir le libelle du rayon',
            'libelle.unique' => 'Ce libelle de rayon existe déjà',
            
        ]);
                
            Rayon::create([
                'libelle' => $request->libelle,
               
               

            ]);
            session()->flash('Add', 'Rayon ajouté avec succès');
            return redirect('/rayons');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rayon $rayon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rayon $rayon)
    {
       

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rayon $rayons)
    {
        $id = $request->id;

        $this->validate($request, [

            'libelle' => 'required|max:255|unique:rayons,libelle,'.$id,
            
        ],[

            'libelle.required' => 'Veuillez saisir le libelle du rayon',
            'libelle.unique' => 'Ce libelle de rayon existe déjà',

        ]);

        $rayons = Rayon::find($id);
        $rayons->update([
            'libelle' => $request->libelle,
            
        ]);

        session()->flash('edit','Modification faite avec succès');
        return redirect('/rayons');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        Rayon::find($id)->delete();
        session()->flash('delete','Le rayon a été supprimé avec succès');
        return redirect('/rayons');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\directions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DirectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $directions=directions::all();
        return view('directions.directions',compact('directions'));
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
            'nom' => 'required|unique:directions|max:255',
            'description' => 'required',
        ],[
            'nom.required' => 'Veuillez saisir le nom de la direction',
            'nom.unique' => 'Ce nom de direction existe déjà',
            'description.required' => 'Veuillez saisir la description',
        ]);
                
            directions::create([
                'nom' => $request->nom,
                'description' => $request->description,
               

            ]);
            session()->flash('Add', 'Direction ajoutée avec succès');
            return redirect('/directions');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(directions $directions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(directions $directions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, directions $directions)
    {
        $id = $request->id;

        $this->validate($request, [

            'nom' => 'required|max:255|unique:directions,nom,'.$id,
            'description' => 'required',
        ],[

            'nom.required' =>'Veuillez saisir le nom de la direction',
            'nom.unique' =>'Ce nom de direction existe déjà',
            'description.required' =>'Veuillez saisir la description',

        ]);

        $directions = directions::find($id);
        $directions->update([
            'nom' => $request->nom,
            'description' => $request->description,
        ]);

        session()->flash('edit','Modification faite avec succès');
        return redirect('/directions');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        directions::find($id)->delete();
        session()->flash('delete','La direction a été supprimée avec succès');
        return redirect('/directions');
    }
}

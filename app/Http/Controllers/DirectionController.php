<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\saveDirectionRequest;
use App\Models\Direction;
use Exception;

class DirectionController extends Controller
{
    public function index(){
        $directions = Direction::paginate(1);
        return view('direction.index', compact('directions'));
    }
    public function create(){
        return view('direction.create');
    }
    public function edit(Direction $direction){
        return view('direction.edit', compact('direction'));
    }


    public function store(Direction $direction,saveDirectionRequest $request){
       
        try {
            
            $direction ->name = $request->name;
            $direction ->save();
            return redirect()->route('direction.index')->with('success_message','Direction enregistrée');
        } catch (Exception $e) {
            dd($e);
        }

    }

    public function update(Direction $direction,saveDirectionRequest $request){
       
        try {
            
            $direction ->name = $request->name;
            $direction ->update();
            return redirect()->route('direction.index')->with('success_message','Direction mise à jour');
        } catch (Exception $e) {
            dd($e);
        }

    }
    public function delete(Direction $direction){
       
        try {
            
            
            $direction ->delete();
            return redirect()->route('direction.index')->with('success_message','Direction supprimée');
        } catch (Exception $e) {
            dd($e);
        }

    }
}

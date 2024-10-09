<?php

namespace App\Http\Controllers;

use App\Models\carrera;
use Illuminate\Http\Request;

class CarreraController extends Controller
{
    public function index(){
        $carreras = Carrera::all();
        //return $carreras;
        return view('carrera.index', compact('carreras'));
        //return view('carrera.index');
    }

    public function show($carrera){
        return view ('carrera.show', compact('carrera'));
    }

    public function create(){
        return view('carrera.create');
    }

    public function store(Request $request){
        $request->validate([
            'nombre_carrera'=>'required',
        ]);
        
        carrera::create($request->all());
        return redirect()->route('carrera.index');
    }

    public function edit(Carrera $carrera){
        return view('carrera.edit', compact ('carrera'));
    }

    public function update(Request $request, Carrera $carrera){
        $request->validate([
            'nombre_carrera'=>'required',
        ]);
        $carrera -> update($request ->all());
        return redirect()->route('carrera.index');
        //return 'holiii';
    }

    public function destroy(Carrera $carrera){
        //return 'holi!';
        $carrera->delete();
        return redirect()->route('carrera.index');
    }
    
}

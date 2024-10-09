<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use App\Http\Requests\StorePersonalRequest;
use App\Http\Requests\UpdatePersonalRequest;
use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\carrera;
use App\Models\RelacionLaboral;

class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personal = Personal::OrderBy('id', 'desc')->get(); 
        return view('personal.index', compact('personal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carreras=Carrera::all();
        $areas=Area::all();
        $laboral=RelacionLaboral::all();
        return view('personal.create',compact('carreras','areas','laboral'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePersonalRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePersonalRequest $request)
    {
        //return $request;
        Personal::create($request->all());
        return redirect()->route('personal.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function show(Personal $personal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function edit(Personal $personal)
    {
        $carreras=Carrera::all();
        $areas=Area::all();
        $laboral=RelacionLaboral::all();
        return view('personal.edit', compact('personal', 'carreras', 'areas', 'laboral'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePersonalRequest  $request
     * @param  \App\Models\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePersonalRequest $request, Personal $personal)
    {
        $personal->update($request->all());
        return redirect()->route('personal.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Personal $personal)
    {
        $personal->delete();
        return redirect()->route('personal.index');
    }
}

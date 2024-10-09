<?php

namespace App\Http\Controllers;

use App\Models\RelacionLaboral;
use Illuminate\Http\Request;
use App\Http\Requests\Storerelacion_laboralRequest;
use App\Http\Requests\Updaterelacion_laboralRequest;

class RelacionLaboralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laborales = RelacionLaboral::all();
        return view('laboral.index', compact('laborales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('laboral.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storerelacion_laboralRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'relacion_laboral'=>'required',
        ]);
        RelacionLaboral::create($request->all());
        return redirect()->route('laboral.index');
        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RelacionLaboral  $relacion_laboral
     * @return \Illuminate\Http\Response
     */
    public function show(RelacionLaboral $relacion_laboral)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RelacionLaboral  $relacion_laboral
     * @return \Illuminate\Http\Response
     */
    public function edit(RelacionLaboral $laboral)
    {
        return view('laboral.edit', compact('laboral'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updaterelacion_laboralRequest  $request
     * @param  \App\Models\RelacionLaboral  $RelacionLaboral
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RelacionLaboral $laboral)
    {
        $request->validate([
            'relacion_laboral'=>'required',
        ]);
        $laboral->update($request->all());
        return redirect()->route('laboral.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\relacion_laboral  $relacion_laboral
     * @return \Illuminate\Http\Response
     */
    public function destroy(RelacionLaboral $laboral)
    {
        $laboral->delete();
        return redirect()->route('laboral.index');
    }
}

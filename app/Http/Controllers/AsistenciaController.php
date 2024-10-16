<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use App\Models\Personal;
use App\Http\Requests\StoreAsistenciaRequest;
use App\Http\Requests\UpdateAsistenciaRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AsistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asistencias = Asistencia::OrderBy('id', 'desc')->paginate(50);
        //return $asistencia;
        return view('asistencia.index', compact('asistencias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('asistencia.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAsistenciaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return "holi";
        $request->validate([
            'ci'=>'required',
        ]);

        $personal = Personal::where('ci', $request->ci)->first();
        if($personal==null){
            //return $personal;
            return redirect()->back()->with('error', 'El N° de carnet no se encuentra en la base de datos.');
        }else{
            $asistencia = Asistencia::where('ci', $request->ci)
            ->orderBy('id', 'desc') // Ordena por la columna 'id' de forma descendente
            ->first(); 

            if($asistencia==null) {
                $this->marcar_entrada($request);
            }else{
                if($asistencia->salida != "" || $asistencia==null){
                    //return 'marcar entrada';
                    $this->marcar_entrada($request);
                }else{
                    //return 'marcar salida';
                    $this->marcar_salida($asistencia);
                    
                }
            }
        }
        return redirect()->route('asistencia.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asistencia  $asistencia
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $request->validate([
            'ci'=>'required',
        ]);
        $personal = Personal::where('ci', $request->ci)->first();
        if($personal==null){
            //return $personal;
            return redirect()->back()->with('error', 'El N° de carnet no se encuentra en la base de datos.');
        }else{
            $asistencias = Asistencia::where('ci', $request->ci)->get();
            if($asistencias != null){
                $hrs_total=0;
                $min_total=0;
                foreach ($asistencias as $asistencia) {
                    if($asistencia->hora_dia != null){
                        $Hora_trabajadas = str_replace(' ', '', $asistencia->hora_dia);
                        list($horas, $minutos) = explode(':', $Hora_trabajadas);
                        $hrs_total+=$horas;
                        $min_total+=$minutos;
                    }
                }
                $hrs_total+=intval($min_total/60);
                $min_total=$min_total%60;
                $Horas_acumuladas=$hrs_total.' : '. $min_total;
            }
        }
        
        return view('asistencia.show', compact('Horas_acumuladas', 'asistencias', 'personal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asistencia  $asistencia
     * @return \Illuminate\Http\Response
     */
    public function edit(Asistencia $asistencia)
    {
        return view('asistencia.edit', compact('asistencia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAsistenciaRequest  $request
     * @param  \App\Models\Asistencia  $asistencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asistencia $asistencia)
    {
        $request->validate([
            'ci'=>'required',
            'entrada'=>'required',
            'salida'=>'required',
            'observaciones'=>'nullable',
        ]);
        $asistencia->ci = $request->ci;
        $asistencia->entrada = $request->entrada;
        $asistencia->salida = $request->salida;
        $asistencia->observaciones = $request->observaciones;
        $asistencia->hora_dia = $this->calcular_hrs_trabajadas($asistencia);
        $asistencia->save();
        return redirect()->route('asistencia.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asistencia  $asistencia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asistencia $asistencia)
    {
        $asistencia->delete();
        return redirect()->route('asistencia.index');
    }

    public function marcar_entrada(Request $request)
    {
        $asistencia = new Asistencia();
        $asistencia->ci=$request->ci;
        $asistencia->entrada = now();
        //$asistencia->fecha = today();
        $asistencia->save();
    }

    public function marcar_salida(Asistencia $asistencia)
    {

        $asistencia->salida = now();
        $hora_trab= $this->calcular_hrs_trabajadas($asistencia);
        $asistencia->hora_dia = $hora_trab;
        $asistencia->save();
    }

    public function calcular_hrs_trabajadas(Asistencia $asistencia)
    {
        $horaEntrada = Carbon::parse($asistencia->entrada);
        $horaSalida = Carbon::parse($asistencia->salida);

        $horasTrabajadas = $horaEntrada->diffInHours($horaSalida);
        $minutosTrabajados = $horaEntrada->diffInMinutes($horaSalida);
        //$horasTrabajadas +=intval($minutosTrabajados/60);
        $minutosTrabajados = $minutosTrabajados%60;
        $hora_trab= $horasTrabajadas . ' : ' . $minutosTrabajados;
        return $hora_trab;
    }

}

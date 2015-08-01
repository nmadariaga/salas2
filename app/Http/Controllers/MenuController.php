<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Datetime;

class MenuController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

  public function Seleccion()
  {
    return view('entrada.bienvenido');
  }

	public function menuAdministrador()
	{
		return view('administrador.menu');
	}

	public function menuEncargado()
	{
    $usuario = Auth::user();
		$nombres = $usuario->nombres;
		$apellidos = $usuario->apellidos;
		$nombreCompleto = $nombres.' '.$apellidos;
		return view('encargado.menu')->with('usuario',$usuario)->with('nombreCompleto',$nombreCompleto);
	}

	public function inicioAdministrador()
	{
    $usuario = Auth::user();
		$nombres = $usuario->nombres;
		$apellidos = $usuario->apellidos;
		$nombreCompleto = $nombres.' '.$apellidos;

		return view('administrador.inicio')->with('usuario',$usuario)->with('nombreCompleto',$nombreCompleto);
	}

  public function inicioAlumno()
  {

    date_default_timezone_set("America/Santiago" );
    ///echo "la fecha actual es " . date("d") . " del " . date("m") . " de " . date("Y")
    $year = date("Y");
    $month = date("m");
    $day = date("d");

    # Obtenemos el numero de la semana
    $semana = date("W",mktime(0,0,0,$month,$day,$year));

    # Obtenemos el día de la semana de la fecha dada
    $diaSemana = date("w",mktime(0,0,0,$month,$day,$year));

    # el 0 equivale al domingo...
    if($diaSemana == 0)
        $diaSemana = 7;

    # A la fecha recibida, le restamos el dia de la semana y obtendremos el lunes
    $lunes = date("Y-m-d",mktime(0,0,0,$month,$day-$diaSemana+1,$year));
    $martes = date("Y-m-d",mktime(0,0,0,$month,$day-$diaSemana+2,$year));
    $miercoles = date("Y-m-d",mktime(0,0,0,$month,$day-$diaSemana+3,$year));
    $jueves = date("Y-m-d",mktime(0,0,0,$month,$day-$diaSemana+4,$year));
    $viernes = date("Y-m-d",mktime(0,0,0,$month,$day-$diaSemana+5,$year));
    $semana = [$lunes, $martes, $miercoles, $jueves, $viernes];

    $usuario = Auth::user();
		$nombres = $usuario->estudiante->nombres;
		$apellidos = $usuario->estudiante->apellidos;
		$nombreCompleto = $nombres.' '.$apellidos;
		$periodos = new \App\Periodo;
    $cursos = $usuario->estudiante->cursos;
		return view("alumno.index")->with('cursos',$cursos)
                              ->with('semana',$semana)
                               ->with('nombreCompleto',$nombreCompleto)
                               ->with('usuario',$usuario)
                               ->with('periodos', \App\Periodo::paginate(10)->setPath('periodo'));
  }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}

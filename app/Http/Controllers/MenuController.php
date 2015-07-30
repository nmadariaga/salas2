<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class MenuController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    public function __construct()
    {
    	//$this->middleware('auth');
    }

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
		$nombres = $usuario->estudiante->nombres;
		$apellidos = $usuario->estudiante->apellidos;
		$nombreCompleto = $nombres.' '.$apellidos;
		return view('encargado.menu')->with('usuario',$usuario)->with('nombreCompleto',$nombreCompleto);
	}

	public function inicioAdministrador()
	{
    $usuario = Auth::user();
		$nombres = $usuario->estudiante->nombres;
		$apellidos = $usuario->estudiante->apellidos;
		$nombreCompleto = $nombres.' '.$apellidos;

		return view('administrador.inicio')->with('usuario',$usuario)->with('nombreCompleto',$nombreCompleto);
	}

  public function inicioAlumno()
  {
    $usuario = Auth::user();
		$nombres = $usuario->estudiante->nombres;
		$apellidos = $usuario->estudiante->apellidos;
		$nombreCompleto = $nombres.' '.$apellidos;
		$periodos = new \App\Periodo;
		return view("alumno.index")->with('nombreCompleto',$nombreCompleto)->with('usuario',$usuario)->with('periodos', \App\Periodo::paginate(10)->setPath('periodo'));
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

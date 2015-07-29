<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Alumno;
use App\Periodo;
use Auth;
class AlumnosController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$nombres = Auth::user()->estudiante->nombres;
		$apellidos = Auth::user()->estudiante->apellidos;
		$nombreCompleto = $nombres." ".$apellidos;
		$periodos = new \App\Periodo;
		return view("alumno.index")->with('nombreCompleto',$nombreCompleto)->with('periodos', \App\Periodo::paginate(10)->setPath('periodo'));
	}

	public function buscar()
	{
		return view('alumno.buscar')->with('horarios', \App\Horario::paginate(5)->setPath('horario'));
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(StoreAsignaturaRequest $request)
	{

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(UpdateAsignaturaRequest $request, $id)
	{

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{

	}


}

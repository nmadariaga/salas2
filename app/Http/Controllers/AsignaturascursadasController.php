<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Curso;
use Illuminate\Http\Request;
use DB;
use App\Asignaturacursada;
class AsignaturascursadasController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($id)
	{
		$estudiantes = \App\Estudiante::find($id);

	return view('asignaturacursada.index')->with('estudiante',$estudiantes);
}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
   public function create($id)
   {
		$estudiante = \App\Estudiante::find($id);
		$asignatura = \App\Asignatura::lists('nombre','id');
		$curso = \App\Curso::lists('seccion','id');
		return view('asignaturacursada.create')->with('cursos',$curso)->with('estudiante',$estudiante);

   }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$asignaturacursada = new \App\Asignaturacursada;

    $asignaturacursada->curso_id = \Request::input('curso_id');
    $asignaturacursada->estudiante_id = \Request::input('estudiante_id');

    $asignaturacursada->save();

    return redirect()->route('asignaturacursada.index')->with('message', 'curso agregado');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($estudianteid, $asignaturaid)
	{
		return "este es el show";
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

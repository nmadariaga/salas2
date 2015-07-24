<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Curso;
use App\Estudiante;
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
		$asignaturacursada = $estudiantes->asignaturacursada;
		return view('asignaturacursada.index')->with('estudiante',$estudiantes)
																				->with('cursos', \App\Curso::paginate(20)->setPath('curso'))
																				->with('asignaturacursada',$asignaturacursada);
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
		return view('asignaturacursada.create')->with('cursos',$curso)->with('estudiante',$estudiante)
		                                        ->with('asignatura',$asignatura);

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

		$estudiantes = \App\Estudiante::find($asignaturacursada->estudiante_id);
    return redirect()->route('estudiantes.asignaturascursadas.index', [$estudiantes->id])->with('message', 'Asignatura agegada correctamente');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$curso = \App\Curso::find($id);
		$asignaturas = \App\Asignatura::find($curso->asignatura_id);
		$docente = \App\Docente::find($curso->docente_id);
		return view('asignaturacursada.show')->with('curso',$curso)->with('asignaturas',$asignaturas)->with('docente',$docente);

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return $id;
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
	public function destroy($id_estudiante, $id_curso)
	{
		$curso = Curso::find($id_curso);
		$estudiante = Estudiante::find($id_estudiante);

		$estudiante->cursos()->detach($curso);

		return redirect()->route('estudiantes.asignaturascursadas.index', [$id_estudiante])->with('message', 'Asignatura Eliminada con éxito');
	}
}

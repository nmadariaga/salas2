<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Curso;
use App\Estudiante;
use Illuminate\Http\Request;
use DB;
use App\Asignaturacursada;
use Auth;

class AsignaturascursadasController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($id)
	{
		$usuario = Auth::user();
		$estudiantes = \App\Estudiante::find($id);
		$asignaturacursada = $estudiantes->asignaturacursada;
		return view('asignaturacursada.index')->with('estudiante',$estudiantes)
																				->with('cursos', \App\Curso::paginate(20)->setPath('curso'))
																				->with('asignaturacursada',$asignaturacursada)
																				->with('usuario',$usuario);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
   public function create($id)
   {
   	$usuario = Auth::user();
		$estudiante = \App\Estudiante::find($id);
		$cursos = \App\Curso::all();
		$cursos_list = array();
		foreach ($cursos as $curso) {
					$cursos_list[$curso->id] = sprintf('%s (Seccion %d)', $curso->asignatura->nombre,
						$curso->seccion);
				}
		return view('asignaturacursada.create')->with('cursos_list',$cursos_list)->with('estudiante',$estudiante)
				->with('usuario',$usuario);

   }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$usuario = Auth::user();
		$asignaturacursada = new \App\Asignaturacursada;

    $asignaturacursada->curso_id = \Request::input('curso_id');
    $asignaturacursada->estudiante_id = \Request::input('estudiante_id');

    $asignaturacursada->save();

		$estudiantes = \App\Estudiante::find($asignaturacursada->estudiante_id);
    return redirect()->route('estudiantes.asignaturascursadas.index', [$estudiantes->id])->with('message', 'Asignatura agegada correctamente')->with('usuario',$usuario);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$usuario = Auth::user();
		$curso = \App\Curso::find($id);
		$asignaturas = \App\Asignatura::find($curso->asignatura_id);
		$docente = \App\Docente::find($curso->docente_id);
		return view('asignaturacursada.show')->with('curso',$curso)->with('asignaturas',$asignaturas)->with('docente',$docente)->with('usuario',$usuario);

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$usuario = Auth::user();
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
		$usuario = Auth::user();
		$curso = Curso::find($id_curso);
		$estudiante = Estudiante::find($id_estudiante);

		$estudiante->cursos()->detach($curso);

		return redirect()->route('estudiantes.asignaturascursadas.index', [$id_estudiante])->with('message', 'Asignatura Eliminada con éxito')->with('usuario',$usuario);
	}
}

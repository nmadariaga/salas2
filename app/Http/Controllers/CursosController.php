<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Doncente;

class CursosController extends Controller {

		/**
		 * Display a listing of the resource.
		 *
		 * @return Response
		 */
		public function index()
		{
			return view("cursos.index")->with('cursos', \App\Curso::paginate(5)->setPath('curso'));
		}

		/**
		 * Show the form for creating a new resource.
		 *
		 * @return Response
		 */
		public function create()
		{
			$asignatura = \App\Asignatura::lists('nombre','id');
			$docente = \App\Docente::lists('nombres','id');
			return view('cursos.create')->with('asignatura',$asignatura)->with('docente',$docente);
		}

		/**
		 * Store a newly created resource in storage.
		 *
		 * @return Response
		 */
		public function store()
		{
			$curso = new \App\Curso;

			$curso->semestre = \Request::input('semestre');
			$curso->seccion = \Request::input('seccion');
			$curso->anio = \Request::input('anio');
			$curso->asignatura_id = \Request::input('asignatura_id');
			$curso->docente_id = \Request::input('docente_id');

			$curso->save();

			return redirect()->route('cursos.index')->with('message', 'curso agregado');
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
			return view('cursos.show')->with('curso',$curso)->with('asignaturas',$asignaturas)->with('docente',$docente);
		}

		/**
		 * Show the form for editing the specified resource.
		 *
		 * @param  int  $id
		 * @return Response
		 */
		public function edit($id)
		{
			$asignaturas = \App\Asignatura::lists('nombre','id');
			$docente = \App\Docente::lists('nombres','id');
			return view('cursos.edit')->with('curso', \App\Curso::find($id))->with('asignaturas',$asignaturas)->with('docente',$docente);
		}

		/**
		 * Update the specified resource in storage.
		 *
		 * @param  int  $id
		 * @return Response
		 */
		public function update($id)
		{
			$curso = \App\Curso::find($id);

			$curso->semestre = \Request::input('semestre');
			$curso->seccion = \Request::input('seccion');
			$curso->anio = \Request::input('anio');
			$curso->asignatura_id = \Request::input('asignatura_id');
			$curso->docente_id = \Request::input('docente_id');

			$curso->save();
			return redirect()->route('cursos.index', ['curso' => $id])->with('message', 'Cambios guardados');
		}

		/**
		 * Remove the specified resource from storage.
		 *
		 * @param  int  $id
		 * @return Response
		 */
		public function destroy($id)
		{
			$curso = \App\Curso::find($id);

			$curso->delete();

			return redirect()->route('cursos.index')->with('message', 'curso eliminado con éxito');
		}

	}

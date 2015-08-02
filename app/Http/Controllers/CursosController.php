<?php namespace App\Http\Controllers;

use App\Http\Requests\StoreCursoRequest;
use App\Http\Requests\UpdateCursosRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Docente;
use Auth;

class CursosController extends Controller {

		/**
		 * Display a listing of the resource.
		 *
		 * @return Response
		 */
		public function index(Request $request)
		{
			$usuario = Auth::user();
			$cursos = \App\Curso::name(ucwords($request->get("name")))->orderBy('id','DESC')->paginate();
			return view('cursos.index',compact('cursos'))->with('usuario',$usuario);
		}
		/**
		 * Show the form for creating a new resource.
		 *
		 * @return Response
		 */
		public function create()
		{
			$usuario = Auth::user();
			$asignatura = \App\Asignatura::lists('nombre','id');
			$docente = \App\Docente::lists('nombres','id');
			//dd($docente);
			return view('cursos.create')->with('asignatura',$asignatura)->with('docente',$docente)->with('usuario',$usuario);
		}

		/**
		 * Store a newly created resource in storage.
		 *
		 * @return Response
		 */
		public function store(StoreCursoRequest $request)
		{
			$usuario = Auth::user();
			$curso = new \App\Curso;

			$curso->semestre = $request->input('semestre');
			$curso->seccion = $request->input('seccion');
			$curso->anio = $request->input('anio');
			$curso->asignatura_id = $request->input('asignatura_id');
			$curso->docente_id = $request->input('docente_id');

			$curso->save();

			return redirect()->route('cursos.index')->with('message', 'curso agregado')->with('usuario',$usuario);
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
			return view('cursos.show')->with('curso',$curso)->with('asignaturas',$asignaturas)->with('docente',$docente)->with('usuario',$usuario);
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
			$asignaturas = \App\Asignatura::lists('nombre','id');
			$docente = \App\Docente::lists('nombres','id');
			return view('cursos.edit')->with('curso', \App\Curso::find($id))->with('asignaturas',$asignaturas)->with('docente',$docente)->with('usuario',$usuario);
		}

		/**
		 * Update the specified resource in storage.
		 *
		 * @param  int  $id
		 * @return Response
		 */
		public function update(UpdateCursosRequest $request, $id)
		{
			$usuario = Auth::user();
			$curso = \App\Curso::find($id);

			$curso->semestre = $request->input('semestre');
			$curso->seccion = $request->input('seccion');
			$curso->anio = $request->input('anio');
			$curso->asignatura_id = $request->input('asignatura_id');
			$curso->docente_id = $request->input('docente_id');

			$curso->save();
			return redirect()->route('cursos.index', ['curso' => $id])->with('message', 'Cambios guardados')->with('usuario',$usuario);
		}

		/**
		 * Remove the specified resource from storage.
		 *
		 * @param  int  $id
		 * @return Response
		 */
		public function destroy($id)
		{
			$usuario = Auth::user();
			$curso = \App\Curso::find($id);

			$curso->delete();

			return redirect()->route('cursos.index')->with('message', 'curso eliminado con éxito')->with('usuario',$usuario);
		}

	}

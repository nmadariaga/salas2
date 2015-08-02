<?php namespace App\Http\Controllers;

use App\Http\Requests\StoreEstudianteRequest;
use App\Http\Requests\UpdateEstudianteRequest;
use App\Http\Controllers\Controller;
use App\Carrera;
use Illuminate\Http\Request;
use Auth;

class EstudiantesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
		{
			$usuario = Auth::user();
			$estudiantes = \App\Estudiante::name(ucwords($request->get("name")))->orderBy('id','DESC')->paginate();
			return view('estudiantes.index',compact('estudiantes'))->with('usuario',$usuario);
		}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */

	public function VerAsignaturas($id)
	{
		//$estudiante = \App\Estudiante::find($id);
		//acursada = \App\Asignaturacursada::find($estudiante_id);
		//return view("asignaturacursada.index")->with('asignaturascursadas', \App\Asignaturacursada::paginate(10)->setPath('acursada'));
		return "asds";
	}


	public function create()
	{
		$usuario = Auth::user();
		$carrera = Carrera::lists('nombre','id');
		return view('estudiantes.create')->with('carrera',$carrera)->with('usuario',$usuario);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(StoreEstudianteRequest $request)
	{
		$usuario = Auth::user();
		$estudiante = new \App\Estudiante;

		$estudiante->carrera_id = $request->input('carrera_id');
		$estudiante->rut = $request->input('rut');
		$estudiante->nombres = ucwords($request->input('nombres'));
		$estudiante->apellidos = ucwords($request->input('apellidos'));
		$estudiante->email = $request->input('email');

		$estudiante->save();

		return redirect()->route('estudiantes.index')->with('message', 'Estudiante Agregado')->with('usuario',$usuario);
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
		$estudiante = \App\Estudiante::find($id);
		$carrera = Carrera::find($estudiante->carrera_id);
		return view('estudiantes.show')->with('estudiante',$estudiante)->with('carrera',$carrera)->with('usuario',$usuario);
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
		$carrera = Carrera::lists('nombre','id');
		return view('estudiantes.edit')->with('estudiante', \App\Estudiante::find($id))->with('carrera',$carrera)->with('usuario',$usuario);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(UpdateEstudianteRequest $request, $id)
	{
		$usuario = Auth::user();
		$estudiante = \App\Estudiante::find($id);

		$estudiante->carrera_id = $request->input('carrera_id');
		$estudiante->rut = $request->input('rut');
		$estudiante->nombres = ucwords($request->input('nombres'));
		$estudiante->apellidos = ucwords($request->input('apellidos'));
		$estudiante->email = $request->input('email');

		$estudiante->save();
		return redirect()->route('estudiantes.index', ['carrera' => $id])->with('message', 'Cambios guardados')->with('usuario',$usuario);
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
		$estudiante = \App\Estudiante::find($id);

		$estudiante->delete();

		return redirect()->route('estudiantes.index')->with('message', 'Estudiante Eliminado con éxito')->with('usuario',$usuario);
	}

}

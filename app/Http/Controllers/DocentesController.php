<?php namespace App\Http\Controllers;

use App\Http\Requests\StoreDocenteRequest;
use App\Http\Requests\UpdateDocenteRequest;
use App\Http\Controllers\Controller;
use App\Departamento;
use Illuminate\Http\Request;
use Auth;

class DocentesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
		{
			$usuario = Auth::user();
			$docentes = \App\Docente::name(ucwords($request->get("name")))->orderBy('id','DESC')->paginate();
			return view('docentes.index',compact('docentes'))->with('usuario',$usuario);
		}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$usuario = Auth::user();
		$departamento = Departamento::lists('nombre','id');
		return view('docentes.create')->with('departamento',$departamento)->with('usuario',$usuario);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(StoreDocenteRequest $request)
	{
		$usuario = Auth::user();
		$docentes = new \App\Docente;

		$docentes->departamento_id = $request->input('departamento_id');
		$docentes->rut = $request->input('rut');
		$docentes->nombres = ucwords($request->input('nombres'));
		$docentes->apellidos = ucwords($request->input('apellidos'));

		$docentes->save();

		return redirect()->route('docentes.index')->with('message', 'Docente Agregado')->with('usuario',$usuario);
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
		$docentes = \App\Docente::find($id);
		$departamento = Departamento::find($docentes->departamento_id);
		return view('docentes.show')->with('docente',$docentes)->with('departamento',$departamento)->with('usuario',$usuario);
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
		$departamento = Departamento::lists('nombre','id');
		return view('docentes.edit')->with('docente', \App\Docente::find($id))->with('departamento',$departamento)->with('usuario',$usuario);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(UpdateDocenteRequest $request, $id)
	{
		$usuario = Auth::user();
		$docentes = \App\Docente::find($id);

		$docentes->departamento_id = $request->input('departamento_id');
		$docentes->rut = $request->input('rut');
		$docentes->nombres = ucwords($request->input('nombres'));
		$docentes->apellidos = ucwords($request->input('apellidos'));

		$docentes->save();
		return redirect()->route('docentes.index', ['docente' => $id])->with('message', 'Cambios guardados')->with('usuario',$usuario);
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
		$docentes = \App\Docente::find($id);

		$docentes->delete();

		return redirect()->route('docentes.index')->with('message', 'Docente Eliminado con éxito')->with('usuario',$usuario);
	}

	public function leerFichero(Request $request)
	{

		$archivo=$request->file('archivo')->move(storage_path('archivos'), 'docentes.csv');

		\Excel::load(storage_path('archivos/docentes.csv'), function($archivo)
		{
			$resultado = $archivo->get();
			foreach($resultado as $key => $dato)
			{
					//echo $dato->nombre.'---'.$dato->direccion.'<br>';
					$docente = new \App\Docente;

					$docente->departamento_id = $dato->departamento_id;
					$docente->rut = $dato->rut;
					$docente->nombres = ucwords($dato->nombres);
					$docente->apellidos = ucwords($dato->apellidos);

					$docente->save();

			}
		})->get();
		return redirect()->route("docentes.index")->with('docentes', \App\Docente::paginate(5)
																									 ->setPath('docentes'))
																									->with('message', 'Archivo cargado con éxito');
	}

	public function exportarDocentes()
	{
		\Excel::create('DocentesExportados', function($excel) {

		           $excel->sheet('Docentes', function($sheet) {

		               $docente = \App\Docente::all();
		               $sheet->fromArray($docente);

		           });
		       })->export('csv');
					return redirect()->route("docentes.index")->with('docente', \App\Docente::paginate(10)
													->setPath('docente'));;
	}

}

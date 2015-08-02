<?php namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCampusRequest;
use App\Http\Requests\UpdateCampusRequest;
use Illuminate\Http\Request;
use Auth;

class CampusController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$usuario = Auth::user();
		return view("campus.index")->with('campus', \App\Campus::paginate(10)->setPath('campu'))->with('usuario',$usuario);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$usuario = Auth::user();
		return view('campus.create')->with('usuario',$usuario);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(StoreCampusRequest $request)
	{
		$usuario = Auth::user();
		$campus = new \App\Campus;

		$campus->nombre = ucwords($request->input('nombre'));
		$campus->direccion = ucwords($request->input('direccion'));
		$campus->latitud = $request->input('latitud');
		$campus->longitud = $request->input('longitud');
		$campus->descripcion = ucfirst($request->input('descripcion'));
		$campus->rut_encargado = $request->input('rut_encargado');

		$campus->save();

		return redirect()->route('campus.index')->with('message', 'Campus Agregado')->with('usuario',$usuario);
	}

	public function leerFichero(Request $request)
	{
		$usuario = Auth::user();

		$archivo=$request->file('archivo')->move(storage_path('archivos'), 'campus.csv');

		\Excel::load(storage_path('archivos/campus.csv'), function($archivo)
		{
			$resultado = $archivo->get();
			foreach($resultado as $key => $dato)
			{
					//echo $dato->nombre.'---'.$dato->direccion.'<br>';
					$campus = new \App\Campus;

					$campus->nombre = ucwords($dato->nombre);
					$campus->direccion = ucwords($dato->direccion);
					$campus->latitud = $dato->latitud;
					$campus->longitud = $dato->longitud;
					$campus->descripcion = ucfirst($dato->descripcion);
					$campus->rut_encargado = $dato->rut_encargado;

					$campus->save();

			}
		})->get();
		return view ("campus.index")->with('campus', \App\Campus::paginate(20)->setPath('campu'))->with('usuario',$usuario);
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
		$campus = \App\Campus::find($id);

		return view('campus.show')->with('campu',$campus)->with('usuario',$usuario);
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
		return view('campus.edit')->with('campu', \App\Campus::find($id))->with('usuario',$usuario);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(UpdateCampusRequest $request, $id)
	{
		$usuario = Auth::user();
		$campus = \App\Campus::find($id);

		$campus->nombre = ucwords($request->input('nombre'));
		$campus->direccion = ucwords($request->input('direccion'));
		$campus->latitud = $request->input('latitud');
		$campus->longitud = $request->input('longitud');
		$campus->descripcion = ucfirst($request->input('descripcion'));
		$campus->rut_encargado = $request->input('rut_encargado');

		$campus->save();
		return redirect()->route('campus.index', ['campu' => $id])->with('message', 'Cambios guardados')->with('usuario',$usuario);
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
		$campus = \App\Campus::find($id);

		$campus->delete();

		return redirect()->route('campus.index')->with('message', 'Campus Eliminado con éxito')->with('usuario',$usuario);
	}


}

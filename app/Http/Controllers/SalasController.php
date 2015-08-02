<?php namespace App\Http\Controllers;

use App\Http\Requests\StoreSalasRequest;
use App\Http\Requests\UpdateSalasRequest;
use App\Http\Controllers\Controller;
use App\Tipodesala;
use Illuminate\Http\Request;
use App\Campus;
use Auth;

class SalasController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
		{
			$usuario = Auth::user();
			$salas = \App\Sala::name($request->get("name"))->orderBy('id','DESC')->paginate();
			return view('salas.index',compact('salas'))->with('usuario',$usuario);
		}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$usuario = Auth::user();
		$campus = Campus::lists('nombre','id');
		$tiposdesalas = Tipodesala::lists('nombre','id');
		return view('salas.create')->with('tiposdesala',$tiposdesalas)->with('campus',$campus)->with('usuario',$usuario);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(StoreSalasRequest $request)
	{
		$usuario = Auth::user();
		$salas = new \App\Sala;

		$salas->campus_id = $request->input('campus_id');
		$salas->tipo_sala_id = $request->input('tipo_sala_id');
		$salas->nombre = ucwords($request->input('nombre'));
		$salas->descripcion = ucfirst($request->input('descripcion'));

		$salas->save();

		return redirect()->route('salas.index')->with('message', 'Sala Agregada')->with('usuario',$usuario);
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
		$salas = \App\Sala::find($id);
		$campus = Campus::find($salas->campus_id);
		$tiposdesalas = Tipodesala::find($salas->tipo_sala_id);
		return view('salas.show')->with('sala',$salas)->with('tiposala',$tiposdesalas)->with('campus',$campus)->with('usuario',$usuario);
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
		$campus = Campus::lists('nombre','id');
		$tiposdesalas = Tipodesala::lists('nombre','id');
		return view('salas.edit')->with('sala', \App\Sala::find($id))->with('tiposdesala',$tiposdesalas)->with('campus',$campus)->with('usuario',$usuario);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(UpdateSalasRequest $request, $id)
	{
		$usuario = Auth::user();
		$salas = \App\Sala::find($id);

		$salas->campus_id = $request->input('campus_id');
		$salas->tipo_sala_id = $request->input('tipo_sala_id');
		$salas->nombre = ucwords($request->input('nombre'));
		$salas->descripcion = ucfirst($request->input('descripcion'));

		$salas->save();
		return redirect()->route('salas.index', ['sala' => $id])->with('message', 'Cambios guardados')->with('usuario',$usuario);
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
		$salas = \App\Sala::find($id);

		$salas->delete();

		return redirect()->route('salas.index')->with('message', 'Sala Eliminada con éxito')->with('usuario',$usuario);
	}

}

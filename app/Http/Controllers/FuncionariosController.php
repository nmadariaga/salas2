<?php namespace App\Http\Controllers;

use App\Http\Requests\StoreFuncionarioRequest;
use App\Http\Requests\UpdateFuncionarioRequest;
use App\Http\Controllers\Controller;
use App\Departamento;
use Illuminate\Http\Request;
use Auth;


class FuncionariosController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
		{
			$usuario = Auth::user();
			$funcionarios = \App\Funcionario::name(ucwords($request->get("name")))->orderBy('id','DESC')->paginate();
			return view('funcionarios.index',compact('funcionarios'))->with('usuario',$usuario);
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
		return view('funcionarios.create')->with('departamento',$departamento)->with('usuario',$usuario);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(StoreFuncionarioRequest $request)
	{
		$usuario = Auth::user();
		$funcionarios = new \App\Funcionario;

		$funcionarios->departamento_id = $request->input('departamento_id');
		$funcionarios->rut = $request->input('rut');
		$funcionarios->nombres = ucwords($request->input('nombres'));
		$funcionarios->apellidos = ucwords($request->input('apellidos'));

		$funcionarios->save();

		return redirect()->route('funcionarios.index')->with('message', 'Funcionario Agregado')->with('usuario',$usuario);
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
		$funcionarios = \App\Funcionario::find($id);
		$departamento = Departamento::find($funcionarios->departamento_id);
		return view('funcionarios.show')->with('funcionario',$funcionarios)->with('departamento',$departamento)->with('usuario',$usuario);
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
		return view('funcionarios.edit')->with('funcionario', \App\Funcionario::find($id))->with('departamento',$departamento)->with('usuario',$usuario);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(UpdateFuncionarioRequest $request, $id)
	{
		$usuario = Auth::user();
		$funcionarios = \App\Funcionario::find($id);

		$funcionarios->departamento_id = $request->input('departamento_id');
		$funcionarios->rut = $request->input('rut');
		$funcionarios->nombres = ucwords($request->input('nombres'));
		$funcionarios->apellidos = ucwords($request->input('apellidos'));

		$funcionarios->save();
		return redirect()->route('funcionarios.index', ['funcionario' => $id])->with('message', 'Cambios guardados')->with('usuario',$usuario);
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
		$funcionarios = \App\Funcionario::find($id);

		$funcionarios->delete();

		return redirect()->route('funcionarios.index')->with('message', 'Funcionario Eliminado con éxito')->with('usuario',$usuario);
	}

}

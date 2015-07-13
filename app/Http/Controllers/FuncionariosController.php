<?php namespace App\Http\Controllers;

use App\Http\Requests\StoreFuncionarioRequest;
use App\Http\Requests\UpdateFuncionarioRequest;
use App\Http\Controllers\Controller;
use App\Departamento;
use Illuminate\Http\Request;


class FuncionariosController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view("funcionarios.index")->with('funcionarios', \App\Funcionario::paginate(5)->setPath('funcionario'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$departamento = Departamento::lists('nombre','id');
		return view('funcionarios.create')->with('departamento',$departamento);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(StoreFuncionarioRequest $request)
	{
		$funcionarios = new \App\Funcionario;

		$funcionarios->departamento_id = $request->input('departamento_id');
		$funcionarios->rut = $request->input('rut');
		$funcionarios->nombres = $request->input('nombres');
		$funcionarios->apellidos = $request->input('apellidos');

		$funcionarios->save();

		return redirect()->route('funcionarios.index')->with('message', 'Funcionario Agregado');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$funcionarios = \App\Funcionario::find($id);
		$departamento = Departamento::find($funcionarios->departamento_id);
		return view('funcionarios.show')->with('funcionario',$funcionarios)->with('departamento',$departamento);;
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$departamento = Departamento::lists('nombre','id');
		return view('funcionarios.edit')->with('funcionario', \App\Funcionario::find($id))->with('departamento',$departamento);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(UpdateFuncionarioRequest $request, $id)
	{
		$funcionarios = \App\Funcionario::find($id);

		$funcionarios->departamento_id = $request->input('departamento_id');
		$funcionarios->rut = $request->input('rut');
		$funcionarios->nombres = $request->input('nombres');
		$funcionarios->apellidos = $request->input('apellidos');

		$funcionarios->save();
		return redirect()->route('funcionarios.index', ['funcionario' => $id])->with('message', 'Cambios guardados');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$funcionarios = \App\Funcionario::find($id);

		$funcionarios->delete();

		return redirect()->route('funcionarios.index')->with('message', 'Funcionario Eliminado con éxito');
	}

}

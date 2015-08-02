<?php namespace App\Http\Controllers;

use App\Http\Requests\StorePeriodoRequest;
use App\Http\Requests\UpdatePeriodoRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class PeriodosController extends Controller {

					/**
					 * Display a listing of the resource.
					 *
					 * @return Response
					 */
					public function index(Request $request)
					{
						$usuario = Auth::user();
						$periodos = \App\Periodo::name($request->get("name"))->orderBy('id','DESC')->paginate();
						return view('periodos.index',compact('periodos'))->with('usuario',$usuario);
					}

					/**
					 * Show the form for creating a new resource.
					 *
					 * @return Response
					 */
					public function create()
					{
						$usuario = Auth::user();
						return view('periodos.create')->with('usuario',$usuario);
					}

					/**
					 * Store a newly created resource in storage.
					 *
					 * @return Response
					 */
					public function store(StorePeriodoRequest $request)
					{
						$usuario = Auth::user();
						$periodo = new \App\Periodo;

						$periodo->bloque = ucwords($request->input('bloque'));
						$periodo->inicio = $request->input('inicio');
						$periodo->fin = $request->input('fin');

						$periodo->save();

						return redirect()->route('periodos.index')->with('message', 'Periodo agregado')->with('usuario',$usuario);
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
						$periodo = \App\Periodo::find($id);

						return view('periodos.show')->with('periodo',$periodo)->with('usuario',$usuario);
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
						return view('periodos.edit')->with('periodo', \App\Periodo::find($id))->with('usuario',$usuario);
					}

					/**
					 * Update the specified resource in storage.
					 *
					 * @param  int  $id
					 * @return Response
					 */
					public function update(UpdatePeriodoRequest $request, $id)
					{
						$usuario = Auth::user();
						$periodo = \App\Periodo::find($id);

						$periodo->bloque = ucwords($request->input('bloque'));
						$periodo->inicio = $request->input('inicio');
						$periodo->fin = $request->input('fin');

						$periodo->save();
						return redirect()->route('periodos.index', ['periodo' => $id])->with('message', 'Cambios guardados')->with('usuario',$usuario);
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
						$periodo = \App\Periodo::find($id);

						$periodo->delete();

						return redirect()->route('periodos.index')->with('message', 'Periodo eliminado con éxito')->with('usuario',$usuario);
					}

				}

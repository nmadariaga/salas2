<?php namespace App\Http\Controllers;

use App\Http\Requests\StoreDepartamentoRequest;
use App\Http\Requests\UpdateDepartamentoRequest;
use App\Http\Controllers\Controller;
use App\Facultad;
use Illuminate\Http\Request;
use Auth;

class DepartamentosController extends Controller {

			/**
			 * Display a listing of the resource.
			 *
			 * @return Response
			 */
			public function index(Request $request)
		{
			$usuario = Auth::user();
			$departamentos = \App\Departamento::name(ucwords($request->get("name")))->orderBy('id','DESC')->paginate();
			return view('departamentos.index',compact('departamentos'))->with('usuario',$usuario);
		}

			/**
			 * Show the form for creating a new resource.
			 *
			 * @return Response
			 */
			public function create()
			{
				$usuario = Auth::user();
				$facultad = Facultad::lists('nombre','id');
				return view('departamentos.create')->with('facultad',$facultad)->with('usuario',$usuario);
			}

			/**
			 * Store a newly created resource in storage.
			 *
			 * @return Response
			 */
			public function store(StoreDepartamentoRequest $request)
			{
				$usuario = Auth::user();
				$departamento = new \App\Departamento;

				$departamento->nombre = ucwords($request->input('nombre'));
				$departamento->facultad_id = $request->input('facultad_id');
				$departamento->descripcion = ucfirst($request->input('descripcion'));

				$departamento->save();

				return redirect()->route('departamentos.index')->with('message', 'Departamento Agregado')->with('usuario',$usuario);
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
				$departamento = \App\Departamento::find($id);
				$facultad = Facultad::find($departamento->facultad_id);
				return view('departamentos.show')->with('departamento',$departamento)->with('facultad',$facultad)->with('usuario',$usuario);
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
				$facultad = Facultad::lists('nombre','id');
				return view('departamentos.edit')->with('departamento', \App\Departamento::find($id))->with('facultad',$facultad)->with('usuario',$usuario);
			}

			/**
			 * Update the specified resource in storage.
			 *
			 * @param  int  $id
			 * @return Response
			 */
			public function update(UpdateDepartamentoRequest $request, $id)
			{
				$usuario = Auth::user();
				$departamento = \App\Departamento::find($id);

				$departamento->nombre = ucwords($request->input('nombre'));
				$departamento->facultad_id = $request->input('facultad_id');
				$departamento->descripcion = ucfirst($request->input('descripcion'));

				$departamento->save();
				return redirect()->route('departamentos.index', ['departamento' => $id])->with('message', 'Cambios guardados')->with('usuario',$usuario);
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
				$departamento = \App\Departamento::find($id);

				$departamento->delete();

				return redirect()->route('departamentos.index')->with('message', 'Departamento Eliminado con éxito')->with('usuario',$usuario);
			}

			public function exportarDepartamentos()
			{
				\Excel::create('DepartamentosExportados', function($excel) {

				           $excel->sheet('Departamentos', function($sheet) {

				               $departamento = \App\Departamento::all();
				               $sheet->fromArray($departamento);

				           });
				       })->export('csv');
							return redirect()->route("departamentos.index")->with('departamentos', \App\Departamento::paginate(10)
															->setPath('departamentos'));
			}

		}

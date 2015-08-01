<?php namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFacultadRequest;
use App\Http\Requests\UpdateFacultadRequest;
use Illuminate\Http\Request;
use App\Campus;
use Auth;

class FacultadesController extends Controller {

		/**
		 * Display a listing of the resource.
		 *
		 * @return Response
		 */
		public function index(Request $request)
		{
			$usuario = Auth::user();
			$facultades = \App\Facultad::name($request->get("name"))->orderBy('id','DESC')->paginate();
			return view('facultades.index',compact('facultades'))->with('usuario',$usuario);
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
			return view('facultades.create')->with('campus',$campus)->with('usuario',$usuario);
		}

		/**
		 * Store a newly created resource in storage.
		 *
		 * @return Response
		 */
		public function store(StoreFacultadRequest $request)
		{
			$usuario = Auth::user();
			$facultad = new \App\Facultad;

			$facultad->nombre = ucwords($request->input('nombre'));
			$facultad->campus_id = $request->input('campus_id');
			$facultad->descripcion = ucfirst($request->input('descripcion'));

			$facultad->save();

			return redirect()->route('facultades.index')->with('message', 'Facultad Agregada')->with('usuario',$usuario);
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
			$facultad = \App\Facultad::find($id);
			$campus = Campus::find($facultad->campus_id);
			return view('facultades.show')->with('facultad',$facultad)->with('campus',$campus)->with('usuario',$usuario);
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
			return view('facultades.edit')->with('facultad', \App\Facultad::find($id))->with('campus',$campus)->with('usuario',$usuario);
		}

		/**
		 * Update the specified resource in storage.
		 *
		 * @param  int  $id
		 * @return Response
		 */
		public function update(UpdateFacultadRequest $request, $id)
		{
			$usuario = Auth::user();
			$facultad = \App\Facultad::find($id);

			$facultad->nombre = ucwords($request->input('nombre'));
			$facultad->campus_id = $request->input('campus_id');
			$facultad->descripcion = ucfirst($request->input('descripcion'));

			$facultad->save();
			return redirect()->route('facultades.index', ['facultad' => $id])->with('message', 'Cambios guardados')->with('usuario',$usuario);
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
			$facultad = \App\Facultad::find($id);

			$facultad->delete();

			return redirect()->route('facultades.index')->with('message', 'Facultad Eliminada con éxito')->with('usuario',$usuario);
		}

	}

<?php namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFacultadRequest;
use App\Http\Requests\UpdateFacultadRequest;
use Illuminate\Http\Request;
use App\Campus;

class FacultadesController extends Controller {

		/**
		 * Display a listing of the resource.
		 *
		 * @return Response
		 */
		public function index(Request $request)
		{
			
			$facultad = \App\Facultad::name($request->get('name'))->orderBy('id', 'DESC');
			return view("facultades.index")->with('facultades', \App\Facultad::paginate(5)->setPath('facultad'));
		}

		/**
		 * Show the form for creating a new resource.
		 *
		 * @return Response
		 */
		public function create()
		{
			$campus = Campus::lists('nombre','id');
			return view('facultades.create')->with('campus',$campus);
		}

		/**
		 * Store a newly created resource in storage.
		 *
		 * @return Response
		 */
		public function store(StoreFacultadRequest $request)
		{
			$facultad = new \App\Facultad;

			$facultad->nombre = ucwords($request->input('nombre'));
			$facultad->campus_id = $request->input('campus_id');
			$facultad->descripcion = ucfirst($request->input('descripcion'));

			$facultad->save();

			return redirect()->route('facultades.index')->with('message', 'Facultad Agregada');
		}

		/**
		 * Display the specified resource.
		 *
		 * @param  int  $id
		 * @return Response
		 */
		public function show($id)
		{
			$facultad = \App\Facultad::find($id);
			$campus = Campus::find($facultad->campus_id);
			return view('facultades.show')->with('facultad',$facultad)->with('campus',$campus);
		}

		/**
		 * Show the form for editing the specified resource.
		 *
		 * @param  int  $id
		 * @return Response
		 */
		public function edit($id)
		{
			$campus = Campus::lists('nombre','id');
			return view('facultades.edit')->with('facultad', \App\Facultad::find($id))->with('campus',$campus);
		}

		/**
		 * Update the specified resource in storage.
		 *
		 * @param  int  $id
		 * @return Response
		 */
		public function update(UpdateFacultadRequest $request, $id)
		{
			$facultad = \App\Facultad::find($id);

			$facultad->nombre = ucwords($request->input('nombre'));
			$facultad->campus_id = $request->input('campus_id');
			$facultad->descripcion = ucfirst($request->input('descripcion'));

			$facultad->save();
			return redirect()->route('facultades.index', ['facultad' => $id])->with('message', 'Cambios guardados');
		}

		/**
		 * Remove the specified resource from storage.
		 *
		 * @param  int  $id
		 * @return Response
		 */
		public function destroy($id)
		{
			$facultad = \App\Facultad::find($id);

			$facultad->delete();

			return redirect()->route('facultades.index')->with('message', 'Facultad Eliminada con éxito');
		}

	}

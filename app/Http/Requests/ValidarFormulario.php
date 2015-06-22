<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ValidarFormulario extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
				"nombre" => "required|min:1|max:10",
				"direccion" => "required|min:5|max:500",
				"latitud" => "required|min:3|max:6",
				"longitud" => "required|min:3|max:6",
				"descripcion" => "required|min:5|max:30",
				"rut" => "required|min:7|max:8"
		];
	}

	public function messages()
	{
	    return [
	        'nombre.required' => 'El campo nombre es requerido!',
	        'nombre.min' => 'El campo nombre no puede tener menos de 1 carácteres',
					'nombre.max' => 'El campo nombre no puede tener más de 10 carácteres',

					'direccion.required' => 'El campo direccion es requerido!',
	        'direccion.min' => 'El campo direccion no puede tener menos de 5 carácteres',
					'direccion.max' => 'El campo direccion no puede tener más de 500 carácteres',

					'latitud.required' => 'El campo latitud es requerido!',
					'latitud.min' => 'El campo latitud debe tener minimo 3 carácteres',
					'latitud.max' => 'El campo latitud debe tener maximo 6 carácteres',

					'longitud.required' => 'El campo longitud es requerido!',
					'longitud.min' => 'El campo longitud debe tener minimo 3 carácteres',
					'longitud.max' => 'El campo longitud debe tener maximo 6 carácteres',

					'descripcion.required' => 'El campo descripcion es requerido!',
					'descripcion.min' => 'El campo descripcion debe tener minimo 3 carácteres',
					'descripcion.max' => 'El campo descripcion debe tener maximo 6 carácteres',

					'rut.required' => 'El campo rut es requerido!',
					'rut.min' => 'El campo rut debe tener minimo 3 carácteres',
					'rut.max' => 'El campo rut debe tener maximo 6 carácteres',
	    ];
	}

}

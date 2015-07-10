<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreCampusRequest extends Request {

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
				"nombre" => "required|min:5|max:20",
				"direccion" => "required|min:5|max:500",
				"latitud" => "required|min:3|max:6",
				"longitud" => "required|min:3|max:6",
				"descripcion" => "min:5|max:30",
				"rut" => "required|min:7|max:8"
		];

	}

}

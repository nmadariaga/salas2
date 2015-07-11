<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreSalaRequest extends Request {

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
			"campus_id" => "required",
			"tipo_sala_id" => "required",
			"nombre" => "required|min:3|max:15",
			"descripcion" => "required|min:5|max:100"
		];
	}

}

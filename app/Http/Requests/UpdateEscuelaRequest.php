<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateEscuelaRequest extends Request {

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
			"departamento_id" => "required",
			"descripcion" => "min:3|max:40"
		];
	}

}
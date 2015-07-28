<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateHorarioRequest extends Request {

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
			"fechaInicial" => "required|date",
			"fechaFinal" => "required|date",
			"salas_id" => "required",
			"periodo_id" => "required",
			"curso_id" => "required"
		];
	}

}

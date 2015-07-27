<?php namespace Gocompose\Foodbag\Http\Requests;

use Gocompose\Foodbag\Http\Requests\Request;

class CreateFoodRequest extends Request {

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
			'name' => 'min:3',
			'size' => 'numeric',
			'serving_size' => 'numeric',
			'calories' => 'numeric',
			'protein' => 'numeric',
			'carbs' => 'numeric',
			'carbs_sugar' => 'numeric',
			'fat' => 'numeric',
			'fat_sat' => 'numeric',
			'fibre' => 'numeric',
			'sodium' => 'numeric',
			'sodium_assalt' => 'numeric',
			'calcium' => 'numeric',
			'cholesterol' => 'numeric',
		];
	}

}

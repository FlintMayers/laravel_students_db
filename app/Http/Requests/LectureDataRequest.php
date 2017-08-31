<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LectureDataRequest extends FormRequest
{
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
            
        	'lecture_date' => 'required|date',
        	'name' => 'required',
			'description' => 'required',
        	'group_id' => 'required'
        ];
    }
    
    public function messages()
    {
    	return [
    		'lecture_date.required' => 'Iveskite paskaitos data',
    		'lecture_date.date'    => 'Negalimas datos formatas',
    		'name.required' => 'Iveskite paskaitos pavadinima',
    		'description.required' => 'Iveskite paskaitos aprasyma',
    		'group_id.required' => 'Pasirinkite grupe siai paskaitai'
    	];
    }
}

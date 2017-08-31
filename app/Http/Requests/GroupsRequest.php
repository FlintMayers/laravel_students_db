<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GroupsRequest extends FormRequest
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
            //
            'name' => 'required',
        	'course_id' => 'required',
        	'start_date' => 'required|date',
        	'end_date' => 'required|date'
        ];
    }
    
    public function messages()
    {
    	return [
    			'name.required' => 'Iveskite grupes pavadinima',
    			'course_id.required' => 'Pasirinkite kursa',
    			'start_date.required' => 'Iveskite kursu pradzios data',
    			'end_date.required' => 'Iveskite kursu pabaigos data',
    			'start_date.date' => 'Negalimas pradzios datos formatas',
    			'end_date.date' => 'Negalimas pabaigos datos formatas'
    	];
    }
}

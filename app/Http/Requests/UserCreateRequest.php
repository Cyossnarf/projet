<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserCreateRequest extends Request
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
            'ID_Prac' => 'required|max:12|unique:Praticien',
			'Prénom' => 'max:255',
			'Nom' => 'max:255',
			'DateNaissance' => 'max:255',
			'SIH' => 'required|max:255',
            'password' => 'required|min:6|confirmed'
        ];
    }
}

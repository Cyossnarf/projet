<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserUpdateRequest extends Request
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
		$id = $this->user;
        return [
			'Prénom' => 'max:255',
			'Nom' => 'max:255',
			'DateNaissance' => 'max:255',
			'SIH' => 'required|max:255',
            'password' => 'min:6|confirmed'// Soit le mdp est vide, soit il fait plus de 6 caractères
        ];
    }
}

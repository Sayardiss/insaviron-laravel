<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Inscription extends FormRequest
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
        'nom_respo' => 'required|min:2|max:20|alpha',
        'email' => 'required|email',
        'numero' => 'required|regex:/\+?[0-9]{10,11}/'
      ];
    }
}

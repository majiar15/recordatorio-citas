<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostCreatePatient extends FormRequest
{
    protected $redirect = '/crear-paciente';

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
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'number' => ['required', 'int', 'unique:patient'],
            'cc' => ['required', 'int', 'unique:patient'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:patient'],
        ];
    }
    public function messages()
    {
        return [
            // required
            'name.required' => 'El nombre es obligatorio',
            'last_name.required' => 'El apellido es obligatorio',
            'number.required' => 'El numero es obligatorio',
            'cc.required' => 'La CC es obligatoria',
            'email.required' => 'El email es obligatorio',
            // string
            'name.string' => 'El nombre debe ser texto',
            'last_name.string' => 'El apellido debe ser texto',
            'email.string' => 'El email debe ser texto',
            // int
            'number.string' => 'El numero debe ser de tipo numerico',
            'cc.string' => 'La cc debe ser de tipo numerico',
            // max - 255
            'name.max:255' => 'El nombre debe tener maximo 255 caracteteres',
            'last_name.max:255' => 'El apellido debe tener maximo 255 caracteteres',
            'email.max:255' => 'El email debe tener maximo 255 caracteteres',
            // unique:patient
            'email.unique' => 'El email ya ha sido registrado',
            'number.unique' => 'El numero ya ha sido registrado',
            'cc.unique' => 'La cc ya ha sido registrada',


        ];
    }
}

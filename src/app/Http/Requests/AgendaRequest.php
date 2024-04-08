<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Symfony\Component\HttpFoundation\Response;

class AgendaRequest extends FormRequest
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


    public function messages()
    {
        return [
            'required'         => 'O :attribute é obrigatório.',
            'max'              => 'O :attribute ultrapassa o quantidade maxima de caracteres permitida.',
            'min'              => 'O :attribute não tem a quantidade minima de caracteres permitida.',
            'unique'           => 'o :attribute já está cadastrado.',
            'email'            => 'o :attribute é invalido.'
        ];
    }


    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'message'   => $validator->messages()->first(),
        ],200));
    }

    // 'email'  => 'required|unique:agendas'
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome'       => 'required',
            'telefone'   => 'required|min:9|max:9',
            'email'      => 'required|email|unique:agendas',
        ];
    }
}

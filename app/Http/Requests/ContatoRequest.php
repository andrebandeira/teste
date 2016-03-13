<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ContatoRequest extends Request {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true; //qualquer um pode usar esse tipo de Request
    }

    /**
     * Define as regras de validação dos campos
     *
     * @return array
     */
    public function rules() {
        return [
            'grupo' => 'required|min:5|',
            'email' => 'email|max:100',
            'nome'  => 'max:45',
            'telefone' => 'max:15'
            
        ];
    }

    /**
     *  Define as mensagens retornadas na validação
     *  @return Array
     */
    public function messages() {
        return [
            'grupo.required' => 'Atenção. Um grupo é obrigatório. Verifique!!!',
            'grupo.min' => 'Atenção. Grupo Inválido. Verifique!!!',
            'email.email' => 'Atenção. Email Inválido. Verifique!!!',
            'email.max' => 'Atenção. Tamanho do Email Inválido. Verifique!!!',
            'nome.max' => 'Atenção. Tamanho do Nome Inválido. Verifique!!!',
            'telefone.max' => 'Atenção. Tamanho do Telefone Inválido. Verifique!!!',
            
        ];
    }

}

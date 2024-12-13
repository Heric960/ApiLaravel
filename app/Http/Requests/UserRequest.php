<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Manipular falha de validação e retornar uma resposta JSON com os erros de validação.
     * 
     * @param \illuminate\Contracts\Validation\Validator $validator o objeto de validação que contém os erros de validação.
     * @throws \iluminate\Http\Exceptions\HttpResponseException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => false,
            'erros' => $validator->errors(),
        ], 422));// O codigo de status HTTP 422 significa "Unprocessable Entity" (Entidade Não
        // Processavel). Esse código é usando quando o servidor entende a requisição do cliente, mas não pode
        // processá-la devido a erros de lidação no lado do servidor. 
    }
    /**
     * Retorna as regras de vlaidação para os dados do usuário.
     * 
     * @return arry<string, \illuminate\Contracts\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        // Recuperar o id do usuario enviado na URL
        $userId = $this->route('user');

        return [
            'name' => 'required',
            'email' => 'required | email | unique:users,email' . ($userId ? $userId->id : null),
            'password' => 'required|min:6'
        ];
    
    }

    /**
     * Retorna as mensagens de erro personalizadas para as regras de validação.
     * 
     * @return array
     */
    public function messages(): array
    {
        return[
            'name.required' => 'Campo nome é obrigatório!',
            'email.required' => 'Campo e-mail é obrigatório!',
            'email.email' => 'Necessario enviar e-mail válido!',
            'email.unique' => 'O e-mail ja está cadastrado',
            'password.required' => 'Campo senha é obrigatório!',
            'password.min' => 'Senha com no mínimo :min caracteres!'
        ];
    }
}


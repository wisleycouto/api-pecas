<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class UsuarioRequest extends FormRequest
{
    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();

        throw new HttpResponseException(
            response()->json(['errors' => $errors], JsonResponse::HTTP_BAD_REQUEST)
        );
    }

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
        $id = $this->route('co_usuario');

        if ($id) {
            // Validação caso a usuario já exista
            return [
                'nome' => ['bail', 'string', 'required', 'max:100'],
                'nome_empresarial' => ['bail', 'string', 'required', 'max:255'],
                'email' => ['bail', ['bail', 'string', 'required', 'max:255'],
                'telefone' => ['bail', ['bail', 'string', 'required', 'max:100'],
            ];
        } else {
            // Validação de um usuario novo
            return [
                'nome' => ['bail', 'string', 'required', 'max:100'],
                'nome_empresarial' => ['bail', 'string', 'required', 'max:255'],
                'email' => ['bail', ['bail', 'string', 'required', 'max:255'],
                'telefone' => ['bail', ['bail', 'string', 'required', 'max:100'],
            ];
        }
    }

    public function attributes()
    {
        return [
            'nome' => 'nome do usuario',
            'nome_empresarial' => 'nome empresarial',
            'email' => 'email do usuario',
            'telefone' => 'telefone do usuario',
            ];
    }
}
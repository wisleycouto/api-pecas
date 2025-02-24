<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class PecasRequest extends FormRequest
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
        $id = $this->route('co_peca');

        if ($id) {
            // Validação caso a peça já exista
            return [
                'nome_peca' => ['bail', 'string', 'required', 'max:100'],
                'descricao_peca' => ['bail', 'string', 'required', 'max:255'],
                'preco_peca' => ['bail', 'required', 'numeric'],
            ];
        } else {
            // Validação de uma peça nova
            return [
                'nome_peca' => ['bail', 'string', 'required', 'max:100'],
                'descricao_peca' => ['bail', 'string', 'required', 'max:255'],
                'preco_peca' => ['bail', 'required', 'numeric'],
            ];
        }
    }

    public function attributes()
    {
        return [
            'nome_peca' => 'nome da peça',
            'descricao_peca' => 'descrição da peça',
            'preco_peca' => 'preço da peça',
        ];
    }
}
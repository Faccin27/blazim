<?php

namespace App\Http\Requests\Site;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class SiteUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'keywords' =>       ['required'],
            'description' =>    ['required'],
            'facebook' =>       ['required', 'max:255', 'url'],
            'instagram' =>      ['required', 'max:255', 'url'],
            'email' =>          ['required', 'max:255', 'email'],
            'telefone' =>       ['required', 'max:50'],
            'whatsapp' =>       ['required', 'max:50'],
            'endereco' =>       ['required'],
            'mapa' =>           ['required', 'max:500', 'url'],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $error = $validator->errors()->first();

        throw new HttpResponseException(response()->json(['erro' => $error], 422));
    }
}

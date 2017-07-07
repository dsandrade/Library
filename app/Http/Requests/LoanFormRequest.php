<?php

namespace Library\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoanFormRequest extends FormRequest
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
            'book' => 'required',
            'reader' => 'required',
            'withdrawal' => 'required',
            'return_date' => 'required',
            'user' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'book.required' => 'O campo livro é obrigatório',
            'reader.required' => 'O campo leitor é obrigatório',
            'withdrawal.required' => 'O campo retirado em é obrigatório',
            'return_date.required' => 'O campo retorna em é obrigatório',
            'user.required' => 'O campo administrador é obrigatório',
        ];
    }
}

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
            'book_id' => 'required',
            'reader_id' => 'required',
            'withdrawal_at' => 'required',
            'return_date' => 'required',
            'user_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'book_id.required' => 'O campo livro é obrigatório',
            'reader_id.required' => 'O campo leitor é obrigatório',
            'withdrawal_at.required' => 'O campo data de retirada em é obrigatório',
            'return_date.required' => 'O campo data de retorno é obrigatório',
            'user_id.required' => 'O campo responsável é obrigatório',
        ];
    }
}

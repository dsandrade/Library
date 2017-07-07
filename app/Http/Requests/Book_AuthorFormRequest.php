<?php

namespace Library\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Book_AuthorFormRequest extends FormRequest
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
            'author_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'book_id.required' => 'O campo livro é obrigatório',
            'author_id.required' => 'O campo autor é obrigatório',
        ];
    }
}

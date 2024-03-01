<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        
        if($this->method() == 'PUT'){

            return [
                'title'          => 'bail|required|string|unique:books,title,'.$this->book->id,
                'author'        => 'bail|required|string',
                'genre'         => 'bail|required|integer',
                'price'         => 'bail|required|numeric',
                'quantity'      => 'bail|required|integer',
            ];
        }
        return  [
            'title'         => 'bail|required|string|unique:books',
            'author'        => 'bail|required|string',
            'genre'         => 'bail|required|integer',
            'price'         => 'bail|required|numeric',
            'quantity'      => 'bail|required|integer',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'title' => 'required | min:3',
            'author' => 'required',
            'description' => 'required',
            'img' => 'required'
        ];
    }

    public function messages(){
       return[
            'title.required' => 'titolo richiesto',
            'author.required' => 'nome autore richiesto',
            'description.required' => 'descrizione richiesta',
            'img.required' => 'immagine richiesta'
        ];
    }
}

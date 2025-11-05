<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductEditRequest extends FormRequest
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
        'title' => 'required|min:3',
        'description' => 'required',
        'body' => 'required',
        'img' => 'nullable|image|max:2048'
        
    ];
        
    }
    public function messages(){
        return[
            'title.required' => 'Il titolo è obbligatorio!',
            'title.min' => 'Il titolo deve avere almeno 3 caratteri!',
            'description.required' => 'La descrizione è obbligatoria!',
            'body.required' => 'Nome autore obbligatorio!', 
            'img.image' => 'Il file deve essere un\'immagine valida!',
            'img.max' => 'L\'immagine non può superare i 2MB!'
          
        ];

    }
        
}

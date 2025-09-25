<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DetailEditRequest extends FormRequest
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
        'title' => 'required | min:3',
        'description' => 'required',
        
    ];
        
    }
    public function message(){
        return[
            'title.required'=>'Il titolo è obbligatorio!',
            'title.min'=>'Il titolo deve avere almeno 3 caratteri!',
            'description.required'=>'La descrizione è obbligatoria!',
            
        ];

    }
        
}

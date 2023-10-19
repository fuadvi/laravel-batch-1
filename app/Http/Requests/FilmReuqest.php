<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilmReuqest extends FormRequest
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
            "title" => ['required', 'string'],
            "description" => ['required', 'string'],
            "duration" => ['required', 'string'],
            "director" => ['required', 'string'],
            "thumbnail_url" => ['required', 'string'],
            "trailer_url" => ['required', 'string'],
            "film_url" => ['required', 'string'],
            "genre" => ['required', 'array'],
            "genre.*" => ['required', 'string'],
        ];
    }
}

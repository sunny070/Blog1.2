<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'cover_image'           =>['required','mimes:png,jpg,svg,gif','max:2048'],
            'title'                 =>['required','max:200','min:5'],
            'category_id'           =>['required'],
            'body'                  => ['required','min:5'],
            'publishsed_at'         =>['required'],
            'tags'                  => ['required'],
            'meta_description'         => ['required','min:5','max:250'],

        ];
    }
}

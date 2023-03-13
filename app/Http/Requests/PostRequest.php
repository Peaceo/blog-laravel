<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required|string|max:50',
            'body' => 'required|string|max:255',
            'file' => 'nullable|image'
        ];
    }

    public function attributes()
    {
        return [
            'body' => 'main body'
        ];
    }

    public function messages()
    {
        return [
            'body.body' => 'Post body cannot be left empty'
        ];
    }
}

<?php

namespace App\Http\Requests\Api\Client;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'first_name' => 'required|string|min:2|max:255',
            'last_name'  => 'required|string|min:2|max:255',
            'avatar'     => 'required|file|mimetypes:image/*|dimensions:min_width=100,min_height=100',
            'email'      => 'required|email'
        ];
    }
}

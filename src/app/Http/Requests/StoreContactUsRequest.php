<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactUsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'phone' => [
                'required',
                'string',
                'min:1',
                'max:10'
            ],
            'name' => [
                'required',
                'string',
                'min:1',
                'max:100'
            ],
            'message' => [
                'required',
                'string',
                'min:1',
                'max:1000'
            ],

        ];
    }
}

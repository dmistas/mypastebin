<?php

namespace App\Http\Requests;

use App\Models\Paste;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PasteRequest extends FormRequest
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
            'title' => ['required', 'string', 'min:3'],
            'content' => ['required', 'min:3'],
            'expiration_time' => [
                'required',
                Rule::in(Paste::EXPIRATION_TIME_ARRAY)
            ],
            'access' => ['required', Rule::in(Paste::ACCESSES)]
        ];
    }
}

<?php

namespace App\Http\Requests;


use Illuminate\Validation\Rules;
use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
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
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ];

        if ($this->method('PUT')) {
            $rules = [
                'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
                'name' => ['nullable', 'string', 'min:5', 'max:255']
            ];
        }

        return $rules;
    }
}

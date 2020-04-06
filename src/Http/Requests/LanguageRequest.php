<?php

namespace Selene\Modules\LanguageModule\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LanguageRequest extends FormRequest
{

    public function messages() {
        return [
            'name.required' => 'To pole jest wymagane.',
            'name.string' => 'Nazwa jest nieprawidłowa.',
            'name.max' => 'Nazwa może mieć maksymalnie 250 znaków.',
            'short_name.required' => 'To pole jest wymagane.',
            'short_name.string' => 'Prefiks jest nieprawidłowy.',
            'short_name.max' => 'Prefiks może mieć maksymalnie 250 znaków.',
            'short_name.unique' => 'Prefiks musi być unikalny.'
        ];
    }
}

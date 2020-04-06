<?php

namespace Selene\LanguageModule\Http\Requests;

use Selene\Modules\LanguageModule\Http\Requests\LanguageRequest;

class LanguageStoreRequest extends LanguageRequest
{
    public function rules() {
        return [
            'name' => 'required|string|max:250',
            'short_name' => 'required|string|max:250|unique:mongodb.languages'
        ];
    }
}

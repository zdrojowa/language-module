<?php

namespace Selene\Modules\LanguageModule\Http\Requests;

class LanguageStoreRequest extends LanguageRequest
{
    public function rules() {
        return [
            'name' => 'required|string|max:250',
            'short_name' => 'required|string|max:250|unique:mongodb.languages'
        ];
    }
}

<?php

namespace Selene\LanguageModule\Http\Requests;

use Selene\Modules\LanguageModule\Http\Requests\LanguageRequest;

/**
 * @property mixed language
 */
class LanguageUpdateRequest extends LanguageRequest
{
    public function rules() {
        return [
            'name' => 'required|string|max:250',
            'short_name' => 'required|string|max:250|unique:mongodb.languages,'.$this->language->id
        ];
    }
}
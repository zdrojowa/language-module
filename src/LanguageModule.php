<?php

namespace Selene\Modules\LanguageModule;

use Illuminate\Support\Arr;
use Selene\Modules\LanguageModule\Models\Language;
use Selene\Modules\Module;

/**
 * @method static LanguageSelectView()
 */
class LanguageModule extends Module
{

    public function menuItems() {
        return [
            [
                "type" => "Blade",
                "name" => "Języki",
                "blade" => LanguageModule::LanguageSelectView(),
                "data" => [
                    "languages" => Language::get(['short_name'])
                ]
            ]
        ];

    }

}

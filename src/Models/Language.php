<?php

namespace Selene\Modules\LanguageModule\Models;

use Illuminate\Support\Collection;
use Jenssegers\Mongodb\Eloquent\Model;

/**
 * @method create(array $all)
 * @method static where(string $string, $string, $string = null): Jenssegers\Mongodb\Eloquent\Builder
 * @method static get(array $properties)
 */
class Language extends Model
{
    protected $fillable = ['name', 'short_name'];

    protected $connection = 'mongodb';

    /**
     * @return Collection
     */
    public static function getSelectWithLanguageOptions()
    {
        $languages = self::all();
        $result = new Collection;

        foreach ($languages as $language){
            $result->put($language->short_name, $language->name);
        }

        return $result;
    }
}

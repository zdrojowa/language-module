<?php

namespace Selene\Modules\LanguageModule\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Language extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'languages';

    protected $appends = ['id'];
    protected $hidden  = ['_id'];

    protected $primaryKey = '_id';

    protected $fillable = ['name', 'short_name'];
    
    public static function getAllSelect() {
        $langs = [];
        foreach (Language::all() as $lang) {
            $langs[] = ['value' => $lang->short_name, 'text' => $lang->name];
        }
        return $langs;
    }
}

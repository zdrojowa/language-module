<?php

namespace Selene\Modules\LanguageModule;

use Closure;
use Illuminate\Http\Request;
use Selene\Modules\LanguageModule\Models\Language;

class LanguageExists
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next, $lang)
    {
        if(Language::where('short_name', $lang)->count() !== 1) {
            request()->session()->flash('alert-danger', 'Najpierw musisz utworzyć język: '. $lang);

            return redirect()->route('LanguageModule::languages.create');
        }

        return $next($request);
    }
}

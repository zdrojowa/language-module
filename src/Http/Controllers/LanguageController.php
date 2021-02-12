<?php

namespace Selene\Modules\LanguageModule\Http\Controllers;

use Illuminate\Http\Request;
use Selene\Modules\LanguageModule\Models\Language;

class LanguageController
{
    public function index()
    {
        return view('LanguageModule::index');
    }

    public function create()
    {
        return view('LanguageModule::edit');
    }

    public function edit(Language $language)
    {
        return view('LanguageModule::edit', ['language' => $language]);
    }

    public function store(Request $request)
    {
        $language = $this->save($request);
        if ($language) {
            $request->session()->flash('alert-success', 'Język został pomyślnie utworzony');
            return ['redirect' => route('LanguageModule::edit', ['language' => $language])];
        }

        $request->session()->flash('alert-error', 'Ooops. Try again.');
        return ['redirect' => route('LanguageModule::index')];
    }

    public function update(Request $request, Language $language)
    {
        if ($this->save($request, $language)) {
            $request->session()->flash('alert-success', 'Język został zaktualizowany');
        } else {
            $request->session()->flash('alert-error', 'Ooops. Try again.');
        }

        return ['redirect' => route('LanguageModule::edit', ['language' => $language])];
    }

    private function save(Request $request, Language $language = null) {
        if ($language === null) {
            return Language::query()->create($request->all());
        }
        if ($language->update($request->all())) {
            return $language;
        }
        return null;
    }
}

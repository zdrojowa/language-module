<?php

namespace Selene\Modules\LanguageModule\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Selene\LanguageModule\Http\Requests\LanguageStoreRequest;
use Selene\LanguageModule\Http\Requests\LanguageUpdateRequest;
use Selene\Modules\DashboardModule\ZdrojowaTable;
use Selene\Modules\LanguageModule\Models\Language;

/**
 * Class LanguageController
 * @package Selene\Modules\LanguageModule\Http\Controllers
 */
class LanguageController
{

    /**
     * @return Factory|View
     */
    public function index()
    {
        return view('LanguageModule::list');
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function ajax(Request $request)
    {
        return ZdrojowaTable::response(Language::query(), $request);
    }

    public function get(): JsonResponse
    {
        $languages = [];

        foreach (Language::all() as $language){
            $languages[] = ['key' => $language->short_name, 'name' => $language->name];
        }
        return response()->json($languages);
    }

    /**
     * @return Factory|View
     */
    public function create()
    {
        return view('LanguageModule::add');
    }

    /**
     * @param LanguageStoreRequest $request
     * @param Language $language
     *
     * @return RedirectResponse
     */
    public function store(LanguageStoreRequest $request, Language $language)
    {
        $language->create($request->all());
        $request->session()->flash('alert-success', 'Język został pomyślnie utworzony');

        return redirect()->route('LanguageModule::languages.create');
    }

    /**
     * @param Language $language
     *
     * @return Factory|View
     */
    public function edit(Language $language)
    {
        return view('LanguageModule::edit', ['language' => $language]);
    }

    /**
     * @param LanguageUpdateRequest $request
     * @param Language $language
     *
     * @return RedirectResponse
     */
    public function update(LanguageUpdateRequest $request, Language $language)
    {
        $language->update($request->all());
        $request->session()->flash('alert-success', 'Język został pomyślnie zaktualizowany');

        return redirect()->route('LanguageModule::languages.edit', ['language' => $language]);
    }

    /**
     * @param Language $language
     */
    public function destroy(Language $language)
    {
        $language->forceDelete();
    }
}

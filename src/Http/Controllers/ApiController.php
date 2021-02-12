<?php

namespace Selene\Modules\LanguageModule\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Selene\Modules\LanguageModule\Models\Language;

class ApiController
{
    public function get(): JsonResponse
    {
        return response()->json(Language::all());
    }

    public function checkKey(Request $request): JsonResponse
    {
        $key = $request->get('key');
        if (empty($key)) {
            return response()->json(['message' => 'Prefix is required'],JsonResponse::HTTP_BAD_REQUEST);
        }
        $exists = Language::query();
        if ($request->has('id')) {
            $exists->where('_id', '!=', $request->get('id'));
        }
        return response()->json(!$exists->where('short_name', '=', $key)->exists());
    }

    public function remove(Language $language)
    {
        try {
            $language->delete();
            return response()->json(['message' => 'Język został usunęty']);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()],JsonResponse::HTTP_BAD_REQUEST);
        }
    }
}

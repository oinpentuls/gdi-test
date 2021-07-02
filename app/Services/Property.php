<?php

namespace App\Services;

use App\Models\Property as ModelsProperty;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class Property
{
    public function index(Request $request): JsonResponse
    {
        $properties = ModelsProperty::with('images')->get();

        return response()->json([
            'message' => 'success',
            'data' => $properties
        ]);
    }

    public function show(string $slug): JsonResponse
    {
        $property = ModelsProperty::with('images')->whereSlug($slug)->firstOrFail();

        return response()->json([
            'message' => 'success',
            'data' => $property
        ]);
    }
}

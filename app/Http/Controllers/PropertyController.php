<?php

namespace App\Http\Controllers;

use App\Services\Property;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index(Request $request, Property $property): JsonResponse
    {
        return $property->index($request);
    }

    public function show(Request $request, string $slug, Property $property): JsonResponse
    {
        return $property->show($slug);
    }
}

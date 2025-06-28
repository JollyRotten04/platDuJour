<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Articles; // Assuming 'Recipes' is your Eloquent model for the recipes table

class ArticlesController extends Controller
{
    /**
     * Fetch recipes based on provided type and/or category.
     *
     * @param Request $request
     * @return JsonResponse
     */
     public function fetchArticles(): JsonResponse
    {
        $articles = Articles::all();

        return response()->json([
            'success' => true,
            'data' => $articles
        ]);
    }
}
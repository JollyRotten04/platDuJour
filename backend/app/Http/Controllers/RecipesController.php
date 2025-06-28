<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Recipes; // Assuming 'Recipes' is your Eloquent model for the recipes table

class RecipesController extends Controller
{
    /**
     * Fetch recipes based on provided type and/or category.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function fetchRecipes(Request $request): JsonResponse
    {
        $type = $request->input('type');
        $category = $request->input('category');
        $diet = $request->input('diet');

        $query = Recipes::query();

        // Case 1: Filter by type and category if both are present
        if ($type && $category) {
            $query->where('recipe_type', $type)
                ->where('recipe_category', $category);
        }
        // Case 2: Filter by diet only if type and category are not set
        elseif ($diet && !$type && !$category) {
            $query->where('recipe_diet_category', $diet);
        }

        $recipes = $query->get();

        return response()->json([
            'success' => true,
            'data' => $recipes
        ]);
    }
}
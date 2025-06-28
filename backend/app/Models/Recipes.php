<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recipes extends Model
{


    // Explicitly set the table name
    protected $table = 'recipes';

    protected $fillable = ['recipe_name', 'recipe_description', 'recipe_ingredients', 'recipe_ratings', 'recipe_cooktime', 'recipe_category', 'recipe_type']; // adjust as needed
}
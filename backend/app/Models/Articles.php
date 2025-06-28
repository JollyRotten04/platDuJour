<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{


    // Explicitly set the table name
    protected $table = 'articles';

    protected $fillable = ['article_title', 'article_content', 'article_author', 'article_ratings', 'article_category', 'image_path', 'published_at']; // adjust as needed
}
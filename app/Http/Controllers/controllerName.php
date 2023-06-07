<?php

namespace App\Http\Controllers;

use App\Models\Article;

class controllerName extends Controller
{
    function getHomeData()
    {
      //  $article = Article::getAll();

        return [
            "advertisements" => [],
            "products" => [],
        ];


    }
}

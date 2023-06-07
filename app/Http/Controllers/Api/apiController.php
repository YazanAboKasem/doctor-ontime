<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\Article;
use Illuminate\Http\Resources\Json\JsonResource;

class apiController extends Controller
{

    function getHomeData($lang)
    {

        if($lang == 'en')
        {
            $newColumnNames = [
                'id' => 'id',
                'title_en' => 'title',
                'description_en' => 'description',
                'image_path' => 'image_path',
                'created_at' => 'created_at'
            ];
            $query = Article::query();
            foreach ($newColumnNames as $oldColumnName => $newColumnName) {
                $query->selectRaw($oldColumnName.' AS '.$newColumnName);
            }
            $article = $query->get();
        }
        else if($lang == 'ar'){
            $newColumnNames = [
                'id' => 'id',
                'title_ar' => 'title',
                'description_ar' => 'description',
                'image_path' => 'image_path',
                'created_at' => 'created_at'
            ];
            $query = Article::query();
            foreach ($newColumnNames as $oldColumnName => $newColumnName) {
                $query->selectRaw($oldColumnName.' AS '.$newColumnName);
            }
            $article = $query->get();
        }

        return [
            "article" => $article
        ];


    }
    function v()
    {


        return [
            "advertisements" => [],
        ];


    }


}

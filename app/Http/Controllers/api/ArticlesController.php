<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Articles;
use DateTime;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    function getArticles(Request $request)
    {
        $articlesList = Articles::whereDate('release_date', '<=', new DateTime())->get();

        return response()->json(["articlesList" => $articlesList], 200);
    }

    function getArticle(Request $request)
    {
        $article = Articles::where('id', $request->id)
            ->whereDate('release_date', '<=', new DateTime())
            ->first();
        if (isset($article)) {
            return response()->json(["article" => $article], 200);
        }
        return response()->json(["message" => 'Ressource not found'], 404);
    }
}

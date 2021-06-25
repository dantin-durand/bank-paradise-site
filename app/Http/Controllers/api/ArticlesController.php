<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Articles;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    function getArticles(Request $request)
    {
        $articlesList = Articles::get()->latest(5);

        return response()->json(["articlesList" => $articlesList], 200);
    }
}

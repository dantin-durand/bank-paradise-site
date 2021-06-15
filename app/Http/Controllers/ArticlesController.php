<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Facade\FlareClient\View;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    function renderArticlesList(Request $request)
    {
        $articlesList = Articles::get();


        return view('pages.articles', ['articlesList' => $articlesList]);
    }

    function renderAdminArticlesList(Request $request)
    {
        $articlesList = Articles::get();

        if ($request->user()->is_admin) {
            return view('pages.dashboard.admin.articles', ['articlesList' => $articlesList]);
        } else {
            return redirect()->route('news');
        }
    }

    function addArticles(Request $request)
    {

        if ($request->user()->is_admin) {
            $request->validate([
                'title' => 'required',
                'banner' => 'required|image',
                'body' => 'required',
            ]);

            $result = $request->banner->storeOnCloudinary();

            Articles::create([
                'title' => $request->title,
                'banner' => $result->getSecurePath(),
                'body' => $request->body,
                'should_be_shown' => 1,
                'user_id' => $request->user()->id,
            ]);
            return redirect()->route('adminNewsList');
        }
    }

    function updateArticles(Request $request)
    {
        if ($request->user()->is_admin) {
            $articlesToUpdate = Articles::where('id', $request->articles->id)->update;


            $articlesToUpdate->update([
                'title' => $request->articles->title,
                'banner' => $request->articles->banner,
                'body' => $request->articles->body,
                'should_be_shown' => $request->articles->should_be_shown,
                'user_id' => $request->articles->user_id,
            ]);
        }
        return redirect()->route('/articles');
    }

    function deleteArticles(Request $request)
    {
        if ($request->user()->is_admin) {
            $articlesToDelete = Articles::where('id', $request->id)->delete();
            return redirect()->route('adminNewsList');
        } else {
            return redirect()->route('news');
        }
    }
}

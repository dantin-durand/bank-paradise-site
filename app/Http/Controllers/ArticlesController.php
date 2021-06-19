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

        $articlesList = Articles::where('should_be_shown', 1)->paginate(6);
        return view('pages.articles', ['articlesList' => $articlesList]);
    }

    function renderAdminArticlesList(Request $request)
    {

        if ($request->user()->is_admin) {
            $articlesList = Articles::paginate(6);
            return view('pages.dashboard.admin.articles', ['articlesList' => $articlesList]);
        } else {
            return redirect()->route('/login');
        }
    }

    function getLatestNews(Request $request)
    {
        $latestNews = Articles::take(5)->where('should_be_shown', 1)->orderBy('id', 'desc')->get();

        return view('pages.home', ['latestNews' => $latestNews]);
    }


    function renderSearchedArticleList(Request $request)
    {

        // Get the search value from the request
        $search = $request->input('search');

        // Search in the title and body columns from the posts table
        $articlesList = Articles::where('title', 'LIKE', "%{$search}%")
            ->orWhere('body', 'LIKE', "%{$search}%")
            ->paginate(6);

        // Return the search view with the resluts compacted
        return view('pages.articles', ['articlesList' => $articlesList]);
    }


    function renderArticleDetails(Request $request)
    {
        $articleDetails = Articles::firstWhere('id', $request->id);

        return view('pages.article', ['articleDetails' => $articleDetails]);
    }

    function renderCreateArticleForm(Request $request)
    {
        if ($request->user()->is_admin) {
            return view('pages.dashboard.admin.addnews');
        } else {
            return redirect()->route('login');
        }
    }

    function renderUpdateArticleForm(Request $request)
    {
        if ($request->user()->is_admin) {

            $article = Articles::firstWhere('id', $request->id);

            if (empty($article)) {
                return redirect()->route('admin.articles');
            }

            return view('pages.dashboard.admin.addnews', ['article' => $article]);
        } else {
            return redirect()->route('login');
        }
    }

    function addArticle(Request $request)
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
                'body' => $request->body,
                'banner' => $result->getSecurePath(),
                'banner_id' => $result->getPublicId(),
                'should_be_shown' => 1,
                'user_id' => $request->user()->id,
            ]);
            return redirect()->route('admin.articles');
        }
    }

    function updateArticles(Request $request)
    {
        if ($request->user()->is_admin) {
            $request->validate([
                'title' => 'required',
                'banner' => 'image',
                'body' => 'required',
            ]);

            $articlesToUpdate = Articles::firstWhere('id', $request->id);

            if (empty($request->banner)) {
                $banner = $articlesToUpdate->banner;
                $banner_id = $articlesToUpdate->banner_id;
            } else {
                $result = cloudinary()->destroy($articlesToUpdate->banner_id);
                $result = $request->banner->storeOnCloudinary();
                $banner = $result->getSecurePath();
                $banner_id = $result->getPublicId();
            }

            $articlesToUpdate->update([
                'title' => $request->title,
                'banner' => $banner,
                'banner_id' => $banner_id,
                'body' => $request->body,
            ]);
        }
        return redirect()->route('admin.articles');
    }

    function updateArticleVisibility(Request $request)
    {
        if ($request->user()->is_admin) {
            $articlesToShow = Articles::firstWhere('id', $request->id);

            $articlesToShow->update([
                'should_be_shown' => !$articlesToShow->should_be_shown
            ]);
        }
        return redirect()->route('admin.articles');
    }

    function deleteArticles(Request $request)
    {
        if ($request->user()->is_admin) {
            $articleDelete = Articles::FirstWhere('id', $request->id);
            cloudinary()->destroy($articleDelete->banner_id);
            $articleDelete->delete();
            return redirect()->route('admin.articles');
        } else {
            return redirect()->route('news');
        }
    }
}

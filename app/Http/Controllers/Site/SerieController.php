<?php

namespace App\Http\Controllers\Site;

use App\Blog\Post;
use App\Blog\PostHasFiles;
use App\Blog\PostHasTag;
use App\Blog\Serie;
use App\Blog\Tag;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use Validator;
use Carbon\Carbon;
//use Websanova\Larablog\Larablog;
use Illuminate\Http\Request;

/**
 * Class BlogController
 * @package App\Http\Controllers\Admin
 */
Class SerieController extends Controller
{

    /**
     * @param Request $request
     * @return string
     * @throws \Throwable
     */
    public function showSeriesPosts(Request $request, $serieName = null)
    {
        $filterByDaysAgoData = []; // getFilteringPeriodsInDays();

        $serie = Serie::getBySlug($serieName);
        $seriesPosts = isset($serie->posts) ? $serie->posts : null;
        $series = Serie::getAllOrderedByPosts();
        $popularPosts = Post::getPopularLimit();
        // TODO!!!!!!!
        $recentPosts = Post::getRecentLimit();
        $seriesPostsExcludes = $seriesPosts->keyBy('id')->keys()->toArray();
        $news = Post::getRecentLimit($seriesPostsExcludes, 3);

        $variables = [
            'filterByDaysAgoData' => $filterByDaysAgoData,
            'serie'               => $serie,
            'seriesPosts'         => $seriesPosts,
            'popularPosts'        => $popularPosts,
            'recentPosts'         => $recentPosts,
            'series'              => $series,
            'news'                => $news,
        ];

        return view('site.blog.serie.serie', $variables)->render();
    }

    // shows FIRST policy
    public function showAllSeries(Request $request, $serieName = null)
    {
        $filterByDaysAgoData = []; // getFilteringPeriodsInDays();

        $serie = Serie::getAllOrderedByPosts();
        $serie = $serie->first();
        $seriesPosts = isset($serie->posts) ? $serie->posts : null;
        $series = Serie::getAllOrderedByPosts();
        $popularPosts = Post::getPopularLimit();
        // TODO!!!!!!!
        $recentPosts = Post::getRecentLimit();

        $variables = [
            'filterByDaysAgoData' => $filterByDaysAgoData,
            'serie'               => $serie,
            'seriesPosts'         => $seriesPosts,
            'popularPosts'        => $popularPosts,
            'recentPosts'         => $recentPosts,
            'series'              => $series,
        ];

        return view('site.blog.serie.serie', $variables)->render();
    }

}
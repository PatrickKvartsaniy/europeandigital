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
Class TagController extends Controller
{

    /**
     * @param Request $request
     * @return string
     * @throws \Throwable
     */
    public function showTagsPosts(Request $request, $tagName = null)
    {
        $filterByDaysAgoData = []; // getFilteringPeriodsInDays();

        $tag = Tag::getBySlug($tagName);
        $tagPosts = $tag->posts;
        $series = Serie::getAllOrderedByPosts();
        $popularPosts = Post::getPopularLimit();
        // TODO!!!!!!!
        $recentPosts = Post::getRecentLimit();

        $variables = [
            'filterByDaysAgoData' => $filterByDaysAgoData,
            'tag'                 => $tag,
            'tagPosts'            => $tagPosts,
            'popularPosts'        => $popularPosts,
            'recentPosts'         => $recentPosts,
            'series'              => $series,
        ];

        return view('site.blog.tag.tag', $variables)->render();
    }

}
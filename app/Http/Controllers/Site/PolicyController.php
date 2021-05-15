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
Class PolicyController extends Controller
{

    /**
     * @param Request $request
     * @return string
     * @throws \Throwable
     */
    public function index(Request $request, $pageName = null)
    {
        $filterByDaysAgoData = []; // getFilteringPeriodsInDays();

        $policies = Serie::policies();

        $posts =

        $variables = [
            'filterByDaysAgoData' => $filterByDaysAgoData,
            'articles'            => $articles,
        ];

        switch ($pageName) {
            case 'about':
                return view('site.page.about', $variables)->render();
                break;
            case 'members':
                return view('site.page.members', $variables)->render();
                break;
            case 'policy':
                return view('site.page.policy', $variables)->render();
                break;


            default:
                abort(404);
        }

    }

}
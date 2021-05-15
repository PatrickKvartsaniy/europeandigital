<?php

namespace App\Http\Controllers\Admin;

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
Class DashboardController extends Controller
{

    /**
     * @param Request $request
     * @return string
     * @throws \Throwable
     */
    public function index(Request $request)
    {
        $filterByDaysAgoData = []; // getFilteringPeriodsInDays();

        $variables = [
            'filterByDaysAgoData' => $filterByDaysAgoData,
        ];

        return view('admin.dashboard.dashboard', $variables)->render();

    }

    public function filemanager(Request $request)
    {
        $filterByDaysAgoData = []; // getFilteringPeriodsInDays();

        $variables = [
            'filterByDaysAgoData' => $filterByDaysAgoData,
        ];

        return view('admin.dashboard.filemanager', $variables)->render();

    }

}
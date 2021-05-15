<?php

namespace App\Http\Controllers\Admin;

use App\Blog\Post;
use App\Blog\PostHasFiles;
use App\Blog\PostHasTag;
use App\Blog\Serie;
use App\Blog\Tag;
use App\Http\Controllers\Controller;
use App\Http\Models\NewsLettersSubscribe\NewsLettersSubscribe;
use App\User;
use Yajra\Datatables\Datatables;
use Validator;
use Carbon\Carbon;
//use Websanova\Larablog\Larablog;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

/**
 * Class BlogController
 * @package App\Http\Controllers\Admin
 */
Class SubscribersController extends Controller
{

    /**
     * @param Request $request
     * @return string
     * @throws \Throwable
     */
    public function index() // Request $request)
    {
        $variables = [

        ];

        return view('admin.subscribers.subscribers_list', $variables)->render();
    }

    /**
     * @param Request $request
     * @return mixed
     * @throws \Mcamara\LaravelLocalization\Facades\SupportedLocalesNotDefined
     * @throws \Mcamara\LaravelLocalization\Facades\UnsupportedLocaleException
     */
    public function getSubscribersTableData(Request $request)
    {

        $newsLettersSubscribe = NewsLettersSubscribe::all();

        $result = array();
        if (!empty($newsLettersSubscribe)) {
            foreach ($newsLettersSubscribe as $key => $value) {
                $tmp = [];

                $tmp['name'] = $value->name;
                $tmp['email'] = $value->email;
                $tmp['created_at'] = $value->created_at->format('Y-m-d H:i:s');

                $result[] = $tmp;
            }
        }

        $datatables = Datatables::of($result)->rawColumns([
            'name',
            'email',
            'created_at',
        ]);

        return $datatables->make(true);
    }

}
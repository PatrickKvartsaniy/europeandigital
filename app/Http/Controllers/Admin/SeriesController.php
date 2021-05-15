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
Class SeriesController extends Controller
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

        return view('admin.blog.category.categories_list', $variables)->render();

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function showSeriesView(Request $request)
    {

        $series = (new Serie())->getAll();

        $variables = [
            'series' => $series,
        ];

        $content = view('aiw_admin.blog.elements.series_show_modal', $variables)->render();
        $response = ['html' => $content, 'status' => 'ok'];

        return response()->json($response, 200);
    }

    /**
     * @param Request $request
     * @return string
     * @throws \Throwable
     */
    public function showEditView(Request $request, $id = null)
    {
        $filterByDaysAgoData = []; // getFilteringPeriodsInDays();

        //TODO: validate id
        $serie = null;
        if ($id) {
            $serie = (new Serie())->getById($id);

            if (!$serie) {
                if ($request->has('ajax_submit')) {
                    $response = ['message' => trans('crypto_art.category_not_found'), 'status' => 'error'];

                    return response()->json($response, 200, array('Access-Controll-Allow-Origin' => '*'));
                }

                return redirect()->back()->withError(trans('crypto_art.tag_not_found'));
            }
        }

        $variables = [
            'filterByDaysAgoData' => $filterByDaysAgoData,
            'serie'               => $serie,
        ];

        return view('admin.blog.category.categories_edit', $variables)->render();
    }

    /**
     * @param Request $request
     * @return mixed
     * @throws \Mcamara\LaravelLocalization\Facades\SupportedLocalesNotDefined
     * @throws \Mcamara\LaravelLocalization\Facades\UnsupportedLocaleException
     */
    public function getSeriesTableData(Request $request)
    {

        $series = (new Serie())->getAll();

        $result = array();
        if (!empty($series)) {
            foreach ($series as $key => $value) {
                $tmp = [];

                $tmp['id'] = $value->id;
                $tmp['name'] = $value->title;
                if (isset($value->main_img) && !empty($value->main_img)) {
                    $tmp['main_img'] = '<img width="80px" src="'.$value->main_img.'">';
                } else {
                    $tmp['main_img'] = '';
                }
                $tmp['articles_count'] = $value->posts_count;
                $tmp['slug'] = $value->slug;
                $tmp['description'] = $value->description;
                $tmp['show_in_main_menu'] = $value->show_in_main_menu ? 'YES' : 'NO';

                $tmp['created_at'] = '<span>'.Carbon::parse($value['created_at'])->format('d/m/Y').'</span>'.'<span class="block"> '.Carbon::parse($value['created_at'])->format('H:s').'</span>';

                $tmp['action'] =
                    '<div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 btn-iconic">
                            <a href="'.urlloc('/admin/blog/series/edit/id/'.$value->id).'">
                                <button type="button" class="btn btn-info btn-icon bottom15 right15">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </button>
                            </a>
                            <div class="dropdown " style="float: left;">
                                <button id="changeInput_control_label-2" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false" type="button"
                                        class="removeLabel td_admin_change red btn btn-orange btn-icon ">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                </button>
                                <ul class="dropdown-menu UL-removeLabel" aria-labelledby="changeInput_control_label-2" style="padding: 10px;">
                                    <li>
                                        <p class="grid">
                                            <i class="fa fa-warning" aria-hidden="true"></i>
                                            <span>Вы действительно хотите удалить категорию?</span>
                                        </p>
                                        <p class="grey">Это действие не обратимо</p>
                                        <div class="row">
                                            <div class="row col-md-12 col-md-12 col-sm-12 col-xs-12 btn-colors">
                                                <button type="button"  class="cancel btn btn-default">ОТМЕНИТЬ</button>
                                                <button type="button" style="float: left;" data-serie-id="'.$value->id.'" onclick="delete_series(this);" class="delete btn btn-danger">УДАЛИТЬ</button>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        </div>';

                $result[] = $tmp;
            }
        }

        $datatables = Datatables::of($result)->rawColumns(['main_img', 'created_at', 'action', 'published_at']);

        return $datatables->make(true);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addSerie(Request $request)
    {
        $name = $request->input('title');

        if (!$name) {
            if ($request->has('ajax_submit')) {
                $response = ['message' => trans('crypto_art.name_is_required'), 'status' => 'error'];

                return response()->json($response, 200, array('Access-Controll-Allow-Origin' => '*'));
            }

            return redirect()->back()->withError(trans('crypto_art.name_is_required'));
        }

        $serie = new Serie();
        $serie->title = $name;
        $serie->type = '';
        if ($request->input('slug')) {
            $serie->slug = $request->input('slug') ? $request->input('slug') : '';
        }
        $serie->main_img = $request->main_img;
        $serie->show_in_main_menu = $request->input('show_in_main_menu') ? $request->input('show_in_main_menu') : false;
        $result = $serie->save();

        if ($result) {
            if ($request->has('ajax_submit')) {
                $response = [
                    'message' => trans('messages.category').' '.trans('messages.added'),
                    'status'  => 'success',
                ];

                return response()->json($response, 200, array('Access-Controll-Allow-Origin' => '*'));
            }

            return redirect()->back()->withSuccess(trans('messages.category').' '.trans('messages.added'));
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function editSerie(Request $request)
    {
        $id = $request->input('id');

        $serie = (new Serie())->getById($id);

        if (!$serie) {
            if ($request->has('ajax_submit')) {
                $response = ['message' => trans('crypto_art.category_not_found'), 'status' => 'error'];

                return response()->json($response, 200, array('Access-Controll-Allow-Origin' => '*'));
            }

            return redirect()->back()->withError(trans('crypto_art.category_not_found'));
        }
        $title = $request->input('title');
        $slug = $request->input('slug');
        $requestData = $request->all();

        $validation = \Validator::make((array)$requestData, [
            'title' => 'required|string',
            'slug'  => 'sometimes|string',
            'id'    => 'required|numeric',
        ]);

        if ($validation->fails()) {
            if ($request->has('ajax_submit')) {
                $response = ['message' => $validation->messages()->first(), 'status' => 'error'];

                return response()->json($response, 200, array('Access-Controll-Allow-Origin' => '*'));
            }

            return redirect()->back()->withInput()->withErrors($validation->messages());
        }

        $serie->title = $title;
        if ($request->main_img) {
            $serie->main_img = $request->main_img;
        }
        $serie->description = $request->description ? $request->description : '';
        $serie->show_in_main_menu = $request->input('show_in_main_menu') ? true : false;
        $serie->slug = str_slug($slug);
        $result = $serie->update();

        if ($result) {
            if ($request->has('ajax_submit')) {
                $response = [
                    'message' => trans('messages.category').' '.trans('messages.updated'),
                    'status'  => 'success',
                ];

                return response()->json($response, 200, array('Access-Controll-Allow-Origin' => '*'));
            }

            return redirect()->back()->withSuccess(trans('messages.category').' '.trans('messages.updated'));
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function saveSerie(Request $request)
    {
        $title = $request->input('title');
        $serie = new Serie();
        $requestData = $request->all();

        $validation = \Validator::make((array)$requestData, [
            'title' => 'required|string|unique:'.$serie->getTable(),
            'slug'  => 'sometimes|string|nullable|unique:'.$serie->getTable(),
        ]);
        if ($validation->fails()) {
            if ($request->has('ajax_submit')) {
                $response = ['message' => $validation->messages()->first(), 'status' => 'error'];

                return response()->json($response, 200, array('Access-Controll-Allow-Origin' => '*'));
            }

            return redirect()->back()->withInput()->withErrors($validation->messages());
        }

        if ($request->input('title')) {
            $serie->title = $title;
        }

        $serie->description = $request->description ? $request->description : '';
        $serie->type = '';
        $serie->show_in_main_menu = $request->input('show_in_main_menu') ? true : false;
        if ($request->input('slug')) {
            $serie->slug = str_slug($request->input('slug'));
        }
        if ($request->main_img) {
            $serie->main_img = $request->main_img;
        }
        $result = $serie->save();
        try {
            $result = $serie->save();
        } catch (\Exception $exception) {
            if ($request->has('ajax_submit')) {
                $response = ['message' => $exception->getMessage(), 'status' => 'error'];

                return response()->json($response, 200, array('Access-Controll-Allow-Origin' => '*'));
            }

            return redirect()->back()->withInput()->withError($exception->getMessage());
        }

        if ($result) {
            if ($request->has('ajax_submit')) {
                $response = [
                    'message' => trans('messages.category').' '.trans('messages.added'),
                    'status'  => 'success',
                ];

                return response()->json($response, 200, array('Access-Controll-Allow-Origin' => '*'));
            }

            return redirect()->back()->withSuccess(trans('messages.category').' '.trans('messages.saved'));
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function deleteSerie(Request $request)
    {
        $id = $request->input('id');

        $serie = (new Serie())->getById($id);

        if (!$serie) {
            if ($request->has('ajax_submit')) {
                $response = ['message' => trans('crypto_art.serie_not_found'), 'status' => 'error'];

                return response()->json($response, 200, array('Access-Controll-Allow-Origin' => '*'));
            }

            return redirect()->back()->withError(trans('crypto_art.serie_not_found'));
        }

        $result = $serie->delete();

        if ($result) {
            if ($request->has('ajax_submit')) {
                $response = ['message' => trans('messages.serie').' '.trans('messages.deleted'), 'status' => 'success'];

                return response()->json($response, 200, array('Access-Controll-Allow-Origin' => '*'));
            }

            return redirect()->back()->withSuccess(trans('messages.serie').' '.trans('messages.deleted'));
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function getSerieSelectorView(Request $request)
    {

        $id = $request->input('post_id');

        $post = (new Post())->getById($id);

        $series = (new Serie())->getAll();

        $variables = [
            'series' => $series,
            'post'   => $post,
        ];

        $content = view('aiw_admin.blog.elements.series_select_widget', $variables)->render();
        $response = ['html' => $content, 'status' => 'ok'];

        return response()->json($response, 200);
    }

}
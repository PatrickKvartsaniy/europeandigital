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
Class TagController extends Controller
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

        return view('admin.blog.tag.tags_list', $variables)->render();
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
        $tag = null;
        if ($id) {
            $tag = (new Tag())->getById($id);

            if (!$tag) {
                if ($request->has('ajax_submit')) {
                    $response = ['message' => trans('crypto_art.tag_not_found'), 'status' => 'error'];

                    return response()->json($response, 200, array('Access-Controll-Allow-Origin' => '*'));
                }

                return redirect()->back()->withError(trans('crypto_art.tag_not_found'));
            }
        }

        $variables = [
            'filterByDaysAgoData' => $filterByDaysAgoData,
            'tag'                 => $tag,
        ];

        return view('admin.blog.tag.tags_edit', $variables)->render();
    }

    /**
     * @param Request $request
     * @return mixed
     * @throws \Mcamara\LaravelLocalization\Facades\SupportedLocalesNotDefined
     * @throws \Mcamara\LaravelLocalization\Facades\UnsupportedLocaleException
     */
    public function getTagsTableData(Request $request)
    {

        $tags = Tag::getAll();

        $result = array();
        if (!empty($tags)) {
            foreach ($tags as $key => $value) {
                $tmp = [];

                $tmp['id'] = $value->id;
                $tmp['name'] = $value->name;
                $tmp['articles_count'] = $value->posts_count;
                $tmp['slug'] = $value->slug;
                $tmp['description'] = '';

                $tmp['created_at'] = '<span>'.Carbon::parse($value['created_at'])->format('d/m/Y').'</span>'.'<span class="block"> '.Carbon::parse($value['created_at'])->format('H:s').'</span>';

                $tmp['action'] =
                    '<div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 btn-iconic">
                            <a href="'.urlloc('/admin/blog/tag/edit/id/'.$value->id).'">
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
                                            <span>Вы действительно хотите удалить тег?</span>
                                        </p>
                                        <p class="grey">Это действие не обратимо</p>
                                        <div class="row">
                                            <div class="row col-md-12 col-md-12 col-sm-12 col-xs-12 btn-colors">
                                                <button type="button"  class="cancel btn btn-default">ОТМЕНИТЬ</button>
                                                <button type="button" style="float: left;" data-tag-id="'.$value->id.'" onclick="delete_tag(this);" class="delete btn btn-danger">УДАЛИТЬ</button>
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

        $datatables = Datatables::of($result)->rawColumns(['created_at', 'action', 'published_at']);

        return $datatables->make(true);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function showTagsView(Request $request)
    {

        $tags = (new Tag())->getAll();

        $variables = [
            'tags' => $tags,
        ];

        $content = view('aiw_admin.blog.elements.tags_show_modal', $variables)->render();
        $response = ['html' => $content, 'status' => 'ok'];

        return response()->json($response, 200);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function editTag(Request $request)
    {
        $id = $request->input('id');

        $tag = (new Tag())->getById($id);

        if (!$tag) {
            if ($request->has('ajax_submit')) {
                $response = ['message' => trans('crypto_art.tag_not_found'), 'status' => 'error'];

                return response()->json($response, 200, array('Access-Controll-Allow-Origin' => '*'));
            }

            return redirect()->back()->withError(trans('crypto_art.tag_not_found'));
        }
        $name = $request->input('name');
        $slug = $request->input('slug');
        $requestData = $request->all();

        $validation = \Validator::make((array)$requestData, [
            'name' => 'required|string',
            'slug' => 'sometimes|string',
            'id'   => 'required|numeric',
        ]);

        if ($validation->fails()) {
            if ($request->has('ajax_submit')) {
                $response = ['message' => $validation->messages()->first(), 'status' => 'error'];

                return response()->json($response, 200, array('Access-Controll-Allow-Origin' => '*'));
            }

            return redirect()->back()->withInput()->withErrors($validation->messages());
        }

        $tag->name = $name;
        $tag->slug = str_slug($slug);
        $result = $tag->update();

        if ($result) {
            if ($request->has('ajax_submit')) {
                $response = ['message' => trans('messages.tag').' '.trans('messages.updated'), 'status' => 'success'];

                return response()->json($response, 200, array('Access-Controll-Allow-Origin' => '*'));
            }

            return redirect()->back()->withSuccess(trans('messages.tag').' '.trans('messages.updated'));
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addTag(Request $request)
    {
        $name = $request->input('name');

        $tag = new Tag();
        $requestData = $request->all();

        $validation = \Validator::make((array)$requestData, [
            'name' => 'required|string|unique:'.$tag->getTable(),
            'slug' => 'sometimes|string|nullable|unique:'.$tag->getTable(),
        ]);
        if ($validation->fails()) {
            if ($request->has('ajax_submit')) {
                $response = ['message' => $validation->messages()->first(), 'status' => 'error'];

                return response()->json($response, 200, array('Access-Controll-Allow-Origin' => '*'));
            }

            return redirect()->back()->withInput()->withErrors($validation->messages());
        }

        $tag->name = $name;
        if ($request->input('slug')) {
            $tag->slug = str_slug($request->input('slug'));
        }
        $result = $tag->save();

        if ($result) {
            if ($request->has('ajax_submit')) {
                $response = ['message' => trans('messages.tag').' '.trans('messages.added'), 'status' => 'success'];

                return response()->json($response, 200, array('Access-Controll-Allow-Origin' => '*'));
            }

            return redirect()->back()->withSuccess(trans('messages.tag').' '.trans('messages.added'));
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function saveTag(Request $request)
    {
        $name = $request->input('name');
        $tag = new Tag();
        $requestData = $request->all();

        $validation = \Validator::make((array)$requestData, [
            'name' => 'required|string|unique:'.$tag->getTable(),
            'slug' => 'sometimes|string|nullable|unique:'.$tag->getTable(),
        ]);
        if ($validation->fails()) {
            if ($request->has('ajax_submit')) {
                $response = ['message' => $validation->messages()->first(), 'status' => 'error'];

                return response()->json($response, 200, array('Access-Controll-Allow-Origin' => '*'));
            }

            return redirect()->back()->withInput()->withErrors($validation->messages());
        }


        $tag->name = $name;
        if ($request->input('slug')) {
            $tag->slug = str_slug($request->input('slug'));
        }
        try {
            $result = $tag->save();
        } catch (\Exception $exception) {
            if ($request->has('ajax_submit')) {
                $response = ['message' => $exception->getMessage(), 'status' => 'error'];

                return response()->json($response, 200, array('Access-Controll-Allow-Origin' => '*'));
            }

            return redirect()->back()->withInput()->withError($exception->getMessage());
        }

        if ($result) {
            if ($request->has('ajax_submit')) {
                $response = ['message' => trans('messages.tag').' '.trans('messages.added'), 'status' => 'success'];

                return response()->json($response, 200, array('Access-Controll-Allow-Origin' => '*'));
            }

            return redirect()->back()->withSuccess(trans('messages.tag').' '.trans('messages.saved'));
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function deleteTag(Request $request)
    {
        $id = $request->input('id');

        $tag = (new Tag())->getById($id);

        if (!$tag) {
            if ($request->has('ajax_submit')) {
                $response = ['message' => trans('crypto_art.tag_not_found'), 'status' => 'error'];

                return response()->json($response, 200, array('Access-Controll-Allow-Origin' => '*'));
            }

            return redirect()->back()->withError(trans('crypto_art.tag_not_found'));
        }

        $tag->posts()->detach();
        $result = $tag->delete();

        if ($result) {
            if ($request->has('ajax_submit')) {
                $response = ['message' => trans('messages.tag').' '.trans('messages.deleted'), 'status' => 'success'];

                return response()->json($response, 200, array('Access-Controll-Allow-Origin' => '*'));
            }

            return redirect()->back()->withSuccess(trans('messages.tag').' '.trans('messages.deleted'));
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deletePostHasTag(Request $request)
    {
        $postId = $request->input('postid');
        $tagId = $request->input('tagid');

        $post = (new Post())->getById($postId);

        if (!$post) {
            if ($request->has('ajax_submit')) {
                $response = ['message' => trans('crypto_art.post_has_tag_not_found'), 'status' => 'error'];

                return response()->json($response, 200, array('Access-Controll-Allow-Origin' => '*'));
            }

            return redirect()->back()->withError(trans('crypto_art.post_has_tag_not_found'));
        }

        $result = $post->tags()->detach($tagId);

        if ($result) {
            if ($request->has('ajax_submit')) {
                $response = [
                    'message' => trans('messages.post_has_tag').' '.trans('messages.deleted'),
                    'status'  => 'success',
                ];

                return response()->json($response, 200, array('Access-Controll-Allow-Origin' => '*'));
            }

            return redirect()->back()->withSuccess(trans('messages.post_has_tag').' '.trans('messages.deleted'));
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function getTagSelectorView(Request $request)
    {

        $tags = (new Tag())->getAll();

        $variables = [
            'tags' => $tags,
        ];

        $content = view('aiw_admin.blog.elements.tags_select_widget', $variables)->render();
        $response = ['html' => $content, 'status' => 'ok'];

        return response()->json($response, 200);
    }

}
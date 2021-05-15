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
Class BlogController extends Controller
{

    /**
     * @param Request $request
     * @return string
     * @throws \Throwable
     */
    public function index(Request $request)
    {
        $filterByDaysAgoData = []; // getFilteringPeriodsInDays();

        $emailPolicyId = 11;
        $emails = Post::getPostsForEmailsLimit($emailPolicyId);

        $emailsExcludes = $emails->keyBy('id')->keys()->toArray();
        $articles = Post::getPostsForHomeLimit($emailsExcludes, 3);

        $idList = $articles->keyBy('id')->keys()->toArray();
        $excludes = array_merge($emailsExcludes, $idList);
        $policies = Post::getPostsForPoliciesLimit($excludes);

        $variables = [
            'filterByDaysAgoData' => $filterByDaysAgoData,
            'articles'            => $articles,
            'policies'            => $policies,
            'emails'              => $emails,
        ];

        return view('site.home', $variables)->render();
    }

    /**
     * @param Request $request
     * @return string
     * @throws \Throwable
     */
    public function news(Request $request)
    {
        $filterByDaysAgoData = []; // getFilteringPeriodsInDays();

        $articles = Post::posts();
        $pageTitle = 'News';

        $variables = [
            'filterByDaysAgoData' => $filterByDaysAgoData,
            'articles'            => $articles,
            'pageTitle'           => $pageTitle,
        ];

        return view('site.blog.blog', $variables)->render();
    }

    /**
     * @param Request $request
     * @return mixed
     * @throws \Mcamara\LaravelLocalization\Facades\SupportedLocalesNotDefined
     * @throws \Mcamara\LaravelLocalization\Facades\UnsupportedLocaleException
     */
    public function getArticlesTableData(Request $request)
    {

        $posts = Post::postsAdmin();

        $result = array();
        if (!empty($posts)) {
            foreach ($posts as $key => $value) {
                $tmp = [];

                if (isset($value->files->where('is_main', '=', true)->first()->full_path)) {
                    $tmp['image'] = '<img width="80px" src="/files'.$value->files->where('is_main', '=', true)->first()->full_path.'">
                                    <span>Представляем новый способ, чтобы построить свой интернет магазин</span>';
                } else {
                    $tmp['image'] = '';
                }
                $tmp['title'] = $value->title;
                $tmp['serie_id'] = isset($value->serie->title) ? $value->serie->title : '';
                $tmp['created_at'] = '<span>'.Carbon::parse($value['created_at'])->format('d/m/Y').'</span>'.'<span class="block"> '.Carbon::parse($value['created_at'])->format('H:s').'</span>';
                $tmp['tags'] = '';
                if (isset($value->tags) & !empty($value->tags)) {
                    foreach ($value->tags as $tag) {
                        $tmp['tags'] .= '<span class="blue">'.$tag->name.';</span>';
                    }
                }
                $tmp['action'] =
                    '<a href="'.urlloc('/admin/blog/article/edit?id='.$value->id).'"><button type="button" class="inline_block td_admin_change open_right_menu">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </button></a>
                        <div class="dropdown inline_block">
                            <button id="changeInput_control_label-2" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false" type="button"
                                    class="removeLabel td_admin_change red"><i class="fa fa-times" aria-hidden="true"></i>
                            </button>
                            <ul class="dropdown-menu UL-removeLabel"
                                aria-labelledby="changeInput_control_label-2">
                                <li>
                                    <p class="grid">
                                        <img src="'.url(config('constant.upload_path_custom.logo').config('constant.custom_images.AlertAdmin')).'">
                                        <span>Вы действительно хотите удалить запись блога ?</span>
                                    </p>
                                    <p class="grey">Это действие не обратимо</p>
                                    <div>
                                        <button type="button" class="cancel">ОТМЕНИТЬ</button>
                                        <button type="button" data-post-id="'.$value->id.'" onclick="delete_post(this);" class="delete">УДАЛИТЬ</button>
                                    </div>
                                </li>
                            </ul>
                        </div>';

                $result[] = $tmp;
            }
        }

        $datatables = Datatables::of($result)->rawColumns(['tags', 'image', 'created_at', 'published_at', 'action']);

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

        $tag->name = $request->input('name');
        $result = $tag->save();

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

        if (!$name) {
            if ($request->has('ajax_submit')) {
                $response = ['message' => trans('crypto_art.name_is_required'), 'status' => 'error'];

                return response()->json($response, 200, array('Access-Controll-Allow-Origin' => '*'));
            }

            return redirect()->back()->withError(trans('crypto_art.name_is_required'));
        }

        $tag = new Tag();
        $tag->name = $name;
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
    public function editSerie(Request $request)
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

        $serie->title = $request->input('name');
        $result = $serie->save();

        if ($result) {
            if ($request->has('ajax_submit')) {
                $response = ['message' => trans('messages.serie').' '.trans('messages.updated'), 'status' => 'success'];

                return response()->json($response, 200, array('Access-Controll-Allow-Origin' => '*'));
            }

            return redirect()->back()->withSuccess(trans('messages.serie').' '.trans('messages.updated'));
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addSerie(Request $request)
    {
        $name = $request->input('name');

        if (!$name) {
            if ($request->has('ajax_submit')) {
                $response = ['message' => trans('crypto_art.name_is_required'), 'status' => 'error'];

                return response()->json($response, 200, array('Access-Controll-Allow-Origin' => '*'));
            }

            return redirect()->back()->withError(trans('crypto_art.name_is_required'));
        }

        $serie = new Serie();
        $serie->title = $name;
        $result = $serie->save();

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
     * @throws \Exception
     */
    public function deletePost(Request $request)
    {
        $id = $request->input('id');

        $post = (new Post())->getById($id);

        if (!$post) {
            if ($request->has('ajax_submit')) {
                $response = ['message' => trans('crypto_art.post_not_found'), 'status' => 'error'];

                return response()->json($response, 200, array('Access-Controll-Allow-Origin' => '*'));
            }

            return redirect()->back()->withError(trans('crypto_art.post_not_found'));
        }

        $post->tags()->detach();
        $result = $post->delete();

        if ($result) {
            if ($request->has('ajax_submit')) {
                $response = ['message' => trans('messages.post').' '.trans('messages.deleted'), 'status' => 'success'];

                return response()->json($response, 200, array('Access-Controll-Allow-Origin' => '*'));
            }

            return redirect()->back()->withSuccess(trans('messages.post').' '.trans('messages.deleted'));
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
     * @return string
     * @throws \Throwable
     */
    public function addPostView(Request $request)
    {

        $tags = (new Tag())->getAll();
        $series = (new Serie())->getAll();

        $variables = [
            'tags'   => $tags,
            'series' => $series,
        ];

        return view('aiw_admin.blog.elements.new_post', $variables)->render();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|string
     * @throws \Throwable
     */
    public function editPostView(Request $request)
    {

        $id = $request->input('id');

        $post = (new Post())->getById($id);

        if (!$post) {
            if ($request->has('ajax_submit')) {
                $response = ['message' => trans('crypto_art.user_not_found'), 'status' => 'error'];

                return response()->json($response, 200, array('Access-Controll-Allow-Origin' => '*'));
            }

            return redirect()->back()->withError(trans('crypto_art.user_not_found'));
        }

        $tags = (new Tag())->getAll();
        $series = (new Serie())->getAll();

        $variables = [
            'tags'   => $tags,
            'post'   => $post,
            'series' => $series,
        ];

        return view('aiw_admin.blog.elements.edit_post', $variables)->render();
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\JsonResponse
     * @throws \Exception
     * @throws \Mcamara\LaravelLocalization\Facades\SupportedLocalesNotDefined
     * @throws \Mcamara\LaravelLocalization\Facades\UnsupportedLocaleException
     */
    public function editPost(Request $request)
    {
        $id = $request->input('serie_id');

        $post = (new Post())->getById($id);

        if (!$post) {
            if ($request->has('ajax_submit')) {
                $response = ['message' => trans('crypto_art.serie_not_found'), 'status' => 'error'];

                return response()->json($response, 200, array('Access-Controll-Allow-Origin' => '*'));
            }

            return redirect()->back()->withError(trans('crypto_art.serie_not_found'));
        }

        $attributes = $request->all();

        $validator = Validator::make($attributes, [
            'serie_id'          => 'required|numeric',
            'serie_id_post'     => 'numeric',
            'title'             => 'required|string',
            'body'              => 'required|string',
            'type'              => 'string',
            'status'            => 'string',
            'meta_title'        => 'string',
            'meta_description'  => 'string',
            'meta_keywords'     => 'string',
            'short_description' => 'string',
            'published_at'      => 'string',
        ]);

        if ($validator->fails()) {
            if ($request->has('ajax_submit')) {
                $response = ['message' => $validator->messages()->first(), 'status' => 'error'];

                return response()->json($response, 200, array('Access-Controll-Allow-Origin' => '*'));
            }

            return redirect()->back()->withInput()->withErrors($validator->messages()->first());
        }

        $post->serie_id = $request->input('serie_id_post');
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        // $post->type = $request->input('type');
        // $post->status = $request->input('status');
        $post->published_at = Carbon::parse($request->input('published_at'))->format('Y-m-d H:i:s');
        $post->meta_title = $request->input('meta_title');
        $post->meta_description = $request->input('meta_description');
        $post->meta_keywords = $request->input('meta_keywords');
        $post->short_description = $request->input('short_description');
        $result = $post->save();

        $post->tags()->attach($request->input('tags-widget'));
        $uploadedFile = $request->file('main_img');
        if ($uploadedFile) {
            //delete first main img and replace it by uploaded
            $file = (new PostHasFiles())->getByPostId($id);
            if ($file) {
                $file->delete();
            }
            (new PostHasFiles())->saveImage($uploadedFile, $post->id, true);
        }

        if ($result) {
            if ($request->has('ajax_submit')) {
                $response = [
                    'message' => trans('messages.post').' '.trans('messages.updated'),
                    'url'     => urlloc('/admin/blog'),
                    'status'  => 'success',
                ];

                return response()->json($response, 200, array('Access-Controll-Allow-Origin' => '*'));
            }

            return redirect()->back()->withSuccess(trans('messages.post').' '.trans('messages.updated'));
        }
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\JsonResponse
     * @throws \Mcamara\LaravelLocalization\Facades\SupportedLocalesNotDefined
     * @throws \Mcamara\LaravelLocalization\Facades\UnsupportedLocaleException
     */
    public function addPost(Request $request)
    {
        $attributes = $request->all();

        $validator = Validator::make($attributes, [
            'title'             => 'required|string',
            'body'              => 'required|string',
            'type'              => 'string',
            'status'            => 'string',
            'meta_title'        => 'string',
            'meta_description'  => 'string',
            'meta_keywords'     => 'string',
            'short_description' => 'string',
            'published_at'      => 'string',
        ]);

        if ($validator->fails()) {
            if ($request->has('ajax_submit')) {
                $response = ['message' => $validator->messages()->first(), 'status' => 'error'];

                return response()->json($response, 200, array('Access-Controll-Allow-Origin' => '*'));
            }

            return redirect()->back()->withInput()->withErrors($validator->messages()->first());
        }

        $post = new Post();
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->identifier = $post->getMaxIdentifier();
        $post->language = 'ru';
//        $post->type = $request->input('type');
//        $post->status = $request->input('status');
        $post->published_at = Carbon::parse($request->input('published_at'))->format('Y-m-d H:i:s');
        $post->meta_title = $request->input('meta_title');
        $post->meta_description = $request->input('meta_description');
        $post->meta_keywords = $request->input('meta_keywords');
        $post->short_description = $request->input('short_description');
        $result = $post->save();

        $uploadedFile = $request->file('main_img');
        if ($uploadedFile) {
            (new PostHasFiles())->saveImage($uploadedFile, $post->id, true);
        }

        if ($result) {
            if ($request->has('ajax_submit')) {
                $response = [
                    'message' => trans('messages.post').' '.trans('messages.created'),
                    'url'     => urlloc('/admin/blog'),
                    'status'  => 'success',
                ];


                return response()->json($response, 200, array('Access-Controll-Allow-Origin' => '*'));
            }

            return redirect()->back()->withSuccess(trans('messages.post').' '.trans('messages.created'));
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
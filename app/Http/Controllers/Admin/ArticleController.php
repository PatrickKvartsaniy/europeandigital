<?php

namespace App\Http\Controllers\Admin;

use App\Blog\Post;
use App\Blog\PostHasFiles;
use App\Blog\PostHasTag;
use App\Blog\Serie;
use App\Blog\Tag;
use App\Http\Controllers\Controller;
use App\User;
use Yajra\Datatables\Datatables;
use Validator;
use Carbon\Carbon;
//use Websanova\Larablog\Larablog;
use Illuminate\Http\Request;

/**
 * Class BlogController
 * @package App\Http\Controllers\Admin
 */
Class ArticleController extends Controller
{

    /**
     * @param Request $request
     * @return string
     * @throws \Throwable
     */
    public function index(Request $request)
    {


        $variables = [
        ];

        return view('admin.blog.article.articles_list', $variables)->render();
    }

    /**
     * @param Request $request
     * @return string
     * @throws \Throwable
     */
    public function addArticleView(Request $request)
    {

        $tags = (new Tag())->getAll();
        $series = (new Serie())->getAll();
        $authors = User::getAllAuthors();

        $variables = [
            'tags'    => $tags,
            'series'  => $series,
            'authors' => $authors,
        ];

        return view('admin.blog.article.articles_add', $variables)->render();
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

                if (isset($value->main_img) && !empty($value->main_img)) {
                    $tmp['image'] = '<img width="80px" src="'.$value->main_img.'">';
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
        $authors = User::getAllAuthors();

        $variables = [
            'tags'    => $tags,
            'post'    => $post,
            'series'  => $series,
            'authors' => $authors,
        ];

        return view('admin.blog.article.edit_article', $variables)->render();
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
            //    'user_id'           => 'required|numeric',
            'serie_id_post'     => 'numeric',
            'title'             => 'required|string',
            'body'              => 'required|string',
            'slug'              => 'string',
            'meta_title'        => 'string|nullable',
            'meta_description'  => 'string|nullable',
            'meta_keywords'     => 'string|nullable',
            'short_description' => 'string|nullable',
            'published_at'      => 'string|nullable',
        ]);

        if ($validator->fails()) {
            if ($request->has('ajax_submit')) {
                $response = ['message' => $validator->messages()->first(), 'status' => 'error'];

                return response()->json($response, 200, array('Access-Controll-Allow-Origin' => '*'));
            }

            return redirect()->back()->withInput()->withErrors($validator->messages()->first());
        }

        if ($request->has('serie_id_post') && $request->input('serie_id_post')) {
            $post->serie_id = $request->input('serie_id_post');
        }
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->main_img = $request->main_img;
        // $post->type = $request->input('type');
        // $post->status = $request->input('status');
        $post->slug = str_slug($request->input('slug'));
        $post->external_slug = $request->input('external_slug');
        $post->published_at = Carbon::parse($request->input('published_at'))->format('Y-m-d H:i:s');
        $post->meta_title = $request->input('meta_title');
        $post->meta_description = $request->input('meta_description');
        $post->meta_keywords = $request->input('meta_keywords');
        $post->short_description = $request->input('short_description');
        if ($request->input('user_id')) {
            $post->user_id = $request->input('user_id');
        } else {
            $post->user_id = \Auth::user()->id;
        }
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
            'serie_id_post'     => 'required|numeric',
            //'user_id'           => 'required|numeric',
            'meta_title'        => 'string|nullable',
            'meta_description'  => 'string|nullable',
            'meta_keywords'     => 'string|nullable',
            'short_description' => 'string',
            'published_at'      => 'string|nullable',
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
        $post->main_img = $request->main_img;
        $post->serie_id = $request->input('serie_id_post') ? $request->input('serie_id_post') : 0;
        $post->external_slug = $request->input('external_slug');
//        $post->type = $request->input('type');
//        $post->status = $request->input('status');
        $post->published_at = Carbon::parse($request->input('published_at'))->format('Y-m-d H:i:s');
        $post->meta_title = $request->input('meta_title');
        $post->meta_description = $request->input('meta_description');
        $post->meta_keywords = $request->input('meta_keywords');
        $post->short_description = $request->input('short_description');
        if ($request->input('user_id')) {
            $post->user_id = $request->input('user_id');
        } else {
            $post->user_id = \Auth::user()->id;
        }

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

}
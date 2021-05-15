<?php

namespace App\Http\Controllers\Admin;

use App\Blog\Post;
use App\Blog\PostHasFiles;
use App\Blog\PostHasTag;
use App\Blog\Serie;
use App\Blog\Tag;
use App\Http\Controllers\Controller;
use App\Http\Models\Members\IndividualMembers;
use App\Http\Models\PagesContent\PagesContent;
use App\Http\Models\Settings\Settings;
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
class PagesContentController extends Controller
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

        return view('admin.pages_content.pages_content_edit', $variables)->render();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|string
     * @throws \Throwable
     */
    public function editSettingsView(Request $request)
    {

        $settingsRecord = PagesContent::getFirstById($request->id);

        if (!$settingsRecord) {
//            $settingsRecord = new Settings();
//            $settingsRecord->save();
        }

        $variables = [
            'contentRecord' => $settingsRecord,
        ];

        return view('admin.pages_content.pages_content_edit', $variables)->render();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function saveSettings(Request $request)
    {
        $requestData = $request->all();

        $validation = \Validator::make((array)$requestData, [
            'content' => 'required|string',
            'id'      => 'required|numeric',
        ]);
        if ($validation->fails()) {
            if ($request->has('ajax_submit')) {
                $response = ['message' => $validation->messages()->first(), 'status' => 'error'];

                return response()->json($response, 200, array('Access-Controll-Allow-Origin' => '*'));
            }

            return redirect()->back()->withInput()->withErrors($validation->messages());
        }

        $pagesContentRecord = PagesContent::getFirstById($request->id);
        $pagesContentRecord->content = $request->content ? $request->content : '';

        try {
            $result = $pagesContentRecord->save();
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
                    'message' => trans('messages.content').' '.trans('messages.added'),
                    'status'  => 'success',
                ];

                return response()->json($response, 200, array('Access-Controll-Allow-Origin' => '*'));
            }

            return redirect()->back()->withSuccess(trans('messages.content').' '.trans('messages.saved'));
        }
    }

}
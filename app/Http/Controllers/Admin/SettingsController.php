<?php

namespace App\Http\Controllers\Admin;

use App\Blog\Post;
use App\Blog\PostHasFiles;
use App\Blog\PostHasTag;
use App\Blog\Serie;
use App\Blog\Tag;
use App\Http\Controllers\Controller;
use App\Http\Models\Members\IndividualMembers;
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
Class SettingsController extends Controller
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

        return view('admin.settings.settings_edit', $variables)->render();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|string
     * @throws \Throwable
     */
    public function editSettingsView(Request $request)
    {

        $settingsRecord = Settings::first();

        if (!$settingsRecord) {
//            $settingsRecord = new Settings();
//            $settingsRecord->save();
        }

        $variables = [
            'settings' => $settingsRecord,
        ];

        return view('admin.settings.settings_edit', $variables)->render();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function saveSettings(Request $request)
    {
        $requestData = $request->all();

        $validation = \Validator::make((array)$requestData, [
            'global_twitter_link'   => 'required|string|max:500',
            'global_facebook_link'  => 'required|string|max:500',
            'global_linkedin_link'  => 'required|string|max:500',
            'global_email_link'     => 'required|string|max:500',
            'global_footer_address' => 'required|string|max:1000',
        ]);
        if ($validation->fails()) {
            if ($request->has('ajax_submit')) {
                $response = ['message' => $validation->messages()->first(), 'status' => 'error'];

                return response()->json($response, 200, array('Access-Controll-Allow-Origin' => '*'));
            }

            return redirect()->back()->withInput()->withErrors($validation->messages());
        }

        $settingsRecord = Settings::first();
        if (!$settingsRecord) {
            $settingsRecord = new Settings();
        }
        $settingsRecord->global_twitter_link = $request->global_twitter_link ? $request->global_twitter_link : '';
        $settingsRecord->global_facebook_link = $request->global_facebook_link ? $request->global_facebook_link : '';
        $settingsRecord->global_linkedin_link = $request->global_linkedin_link ? $request->global_linkedin_link : '';
        $settingsRecord->global_email_link = $request->global_email_link ? $request->global_email_link : '';
        $settingsRecord->global_footer_address = $request->global_footer_address ? $request->global_footer_address : '';

        try {
            $result = $settingsRecord->save();
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
                    'message' => trans('messages.individual_member').' '.trans('messages.added'),
                    'status'  => 'success',
                ];

                return response()->json($response, 200, array('Access-Controll-Allow-Origin' => '*'));
            }

            return redirect()->back()->withSuccess(trans('messages.individual_member').' '.trans('messages.saved'));
        }
    }

}
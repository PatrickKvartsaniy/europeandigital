<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Models\NewsLettersSubscribe\NewsLettersSubscribe;
use Validator;
use Carbon\Carbon;

use Illuminate\Http\Request;

/**
 * Class BlogController
 * @package App\Http\Controllers\Admin
 */
Class NewsLetterController extends Controller
{

    /**
     * @param Request $request
     * @return string
     * @throws \Throwable
     */
    public function subscribeToNewsLetter(Request $request)
    {
        $attributes = $request->all();
        $validator = Validator::make($attributes, [
            'name'  => 'required|string',
            'email' => 'required|email|unique:newsletter_subscribe',
        ]);

        if ($validator->fails()) {
            if ($request->has('ajax_submit')) {
                $response = ['message' => $validator->messages()->first(), 'status' => 'error'];

                return response()->json($response, 200, array('Access-Controll-Allow-Origin' => '*'));
            }

            return redirect()->back()->withInput()->withErrors($validator->messages()->first());
        }

        try {
            $newsLettersSubscribeModel = new NewsLettersSubscribe();
            $newsLettersSubscribeModel->name = strip_tags($attributes['name']);
            $newsLettersSubscribeModel->email = strip_tags($attributes['email']);
            $newsLettersSubscribeModel->user_agent = $request->server('HTTP_USER_AGENT');
            $result = $newsLettersSubscribeModel->save();
        } catch (\Exception $exception) {
            if ($request->has('ajax_submit')) {
                $response = ['message' => $exception->getMessage(), 'status' => 'error'];

                return response()->json($response, 200, array('Access-Controll-Allow-Origin' => '*'));
            }

            return redirect()->back()->withError($exception->getMessage());
        }

        if ($result) {
            if ($request->has('ajax_submit')) {
                $response = ['message' => 'You have successfully subscribed!', 'status' => 'success'];

                return response()->json($response, 200, array('Access-Controll-Allow-Origin' => '*'));
            }

            return redirect()->back()->withSuccess('You have successfully subscribed!');
        }
    }

}
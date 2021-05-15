<?php

namespace App\Http\Controllers\Admin;

use App\Blog\Post;
use App\Blog\PostHasFiles;
use App\Blog\PostHasTag;
use App\Blog\Serie;
use App\Blog\Tag;
use App\Http\Controllers\Controller;
use App\Http\Models\Members\IndividualMembers;
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
Class MembersController extends Controller
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

        return view('admin.members.members_list', $variables)->render();
    }

    /**
     * @param Request $request
     * @return mixed
     * @throws \Mcamara\LaravelLocalization\Facades\SupportedLocalesNotDefined
     * @throws \Mcamara\LaravelLocalization\Facades\UnsupportedLocaleException
     */
    public function getMembersTableData(Request $request)
    {

        $members = IndividualMembers::all();

        $result = array();
        if (!empty($members)) {
            foreach ($members as $key => $value) {
                $tmp = [];

                if (isset($value->avatar_img) && !empty($value->avatar_img)) {
                    $tmp['avatar_img'] = '<img width="80px" src="'.$value->avatar_img.'">';
                } else {
                    $tmp['avatar_img'] = '';
                }
                $tmp['first_name'] = $value->first_name;
                $tmp['last_name'] = $value->last_name;
                $tmp['occupation'] = $value->occupation;
                $tmp['nationality'] = $value->nationality;
                $tmp['created_at'] = '<span>'.Carbon::parse($value['created_at'])->format('d/m/Y').'</span>'.'<span class="block"> '.Carbon::parse($value['created_at'])->format('H:s').'</span>';
                $tmp['action'] =
                    '<a href="'.urlloc('/admin/members/edit?id='.$value->id).'"><button type="button" class="inline_block td_admin_change open_right_menu">
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
                                        <span>Вы действительно хотите удалить этого пользователя ?</span>
                                    </p>
                                    <p class="grey">Это действие не обратимо</p>
                                    <div>
                                        <button type="button" class="cancel">ОТМЕНИТЬ</button>
                                        <button type="button" data-member-id="'.$value->id.'" onclick="delete_member(this);" class="delete">УДАЛИТЬ</button>
                                    </div>
                                </li>
                            </ul>
                        </div>';

                $result[] = $tmp;
            }
        }

        $datatables = Datatables::of($result)->rawColumns([
            'first_name',
            'last_name',
            'avatar_img',
            'occupation',
            'nationality',
            'created_at',
            'action',
        ]);

        return $datatables->make(true);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function deleteMember(Request $request)
    {
        $id = $request->input('id');

        $user = IndividualMembers::find($id);

        if (!$user) {
            if ($request->has('ajax_submit')) {
                $response = ['message' => trans('messages.user').' '.trans('messages.not_found'), 'status' => 'error'];

                return response()->json($response, 200, array('Access-Controll-Allow-Origin' => '*'));
            }

            return redirect()->back()->withError(trans('messages.user').' '.trans('messages.not_found'));
        }

        $result = $user->delete();

        if ($result) {
            if ($request->has('ajax_submit')) {
                $response = ['message' => trans('messages.user').' '.trans('messages.deleted'), 'status' => 'success'];

                return response()->json($response, 200, array('Access-Controll-Allow-Origin' => '*'));
            }

            return redirect()->back()->withSuccess(trans('messages.user').' '.trans('messages.deleted'));
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|string
     * @throws \Throwable
     */
    public function editMemberView(Request $request)
    {

        $id = $request->input('id');

        $member = null;
        if ($id) {
            $member = IndividualMembers::find($id);

            if (!$member) {
                if ($request->has('ajax_submit')) {
                    $response = ['message' => trans('crypto_art.user_not_found'), 'status' => 'error'];

                    return response()->json($response, 200, array('Access-Controll-Allow-Origin' => '*'));
                }

                return redirect()->back()->withError(trans('crypto_art.user_not_found'));
            }
        }


        $variables = [
            'member' => $member,
        ];

        return view('admin.members.members_edit', $variables)->render();
    }

    // https://docs.spatie.be/laravel-permission/v3/basic-usage/basic-usage/

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function saveMember(Request $request)
    {
        $requestData = $request->all();

        $validation = \Validator::make((array)$requestData, [
            'first_name'  => 'required|string|max:30',
            'last_name'   => 'required|string|max:30',
            'avatar_img'  => 'sometimes|string|nullable|max:255',
            'occupation'  => 'required|string|max:500',
            'nationality' => 'required|string|max:30',
        ]);
        if ($validation->fails()) {
            if ($request->has('ajax_submit')) {
                $response = ['message' => $validation->messages()->first(), 'status' => 'error'];

                return response()->json($response, 200, array('Access-Controll-Allow-Origin' => '*'));
            }

            return redirect()->back()->withInput()->withErrors($validation->messages());
        }

        if($request->individual_member_id) {
            $member = IndividualMembers::find($request->individual_member_id);
        } else {
            $member = new IndividualMembers();
        }
        $member->first_name = $request->first_name ? $request->first_name : '';
        $member->last_name = $request->last_name ? $request->last_name : '';
        $member->occupation = $request->occupation ? $request->occupation : '';
        $member->nationality = $request->nationality ? $request->nationality : '';
        if ($request->avatar_img) {
            $member->avatar_img = $request->avatar_img;
        }

        try {
            $result = $member->save();
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
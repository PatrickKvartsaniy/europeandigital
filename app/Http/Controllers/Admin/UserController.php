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
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

/**
 * Class BlogController
 * @package App\Http\Controllers\Admin
 */
Class UserController extends Controller
{

    /**
     * @param Request $request
     * @return string
     * @throws \Throwable
     */
    public function index() // Request $request)
    {

        // $role = Role::create(['name' => 'author']);
        // $permission = Permission::create(['name' => 'articles_edit']);
        //$permission->assignRole($role);

        // $role = Role::create(['name' => 'team']);

        //$permission->assignRole($role);

//        $role = Role::findByName('team');
//        $s = User::find(6);
//        $s->assignRole($role);

        $variables = [

        ];

        return view('admin.users.users_list', $variables)->render();
    }

    /**
     * @param Request $request
     * @return mixed
     * @throws \Mcamara\LaravelLocalization\Facades\SupportedLocalesNotDefined
     * @throws \Mcamara\LaravelLocalization\Facades\UnsupportedLocaleException
     */
    public function getUsersTableData(Request $request)
    {

        $users = User::all();

        $result = array();
        if (!empty($users)) {
            foreach ($users as $key => $value) {
                $tmp = [];

                if (isset($value->avatar_img) && !empty($value->avatar_img)) {
                    $tmp['avatar_img'] = '<img width="80px" src="'.$value->avatar_img.'">';
                } else {
                    $tmp['avatar_img'] = '';
                }
                $tmp['name'] = $value->name;
                $tmp['email'] = $value->email;
                $tmp['phone'] = $value->phone;
                $tmp['twitter'] = $value->twitter;
                $tmp['facebook'] = $value->facebook;
                $tmp['short_description'] = $value->short_description;
                $tmp['roles'] = $value->roles->implode('name', ' ');
                $tmp['position_number'] = $value->position_number;
                $tmp['created_at'] = '<span>'.Carbon::parse($value['created_at'])->format('d/m/Y').'</span>'.'<span class="block"> '.Carbon::parse($value['created_at'])->format('H:s').'</span>';
                $tmp['action'] =
                    '<a href="'.urlloc('/admin/user/edit?id='.$value->id).'"><button type="button" class="inline_block td_admin_change open_right_menu">
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
                                        <button type="button" data-user-id="'.$value->id.'" onclick="delete_user(this);" class="delete">УДАЛИТЬ</button>
                                    </div>
                                </li>
                            </ul>
                        </div>';

                $result[] = $tmp;
            }
        }

        $datatables = Datatables::of($result)->rawColumns([
            'name',
            'email',
            'avatar_img',
            'twitter',
            'facebook',
            'phone',
            'roles',
            'short_description',
            'position_number',
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
    public function deleteUser(Request $request)
    {
        $id = $request->input('id');

        $user = User::find($id);

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
    public function editUserView(Request $request)
    {

        $id = $request->input('id');

        $user = null;
        if ($id) {
            $user = User::find($id);

            if (!$user) {
                if ($request->has('ajax_submit')) {
                    $response = ['message' => trans('crypto_art.user_not_found'), 'status' => 'error'];

                    return response()->json($response, 200, array('Access-Controll-Allow-Origin' => '*'));
                }

                return redirect()->back()->withError(trans('crypto_art.user_not_found'));
            }
        }

        $roles = Role::all();

        // dd($user->roles);
        $variables = [
            'roles' => $roles,
            'user'  => $user,
        ];

        return view('admin.users.users_edit', $variables)->render();
    }

    // https://docs.spatie.be/laravel-permission/v3/basic-usage/basic-usage/

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|string
     * @throws \Throwable
     */
    public function saveUser(Request $request)
    {
        $attributes = $request->all();

        $user = User::updateOrCreate(
            [
                'id' => $attributes['user_id'],
            ],
            [
                'avatar_img'        => $attributes['avatar_img'],
                'name'              => $attributes['name'],
                'email'             => $attributes['email'],
                'password'          => bcrypt($attributes['email']),
                'phone'             => $attributes['phone'],
                'facebook'          => $attributes['facebook'],
                'twitter'           => $attributes['twitter'],
                'short_description' => $attributes['short_description'],
                'position_number'   => $attributes['position_number'],
            ]
        );

        $newUserRoles = [];
        if (is_iterable($request->user_role_name)) {
            foreach ($request->user_role_name as $roleName) {
                $role = Role::findByName($roleName);
                $newUserRoles[] = $role;
                //$user->assignRole($role);
            }
        }

        $user->syncRoles($newUserRoles);

        return redirect()->back()->withSuccess('User saved');
    }

}
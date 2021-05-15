<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Models\Members\IndividualMembers;
use App\Http\Models\Members\Members;
use App\Http\Models\NewsLettersSubscribe\NewsLettersSubscribe;
use Validator;
use Carbon\Carbon;
use Yajra\Datatables\Facades\Datatables as d;
use Yajra\Datatables\Datatables;

use Illuminate\Http\Request;

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
    public function index(Request $request)
    {
        $filterByDaysAgoData = []; // getFilteringPeriodsInDays();

        $members = Members::all();

        $variables = [
            'filterByDaysAgoData' => $filterByDaysAgoData,
            'members'             => $members,
        ];

        $content = view('site.page.members.members', $variables)->render();
        $pageTitle = 'Members';

        $variables = [
            'content'   => $content,
            'pageTitle' => $pageTitle,
        ];

        return view('site.page.common_page_view', $variables)->render();
    }

    /**
     * @param Request $request
     * @return string
     * @throws \Throwable
     */
    public function indexOrganizations(Request $request)
    {
        $organizationsMembers = Members::allOrganizations();

        $variables = [
            'organizationsMembers' => $organizationsMembers,
        ];

        $content = view('site.page.members.organizations_content', $variables);
        $pageTitle = 'Current members';

        $variables = [
            'content'   => $content,
            'pageTitle' => $pageTitle,
        ];

        return view('site.page.members.organizations', $variables)->render();
    }

    /**
     * @param Request $request
     * @return string
     * @throws \Throwable
     */
    public function indexIndividualMembers(Request $request)
    {
        $organizationsMembers = Members::allOrganizations();

        $variables = [
            'organizationsMembers' => $organizationsMembers,
        ];

        $content = view('site.page.members.individual_members_content', $variables);
        $pageTitle = 'Individual members';

        $variables = [
            'content'   => $content,
            'pageTitle' => $pageTitle,
        ];

        return view('site.page.members.organizations', $variables)->render();
    }

    /**
     * @param Request $request
     * @return string
     * @throws \Throwable
     */
    public function indexBecomeAMember(Request $request)
    {
        $organizationsMembers = Members::allOrganizations();

        $variables = [
            'organizationsMembers' => $organizationsMembers,
        ];

        $content = view('site.page.members.become_a_member', $variables);
        $pageTitle = 'Become a member';

        $variables = [
            'content'   => $content,
            'pageTitle' => $pageTitle,
        ];

        return view('site.page.common_page_view', $variables)->render();
    }

    public function getIndividualMembers()
    {
        $individualMembers = IndividualMembers::all();

        $result = array();
        if (!empty($individualMembers)) {
            foreach ($individualMembers as $key => $value) {
                $tmp = [];

                if (isset($value->avatar_img) && !empty($value->avatar_img)) {
                    $tmp['avatar_img'] = '<img src="'.$value->avatar_img.'">';
                } else {
                    $tmp['avatar_img'] = '';
                }
                $tmp['first_name'] = $value->first_name;
                $tmp['last_name'] = $value->last_name;
                $tmp['occupation'] = $value->occupation;
                $tmp['nationality'] = $value->nationality;

                $result[] = $tmp;
            }
        }

        return Datatables::of($result)->rawColumns([
            'avatar_img',
            'first_name',
            'last_name',
            'nationality',
            'occupation',
        ])->make(true);
    }

}
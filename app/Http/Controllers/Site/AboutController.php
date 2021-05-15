<?php

namespace App\Http\Controllers\Site;

use App\Blog\Post;
use App\Blog\PostHasFiles;
use App\Blog\PostHasTag;
use App\Blog\Serie;
use App\Blog\Tag;
use App\Http\Controllers\Controller;
use App\Http\Models\Pages\Pages;
use App\Http\Models\PagesContent\PagesContent;
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
class AboutController extends Controller
{

    /**
     * @param Request $request
     * @return string
     * @throws \Throwable
     */
    public function indexAboutUs(Request $request)
    {

        $teamMembers = Post::posts();
        $pageTitle = 'About us';

        $variables = [
            'teamMembers' => $teamMembers,
            'pageTitle'   => $pageTitle,
        ];

        return view('site.page.about.about_us', $variables)->render();
    }

    /**
     * @param Request $request
     * @return string
     * @throws \Throwable
     */
    public function indexContactUs(Request $request)
    {

        $teamMembers = Post::posts();
        $pageTitle = 'Contact us';

        $variables = [
            'teamMembers' => $teamMembers,
            'pageTitle'   => $pageTitle,
        ];

        return view('site.page.about.contact_us', $variables)->render();
    }

    /**
     * @param Request $request
     * @return string
     * @throws \Throwable
     */
    public function indexTeam(Request $request)
    {

        $teamMembers = User::getAllTeam();
        $pageTitle = 'Team';

        $teamMembersOrdered = $teamMembers->SortBy('position_number');
        $variables = [
            'teamMembers' => $teamMembersOrdered,
            'pageTitle'   => $pageTitle,
        ];

        return view('site.page.about.team', $variables)->render();
    }

    /**
     * @param Request $request
     * @return string
     * @throws \Throwable
     */
    public function indexVacancies(Request $request)
    {

        $teamMembers = Post::posts();
        $pageTitle = 'Vacancies';

        $contentId = 'vacancies';
        $contentRecord = PagesContent::getFirstByContentId($contentId);
        $content = '';
        if ($contentRecord) {
            $content = $contentRecord->content;
        }

        $variables = [
            'teamMembers' => $teamMembers,
            'pageTitle'   => $pageTitle,
            'content'     => $content,
        ];

        return view('site.page.about.vacancies', $variables)->render();
    }
}
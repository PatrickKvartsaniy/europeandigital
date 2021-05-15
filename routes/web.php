<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::prefix('blog')->group(function () {
//    Route::get('/', 'BlogController@index')->name('blog.index');
//    Route::middleware('Canvas\Http\Middleware\ViewThrottle')->get('{slug}', 'BlogController@post')->name('blog.post');
//    Route::get('tag/{slug}', 'BlogController@tag')->name('blog.tag');
//    Route::get('topic/{slug}', 'BlogController@topic')->name('blog.topic');
//});

Route::get('/', 'Site\BlogController@index');
Route::get('/news', 'Site\BlogController@news');
Route::group(['middleware' => 'throttle:5,10'], function () {
    Route::post('/newsletter-subscribe', 'Site\NewsLetterController@subscribeToNewsLetter')->name('newsletter_subscribe');
});

Route::group(['prefix' => 'members'], function () {
    //Route::get('/', 'Site\MembersController@index')->name('members');
    Route::get('/organizations', 'Site\MembersController@indexOrganizations')->name('members.organizations');
    Route::get('/current-members', 'Site\MembersController@indexOrganizations')->name('members.current_members');
    Route::get('/get-individual-members', 'Site\MembersController@getIndividualMembers')->name('members.individual_members.get');
    Route::get('/individual-members', 'Site\MembersController@indexIndividualMembers')->name('members.individual_members');
    Route::get('/become-a-member', 'Site\MembersController@indexBecomeAMember')->name('members.become_a_member');
});

Route::group(['prefix' => 'about'], function () {
    Route::get('/about-us', 'Site\AboutController@indexAboutUs')->name('about.about_us');
    Route::get('/contact-us', 'Site\AboutController@indexContactUs')->name('about.contact_us');
    Route::get('/team', 'Site\AboutController@indexTeam')->name('about.team');
    Route::get('/vacancies', 'Site\AboutController@indexVacancies')->name('about.vacancies');
});

Route::group(['prefix' => 'tags'], function () {
    Route::get('/', 'Site\TagController@showAllTags')->name('tags');
    Route::get('/{seriesName}', 'Site\TagController@showTagsPosts');
});

Route::group(['prefix' => 'policy'], function () {
    Route::get('/', 'Site\SerieController@showAllSeries')->name('series');
    Route::get('/{seriesName}', 'Site\SerieController@showSeriesPosts');
});

Route::group(['prefix' => 'page'], function () {
    Route::get('/{pageName}', 'Site\PageController@index')->name('pages');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', 'Admin\DashboardController@index');
    Route::get('/dashboard', 'Admin\DashboardController@index');
    Route::get('/filemanager', 'Admin\DashboardController@filemanager');

    Route::group(['prefix' => 'blog'], function () {
        Route::get('/', 'Admin\BlogController@index');


        Route::group(['prefix' => 'article'], function () {
            Route::get('/list', 'Admin\ArticleController@index');
            Route::get('/get-table-data', 'Admin\ArticleController@getArticlesTableData')->name('datatables.get_article_list_admin');
            Route::get('/add', 'Admin\ArticleController@addArticleView');
            Route::get('/edit', 'Admin\ArticleController@editPostView');

            Route::post('/add', 'Admin\ArticleController@addPost');
            Route::post('/edit', 'Admin\ArticleController@editPost');
            Route::post('/delete', 'Admin\ArticleController@deletePost');
            Route::post('/delete-tag', 'Admin\ArticleController@deletePostHasTag');
        });
        Route::group(['prefix' => 'tag'], function () {
            Route::get('/get-table-data', 'Admin\TagController@getTagsTableData')->name('datatables.get_tag_list_admin');
            Route::get('/edit', 'Admin\TagController@showEditView');
            Route::get('/edit/id/{id}', 'Admin\TagController@showEditView');
            Route::get('/load-selector', 'Admin\TagController@getTagSelectorView');
            Route::get('/list', 'Admin\TagController@index');
            Route::post('/save', 'Admin\TagController@saveTag');
            Route::post('/add', 'Admin\TagController@addTag');
            Route::post('/edit', 'Admin\TagController@editTag');
            Route::post('/delete', 'Admin\TagController@deleteTag');
        });
        Route::group(['prefix' => 'series'], function () {
            Route::get('/list', 'Admin\SeriesController@index')->name('admin.series');
            Route::get('/get-table-data', 'Admin\SeriesController@getSeriesTableData')->name('datatables.get_series_list_admin');
            Route::get('/load-selector', 'Admin\SeriesController@getSerieSelectorView');
            Route::get('/edit', 'Admin\SeriesController@showEditView')->name('admin.series.add');
            Route::get('/edit/id/{id}', 'Admin\SeriesController@showEditView');
            Route::post('/add', 'Admin\SeriesController@addSerie');
            Route::post('/edit', 'Admin\SeriesController@editSerie');
            Route::post('/save', 'Admin\SeriesController@saveSerie');
            Route::post('/delete', 'Admin\SeriesController@deleteSerie');
        });
    });

    Route::group(['prefix' => 'user'], function () {
        Route::get('/list', 'Admin\UserController@index');
        Route::get('/get-table-data', 'Admin\UserController@getUsersTableData')->name('datatables.get_users_list_admin');
        Route::get('/edit', 'Admin\UserController@editUserView');

        Route::post('/save', 'Admin\UserController@saveUser');
        Route::post('/delete', 'Admin\UserController@deleteUser');
    });

    Route::group(['prefix' => 'subscribers'], function () {
        Route::get('/list', 'Admin\SubscribersController@index');
        Route::get('/get-table-data', 'Admin\SubscribersController@getSubscribersTableData')->name('datatables.get_subscribers_list_admin');
    });

    Route::group(['prefix' => 'settings'], function () {
        Route::get('/edit', 'Admin\SettingsController@editSettingsView')->name('admin.settings.add');
        Route::post('/save', 'Admin\SettingsController@saveSettings');
    });

    Route::group(['prefix' => 'pages-content'], function () {
        Route::get('/edit', 'Admin\PagesContentController@editSettingsView')->name('admin.pages_content.edit');
        Route::post('/save', 'Admin\PagesContentController@saveSettings');
    });

    Route::group(['prefix' => 'members'], function () {
        Route::get('/list', 'Admin\MembersController@index');
        Route::get('/get-table-data', 'Admin\MembersController@getMembersTableData')->name('datatables.get_members_list_admin');

        Route::get('/edit', 'Admin\MembersController@editMemberView')->name('admin.members.edit');
        Route::get('/edit/id/{id}', 'Admin\MembersController@editMemberView');

        Route::post('/edit', 'Admin\MembersController@editSerie');
        Route::post('/save', 'Admin\MembersController@saveMember');
        Route::post('/delete', 'Admin\MembersController@deleteMember');
    });

});

Auth::routes([
    'register' => false, // Registration Routes...
    'reset'    => false, // Password Reset Routes...
    'verify'   => false, // Email Verification Routes...
]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/{articleSlug}', 'Site\PostController@showPost');

<?php



Route::group(['middleware' => ['web']], function () {

    Route::get('/solutions', 'Pages\SolutionsController@index')->name('solutions');
    Route::get('/', 'Pages\SolutionsController@index')->name('index');
    Route::get('/healths', 'Pages\HalthsController@index')->name('healths');
    Route::get('/healths/medicalcloud', 'Pages\HalthsController@medicalcloud')->name('medicalcloud');
    Route::get('/healths/diary', 'Pages\HalthsController@diary')->name('diary');
    Route::get('/healths/telemedicine', 'Pages\HalthsController@telemedicine')->name('telemedicine');
    Route::get('/healths/reports', 'Pages\HalthsController@reports')->name('reports');
    Route::get('/healths/history', 'Pages\HalthsController@history')->name('history');
    Route::get('/impacts', 'Pages\ImpactsController@index')->name('impacts');
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
    Route::post('/login', 'Auth\LoginController@login');


    Route::get('/impacts/teleecografia', 'Pages\ImpactsController@teleecografia')->name('teleecografia');
    Route::get('/impacts/project/piloto', 'Pages\ImpactsController@piloto')->name('project.piloto');
    Route::get('/impacts/project/teleecografía', 'Pages\ImpactsController@teleecografía')->name('project.teleecografía');
    Route::get('/impacts/project/rurales', 'Pages\ImpactsController@rurales')->name('project.rurales');


    Route::get('/about', 'Pages\PagesController@about')->name('about');
    Route::get('/home', 'Pages\PagesController@home')->name('home');
    Route::get('/faqs', 'Pages\PagesController@faqs')->name('faqs');
    Route::get('/terms', 'Pages\PagesController@terms')->name('terms');
    Route::get('/teams', 'Pages\TeamsController@index')->name('team');
    Route::get('/politics', 'Pages\PagesController@politics')->name('politics');
    Route::get('/blogs', 'Pages\BlogsController@index')->name('blogs');
    Route::get('/claims', 'Pages\ClaimsController@index')->name('claims');
    Route::get('/contacts', 'Pages\ContactsController@index')->name('contacts');

    Route::get('/blogs/{slug}', 'Pages\BlogsController@view')->name('blogs.view');
    Route::get('/claims/{slug}', 'Pages\ClaimsController@view')->name('claims.view');

    Route::post('/filters', 'Pages\BlogsController@filters')->name('blogs.filters');
    Route::post('/comments', 'Pages\BlogsController@comments')->name('blogs.comments');


    Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequest')->name('password.reset');
    Route::get('/contacts/success/{slug}', 'Pages\ContactsController@success')->name('contacts.success');
    Route::post('/contacts/store', 'Pages\ContactsController@storage')->name('contacts.store');
    Route::post('/password/reset', 'Auth\ResetPasswordController@reset');

    Route::get('/blogs/categories/{slug}', 'Pages\BlogsController@categories')->name('blogs.categories');
    Route::get('/blogs/tags/{slug}', 'Pages\BlogsController@tags')->name('blogs.tags');
    Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset.token');


    Route::get('/clear', function () {
        Artisan::call('cache:clear');
        Artisan::call('route:clear');
        Artisan::call('view:clear');
        Artisan::call('config:clear');
        Artisan::call('config:cache');
        return '<h1>Cache Borrado</h1>';
    });
});

Route::prefix('manager')->middleware(['auth'])->namespace('Managers')->as('manager.')->group(function () {
    //-------------------------------------DASHBOARD--------------------------------------------//
    Route::get('/home', 'DashboardController@dashboard')->name('home');
    Route::get('/', 'DashboardController@dashboard')->name('dashboard');
    //-----------
    Route::get('/users', 'UsersController@index')->name('users');
    Route::get('/users/create', 'UsersController@create')->name('create.users');
    Route::post('/users/storage', 'UsersController@storage')->name('storage.users');
    Route::get('/users/view/{slack}', 'UsersController@view')->name('view.users');
    Route::get('/users/edit/{slack}', 'UsersController@edit')->name('edit.users');
    Route::post('/users/update/{slack}', 'UsersController@update')->name('update.users');
    Route::get('/users/destroy/{slack}', 'UsersController@destroy')->name('destroy.users');

    Route::get('/contacts', 'ContactsController@index')->name('contacts');
    Route::get('/contacts/view/{slack}', 'ContactsController@view')->name('view.contacts');
    Route::get('/contacts/edit/{slack}', 'ContactsController@edit')->name('edit.contacts');
    Route::post('/contacts/update/{slack}', 'ContactsController@update')->name('update.contacts');
    Route::get('/contacts/destroy/{slack}', 'ContactsController@destroy')->name('destroy.contacts');

    Route::get('/blogs', 'BlogsController@index')->name('blogs');
    Route::get('/blogs/create', 'BlogsController@create')->name('create.blogs');
    Route::post('/blogs/storage', 'BlogsController@storage')->name('storage.blogs');
    Route::get('/blogs/view/{slack}', 'BlogsController@view')->name('view.blogs');
    Route::get('/blogs/edit/{slack}', 'BlogsController@edit')->name('edit.blogs');
    Route::post('/blogs/update/{slack}', 'BlogsController@update')->name('update.blogs');
    Route::get('/blogs/destroy/{slack}', 'BlogsController@destroy')->name('destroy.blogs');



    Route::get('/partners', 'PartnerController@index')->name('partners');
    Route::get('/partners/create', 'PartnerController@create')->name('create.partners');
    Route::post('/partners/storage', 'PartnerController@storage')->name('storage.partners');
    Route::get('/partners/view/{slack}', 'PartnerController@view')->name('view.partners');
    Route::get('/partners/edit/{slack}', 'PartnerController@edit')->name('edit.partners');
    Route::post('/partners/update/{slack}', 'PartnerController@update')->name('update.partners');
    Route::get('/partners/destroy/{slack}', 'PartnerController@destroy')->name('destroy.partners');


    Route::post('/blogs/thumbnail', 'BlogsController@storeThumbnail')->name('blogs.thumbnail');
    Route::get('/blogs/delete/thumbnail/{token}', 'BlogsController@deleteThumbnail')->name('delete.thumbnail');
    Route::get('/blogs/get/thumbnail/{token}', 'BlogsController@getThumbnail')->name('blog.thumbnail');


    Route::post('/teams/thumbnail', 'TeamsController@storeThumbnail')->name('teams.thumbnail');
    Route::get('/teams/delete/thumbnail/{token}', 'TeamsController@deleteThumbnail')->name('delete.thumbnail');
    Route::get('/teams/get/thumbnail/{token}', 'TeamsController@getThumbnail')->name('team.thumbnail');


    Route::post('/partners/thumbnail', 'PartnerController@storeThumbnail')->name('partners.thumbnail');
    Route::get('/partners/delete/thumbnail/{token}', 'PartnerController@deleteThumbnail')->name('delete.thumbnail');
    Route::get('/partners/get/thumbnail/{token}', 'PartnerController@getThumbnail')->name('partner.thumbnail');


    Route::get('/testimonies', 'TestimoniesController@index')->name('testimonies');
    Route::get('/testimonies/create', 'TestimoniesController@create')->name('create.testimonies');
    Route::post('/testimonies/storage', 'TestimoniesController@storage')->name('storage.testimonies');
    Route::get('/testimonies/view/{slack}', 'TestimoniesController@view')->name('view.testimonies');
    Route::get('/testimonies/edit/{slack}', 'TestimoniesController@edit')->name('edit.testimonies');
    Route::post('/testimonies/update/{slack}', 'TestimoniesController@update')->name('update.testimonies');
    Route::get('/testimonies/destroy/{slack}', 'TestimoniesController@destroy')->name('destroy.testimonies');

    Route::get('/projects', 'ProjectsController@index')->name('projects');
    Route::get('/projects/create', 'ProjectsController@create')->name('create.projects');
    Route::post('/projects/storage', 'ProjectsController@storage')->name('storage.projects');
    Route::get('/projects/view/{slack}', 'ProjectsController@view')->name('view.projects');
    Route::get('/projects/edit/{slack}', 'ProjectsController@edit')->name('edit.projects');
    Route::post('/projects/update/{slack}', 'ProjectsController@update')->name('update.projects');
    Route::get('/projects/destroy/{slack}', 'ProjectsController@destroy')->name('destroy.projects');

    Route::get('/faqs', 'FaqsController@index')->name('faqs');
    Route::get('/faqs/create', 'FaqsController@create')->name('create.faqs');
    Route::post('/faqs/storage', 'FaqsController@storage')->name('storage.faqs');
    Route::get('/faqs/edit/{slack}', 'FaqsController@edit')->name('edit.faqs');
    Route::post('/faqs/update/{slack}', 'FaqsController@update')->name('update.faqs');
    Route::get('/faqs/destroy/{slack}', 'FaqsController@destroy')->name('destroy.faqs');

    Route::get('/settings', 'SettingsController@index')->name('settings');
    Route::post('/settings/update/{id}', 'SettingsController@update')->name('update.settings');

    Route::get('/tags', 'TagsController@index')->name('tags');
    Route::get('/tags/create', 'TagsController@create')->name('create.tags');
    Route::post('/tags/storage', 'TagsController@storage')->name('storage.tags');
    Route::get('/tags/edit/{slack}', 'TagsController@edit')->name('edit.tags');
    Route::post('/tags/update/{slack}', 'TagsController@update')->name('update.tags');
    Route::get('/tags/destroy/{slack}', 'TagsController@destroy')->name('destroy.tags');

    Route::get('/categories', 'CategoriesController@index')->name('categories');
    Route::get('/categories/create', 'CategoriesController@create')->name('create.categories');
    Route::post('/categories/storage', 'CategoriesController@storage')->name('storage.categories');
    Route::get('/categories/edit/{slack}', 'CategoriesController@edit')->name('edit.categories');
    Route::post('/categories/update/{slack}', 'CategoriesController@update')->name('update.categories');
    Route::get('/categories/destroy/{slack}', 'CategoriesController@destroy')->name('destroy.categories.blogs');

    Route::get('/teams', 'TeamsController@index')->name('teams');
    Route::get('/teams/view/{slack}', 'TeamsController@view')->name('view.teams');
    Route::get('/teams/edit/{slack}', 'TeamsController@edit')->name('edit.teams');
    Route::post('/teams/update/{slack}', 'TeamsController@update')->name('update.teams');
    Route::get('/teams/create', 'TeamsController@create')->name('create.teams');
    Route::post('/teams/storage', 'TeamsController@storage')->name('storage.teams');
    Route::get('/teams/destroy/{slack}', 'TeamsController@destroy')->name('destroy.parteamtners');
});
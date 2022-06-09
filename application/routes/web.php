<?php

    Route::group('/invite', ['namespace' => 'invite'], function() {
		Route::get('/', 'InviteController@index')->name('invite.invite.index');
		Route::get('/new', 'InviteController@new')->name('invite.invite.new');
	});
/****
 * Admin panel
 */
    Route::group('/', ['namespace' => 'admin'], function() {
		Route::get('/', 'Welcome@index')->name('admin.welcome.index1');
	});

    Route::group('admin/welcome', ['namespace' => 'admin'], function() {
        Route::get('/', 'Welcome@index')->name('admin.welcome.index');
    });

    Route::group('admin/auth', ['namespace' => 'admin'], function() {
        Route::get('/', 'AuthController@index')->name('admin.auth.index');
        Route::get('/login', 'AuthController@login')->name('admin.auth.login');
        Route::get('/forgot_pass', 'AuthController@forgot_pass')->name('admin.auth.forgot_pass');
        Route::post('/sendCode', 'AuthController@sendPassword')->name('admin.auth.sendPassword');

		 Route::get('/logout', 'AuthController@logout')->name('admin.auth.logout');
        Route::post('/do_login', 'AuthController@do_login') -> name('admin.auth.do_login');
    });
    Route::group('admin/dashboard', ['namespace' => 'admin'], function() {
        Route::get('/', 'DashboardController@index')->name('admin.dashboards.index');
    });
    Route::group('admin/mainpage', ['namespace' => 'admin'], function() {
        Route::get('/', 'MainPageController@index')->name('admin.mainpages.index');
    });

      Route::group('admin/signups', ['namespace' => 'admin'], function() {
        Route::get('/', 'SignUpController@index')->name('admin.signups.index');
        Route::get('/detail/{userid}', 'SignUpController@detail') -> name('admin.signups.detail');
        Route::get('/block/{userid}', 'SignUpController@block_user') -> name('admin.signups.block');

    });
    Route::group('admin/interesting', ['namespace' => 'admin'], function() {
        Route::get('/', 'InterestingController@index')->name('admin.interesting.index');       
        Route::post('/doUpload', 'InterestingController@doUpload') -> name('admin.interesting.doUpload');

    });
    Route::set('translate_uri_dashes',FALSE);

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
        Route::post('/ajax_get_login_chart', 'SignUpController@ajax_get_login_chart') -> name('admin.signups.ajax_get_login_chart');
        Route::get('/login_history/{userid}', 'SignUpController@login_history') -> name('admin.signups.login_history');
        Route::get('/post_history/{userid}', 'SignUpController@post_history') -> name('admin.signups.post_history');

        Route::get('/post/{postid}', 'SignUpController@view_post') -> name('admin.signups.view_post');
        Route::get('/post_block/{postid}', 'SignUpController@post_block_form') -> name('admin.signups.post_block_form');
        Route::get('/block_post', 'SignUpController@block_post') -> name('admin.signups.block_post');

        Route::get('/post_unblock/{postid}', 'SignUpController@post_unblock_form') -> name('admin.signups.post_unblock_form');
        Route::get('/unblock_post', 'SignUpController@unblock_post') -> name('admin.signups.unblock_post');

        Route::get('/book_history/{userid}', 'SignUpController@book_history') -> name('admin.signups.book_history');
        Route::get('/report_history/{userid}', 'SignUpController@report_history') -> name('admin.signups.report_history');
        Route::get('/block/{userid}', 'SignUpController@block_form') -> name('admin.signups.block');
        Route::get('/submit_block', 'SignUpController@submit_block') -> name('admin.signups.submit_block');
        Route::get('/unblock/{userid}', 'SignUpController@unblock_form') -> name('admin.signups.unblock');
        Route::get('/submit_unblock', 'SignUpController@submit_unblock') -> name('admin.signups.submit_unblock');
    });
    Route::set('translate_uri_dashes',FALSE);

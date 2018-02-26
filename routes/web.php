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

Route::get('/',[
    'uses'=>'FrontendController@index',
    'as'=>'index'
]);

Route::get('/category/{id}',[
    'uses'=>'FrontendController@category',
    'as'=>'category.single'
]);



Auth::routes();

Route::get('/admin/home', 'HomeController@index')->name('home');

Route::get('/test',function()
{
    return App\Category::find(7)->posts;
});

Route::group(['prefix'=>'admin','middleware'=>'auth'],function()
{

    Route::get('/post/create',[
        'uses'=> 'PostController@create',
        'as'=>'post.create'
    ]);

    Route::post('/post/store',[
        'uses'=>'PostController@store',
        'as'=>'post.store'
    ]);

    Route::get('/category/create',[
        'uses'=>'CategoriesController@create',
        'as'=>'category.create'
    ]);
    Route::post('/category/store',[
        'uses'=>'CategoriesController@store',
        'as'=>'category.store'
    ]);

    Route::get('/categories',[
        'uses'=>'CategoriesController@index',
        'as'=>'categories'
    ]);

    Route::get('/category/edit/{id}',[
       'uses'=>'CategoriesController@edit',
        'as'=>'category.edit'
    ]);
    Route::get('/category/delete/{id}',[
        'uses'=>'CategoriesController@destroy',
        'as'=>'category.delete'
    ]);
    Route::post('/category/update/{id}',[
        'uses'=>'CategoriesController@update',
        'as'=>'category.update'
    ]);
    Route::get('/posts',[
       'uses'=>'PostController@index',
       'as'=>'posts'
    ]);
    Route::get('/post/delete/{id}',[
        'uses'=>'PostController@destroy',
        'as'=>'post.delete'
    ]);
    Route::get('/posts/trashed',[
        'uses'=>'PostController@trashed',
        'as'=>'posts.trashed'
    ]);
    Route::get('/post/kill/{id}',[
        'uses'=>'PostController@kill',
        'as'=>'post.kill'
    ]);
    Route::get('/post/restore/{id}',[
        'uses'=>'PostController@restore',
        'as'=>'post.restore'
    ]);
    Route::get('/post/edit/{id}',[
        'uses'=>'PostController@edit',
        'as'=>'post.edit'
    ]);
    Route::post('/post/update/{id}',[
        'uses'=>'PostController@update',
        'as'=>'post.update'
    ]);

    Route::get('/tags',[
        'uses'=>'tagsController@index',
        'as'=>'tags'
    ]);
    Route::get('/tag/edit/{id}',[
        'uses'=>'tagsController@edit',
        'as'=>'tag.edit'
    ]);
    Route::post('/tag/update/{id}',[
        'uses'=>'tagsController@update',
        'as'=>'tag.update'
    ]);
    Route::get('/tag/delete/{id}',[
        'uses'=>'tagsController@destroy',
        'as'=>'tag.delete'
    ]);
    Route::get('/tag/create',[
        'uses'=>'tagsController@create',
        'as'=>'tag.create'
    ]);
    Route::post('/tag/store',[
        'uses'=>'tagsController@store',
        'as'=>'tag.store'
    ]);

    Route::get('/users',[
       'uses'=>'UserController@index',
       'as'=>'users'
    ]);
    Route::get('/user/create',[
        'uses'=>'UserController@create',
        'as'=>'user.create'
    ]);
    Route::post('/user/store',[
        'uses'=>'UserController@store',
        'as'=>'user.store'
    ]);
    Route::get('/user/admin/{id}',[
        'uses'=>'UserController@admin',
        'as'=>'user.admin'
    ]);
    Route::get('/user/delete/{id}',[
        'uses'=>'UserController@destroy',
        'as'=>'user.delete'
    ]);

    Route::get('/user/notadmin/{id}',[
        'uses'=>'UserController@notadmin',
        'as'=>'user.notadmin'
    ]);


    Route::get('/user/profile',[
        'uses'=>'ProfilesController@index',
        'as'=>'user.profile'
    ]);

    Route::post('/user/profile/update',[
        'uses'=>'ProfilesController@update',
        'as'=>'user.profile.update'
    ]);

    Route::get('/settings',[
        'uses'=>'SettingsController@index',
        'as'=>'settings'
    ])->middleware('admin');

    Route::post('/settings/update',[
        'uses'=>'SettingsController@update',
        'as'=>'settings.update'
    ])->middleware('admin');
});

Route::get('/{slug}',[
    'uses'=>'FrontendController@singlePost',
    'as'=>'post.single'
]);
Route::get('/tag/{id}',[
    'uses'=>'FrontendController@tag',
    'as'=>'tag.single'
]);


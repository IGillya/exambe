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




    Route::get('blog/{slug}','BlogController@getSingle')->name('blog.single');
    Route::get('blog','BlogController@getIndex')->name('blog.index');
    Route::get('/', 'PageController@home');
    Route::get('contact', 'PageController@index');
    Route::get('about', 'PageController@about');
    Route::resource('post','PostController');
    Route::post('contact','ContactMeController@store')->name('contactme');

    Auth::routes();

    // Categories
     Route::resource('categories','CategoryController');
     //Tag
     Route::resource('tags', 'TagController');
     //Comments
     Route::post('comments/{post_id}','CommentController@store')->name('comments.store');
     Route::get('comments/{id}/edit','CommentController@edit')->name('comments.edit');
     Route::put('comments/{id}','CommentController@update')->name('comments.update');
     Route::delete('comments/{id}','CommentController@destroy')->name('comments.destroy');





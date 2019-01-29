<?php



        Route::group(['middleware'=> 'auth'],function(){
          Route:: resource('quotes','QuoteController',['except'=>['index','show']]);
         Route::post('/quotes-comment/{id}','QuoteCommentController@store');
         Route::put('/quotes-comment/{id}','QuoteCommentController@update');
         Route::get('/quotes-comment/{id}/edit','QuoteCommentController@edit');
         Route::delete('/quotes-comment/{id}','QuoteCommentController@destroy');
         Route::get('/like/{type}/{model}','LikeController@like');
         Route::get('/unlike/{type}/{model}','LikeController@unlike');
         Route::get('/notifications','HomeController@get_notif');


        });

        Route::get('/', 'QuoteController@index');
        Route::get('/quotes/filter/{tag}','QuoteController@filter');
        Route::get('/profile/{id?}', 'HomeController@profile');

        Auth::routes();
        Route::get('/home', 'HomeController@index')->name('home');

        Route::get('/quotes/random', 'QuoteController@random');
        Route:: resource('quotes','QuoteController',['only'=>['index','show']]);

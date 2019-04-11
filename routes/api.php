<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {return view('ReadAholic');});

Route::group(["middleware" => "authorized"] , function(){
    Route::post('signup', "UserController@signUp");
    Route::post('login', "UserController@logIn");
    Route::get('books','BookController@index');
    Route::get('books/genre', 'BookController@showByGenre');
    Route::get('Books/book_title','BookController@getBookByTitle');
    Route::get('Books/book_ISBN','BookController@getBookByIsbn');
    Route::get('Books/book_Authorname','BookController@getBookByAuthorName');
    // Review Section
    Route::get('reviwes','ReviewController@recentReviews');
    Route::get( 'reviwes/users/books', 'ReviewController@getReviewsForListOfBooks');
    Route::get( 'reviwes/books', 'ReviewController@getReviewsByTitle');
    Route::get('showReviewOfBook','ReviewController@showReviewOfBook');
    Route::get('showReviewForBookForUser','ReviewController@showReviewForBookForUser');
    // Shelf Section
    Route::get('shlef/list', 'ShelfController@index');
    Route::get('shelf/shelfname', 'ShelfController@show');
    Route::get('shelf/shelfid','ShelfController@userShelves');
    Route::get('shelf','ShelfController@getBooksOnShelf');
});

Route::group(["middleware" => "unAuthorized"], function(){

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //                                   Sofyan sectoin (please don't remove them)                                      //
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    Route::post('changepassword', "UserController@changePassword");
    Route::post('changename', "UserController@changeName");
    Route::post('delete', "UserController@delete");
    Route::delete('logout', "UserController@logOut");
    Route::get('showsetting', "UserController@showSetting");
    Route::get('changecountry', "UserController@changeCountry");
    Route::get('changecity', "UserController@changeCity");
    Route::get('changebirthday', "UserController@changeBirthday");
    Route::get('whocanseemybirthday', "UserController@whoCanSeeMyBirthday");
    Route::get('whocanseemycountry', "UserController@whoCanSeeMyCountry");
    Route::get('whocanseemycity', "UserController@whoCanSeeMyCity");
    Route::post('changeImage', "UserController@changeImage");
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ////////                               Ahmed Waleed section                                                                          ////////                                                                                                             ////////           
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    Route::post('reviwes/create','ReviewController@createReview');
    Route::put('reviwes/edit', 'ReviewController@editReview');
    Route::delete('reviwes/delete', 'ReviewController@destroy');
    Route::post('makeComment','ActivitiesController@makeComment');
    Route::delete('deleteComment','ActivitiesController@deleteComment');
    Route::delete('unlike','ActivitiesController@unlike');
    Route::post('makeLike','ActivitiesController@makeLike');
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ////////                               Mohamed Mokhtar section                                                                          ////////                                                                                                             ////////           
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    Route::get('showProfile', "UserController@showProfile");
    Route::post('follow','FollowingController@followUser');
    Route::delete('unfollow','FollowingController@unfollowUser');
    Route::get('followers','FollowingController@userFollowers');
    Route::get('following','FollowingController@userFollowing');
    Route::post('shelf/add_book', 'ShelfController@addBook');
    Route::delete('shelf/remove_book', 'ShelfController@removeBook');
    Route::get('myreviews','ReviewController@listMyReviews');
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ////////                               Nour section                                                              ////////                                                                                                             ////////           
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    Route::get('updates','ActivitiesController@followingUpdates');
    Route::get('notification','ActivitiesController@notifications');
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ////////                               Ahmed Hamdy section                                                              ////////                                                                                                             ////////           
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    Route::get('reviwes','ReviewController@recentReviews');
    Route::get('listReviewOfUser','ReviewController@listReviewOfUser');
    Route::get( 'books/show', 'BookController@show');
    Route::get('showReviewsForABook','ReviewController@showReviewsForBook');
});











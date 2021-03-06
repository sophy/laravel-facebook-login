<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Register all the admin routes.
|
*/

Route::group(array('prefix' => 'admin'), function()
{

});
/*
|--------------------------------------------------------------------------
| Account Routes
|--------------------------------------------------------------------------
|
|
|
*/

Route::group(array('prefix' => 'account'), function()
{

});
/*
|--------------------------------------------------------------------------
| Account User
|--------------------------------------------------------------------------
|
|
|
*/

Route::group(array('prefix' => 'user'), function()
{
});

/*
|--------------------------------------------------------------------------
| Account User
|--------------------------------------------------------------------------
|
|
|
*/

Route::group(array('prefix' => 'photo'), function()
{
});

/** 
 * Upload photo
 */
Route::get('/upload', 'PhotosController@getUpload');
Route::post('/upload', 'PhotosController@postUpload');
/*
|-----------------  
|Home for test
|-----------------
*/
Route::get('/home', array('as' => 'home', 'uses' => 'HomeController@showWelcome'));

Route::get('/', function()
{
    $data = array();
    if (Auth::check()) {
        $data = Auth::user();
    }
    return View::make('user', array('data'=>$data));
});

Route::get('login/fb', function() {
    $facebook = new Facebook(Config::get('facebook'));
    $params = array(
        'redirect_uri' => url('/login/fb/callback'),
        'scope' => 'email',
    );
    return Redirect::to($facebook->getLoginUrl($params));
});

Route::get('login/fb/callback', function() {
    $code = Input::get('code');
    if (strlen($code) == 0) return Redirect::to('/')->with('message', 'There was an error communicating with Facebook');
    
    $facebook = new Facebook(Config::get('facebook'));
    $uid = $facebook->getUser();
     
    if ($uid == 0) return Redirect::to('/')->with('message', 'There was an error');
     
    $me = $facebook->api('/me');

	$profile = Profile::whereUid($uid)->first();
    if (empty($profile)) {

    	$user = new User;
    	$user->name = $me['first_name'].' '.$me['last_name'];
    	$user->email = $me['email'];
    	$user->photo = 'https://graph.facebook.com/'.$me['username'].'/picture?type=large';

        $user->save();

        $profile = new Profile();
        $profile->uid = $uid;
    	$profile->username = $me['username'];
    	$profile = $user->profiles()->save($profile);
    }
     
    $profile->access_token = $facebook->getAccessToken();
    $profile->save();

    $user = $profile->user;
 
    Auth::login($user);
     
    return Redirect::to('/')->with('message', 'Logged in with Facebook');
});


Route::get('logout', function() {
    Auth::logout();
    return Redirect::to('/');
});

Route::resource('photos', 'PhotosController');

Route::resource('files', 'FilesController');
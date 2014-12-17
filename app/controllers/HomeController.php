<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

    protected $layout = 'layouts.master';

	public function index()
	{
        if (Auth::check()) {
            return Redirect::route('categories.index');
        }

		return View::make('home.index');
	}

    public function logout()
    {
        Auth::logout();
        return Redirect::route('home.index');
    }

    public function login()
    {
        if (Input::has('email') || Input::has('password')) {

            $rules = array(
                'email' => 'required|email',
                'password' => 'required|min:6'
            );

            $validator = Validator::make(Input::all(), $rules);

            if ($validator->fails()) {

                return Redirect::route('home.login')->withErrors($validator);
            }

            if (Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password'), 'confirmed' => 1), true)) {
                return Redirect::intended('/categories')->with('success', 'You have been logged in.');
            } else {
                return View::make('home.login')->withErrors(array('error' => 'Incorrect email or password.'));
            }
        }
        
        return View::make('home.login');
    }

    public function register()
    {
        if (Input::has('email') ||Input::has('password') || Input::has('password_confirmation')) {

            $rules = array(
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6|confirmed'
            );

            $validator = Validator::make(Input::all(), $rules);

            if ($validator->fails()) {

                return Redirect::route('home.register')->withErrors($validator);
            }

            $user = new User();
            $user->email = Input::get('email');
            $user->password = Hash::make(Input::get('password'));

            $user->save();

            return Redirect::intended('/')->with('success', 'Your account has been created.');
        }

        return View::make('home.register', array('error' => 'Incorrect email or password.'));   
    }

}

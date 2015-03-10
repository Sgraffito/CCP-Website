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

	public function showWelcome()
	{
		return View::make('index');
	}

    public function showAbout()
    {
        return View::make('/home/about');
    }
    
    public function showContact() 
    {
        return View::make('/home/contact');
    }
    
    public function showLocation()
    {
        return View::make('/home/location');
    }
    public function showLogin() 
    {
        // Show the form
        return View::make('/home/login');
    }
    public function doSignUp() {
        
        // Validate the info, create rules for inputs,
        $rules = array(
            'signup-username' => 'required|min:6|unique:users,username', // Username must be unique in users table
            'signup-email' => 'required|email',
            'signup-password' => 'required|min:6|',
            'signup-confirm-password' =>'same:signup-password', // 2 passwords must be the same
        );
        
        // Run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);
        
        // If the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::to('login')
                ->withErrors($validator) // send back all errors to the login form
                ->withInput(Input::except('signup-password', 'signup-confirm-password'))
                ->with('signup-error', 'signup-error');
        }
        // Add the data to the user table
        else {
            $user = new User;
			$user->username = Input::get('signup-username');
			$user->email = Input::get('signup-email');
			$user->password = Hash::make(Input::get('signup-password'));
//			$user->confirmed = md5(uniqid(mt_rand()));
			$user->save();
            
             Mail::send('mails.welcome', array('username'=>Input::get('signup-username')),
                        function($message){
                            $message->to(Input::get('signup-email'), 
                                         Input::get('signup-username'))->
                                subject('Welcome to the Copper Country Programmers website!');
                        });
            
            //Redirect user to successful sign-up page
            return Redirect::to('successful-signin');
        }
    }
    
    // Process the form
    public function doLogin()
    {
        // Validate the info, create rules for inputs
        $rules = array(
            'username' => 'required', // Username and password are required
            'password' => 'required'
        );
        
        // Run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);
        
        // If the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::to('login')
                ->withErrors($validator) // send back all errors to the login form
                ->withInput(Input::except('password'))
                ->with('login', 'login');

        }
        else {
            
            // Create userdata for authentication
            $userdata = array(
                'username' => Input::get('username'),
                'password' => Input::get('password')
            );
            
            // Checks plaintext password against the hashed password
            // in the database
            if (Auth::attempt($userdata)) {
                // validation successful!
                // redirect them to the secure section or whatever
                // return Redirect::to('secure');
                return Redirect::to('profile');
            }
            else {
                // validation not successful, send back to form
                return Redirect::to('login')
                    ->withErrors($validator)
                    ->withInput(Input::except('password'))
                    ->with('message', 'Username or password is incorrect. Please try again.')
                    ->with('login', 'login');
            }
        }
    }
    public function doLoginAfterSignup()
    {
        // Validate the info, create rules for inputs
        $rules = array(
            'username' => 'required', // Username and password are required
            'password' => 'required'
        );
        
        // Run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);
        
        // If the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::to('successful-signin')
                ->withErrors($validator) // send back all errors to the login form
                ->withInput(Input::except('password'))
                ->with('doLoginAfterSignup', 'doLoginAfterSignup');

        }
        else {
            
            // Create userdata for authentication
            $userdata = array(
                'username' => Input::get('username'),
                'password' => Input::get('password')
            );
            
            // Checks plaintext password against the hashed password
            // in the database
            if (Auth::attempt($userdata)) {
                // validation successful!
                // redirect them to the secure section or whatever
                // return Redirect::to('secure');
                return Redirect::to('profile');
            }
            else {
                // validation not successful, send back to form
                return Redirect::to('successful-signin')
                    ->withErrors($validator)
                    ->withInput(Input::except('password'))
                    ->with('message', 'Username or password is incorrect. Please try again.')
                    ->with('doLoginAfterSignup', 'doLoginAfterSignup');
            }
        }
    }
}

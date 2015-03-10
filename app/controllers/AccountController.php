<?php

class AccountController extends BaseController {

	public function showProgrammingHome()
	{
		return View::make('/programming/programmingHome');
	}

    public function showSuccessfulLogin() 
    {
        return View::make('/accounts/profile');   
    }

    public function showSuccessfulSignUp() 
    {
        return View::Make('/accounts/successful-signin');
    }
    public function showSignOut() 
    {
        Auth::logout();     // log the user out
        Session::flush();   // make sure the user is logged out
        // Go to new page that tells user they logged out successfullly
        return View::Make('/accounts/sign-out');
    }
    public function showMyAccountSettings() 
    {   
        return View::Make('/accounts/my_account_settings');   
    }
    public function doChangePassword()
    {
        // Validate the info, create rules for inputs
        $rules = array(
            'old-password' => 'required', // Username and password are required
            'new-password' => 'required|min:6'
        );
    
        // Run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);
        
        // If the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::to('myAccountSettings')
                ->withErrors($validator) // send back all errors to the login form
                ->withInput(Input::except('old-password', 'new-password'))
                ->with('new-password-error', 'new-password-error');
        }

        $user = Auth::user()->password;
        $oldPass = Input::get('old-password');
        $newPass = Input::get('new-password');

        // Old password is valid
        if (Hash::check($oldPass, $user)) {
            // Save the updated password
            $user = Auth::user();  
			$user->password = Hash::make($newPass);
			$user->save();
            
            // Tell the user their password is saved.
            return Redirect::to('myAccountSettings')
                ->withInput(Input::except('old-password', 'new-password'))
                ->with('message', 'Your password has been changed!')
                ->with('new-password-error', 'new-password-error');
        }
        
        // Old password is not valid
        else {
            return Redirect::to('myAccountSettings')
                ->withErrors($validator) // send back all errors to the login form
                ->withInput(Input::except('old-password', 'new-password'))
                ->with('message', 'Your old password is incorrect. Please try again')
                ->with('new-password-error', 'new-password-error');
        }
    }
    public function doChangeEmail()
    {
        // Validate the info, create rules for inputs
        $rules = array(
            'new-email' => 'required|email'
        );
  
        // Run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);
        
        // If the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::to('myAccountSettings')
                ->withErrors($validator) // send back all errors to the login form
                ->withInput()
                ->with('new-email-error', 'new-email-error');
        }

        $newEmail = Input::get('new-email');
        
        // Save the updated email
        $user = Auth::user();  
        $user->email = $newEmail;
        $user->save();

        // Tell the user their password is saved.
        return Redirect::to('myAccountSettings')
            ->withInput(Input::except('old-password', 'new-password'))
            ->with('message', 'Your email has been updated!')
            ->with('new-email-error', 'new-email-error');
    }
    
    public function doDeleteAccount()
    {
        // Find current user
        $user = User::find(Auth::user()->id);
        
        // Logout before deleting the user
        Auth::logout();

        // Delete the user
        if ($user->delete()) {
		  return View::make('/accounts/account-delete');
        }   
    }
}


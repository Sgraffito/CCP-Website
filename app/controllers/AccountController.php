<?php

class AccountController extends BaseController {

	public function showProgrammingHome()
	{
		return View::make('/programming/programmingHome');
	}

    public function showSuccessfulLogin() 
    {
        $projects = DB::table('projects')->where('user_id', Auth::user()->id)->get();

        return View::make('/accounts/profile')->with('currentUserWork', $projects);   
    }
    
    public function showHelp() 
    {
        return View::make('/help/help');   
    }
    
    public function showSuccessfulSignUp() 
    {
        return View::Make('/accounts/successful-signin');
    }
    
    public function showStudentWork() {
        
        $test = DB::table('projects')->where('project_public', 1)->get();
        $projects = DB::table('projects')
            ->leftJoin('users', 'users.id', '=', 'projects.user_id')
            ->where('project_public', 1)
            ->get();

        return View::Make('/home/student-work')->with('studentWork', $projects);
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
    
    public function doUploadPhoto()
    {
        if (Input::hasFile('file')) {
            //return Input::file('file')->getClientOriginalName();
        }
        
        // Validate the info, create rules for inputs
        $rules = array(
            //The file under validation must be an image (jpeg, png, bmp, gif, or svg)
            'file' => 'required|image'
        ); 
        
        // Run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);
        
        // If the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::to('myAccountSettings')
                ->withErrors($validator) // send back all errors to the login form
                ->withInput()
                ->with('user-photo-error', 'user-photo-error');
        }

        // Validator is successful
        else {
            // If file is valid, upload file to given path
            if (self::correct_size(Input::file('file'))) {
                $destinationPath = 'public/assets/uploads'; // upload path
                
                // getting image extension
                $extension = Input::file('file')->getClientOriginalExtension(); 
                $fileName = rand(11111,99999).'.'.$extension; // renaming image
                
                // uploading file to given path
                Input::file('file')->move($destinationPath, $fileName); 
                
                // Save image to database
                $user = Auth::user();  
                $user->photo_file_name = $fileName;
                $user->save();

                // sending back with message
                Session::flash('success', 'You have a new profile picture!'); 
                return Redirect::to('myAccountSettings');
            }
            
            // If file is not valid, send back error message
            else {
                // sending back with error message.
                Session::flash('error', 'Uploaded file is not at least 300x300 pixles');
                return Redirect::to('myAccountSettings');
            }
        }
    }
    
    public function correct_size($photo) 
    {
        $minHeight = 300;
        $minWidth = 300;
        list($width, $height) = getimagesize($photo);
        return ( ($width >= $minWidth) && ($height >= $minHeight) );
    }
    
    public function doUploadProcessingProject() 
    {
        if (Input::hasFile('file')) {
            //return Input::file('file')->getClientOriginalName();
            //return Input::file('file')->getClientOriginalExtension();
        }
        
        // Validate the info, create rules for inputs
        $rules = array(
            'project-name' => 'required|max:100',
            'file' => 'required',
            'project-notes' => 'max:255'
        );
        
        // Run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);
        
        // If the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::to('profile')
                ->withErrors($validator) // send back all errors to the login form
                ->withInput()
                ->with('upload-project-error', 'upload-project-error');
        }
        
        // Validator is successful
        else {
            if (self::correct_file_extension(Input::file('file')->getClientOriginalExtension())) {
                
                $destinationPath = 'public/assets/processing'; // upload path
                
                // getting image extension
                $extension = Input::file('file')->getClientOriginalExtension(); 
                $fileName = rand(11111,99999).'.'.$extension; // renaming image
                
                // uploading file to given path
                Input::file('file')->move($destinationPath, $fileName); 
                
                // Save project to database
                $projects = new Projects;
                $projects->project_name = Input::get('project-name');
                $projects->user_id = Auth::user()->id;
                $projects->project_file_name = $fileName;
                
                $sharing = false;
                $selectedButton = Input::get('sharing', true);
                if ($selectedButton == 'private') {
                    $sharing = false;  
                }
                elseif ($selectedButton == 'public') {
                    $sharing = true;  
                }
                $projects->project_public = $sharing;
                
                $projects->project_notes = Input::get('project-notes');
                $projects->save();
                
                // Sending back with message
                Session::flash('success', 'Your project has been uploaded!'); 
                return Redirect::to('profile');

            }
            else {
                // Sending back with error message.
                Session::flash('error', 'The file should have a .pde extension');
                return Redirect::to('profile');
            }
        }


    
    }
    public function correct_file_extension($file) {
        $fileExtension = 'pde';
        return ( $fileExtension == $file );
    }
}


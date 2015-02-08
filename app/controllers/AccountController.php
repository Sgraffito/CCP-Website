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
}

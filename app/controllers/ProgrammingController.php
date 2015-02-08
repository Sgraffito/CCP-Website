<?php

class ProgrammingController extends BaseController {

	public function showProgrammingHome()
	{
		return View::make('/programming/programmingHome');
	}

}

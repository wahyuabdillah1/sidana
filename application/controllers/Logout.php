<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

	public function index()
	{
		//echo "Hello ini adalah method index dari Product";
        //array
        $this->sesiion->unset_userdata['user_name'];
        redirect('login');
	}

}

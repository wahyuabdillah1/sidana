<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct(){
        parent::__construct();
        //cara load model
        $this->load->model('Home_model');
    }

	public function index()
	{
        $data1['lokasi']= $this->Home_model->getAll()->result_array();
        
        $data['locations'] = [
            ["LOCATION_1", -7.243584299925206, 112.7504381846486],
            ["LOCATION_2", -3.214262963697775, 130.23394183685306],
            ["LOCATION_3", -2.58622915364174, 140.66935195664868],
            ["LOCATION_5", 10.5929, 122.6325]
          ];

     $this->template->load('admin/template','index', $data1);
	}

      
	

}

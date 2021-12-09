<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function index()
	{
		$data['title'] = "Login";
		$this->load->view('admin/login');
	}

        //handler login proses
	public function login_act()
	{
        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $user = $this->db->get('user')->row_array();
        //print_r($user);

        if ($user) {
            //mebuat session dengan nama user_name
            $this->session->set_userdata(['user_name'=>$user['name'],'avatar'=>$user['avatar']]);
            redirect('home');
        } else {
            $this->session->set_flashdata('message','Username Atau Password Salah');
            redirect('login');
        }
       // if($email=='admin@gmail.com' && $password=='password'){
        //    echo "Login Berhasil";
       //  } else {
       //      echo "Login gagal";
       //  }

    }
}

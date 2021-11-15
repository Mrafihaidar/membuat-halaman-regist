<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class auth extends CI_Controller 
{ 
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');   
    }
    public function index()
    {
        $this->load->view('templates/auth_header');
        $this->load->view('auth/login');
        $this->load->view('templates/auth_footer');
    }
    
    public function registration()
    {
        $this->form_validation->set_rules('name','Name','required|trim');
        $this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('password1','password','required|trim|min_length[7]matches[password2]');
        $this->form_validation->set_rules('password2','password','required|trim|matches[password1]');




        if($this->form_validation->run() ==false) {
            $data['title'] = "login";
            $this->load->view('templates/auth_header',$data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        } else {
            echo 'data berhasil ditambahkan!';
        }  

    }
} 

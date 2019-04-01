<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clogin extends CI_Controller { 
    function __construct(){
        parent::__construct();
        
    }
    

    public function index()
    {
        $data=array(
            'title' => 'Login - Kominfo Bengkulu',
            'isi'=> 'Vlogin'
        );
        $error['error']='';
        if($this->session->userdata('login')and $this->session->userdata('status')=='1'){
            redirect('Homepage/index');
        }
      else{
            $this->load->view('Vlogin', $error, $data);
        }   
    }
    
    public function Log(){
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username','username','trim|required|callback_check_user_login');
        $this->form_validation->set_rules('pass','pass','trim|required');
        
        
        if($this->form_validation->run() == false){
            $this->index();
        }else{
            if($this->session->userdata('status') == '1' ){
                redirect ('Homepage/index');
            }
            
        }
    }
    
        
    public function check_user_login(){
        $username = $this->input->post('username');
        $password = $this->input->post('pass');
        $this->load->model('Model');
        $result = $this ->Model->login($username,$password);
        if($result){
            foreach ($result as $user){
                $data = array();
                $data['login']          = 1;
                $data['username']       = $user->username;
                $data['pass']           = $user->pass;
                $data['status']         = $user->status;
                $this->session->set_userdata($data);
            }
        }else{
            if($password == ''){
            $this->form_validation->set_message('check_user_login');
            }else{
            $this->form_validation->set_message('check_user_login','Password and username is wrong.');
            return false;
            }   
        }
        
    }
    

    function logout() {
$this->session->sess_destroy();
            redirect('Clogin/index');
    }
}

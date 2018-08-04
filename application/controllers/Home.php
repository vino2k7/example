<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller 
{

	public function __construct()
	{
	     parent::__construct();	
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('user_model');
	}

	public function index()
	{
		$this->load->view('view_home');
	}

	public function register()
	{
		
           $this->form_validation->set_rules('uname','Username','required');
           $this->form_validation->set_rules('pword','Password','required');
           $this->form_validation->set_rules('email','Email','required');
           $this->form_validation->set_rules('gender','Gender','required');
           $this->form_validation->set_rules('mob','Mobile','required');

           
        if($this->form_validation->run()==false) 
        {
		     $this->load->view('view_register');

        }else {

		$data = array(
                     'uname'=>$this->input->post('uname'),
                     'pword'=>md5($this->input->post('pword')),
                     'email'=>$this->input->post('email'),
                     'gender'=>$this->input->post('gender'),
                     'mobile'=>$this->input->post('mob'),
                     'status'=>'1'
		             );

        $res = $this->user_model->reg_insert($data);

        if($res==TRUE)
        {
        	$data['msg'] = "Registration Successfully";
        	$this->load->view('view_home',$data);
        }else {

        	$data['msg'] = " Username Already exists";
        	$this->load->view('view_register',$data);
        }	
           
           
        }
    }

    public function login()
    {
    	$this->form_validation->set_rules('uname','Username','required');
        $this->form_validation->set_rules('pword','Password','required');
    	if($this->form_validation->run()==false) 
    	{
    	 $this->load->view('view_login');
        }else 
        {
        	$data = array(
                        'uname'=>$this->input->post('uname'),
                        'pword'=>md5($this->input->post('pword'))
        	         );
        	$res = $this->user_model->login($data);
            if($res==TRUE)
            {
                $user_name = $this->input->post('uname');
                $result = $this->user_model->user_information($user_name);

                if($result!=false)
                {
                   $sess_data = array(
                   	                 'ID'=>$result[0]['id'],
                   	                 'Username'=>$result[0]['uname']
                                    );
                   $this->session->set_userdata($sess_data);
                   redirect('home/profile');

                }
            }else 
            {
                $data['msg'] = "Invalid Username or Password";
                $this->load->view('view_login',$data);
            }
        }
    }

    public function profile()
    {
        if(!empty($this->session->userdata('ID')))
        {
          $user_id = $this->session->userdata('ID');
          $data['res'] = $this->user_model->user_details($user_id);	
          $this->load->view('view_profile',$data);
        }else 
        {
          redirect('home/index');
        }
    }


    public function update()
    {
            	 //$this->load->view('update_user',$data);

        if(!empty($this->session->userdata('ID'))) {

           $user_id = $this->session->userdata('ID');
           $data['res'] = $this->user_model->user_details($user_id);
           	
    	   $this->form_validation->set_rules('uname','Username','required');
           $this->form_validation->set_rules('email','Email','required');
           $this->form_validation->set_rules('gender','Gender','required');
           $this->form_validation->set_rules('mob','Mobile','required');

           
        if($this->form_validation->run()==false) 
        {
            
            	
		    $this->load->view('update_user',$data);

        }else 
        {

		$data = array(
                     'uname'=>$this->input->post('uname'),
                     'email'=>$this->input->post('email'),
                     'gender'=>$this->input->post('gender'),
                     'mobile'=>$this->input->post('mob'),
                     'status'=>'1'
		             );

        $upd_res = $this->user_model->update_user($user_id,$data);

        if($upd_res==TRUE){
              
               $data['msg'] = "Updated Records Successfully";
               $this->load->view('update_user',$data);

        }


        }

     }else {

     	redirect('home/index');
     }   
   }


    public function logout()
    {
         $sess_data=array('ID'=>'','Username'=>''); 
         $this->session->unset_userdata($sess_data);
         $this->session->sess_destroy();
         redirect('home/index'); 
    }

}    
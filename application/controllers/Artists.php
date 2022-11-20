<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artists extends CI_Controller {


    public function __construct(){
        parent::__construct();
        $this->load->model('core_model');
        $this->load->model('user_model');
    }

    public function index()
    {
        if(isset($this->session->userdata['user_id']) && $this->session->userdata['login'] == 1 && $this->session->userdata['user_type'] == 'artist'){
            redirect(base_url()."artists/dashboard");
            exit();
        }else{
            $this->load->view('artists/login');
        }
    }

    public function dashboard(){
        if(isset($this->session->userdata['user_id']) && $this->session->userdata['login'] == 1 && $this->session->userdata['user_type'] == 'artist'){
            $data['artist'] = $this->user_model->get_user($table = 'artists');
            $this->load->view('artists/profile',$data);
        }else{
            redirect(base_url()."artists");
            exit();
        }
    }

    public function register()
    {
        if(isset($this->session->userdata['user_id']) && $this->session->userdata['login'] == 1 && $this->session->userdata['user_type'] == 'artist'){
            redirect(base_url()."artists/dashboard");
            exit();
        }else{
            $this->load->view('artists/register');
        }
    }

    public function processs_signup(){
        if(isset($this->session->userdata['user_id']) && $this->session->userdata['login'] == 1 && $this->session->userdata['user_type'] == 'artist'){
            redirect(base_url()."artists/dashboard");
            exit();
        }else{
            $data = array('status' => 0, 'message' => 'There was something wrong');

            if($this->input->is_ajax_request()){
                $this->form_validation->set_rules('name', "Name", "trim|required|min_length[3]|max_length[64]");
                $this->form_validation->set_rules('email', "Email", "trim|valid_email|required|min_length[3]|max_length[1024]");
                $this->form_validation->set_rules('password', "password", "trim|required|min_length[3]|max_length[1024]");
                $this->form_validation->set_rules('passconf', "Confirm Password", "trim|required|matches[password]");
                $this->form_validation->set_rules('type', "Type of photography", "trim|required|min_length[3]|max_length[64]");
                $this->form_validation->set_rules('experience', "Number of experience years", "trim|required|min_length[1]|max_length[2]");
                $this->form_validation->set_rules('gender', "Gender", "trim|required|min_length[1]|max_length[24]");
                $this->form_validation->set_rules('description', "Description", "trim|required|min_length[12]|max_length[100]");

                if ($this->form_validation->run() == FALSE){
                    $data = array('status' => 0, 'message' => validation_errors());
                }
                else
                {
                    $data = array(
                        'name'     => $this->input->post('name'),
                        'email'	   => $this->input->post('email'),
                        'password' => sha1($this->input->post('password')),
                        'type'     => $this->input->post('type'),
                        'experience'     => $this->input->post('experience'),
                        'gender'     => $this->input->post('gender'),
                        'description'     => $this->input->post('description'),
                    );
                    if($this->user_model->registration($data, $table = 'artists')){

                        $data = array('status' => 1, 'message' => "Success");

                    }else{
                        $data = array('status' => 0, 'message' => "Something went wrong,Contact with the administors");
                    }

                }
            } else{
                echo "Direct script not allowed";
            }

            echo json_encode($data);
            session_write_close();
        }

    }

    public function processs_signin(){
        if(isset($this->session->userdata['user_id']) && $this->session->userdata['login'] == 1 && $this->session->userdata['user_type'] == 'artist'){
            redirect(base_url()."artists/dashboard");
            exit();
        }else{
            $data = array('status' => 0, 'message' => 'There was something wrong');

            if($this->input->is_ajax_request()){
                $this->form_validation->set_rules('email', "Email", "trim|valid_email|required");
                $this->form_validation->set_rules('password', "password", "trim|required");

                //$data = array('status' => 1, 'message' => $_POST['name']);
                if ($this->form_validation->run() == FALSE){
                    $data = array('status' => 0, 'message' => validation_errors());
                }
                else
                {
                    $data = array(
                        'email' => $this->input->post('email'),
                        'password' => sha1($this->input->post('password'))
                    );
                    $verify = $this->user_model->login($data,'artists');
                    if($verify->num_rows() > 0){

                        $user_id = $verify->row()->id;

                        $session_data = array(
                            'user_id' => $user_id,
                            'login'	  => true,
                            'user_type'    => 'artist'
                        );

                        $this->session->set_userdata($session_data);

                        $data = array('status' => 1, 'message' => "Success");

                    }else{
                        $data = array('status' => 0, 'message' => "Incorrect Email Or Password");
                    }

                }
            } else{
                echo "Direct script not allowed";
            }

            echo json_encode($data);
            session_write_close();
        }
    }

    public function update(){
        if(isset($this->session->userdata['user_id']) && $this->session->userdata['login'] == 1 && $this->session->userdata['user_type'] == 'artist'){
            $data = array('status' => 0, 'message' => 'There was something wrong');

            if($this->input->is_ajax_request()){
                $this->form_validation->set_rules('name', "Name", "trim|required|min_length[3]|max_length[64]");
                $this->form_validation->set_rules('email', "Email", "trim|valid_email|required|min_length[3]|max_length[1024]");
                $this->form_validation->set_rules('type', "Type of photography", "trim|required|min_length[3]|max_length[64]");
                $this->form_validation->set_rules('experience', "Number of experience years", "trim|required|min_length[1]|max_length[2]");
                $this->form_validation->set_rules('gender', "Gender", "trim|required|min_length[1]|max_length[24]");
                $this->form_validation->set_rules('description', "Description", "trim|required|min_length[12]|max_length[100]");

                if ($this->form_validation->run() == FALSE){
                    $data = array('status' => 0, 'message' => validation_errors());
                }
                else
                {
                    $data = array(
                        'name'     => $this->input->post('name'),
                        'email'	   => $this->input->post('email'),
                        'type'     => $this->input->post('type'),
                        'experience'     => $this->input->post('experience'),
                        'gender'     => $this->input->post('gender'),
                        'description'     => $this->input->post('description'),
                    );
                    if($this->user_model->update($data, $table = 'artists')){

                        $data = array('status' => 1, 'message' => "Success");

                    }else{
                        $data = array('status' => 0, 'message' => "Something went wrong,Contact with the administors");
                    }

                }
            } else{
                echo "Direct script not allowed";
            }

            echo json_encode($data);
            session_write_close();
        }else{
            redirect(base_url()."artists");
            exit();
        }
    }

    public function logout(){
        if(isset($this->session->userdata['user_id']) && $this->session->userdata['login'] == 1 && $this->session->userdata['user_type'] == 'artist'){
            $this->session->sess_destroy();
            redirect(base_url().'artists');
            exit();
        }else{
            redirect(base_url().'artists');
            exit();
        }
    }
}

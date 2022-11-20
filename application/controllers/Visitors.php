<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Visitors extends CI_Controller {


    public function __construct(){
        parent::__construct();
            $this->load->model('core_model');
            $this->load->model('user_model');
            $this->load->helper('booking');

    }
    public function index()
    {
        if(isset($this->session->userdata['user_id']) && $this->session->userdata['login'] == 1 && $this->session->userdata['user_type'] == 'visitor'){
            redirect(base_url()."visitors/dashboard");
            exit();
        }else{
            $this->load->view('login');
        }
    }

    public function  dashboard(){
        if(isset($this->session->userdata['user_id']) && $this->session->userdata['login'] == 1 && $this->session->userdata['user_type'] == 'visitor'){
            $data['artists'] = $this->user_model->get_artists();
            $this->load->view('home', $data);
        }else{
            redirect(base_url()."visitors");
            exit();
        }
    }

    public function view($id){
        if(isset($this->session->userdata['user_id']) && $this->session->userdata['login'] == 1 && $this->session->userdata['user_type'] == 'visitor'){

            $user_id = $this->user_model->check_login();
            $data['booked'] = validate_booking($user_id, $id);

            $data['artist'] = $this->user_model->get_artist($id);
            $this->load->view('view', $data);

        }else{
            redirect(base_url()."visitors");
            exit();
        }
    }

    public function booking($artist_id){
        if(isset($this->session->userdata['user_id']) && $this->session->userdata['login'] == 1 && $this->session->userdata['user_type'] == 'visitor'){

            if($artist_id){
                $user_id = $this->user_model->check_login();
                if(!validate_booking($user_id, $artist_id)){
                    $data = array(
                        'artist_id'     => $artist_id,
                        'visitor_id'	   => $user_id,
                        'status' => 1
                    );
                    if($this->user_model->registration($data, $table = 'booking')){

                        redirect(base_url().'visitors/view/'.$artist_id);

                    }else{
                        $data = array('status' => 0, 'message' => "Something went wrong,Contact with the administors");
                    }
                }else{
                    redirect(base_url().'visitors/view/'.$artist_id);
                }
            }

        }else{
            redirect(base_url()."visitors");
            exit();
        }
    }

    public function register()
    {
        if(isset($this->session->userdata['user_id']) && $this->session->userdata['login'] == 1 && $this->session->userdata['user_type'] == 'visitor'){
            redirect(base_url()."visitors/dashboard");
            exit();
        }else{
            $this->load->view('register');
        }
    }

    public function processs_signup(){
        if(isset($this->session->userdata['user_id']) && $this->session->userdata['login'] == 1 && $this->session->userdata['user_type'] == 'visitor'){
            redirect(base_url()."visitors/dashboard");
            exit();
        }else{
            $data = array('status' => 0, 'message' => 'There was something wrong');

            if($this->input->is_ajax_request()){
                $this->form_validation->set_rules('name', "Name", "trim|required|min_length[3]|max_length[64]");
                $this->form_validation->set_rules('email', "Email", "trim|valid_email|required|min_length[3]|max_length[1024]");
                $this->form_validation->set_rules('password', "password", "trim|required|min_length[3]|max_length[1024]");
                $this->form_validation->set_rules('passconf', "Confirm Password", "trim|required|matches[password]");

                //$data = array('status' => 1, 'message' => $_POST['name']);
                if ($this->form_validation->run() == FALSE){
                    $data = array('status' => 0, 'message' => validation_errors());
                }
                else
                {
                    $data = array(
                        'name'     => $this->input->post('name'),
                        'email'	   => $this->input->post('email'),
                        'password' => sha1($this->input->post('password'))
                    );
                    if($this->user_model->registration($data, $table = 'visitors')){

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
        if(isset($this->session->userdata['user_id']) && $this->session->userdata['login'] == 1 && $this->session->userdata['user_type'] == 'visitor'){
            redirect(base_url()."visitors/dashboard");
            exit();
        }else {

            $data = array('status' => 0, 'message' => 'There was something wrong');

            if ($this->input->is_ajax_request()) {
                $this->form_validation->set_rules('email', "Email", "trim|valid_email|required");
                $this->form_validation->set_rules('password', "password", "trim|required");

                //$data = array('status' => 1, 'message' => $_POST['name']);
                if ($this->form_validation->run() == FALSE) {
                    $data = array('status' => 0, 'message' => validation_errors());
                } else {
                    $data = array(
                        'email' => $this->input->post('email'),
                        'password' => sha1($this->input->post('password'))
                    );
                    $verify = $this->user_model->login($data, 'visitors');
                    if ($verify->num_rows() > 0) {

                        $user_id = $verify->row()->id;

                        $session_data = array(
                            'user_id' => $user_id,
                            'login' => true,
                            'user_type' => 'visitor'
                        );

                        $this->session->set_userdata($session_data);

                        $data = array('status' => 1, 'message' => "Success");

                    } else {
                        $data = array('status' => 0, 'message' => "Incorrect Email Or Password");
                    }

                }
            } else {
                echo "Direct script not allowed";
            }

            echo json_encode($data);
            session_write_close();
        }
    }

    public function logout(){
        if(isset($this->session->userdata['user_id']) && $this->session->userdata['login'] == 1 && $this->session->userdata['user_type'] == 'visitor'){
            $this->session->sess_destroy();
            redirect(base_url().'visitors');
            exit();
        }else{
            redirect(base_url()."visitors");
            exit();
        }
    }
}

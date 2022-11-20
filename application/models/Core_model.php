<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Core_model extends CI_Model
{
    public function check_login(){
        if(isset($this->session->userdata['user_id']) && $this->session->userdata['login'] == 1){
            $this->db->where('id', $this->session->userdata['user_id']);
            $this->db->limit(1);
            $query = $this->db->get('visitors');
            return $query->row()->id;
        }
    }

}
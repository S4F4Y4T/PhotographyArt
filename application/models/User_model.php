<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function get_user($table){
        $this->db->where('id', $this->check_login());
        $this->db->limit(1);
        $query = $this->db->get($table);
        return $query->result_array();
    }

    public function check_booking($data){
        $this->db->where('visitor_id', $data['visitor_id']);
        $this->db->where('artist_id', $data['artist_id']);
        return $this->db->get('booking');
    }

    public function check_login(){
        if($this->session->userdata['user_id'] && $this->session->userdata['login'] == 1){
            return $this->session->userdata['user_id'];
        }
    }

    public function get_artist($id){
        $this->db->where('id', $id);
        $this->db->limit(1);
        $query = $this->db->get('artists');
        return $query->result_array();
    }

    public function get_artists(){
        $query = $this->db->get("artists");
        return $query->result_array();
    }

    public function registration($data , $table){
        if($this->db->insert($table, $data)){
            return true;
        }
    }

    public function login($data,$table){
        $this->db->where('email', $data['email']);
        $this->db->where('password', $data['password']);
        return $this->db->get($table);
    }

    public function update($data,$table){
        $this->db->where('id', $this->check_login());
        if($this->db->update($table, $data)){
            return true;
        }
    }

    public function del_account(){
        $this->db->where('id', $this->check_login());
        if($this->db->delete('users')){
            return true;
        }
    }
}
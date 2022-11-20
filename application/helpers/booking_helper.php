<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('validate_booking'))
{
    function validate_booking($v_id, $a_id)
    {
        $CI = get_instance();

        $data = array(
            'visitor_id' => $v_id,
            'artist_id' => $a_id
        );
        $validate = $CI->user_model->check_booking($data);
        if($validate->num_rows() > 0){
            return true;
        }
    }
}
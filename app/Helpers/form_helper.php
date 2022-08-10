<?php
    function display_error($validation, $field) {
        if($validation->hasError($field)){
            return $validation->getError($field);
        } else {
            return false;
        }
    }

    function is_logged_in() {
        // Get current CodeIgniter instance
        $CI =& get_instance();
        // We need to use $CI->session instead of $this->session
        $user = $CI->session->userdata('user_data');
        if (!isset($user)) { return false; } else { return true; }
    }


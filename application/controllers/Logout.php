<?php

/**
 * Created by PhpStorm.
 * User: Joao
 * Date: 09/12/2016
 * Time: 21:27
 */
class Logout extends CI_Controller  {

    public function __construct()
    {
        parent::__construct();

        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->library('user_agent');

    }


    public function logout() {

        //unset the session data
        $session_data =   $this->session->unset_userdata('logged_in');

        $email = $session_data['email'];
        $password = $session_data['password'];

        //destroy the session
        $this->session->sess_destroy();
        //delete cookie
        setcookie('email', $email, time() - 3600 );
        setcookie('password', $password, time() - 3600);
        //redirect the user to the login page
        redirect('Home');
    }

}
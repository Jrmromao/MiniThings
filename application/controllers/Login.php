<?php

/**
 * Created by PhpStorm.
 * User: Joao
 * Date: 09/12/2016
 * Time: 11:11
 */


class login extends CI_Controller
                {

                    public function __construct()
                    {
                        parent::__construct();

                        $this->load->helper('url');
                        $this->load->helper('html');
                        $this->load->helper(array('form'));
                        $this->load->library('session');
                        $this->load->library('form_validation');
                        $this->load->model('LoginModel');
                        $this->load->helper('security');
                        $this->load->library('table');
                        $this->load->helper('cookie');
                        $this->load->library('user_agent');

                    }

                    public function login()
                    {

                        $this->form_validation->set_rules('email', 'Email', 'trim|required');
                        $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');

                        $remember = $this->input->post('remember_me');
                        $email = $this->input->post('remember_me');
                        $password = $this->input->post('remember_me');


                        if ($this->form_validation->run() == false){
                            $this->load->view('login');
                        }

                            else {
                                if ($remember != null) {
                                    setcookie('email', $email, time() + (86400 * 30), "/");
                                    setcookie('password', $password, time() + (86400 * 30), "/");
                                    redirect('Account/profile');
                                } else {
                                    $this->session->set_flashdata('login', '<script>alert("Welcome!"); </script>');
                                    redirect('Account/profile');
                                }
                            }
                    }


                    public function check_database($password) {
                        //only get here if form validation succeeded. now validate the users details against the DB
                        $email = $this->input->post('email');

                        //query the DB
                        $result = $this->LoginModel->login($email,md5($password));

                        //if a valid user
                        if ($result) {

                            $sess_array = array();
                            foreach ($result as $row) {
                                $sess_array = array(
                                    'userID' => $row['customerNumber'],
                                    'email' => $row['email'],
                                    'customerName' =>$row['customerName'],
                                    'password'=>'password'
                                );
                            }
                            $this->session->set_userdata('logged_in', $sess_array);
                            //return true -> we have a valid user
                            return true;
                        } else {
                            $this->form_validation->set_message('check_database', 'Invalid username or password');
                            return false;
                        }
                    }



                    public function loginUser()
                    {
                        $this->form_validation->set_rules('email', 'Email', 'trim|required');
                        $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_databaseUser');



                        if($this->session->userdata('logged_in')){
                            redirect('Account/profile');
                        }else
                        {

                        if ($this->form_validation->run() == false) {
                            $this->session->set_flashdata('response', 'Login Failed!');
                            $this->load->view('User_login');

                        } else {
                            $this->session->set_flashdata('login','<script>alert("Welcome!"); </script>');
                            redirect('Account/profile');
                        }
                        }

                    }



                        public function check_databaseUser($password) {
                            //only get here if form validation succeeded. now validate the users details against the DB
                            $email = $this->input->post('email');

                            //query the DB
                            $result = $this->LoginModel->User_login($email, md5($password));

                            //if a valid user
                            if ($result) {

                                $sess_array = array();
                                foreach ($result as $row) {
                                    $sess_array = array(
                                        'userID' => $row['userID'],
                                        'email' => $row['email'],
                                        'user_cat'=>$row['user_cat'],
                                        'name'=>$row['name'],
                                        'password'=>'password',
                                        'Vendor_Representative' => $row['Vendor_Representative']
                                    );

                                }
                                $this->session->set_userdata('logged_in', $sess_array);
                                //return true -> we have a valid user
                                return true;
                            } else {
                                //return false ->we have an invalid user
                                $this->form_validation->set_message('check_databaseUser', 'Invalid username or password');
                                return false;
                            }

                }


}
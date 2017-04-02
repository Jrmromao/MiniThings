<?php

class Register extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
        $this->load->helper('html');
        $this->load->helper(array('form'));
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('RegisterModel');
        $this->load->library('user_agent');
        $this->load->library('table');
    }

    public function register()
    {
        //$data['title'] = "Register";

        $this->form_validation->set_rules('customerName', 'Customer Name', 'required');
        $this->form_validation->set_rules('contactLastName', 'Customer Last Name', 'required');
        $this->form_validation->set_rules('contactFirstName', 'Customer First Name', 'required');
        $this->form_validation->set_rules('phone', 'Phone Number', 'required');
        $this->form_validation->set_rules('addressLine1', 'Address Line 1', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('country', 'Country', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|is_unique[customers.email]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('repeatPassword', 'Password Confirmation', 'required|matches[password]');




        $data['customerName'] = $this->input->post('customerName');
        $data['contactLastName'] = $this->input->post('contactLastName');
        $data['contactFirstName'] = $this->input->post('contactFirstName');
        $data['phone'] = $this->input->post('phone');
        $data['addressLine1'] = $this->input->post('addressLine1');
        $data['addressLine2'] = $this->input->post('addressLine2');
        $data['city'] = $this->input->post('city');
        $data['country'] = $this->input->post('country');
        $data['email'] = $this->input->post('email');
        $password = $this->input->post('password');
        $data['password'] = md5($password);
        $data['addressLine2'] = $this->input->post('addressLine2');
        $data['state'] = $this->input->post('state');
        $data['postalCode'] = $this->input->post('postalCode');
        $data['creditLimit'] = $this->input->post('creditLimit');



        if ($this->session->userdata('logged_in')) {

            redirect('Account/profile');
        } else {
            if (!$this->form_validation->run()){
                $data['title'] = "Register";
                $this->load->view('register', $data);

            }

            else { //validation passed
                $this->RegisterModel->register($data);

                $data['customerName'] = "";
                $data['contactLastName'] = "";
                $data['contactFirstName'] = "";
                $data['phone'] = "";
                $data['addressLine1'] = "";
                $data['city'] = "";
                $data['country'] = "";
                $data['email'] = "";
                $data['password'] = "";
                $data['addressLine2'] = "";
                $data['state'] = "";
                $data['postalCode'] = "";
                $data['creditLimit'] = "";


                //$this->load->view('index');
                $this->session->set_flashdata('register','<script>alert("You are Now Register!"); </script>');
                 redirect('Login/login');
            }
        }
    }
}

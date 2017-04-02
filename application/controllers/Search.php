<?php

class Search extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('SearchModel');

    }

public function search(){


   // $data['title'] = "Search";
    $search = $this->input->post('search');
    $data['getSearchResults'] = $this->SearchModel->getSearchResults($search);


$this->load->view('product', $data);
}


public function ajaxsearch(){

    $search = $this->input->post('search');
    echo $data['getSearchResults'] = $this->SearchModel->getSearchResults($search);


}


}
<?php

/**
 * Created by PhpStorm.
 * User: jrmromao
 * Date: 20/01/2017
 * Time: 10:33
 */
class Wishlist extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
        $this->load->helper('html');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('WishlistModel');
        $this->load->library('user_agent');


    }

    public function wishlist()
    {

            $session_data = $this->session->userdata('logged_in');
            $productCode = $this->uri->segment(3);

            $data['customerID'] = $session_data['userID'];
            $data['productID'] = $productCode;


        //
        // validate wishlist
        //  if and item with the same itemId and customerIs is already there
        //   the system will prompt the user with an alert box stating that information.
        //
      if($this->WishlistModel->ckeckWishlist_table($data))
        {


            if($this->WishlistModel->addProduct($data)){

                $wishlist['wishlist'] = $this->WishlistModel->getWishlist($session_data['userID']);

                $this->session->set_flashdata('wishlistCount', count($wishlist['wishlist']));
                redirect($this->agent->referrer());

            }




        }

        else{

            $this->session->set_flashdata('alert','<script>alert("This item is already in your Wishlist!"); </script>');
            redirect($this->agent->referrer());
        }


    }


        public function MyWishList(){
            $session_data = $this->session->userdata('logged_in');

            $data['title'] = "Whishlist";
            $data['wishlist'] = $this->WishlistModel->getWishlist($session_data['userID']);




            $this->load->view('myWishlist', $data);

        }



        public function delete(){

            $wishlist_ItemID = $this->uri->segment(3);
            $query = $this->WishlistModel->removeItem($wishlist_ItemID);

            if ($query)
                 redirect($this->agent->referrer());
            else
                return false;

        }

        public function removeAll(){

            $costumerID= $this->uri->segment(3);

            $query = $this->WishlistModel->removeAll($costumerID);

            if ($query)
                redirect($this->agent->referrer());

        }



    }



<?php
/**
 * Created by PhpStorm.
 * User: Joao
 * Date: 16/12/2016
 * Time: 15:07
 */
class Cart extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('html');
        $this->load->helper(array(
            'form'
        ));
        $this->load->library('session');

        $this->load->library('user_agent');
        $this->load->model('CartModel');
        $this->load->library('cart');
        $this->load->model('ProductModel');
        $this->load->model('WishlistModel');


    }

    //
    //  Method to add item to the shopping cart
    //
    public function add()
    {
        $qtyAvailable      = 0;
        $data['productID'] = $this->input->post('id');
        $qtyToOrder        = $this->input->post('qty');
        $qtyValidate       = $this->ProductModel->productDetail($data['productID']);


        foreach ($qtyValidate as $qty) {
            $qtyAvailable = $qty['quantityInStock'];
        }

      if ($qtyToOrder <= $qtyAvailable) {

            $insert_data = array(
                'id' => $this->input->post('id'),
                'name' => $this->input->post('name'),
                'price' => $this->input->post('price'),
                'productDesc' => $this->input->post('productDesc'),
                'image' => $this->input->post('image'),
                'qty' => $qtyToOrder
            );

            $cart = $this->cart->insert($insert_data);
            if ($cart) {


                redirect($this->agent->referrer());

            }
        } else {
            $this->session->set_flashdata('ValidateQTY', '<script>alert("Ups...You are trying to order more\\n units than the ones available!"); </script>');
            redirect($this->agent->referrer());
        }

    }

    //
    //  Main method tto show the shopping cart
    //
    public function cart()
    {
        $this->load->model('ProductModel');
        $data['products'] = $this->cart->contents();
        $data['title']    = "My Cart";


        $this->load->view('myCart', $data);
    }
    //
    //  method that to remove item from the shopping cart
    //
    function remove($rowid)
    {
        if ($rowid === "all") {
            $this->cart->destroy();
        } else {
            $data = array(
                'rowid' => $rowid,
                'qty' => 0
            );
            $this->cart->update($data);
        }
        redirect($this->agent->referrer());
    }
    //
    //  method that to remove all item in the shopping cart
    //
    function removeAll()
    {
        $this->cart->destroy();
        $this->load->view('myCart');
        redirect($this->agent->referrer());
    }
    //
    //  method that to update the item in shopping list
    //
    function update()
    {
        $qtyAvailable = 0;
        $qtyUpdate    = $this->input->post('qty');
        $rowid        = $this->input->post('rowid');
        $id           = $this->input->post('id');

        $qtyValidate = $this->ProductModel->productDetail($id);

        foreach ($qtyValidate as $qty) {
            $qtyAvailable = $qty['quantityInStock'];
        }

        $data['productID'] = $this->input->post('id');
        $qtyValidate = $this->ProductModel->productDetail($data['productID']);

        foreach ($qtyValidate as $qty) {

            $qtyAvailable = $qty['quantityInStock'];
        }

        if ($qtyUpdate <= $qtyAvailable) {
            $data = $this->cart->update(array(
                'rowid' => $this->input->post('rowid'),
                'qty' => $qtyUpdate
            ));
            $this->cart->update($data);
            redirect($this->agent->referrer());
        }

        else {
            $this->session->set_flashdata('ValidateQTY', '<script>alert("Ups...You are trying to order more\\n units than the ones available!"); </script>');
            redirect($this->agent->referrer());
        }


    }




} 
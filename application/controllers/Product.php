<?php

/**
 * Created by PhpStorm.
 * User: Joao
 * Date: 08/12/2016
 * Time: 22:07
 */
class Product extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();


        $this->load->helper('url');
        $this->load->helper('html');
        $this->load->helper(array('form'));
        $this->load->library('session');
        $this->load->model('ProductModel');
        $this->load->library('table');
        $this->load->library('user_agent');
    }



        public function product()
        {


                $data['products'] = $this->ProductModel->viewProduct();
                foreach ($data['products'] as &$row) {
                    $img = $row['image'];
                    $id = $row['productCode'];

                    $row['image'] = img("assets/images/products/" . $img);
                    $row['Action'] = anchor("Product/Details/{$id}", 'View', ['class' => 'btn btn-default add-to fa fa-eye']);
                }


                $tmpl = array(
                    'table_open' => '<table id="productsTable" class="display" cellspacing="0" width="100%" >',
                    'heading_row_start' => '<tr>',
                    'heading_row_end' => '</tr>',
                    'heading_cell_start' => '<th>',
                    'heading_cell_end' => '</th>',
                    'row_start' => '<tr>',
                    'row_end' => '</tr>',
                    'cell_start' => '<td>',
                    'cell_end' => '</td>',
                    'row_alt_start' => '<tr>',
                    'row_alt_end' => '</tr>',
                    'cell_alt_start' => '<td>',
                    'cell_alt_end' => '</td>',
                    'table_close' => '</table>'
                );

                // $data['title'] = "Product";
                $this->table->set_template($tmpl);
                $this->table->set_heading('Product Code', 'Product Name', 'Product Line', 'Product Scale', 'Product Description', 'Quantity in stock', 'Buy Price', 'MSRP', 'Image', 'View Item');
                $this->load->view('Product', $data);
            }


//drill down the image to see the details about this product
    public function Details() {




            $productCode = $this->uri->segment(3);
            $data['details'] = $this->ProductModel->productDetail($productCode);//the product code is coming from the url
            $data['recommendedProd'] = $this->ProductModel->recommendedProd();//the product code is coming from the url
            $data['title'] = "Product Details";
            $this->load->view('ProductDetails', $data);

        }



    public function Delete_product(){

        if ($this->session->userdata('logged_in')) {

            redirect('Home');
        }else {
            $productCode = $this->uri->segment(3);
            if ($this->ProductModel->deleteProduct($productCode))
                redirect($this->agent->referrer());
        }
    }







}
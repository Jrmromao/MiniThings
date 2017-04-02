<?php

/**
 * Created by PhpStorm.
 * User: jrmromao
 * Date: 18/01/2017
 * Time: 11:21
 */
class Add_Item extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('html');
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('Add_ItemModel');
        $this->load->library('form_validation');
        $this->load->model('VendorModel');
        $this->load->library('session');
        $this->load->library('user_agent');
        $this->load->library('upload');
        $this->load->model('HomeModel');

    }

    /**
     * @return object
     */
    public function App_productPage()
    {       if (!$this->session->userdata('logged_in')) {

        redirect('Home');
    }else {
        $session_data = $this->session->userdata('logged_in');


       $productVendorLink = $this->uri->segment(3);

        $productVendor = urldecode($productVendorLink);

        $data['product'] = $this->VendorModel->getProductVendor($productVendor);//the product code is coming from the url
        $data['title'] = "Add Product";
        $data['salesRepre'] = $session_data['Vendor_Representative'];
  $data['categories'] = $this->HomeModel->getAllCategories();
        $this->load->view('add_Product', $data);
       // redirect($this->agent->referrer());

    }
    }


    public function handleProductInput()
    {
        $this->form_validation->set_rules('productCode', 'Product Code', 'required');
        $this->form_validation->set_rules('productName', 'Product Name', 'required');
        $this->form_validation->set_rules('productLine', 'Product Line', 'required');
        $this->form_validation->set_rules('productScale', 'Product Scale', 'required');
        $this->form_validation->set_rules('productVendor', 'Product Vendor', 'required');
        $this->form_validation->set_rules('productDescription', 'Product Description', 'required');
        $this->form_validation->set_rules('productQuantity', 'Product Quantity', 'required');
        $this->form_validation->set_rules('productPrice', 'Product Price', 'required');
        $this->form_validation->set_rules('MSRP', 'MSRP', 'required');
        $this->form_validation->set_rules('productImage', 'productImage', 'required');


        $data['productCode'] = $this->input->post('productCode');
        $data['productName'] = $this->input->post('productName');
        $data['productLine'] = $this->input->post('productLine');
        $data['productScale'] = $this->input->post('productScale');
        $data['productVendor'] = $this->input->post('productVendor');
        $data['productDescription'] = $this->input->post('productDescription');
        $data['quantityInStock'] = $this->input->post('productQuantity');
        $data['buyPrice'] = $this->input->post('productPrice');
        $data['MSRP'] = $this->input->post('MSRP');
        $data['image'] = $_FILES['productImage']['name'];

        return $data;
    }


    public function addProduct()
    {
        if (!$this->session->userdata('logged_in')) {

            redirect('Home');
        } else {
            if ($this->input->post('submitButton')) {

                $pathToFile = $this->uploadResizeFile();
                $this->createThumbnail($pathToFile);

                $aProduct = $this->handleProductInput();

                // Check if the form has passed validation, if it fails then reload the view and pass it the array of
                // values to repopulate the form.

                // If insert has been successful
                if ($this->Add_ItemModel->addProduct($aProduct)) {
                    redirect($this->agent->referrer());
                } else {
                    $data['message'] = "Uh oh... problem on insert";
                    $this->load->view('add_Product', $data);
                }


                return;
            }
            $aProduct['productCode'] = "";
            $aProduct['productName'] = "";
            $aProduct['productLine'] = "";
            $aProduct['productScale'] = "";
            $aProduct['productVendor'] = "";
            $aProduct['productDescription'] = "";
            $aProduct['quantityInStock'] = "";
            $aProduct['buyPrice'] = "";
            $aProduct['MSRP'] = "";


            // Load the form any time this function is called through the URL in the browser
            $this->load->view('addProduct', $aProduct);

        }
    }

    function uploadResizeFile()
    {


        $config['upload_path'] = './assets/images/products/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '100';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload())
            echo $this->upload->display_errors();
        else
            echo  "Upload is done !";
        $upload_data = $this->upload->data();
        $res['picname']= $upload_data['raw_name'].$upload_data['file_ext'];
        $path = $upload_data['full_path'];
        $res['path']=$path;
        $config['source_image'] = $path;
        $config['maintain_ratio'] = FALSE;
        $config['width'] = 180;
        $config['height'] = 200;

        $this->load->library('image_lib', $config);

        if (!$this->image_lib->resize())
            echo $this->image_lib->display_errors();

        $this->image_lib->clear();

        return $path;
    }


    function createThumbnail($path)
    {
        $config['source_image'] = $path;
        $config['new_image'] = './assets/images/thumbs/';
        $config['maintain_ratio'] = FALSE;
        $config['width'] = 42;
        $config['height'] = 42;

        $this->image_lib->initialize($config);
        if (!$this->image_lib->resize()) {

            echo $this->image_lib->display_errors();

        }


    }
}
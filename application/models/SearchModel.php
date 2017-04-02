<?php

class SearchModel extends  CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }


    function getSearchResults($search, $description = TRUE ){

        $this->db->like('productName'. $search);
        $this->db->order_by('productName');
        $query = $this->db->get('products');

        if($query->num_rows() > 0){
            $output = '<ul>';
                    foreach ($query->result() as $search){

                        if($description){
                            $output .='<li><strong>'.$search->productName.'</strong><br>'.$search->productDescription.'</li>';

                        }else{
                            $output .='<li>'.$search->productName.'</li>';
                        }

                }
            $output .= '</ul>';

return $output;
        }else{
            return '<p>No Results</p>';
        }



    }


}
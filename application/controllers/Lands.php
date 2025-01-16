<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lands extends CI_Controller {

    public function __construct() {
        parent::__construct();

        // Load the session library
        $this->load->library('session');

        // Load any other required models or libraries
        $this->load->model('User_model');
    }

    public function Types()
	{   
        $this->load->view('header'); 
        $this->load->view('sidebar');
		$this->load->view('landtypes');
		$this->load->view('footer'); 
	}
    public function Category()
	{   
        $data['categories'] = $this->User_model->get_all_categories();
        $this->load->view('header'); 
        $this->load->view('sidebar');
        $this->load->view('land-category', $data);
		$this->load->view('footer'); 
	}
    public function insert_category() {
        $category = $this->input->post('category'); 
        // Prepare data for insertion
        $data = [
            'Category' => $category, 
        ];

        $inserted = $this->User_model->insert_category_db($data);

        if ($inserted) {
            $this->session->set_flashdata('success', 'Category added successfully!');
        } else {

            $this->session->set_flashdata('error', 'Failed to add category.');
        }

        redirect('Lands/Category');
    }
  
}

?>
    
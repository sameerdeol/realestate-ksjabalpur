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
<<<<<<< HEAD
    // public function edit(){
        
    // }
    public function getCategoryData() {
        $id = $this->input->post('id'); // Get the ID from the AJAX request
        if (!empty($id)) {
            $this->db->where('id', $id);
            $query = $this->db->get('land_categories'); // Replace 'categories' with your table name
            $category = $query->row_array();
    
            if ($category) {
                echo json_encode(['success' => true, 'data' => $category]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Category not found']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid ID']);
        }
    }

    public function updateCategory() {
        $id = $this->input->post('category_id'); // Get the ID
        $name = $this->input->post('category_name'); // Get the updated name
    
        if (!empty($id) && !empty($name)) {
            $update_data = ['Category' => $name];
    
            $this->db->where('id', $id);
            if ($this->db->update('land_categories', $update_data)) {
                echo json_encode(['success' => true, 'message' => 'Category updated successfully']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to update category']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid input']);
        }
    }

    public function deleteCategory(){
    // Get the category ID from the POST data
        $category_id = $this->input->post('category_id');

        if ($category_id) {
            // Attempt to delete the category from the database
            $this->db->where('id', $category_id);
            $this->db->delete('land_categories'); // Replace 'categories' with your actual table name

            if ($this->db->affected_rows() > 0) {
                // Send a success response
                echo json_encode(['success' => true]);
            } else {
                // Send an error response if no rows were affected
                echo json_encode(['success' => false, 'message' => 'Failed to delete category']);
            }
        } else {
            // Send an error response if no ID is provided
            echo json_encode(['success' => false, 'message' => 'No category ID provided']);
        }
    }

        
=======
    public function edit(){
        
    }
>>>>>>> 311645cad6a6f531e472a467b564ef451706ad87
  
}

?>
    
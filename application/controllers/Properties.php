<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Properties extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	 
	public function __construct() {
        parent::__construct();
        // Check if the user is logged in
        // if (!$this->session->userdata('user_id')) {
        //     redirect('dashboard'); // Redirect to login if not logged in
        // }
		$this->load->library('session');
		 $this->load->helper('url');
        $this->load->helper('file');
		$this->load->library('upload');
        // Load any other required models or libraries
        $this->load->model('User_model');
    }
	
	public function index(){
		$data['categories'] = $this->User_model->get_all_categories();
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('properties',$data);
		$this->load->view('footer');
	}
	public function submitPropertyDetail() {
		// Get the form inputs
		$property_name = $this->input->post('property_name');
		$previous_price = $this->input->post('previous_price');
		$current_price = $this->input->post('current_price');
		$property_address = $this->input->post('property_address');
		$land_category = $this->input->post('land_category');
		$property_area = $this->input->post('property_area');
		$Constructed_date = $this->input->post('Constructed_date');
		$builder_name = $this->input->post('builder_name');
		$finance_aproval = $this->input->post('finance_aproval');
	
		// Prepare data for insertion into property details table
		$property_data = [
			'property_name' => $property_name,
			'property_address' => $property_address,
			'land_category' => $land_category,
			'property_area' => $property_area,
			'Constructed_date' => $Constructed_date,
			'builder_name' => $builder_name,
			'finance_aproval' => $finance_aproval,
		];
	
		// Prepare data for insertion into price and category table
		$price_data = [
			'property_name' => $property_name,
			'land_category' => $land_category,
			'current_price' => $current_price,
			'previous_price' => $previous_price,
		];
	
		// Begin transaction to ensure both insertions are successful
		$this->db->trans_start();
	
		// Insert property details into the database
		$this->User_model->insert_property_docs($property_data);
		
		// Insert price and category information into the database
		$this->User_model->insert_property($price_data);
	
		// Get the last inserted property ID
		$property_id = $this->db->insert_id();
	
		// If files are uploaded, handle them after data insertion
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES['property_images']['name'][0])) {
			$upload_path = './uploads/property_images/'; // Define upload path
	
			// Prepare to store the uploaded file paths
			$uploaded_file_paths = [];
	
			// Loop through all the uploaded files
			$files = $_FILES['property_images'];
			$file_count = count($files['name']);
	
			for ($i = 0; $i < $file_count; $i++) {
				$_FILES['file']['name'] = $files['name'][$i];
				$_FILES['file']['type'] = $files['type'][$i];
				$_FILES['file']['tmp_name'] = $files['tmp_name'][$i];
				$_FILES['file']['error'] = $files['error'][$i];
				$_FILES['file']['size'] = $files['size'][$i];
	
				// Set upload configuration for each file
				$config['upload_path'] = $upload_path;
				$config['allowed_types'] = 'jpg|jpeg|png|gif';
				$config['max_size'] = 2048; // Max size in KB
				$config['file_name'] = uniqid('property_'); // Ensure unique filenames
	
				$this->upload->initialize($config);
	
				// Upload the file
				if ($this->upload->do_upload('file')) {
					// Get uploaded file data
					$upload_data = $this->upload->data();
					$uploaded_file_paths[] = $upload_data['file_name']; // Save filename
				} else {
					// Handle upload error (optional)
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('error', 'Error uploading images: ' . $error);
					redirect('properties'); // Redirect back to form with error
					return;
				}
			}
	
			// After uploading, save the paths in the database
			if (!empty($uploaded_file_paths)) {
				// Use the property ID from the insertion to save images
				$this->saveImagePathsToDatabase($property_id, $uploaded_file_paths);
			}
		}
	
		// Complete the transaction
		$this->db->trans_complete();
	
		// Check transaction status
		if ($this->db->trans_status() === TRUE) {
			$this->session->set_flashdata('success', 'Property added successfully!');
		} else {
			$this->session->set_flashdata('error', 'Failed to add Property.');
		}
	
		// Redirect after successful submission
		redirect('Properties');
	}
	
	// Function to save image paths to the database
	public function saveImagePathsToDatabase($property_id, $uploaded_file_paths)
	{
		// Prepare data for the database (e.g., multiple image paths for the property)
		$data = [
			'property_id' => $property_id, // Use the actual property ID
			'image_paths' => json_encode($uploaded_file_paths) // Save as JSON array in the database
		];
	
		// Insert into the database (you can create your own method in the model)
		$this->User_model->savePropertyImages($data);
	}
	
}

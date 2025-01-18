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
		$data['property_details'] = $this->User_model->get_all_properties();
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
	
		// Prepare data for insertion into price and category table
		$price_data = [
			'current_price' => $current_price,
			'previous_price' => $previous_price,
			'property_name' => $property_name,
			'land_category' => $land_category,
			'property_area' => $property_area,
			'property_address' => $property_address,
			'Constructed_date' => $Constructed_date,
			'builder_name' => $builder_name,
			'finance_aproval' => $finance_aproval,
		];
	
		try {
			$this->db->insert('properties', $price_data);
			$property_id = $this->db->insert_id(); // Get the last inserted property ID
	
			// Image upload directories
			$upload_path_main = 'uploads/banner_property_images/';
			$upload_path_images = 'uploads/property_images/';
			$this->createUploadDirectory($upload_path_main);
			$this->createUploadDirectory($upload_path_images);
	
			// Main image upload configuration
			$config_main = [
				'upload_path'   => $upload_path_main,
				'allowed_types' => 'jpg|jpeg|png|gif',
				'max_size'      => 2048, // 2MB max size
				'encrypt_name'  => true,
			];
			$this->upload->initialize($config_main);
	
			// Main image upload
			if ($_FILES['main_property_image']['name']) {
				if ($this->upload->do_upload('main_property_image')) {
					$upload_data = $this->upload->data();
					$main_image_data = [
						'property_id'   => $property_id,
						'main_img_path' => $upload_path_main . $upload_data['file_name'],
					];
					$this->db->insert('property_main_dispaly_img', $main_image_data);
				} else {
					throw new Exception("Main property image upload failed: " . $this->upload->display_errors());
				}
			}
	
			// Reinitialize for multiple image uploads
			$config_multiple = [
				'upload_path'   => $upload_path_images,
				'allowed_types' => 'jpg|jpeg|png|gif',
				'max_size'      => 2048, // 2MB max size
				'encrypt_name'  => true,
			];
			$this->upload->initialize($config_multiple);
	
			// Handle multiple image uploads
			$files = $_FILES['property_images'];
			$uploaded_images = [];
			for ($i = 0; $i < count($files['name']); $i++) {
				$_FILES['file']['name'] = $files['name'][$i];
				$_FILES['file']['type'] = $files['type'][$i];
				$_FILES['file']['tmp_name'] = $files['tmp_name'][$i];
				$_FILES['file']['error'] = $files['error'][$i];
				$_FILES['file']['size'] = $files['size'][$i];
	
				if ($this->upload->do_upload('file')) {
					$upload_data = $this->upload->data();
					$uploaded_images[] = [
						'property_id' => $property_id,
						'image_paths' => $upload_path_images . $upload_data['file_name'],
					];
				}
			}
	
			if (!empty($uploaded_images)) {
				$this->db->insert_batch('property_images', $uploaded_images);
			}
	
			// Set a success message in session
			$this->session->set_flashdata('success_message', 'Property details have been successfully submitted.');
	
		} catch (Exception $e) {
			// In case of an error, set the error message in session
			$this->session->set_flashdata('error_message', 'Error: ' . $e->getMessage());
		}
	
		// Redirect to the properties page or wherever you want after submission
		redirect('Properties');
	}
	
	private function createUploadDirectory($path) {
		if (!is_dir($path)) {
			mkdir($path, 0777, true); // Create directory if not exists
		}
	}
	
	
	public function edit_property($id){
    // Fetch the property details based on the ID
		$property = $this->User_model->get_property_by_id($id);
        $property_images = $this->User_model->get_property_images_by_id($id);
		if ($property) {
			// Pass the property data to the view for editing
			$data['property'] = $property;
			$data['property_images'] = $property_images; 
			$this->editForm($data);  // Load the edit view with the property data
		} else {
			// Redirect back or show an error message if the property does not exist
			redirect('properties'); // Or show an error page
		}
	}
	public function editForm($data){
		$data['categories'] = $this->User_model->get_all_categories();
		// $data['property_images'] = $this->User_model->get_property_images_by_id($id);
        $this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('property-edit-form', $data);
		$this->load->view('footer');
	}

	public function update_property($id) {
		$property_name = $this->input->post('property_name');
		$previous_price = $this->input->post('previous_price');
		$current_price = $this->input->post('current_price');
		$property_address = $this->input->post('property_address');
		$land_category = $this->input->post('land_category');
		$property_area = $this->input->post('property_area');
		$Constructed_date = $this->input->post('Constructed_date');
		$builder_name = $this->input->post('builder_name');
		$finance_aproval = $this->input->post('finance_aproval');
	
		// Update the property in the database
		$data = [
			'property_name' => $property_name,
			'previous_price' => $previous_price,
			'current_price' => $current_price,
			'property_address' => $property_address,
			'land_category' => $land_category,
			'property_area' => $property_area,
			'Constructed_date' => $Constructed_date,
			'builder_name' => $builder_name,
			'finance_aproval' => $finance_aproval
		];
	
		$this->User_model->update_property($id, $data);
	
		// Redirect or show success message
		redirect('properties'); // or show success message
	}

	
}

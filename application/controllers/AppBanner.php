<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AppBanner extends CI_Controller {

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
        //     redirect('appbanner'); // Redirect to login if not logged in
        // }
    }
	
	public function index(){
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('appbanner');
		$this->load->view('footer');
	}
    public function submitAppBannerImage() {
        // Directory to save uploaded images
        $upload_path = 'uploads/app_banner_images/';
        $this->createUploadDirectory($upload_path);
    
        // Configure upload settings
        $config = [
            'upload_path'   => $upload_path,
            'allowed_types' => 'jpg|jpeg|png|gif',
            'max_size'      => 2048, // 2MB max size
            'encrypt_name'  => true, // Save images with encrypted names
        ];
        $this->load->library('upload', $config);
    
        $files = $_FILES['AppBanner_images'];
        $uploaded_images = [];
    
        try {
            // Process each file
            for ($i = 0; $i < count($files['name']); $i++) {
                $_FILES['file']['name'] = $files['name'][$i];
                $_FILES['file']['type'] = $files['type'][$i];
                $_FILES['file']['tmp_name'] = $files['tmp_name'][$i];
                $_FILES['file']['error'] = $files['error'][$i];
                $_FILES['file']['size'] = $files['size'][$i];
    
                // Upload file
                if ($this->upload->do_upload('file')) {
                    $upload_data = $this->upload->data();
                    $uploaded_images[] = [
                        'image_path' => $upload_path . $upload_data['file_name'],
                        'uploaded_at' => date('Y-m-d H:i:s'),
                    ];
                } else {
                    throw new Exception("File upload failed: " . $this->upload->display_errors());
                }
            }
    
            // Insert image paths into the database
            if (!empty($uploaded_images)) {
                $this->db->insert_batch('app_banner_images', $uploaded_images);
            }
    
            // Set success message
            $this->session->set_flashdata('success_message', 'App banner images have been successfully uploaded.');
        } catch (Exception $e) {
            // Set error message
            $this->session->set_flashdata('error_message', 'Error: ' . $e->getMessage());
        }
    
        // Redirect to the desired page
        redirect('AppBanner');
    }
    
    private function createUploadDirectory($path) {
        if (!is_dir($path)) {
            mkdir($path, 0777, true); // Create the directory if it doesn't exist
        }
    }
}

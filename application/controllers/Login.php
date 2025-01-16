<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    
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

        // Load the session library
        $this->load->library('session');

        // Load any other required models or libraries
        $this->load->model('User_model');
    }

	public function index()
	{   
        // $this->load->view('login-header'); 
		$this->load->view('login');
		// $this->load->view('footer'); 
	}

	    // Method to verify user login
	public function verify() {
			// Get form data
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			// Verify user credentials
			$user = $this->User_model->verify_user($email, $password);
	        
			if ($user) {
				// Set session data
				$this->session->set_userdata('user_id', $user->id); // assuming 'id' is the primary key
	
				// Redirect to the dashboard
				redirect('dashboard'); // Replace 'dashboard' with your actual dashboard controller
			} else {
				// If login failed, redirect back with an error message
				$this->session->set_flashdata('error', 'Invalid email or password');
				redirect('login');
			 // Redirect back to the login page
			}
	}

	public function logout() {
        $this->session->sess_destroy(); // Destroy the session
        redirect('login'); // Redirect to the login page
    }
}

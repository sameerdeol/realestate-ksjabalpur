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
    }
	
	public function index(){
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('properties');
		$this->load->view('footer');
	}
}

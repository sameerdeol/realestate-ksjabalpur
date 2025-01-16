
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Connection extends CI_Controller {

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

        // Load the database library
        $this->load->database();
    }

    public function index() {
        // Test database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "ks_jabalpur";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $database);

          // Check connection
          $data = []; // Initialize an array to store the message
          if ($conn->connect_error) {
              $data['message'] = "Connection failed: " . $conn->connect_error;
          } else {
              $data['message'] = "Connected successfully!";
          }

        echo "Connected successfully!";

        $this->load->view('connection', $data);
            }
            
    public function check(){
        
        $this->load->view('template/Compiled/index'); 

            }
}

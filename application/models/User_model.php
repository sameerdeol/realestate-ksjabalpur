<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database(); // Load the database
    }

    public function verify_user($email, $password) {

    $this->db->where('email', $email);
    $query = $this->db->get('admin_detail');

    if ($query->num_rows() == 1) {
        // Fetch the user data
        $user = $query->row();
        if($password == $user->password){
            return $user;
        }
    }
    return false;
    }

    public function insert_category_db($data){
        return $this->db->insert('land_categories', $data);
    }

    public function get_all_categories() {
        $query = $this->db->get('land_categories'); // 'categories' is the table name
        return $query->result_array(); // Return the result as an array
    }
}

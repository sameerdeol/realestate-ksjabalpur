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
    public function insert_property($price_data){
        return $this->db->insert('properties', $price_data);
    }
    public function insert_property_docs($property_data){
        return $this->db->insert('properties_docs', $property_data);
    }
    public function savePropertyImages($data)
    {
        return $this->db->insert('property_images', $data);
    }

    public function get_all_categories() {
        $query = $this->db->get('land_categories'); // 'categories' is the table name
        return $query->result_array(); // Return the result as an array
    }
    public function get_all_properties() {
        $query = $this->db->get('properties'); // 'categories' is the table name
        return $query->result_array(); // Return the result as an array
    }

    public function get_property_by_id($id)
    {
        // Make sure the ID is valid
        if (empty($id)) {
            return false;
        }
        // Query the database to fetch property data by ID
        $this->db->where('id', $id);
        $query = $this->db->get('properties'); // Assuming your table name is 'properties'

        // Check if a result was found
        if ($query->num_rows() > 0) {
            return $query->row_array(); // Return the property data as an array
        }

        // If no record found, return false
        return false;
    }

    public function update_property($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('properties', $data); // Assuming the table is 'properties'
    }

    public function get_property_images_by_id($id) {
        $this->db->select('*'); // Select all columns (or specify only required columns)
        $this->db->from('property_main_dispaly_img'); // Define the table
        $this->db->where('property_id', $id); // Add condition
        $query = $this->db->get(); // Execute the query
        return $query->result_array(); // Return the result as an array
    }
    
}

<?php
/**
* Written by Ntonsite Mwamlima. 
   May 2019
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class License_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    public function createData($license_data) {
        
        $this->db->insert('license', $license_data);
    }

    public function getAllData($id) {
        $query = $this->db->query('SELECT * FROM `license` WHERE user_id ='.$id);
        return $query->result();
    }
    public function getOverdues() {
        $query = $this->db->query('SELECT * FROM lcs_over');
        return $query->result();
    }

    public function getData($id) {
        $query = $this->db->query('SELECT * FROM license WHERE `id` =' .$id);
        return $query->row();
    }

    public function updateData($id,$license_data) {
        $this->db->where('id', $id);
        $this->db->update('license', $license_data);
    }

    public function deleteData($id) {
        $this->db->where('id', $id);
        $this->db->delete('license');
    }
    public function getCount($id)
    {
        $this->db->from('license');
        $this->db->where('user_id',$id);
        return $num_rows = $this->db->count_all_results();
    }
    public function getOverdue($id)
    {
        $this->db->from('lcs_over');
        $this->db->where('user_id',$id);
        return $num_rows = $this->db->count_all_results();
    }
    public function licenseOnDeadlines($id){
        $this->db->from('deadline_license');
        $this->db->where('user_id',$id);
        return $num_rows = $this->db->count_all_results();
    }
    public function license_expiry(){
        $query = $this->db->query("SELECT * FROM license WHERE DATEDIFF(date_of_expiry, NOW()) >= 30 AND is_checked=0");

        return $query->result();
    }
    public function licenseExpiryChecked($id){
        $query = $this->db->query("UPDATE license set is_checked='1' where id='$id'");
    }
}

<?php
/**
* author Ntonsite Mwamlima. 
   May 2019
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Role_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    function createData($role_data){
      $this->db->insert('role', $role_data);
    }

    function getRoles(){
      $query = $this->db->query('SELECT * FROM role');
      return $query->result();
    }

    function getRole($id){

      $query = $this->db->query('SELECT * FROM role WHERE `id` =' .$id);
      return $query->row();
    }

    function getCountRoles(){
       
       $this->db->from('role');
       return $num_rows = $this->db->count_all_results();
    }

    function updateData($id, $role_data) {
       
        $this->db->where('id', $id);
        $this->db->update('role', $role_data);
    }

    function deleteData($id) {
        $this->db->where('id', $id);
        $this->db->delete('role');
    }

}

<?php
/**
* Written by Ntonsite Mwamlima. 
   May 2019
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Group_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    function createData($group_data){
      $this->db->insert('groups', $group_data);
    }

    function getGroups(){
      $query = $this->db->query('SELECT * FROM groups');
      return $query->result();
    }

    function getGroup($id){

      $query = $this->db->query('SELECT * FROM groups WHERE `id` =' .$id);
      return $query->row();
    }

    function getCountGroups(){
       
       $this->db->from('groups');
       return $num_rows = $this->db->count_all_results();
    }

    function updateData($id, $group_data) {
       
        $this->db->where('id', $id);
        $this->db->update('groups', $group_data);
    }

    function deleteData($id) {
        $this->db->where('id', $id);
        $this->db->delete('groups');
    }

}

<?php 
/**
* Written by Ntonsite Mwamlima. 
   May 2020
*/
defined('BASEPATH') OR exit('No direct script access allowed');

	class Vendor_model extends CI_Model
	{
		
		function __construct()
		{
			$this->load->database();
		}

		public function createData($vendor_data){
			$this->db->insert('vendor', $vendor_data);
		}

		public function getVendors(){
			$query = $this->db->query('SELECT * FROM `vendor`');
			return $query->result();
		}

		public function getData($id){

			$query = $this->db->query('SELECT * FROM vendor WHERE vendorID =' .$id);
			return $query->row();
		}

		public function getCountVendor($id){
		   
		   $this->db->from('vendor');
		   $this->db->where('user_id',$id);
		   return $num_rows = $this->db->count_all_results();
		}

		public function updateData($id, $vendor_data) {
		   
		    $this->db->where('vendorID', $id);
		    $this->db->update('vendor', $vendor_data);
		}

		public function deleteData($id) {
		    $this->db->where('vendorID', $id);
		    $this->db->delete('vendor');
		}
	}

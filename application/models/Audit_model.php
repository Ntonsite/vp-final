<?php

defined('BASEPATH') or exit('No direct scripts allowed');
class Audit_model extends CI_Model
{
	function __construct()
	{
		$this->load->database();
	}
	/*
	 * Function to retrieve all audit trails events from DB
	 */
	public function getAudits(){
		$query = $this->db->query('SELECT * FROM `user_audit_trails`');
		return $query->result();
	}
}

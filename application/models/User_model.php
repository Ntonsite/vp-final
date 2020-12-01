<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property  db
 */

class User_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    /**
     * @param $user_data
     */

    function createData($user_data){
        $this->db->insert('user', $user_data);
    }

    /**
     * @return mixed
     */

    function getUsers(){
        $query = $this->db->query('SELECT * FROM user where role != 1');
        return $query->result();
    }

    /**
     * @param $id
     * @return mixed
     */

    function getData($id){

        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user_id', $id);
        $query = $this->db->get();

        return $query->row();
    }

    /**
     * @param $id
     * @param $user_data
     */

    function updateData($id, $user_data) {

        $this->db->where('user_id', $id);
        $this->db->update('user', $user_data);
    }


    /**
     * @param $id
     */

    function deleteData($id) {
        $this->db->where('user_id', $id);
        $this->db->delete('user');
    }

    /**
     * @param $username
     * @param $pass
     * @return bool
     */

    public function login_user($username,$pass){

        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user_name',$username);
        $this->db->where('user_password',$pass);

        if($query=$this->db->get())
        {
            return $query->row_array();
        }
        else{
            return false;
        }
    }

    /**
     * @param $username
     * @return bool
     */
    public function check_local_user($username){

        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user_name',$username);
        $this->db->where('is_active',1);

        if($query=$this->db->get())
        {
            return $query->row_array();
        }
        else{
            return false;
        }
    }

    /**
     * @param $id
     */
    public function deactivate($id){
        $this->db->where('user_id', $id);
        $this->db->update('status', 0);
    }
}

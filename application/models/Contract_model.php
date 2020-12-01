<?php
/**
 * Author: Ntonsite Mwamlima
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Contract_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    /**
     * @param $contract_data
     */
    public function createData($contract_data) {

       
        $this->db->insert('contract', $contract_data);
    }

    /**
     * @return mixed
     */
    public function getAllData() {
        $query = $this->db->query('SELECT * FROM `contract`');
        return $query->result();
    }

    /**
     * @return mixed
     */
    public function getOverdues() {
        $query = $this->db->query('SELECT * FROM cnt_over');
        return $query->result();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getData($id) {
        $query = $this->db->query('SELECT * FROM contract WHERE user_id = '.$id);
        return $query->result();
    }

    /**
     * @param $id
     * @return mixed
     */

    public function getContract($id){
        $query = $this->db->query('SELECT * FROM contract WHERE id ='.$id);
        return $query->row();
    }

    /**
     * @param $id
     * @param $contract_data
     */
    public function updateData($id, $contract_data) {
       
        $this->db->where('id', $id);
        $this->db->update('contract', $contract_data);
    }

    /**
     * @param $id
     */

    public function deleteData($id) {
        $this->db->where('id', $id);
        $this->db->delete('contract');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getCount($id){
        
       $this->db->from('contract');
       $this->db->where('user_id',$id);
       return $num_rows = $this->db->count_all_results();
    }

    /**
     * @param $id
     * @return mixed
     */
    function getOverdue($id)
    {
        $this->db->from('cnt_over');
        $this->db->where('user_id',$id);
        return $num_rows = $this->db->count_all_results();
    }

    /**
     * @param $id
     * @return mixed
     */

    public function contractOnDeadlines($id){
        $this->db->from('deadline_contract');
        $this->db->where('user_id',$id);
        return $num_rows = $this->db->count_all_results();
    }

    /**
     * @param $name
     * @return mixed
     */

    public function contractCheck($name){
        $query = $this->db->query("SELECT * FROM contract WHERE contract_name='$name'");

        return $query->result();
    }

    public function contract_expiry(){
        $query = $this->db->query("SELECT * FROM contract WHERE DATEDIFF(date_of_expiry, NOW()) >= 30 AND is_checked=0");

        return $query->result();
    }

    public function contractExpiryChecked($id){
        $query = $this->db->query("UPDATE contract set is_checked='1' where id='$id'");
    }

}

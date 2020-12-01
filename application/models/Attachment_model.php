<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Attachment_model extends CI_Model
{
    public function __construct() {
        $this->load->database();
    }
    private $table = 'attachment';

    public function createData($attachment_data){
        $this->db->insert('attachment', $attachment_data);
    }

    public function getAllData(){
        $query = $this->db->query('SELECT * FROM attachments');
        return $query->result();
    }

    public function getData($id){
        $query = $this->db->query('SELECT * from attachments WHERE id_attach ='.$id);
        return $query->row();
    }

    public function updateData($id, $attachment_data) {

        $this->db->where('id_attach', $id);
        $this->db->update('attachment', $attachment_data);
    }

    public function deleteData($id){
        $this->db->where('id_attach', $id);
        $this->db->delete('attachment');
    }

}

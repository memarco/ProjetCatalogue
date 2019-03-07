<?php
class Type_stage_model extends CI_Model {
 
    public function __construct()
    {
        $this->load->database();
    }
    
    public function record_count() {
        return $this->db->count_all("type_stage");
    }
    
    public function get_type_stage($nom = FALSE)
    {
        if ($nom=== FALSE)
        {
            $this->db->order_by("nom", "asc");
            $query = $this->db->get('type_stage');
            return $query->result_array();
        }
        $this->db->order_by("nom", "asc");
        $query = $this->db->get_where('type_stage', array('id' => $nom));
        return $query->row_array();
    }
    
    public function get_type_stage_by_id($id = 0)
    {
        if ($id === 0)
        {
            $this->db->order_by("nom", "asc");
            $query = $this->db->get('type_stage');
            return $query->result_array();
        }
        $this->db->order_by("nom", "asc");
        $query = $this->db->get_where('type_stage', array('id' => $id));
        return $query->row_array();
    }
    
    public function set_type_stage($id = 0)
    {
        $this->load->helper('url');
 
        $mail1 = url_title($this->input->post('nom'), 'dash', TRUE);
 
        $data = array(
            'nom' => $this->input->post('nom') 
        );
        
        if ($id == 0) {
            return $this->db->insert('type_stage', $data);
        } else {
            $this->db->where('id', $id);
            return $this->db->update('type_stage', $data);
        }
    }
    
    public function delete_type_stage($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('type_stage');
    }
}

<?php
class Type_formation_model extends CI_Model {
 
    public function __construct()
    {
        $this->load->database();
    }
    
    public function get_type_formation($nom = FALSE)
    {
        if ($nom=== FALSE)
        {
            $query = $this->db->get('type_formation');
            return $query->result_array();
        }
 
        $query = $this->db->get_where('type_formation', array('nom' => $nom));
        return $query->row_array();
    }
    
    public function get_type_formation_by_id($id = 0)
    {
        if ($id === 0)
        {
            $query = $this->db->get('type_formation');
            return $query->result_array();
        }
 
        $query = $this->db->get_where('type_formation', array('id' => $id));
        return $query->row_array();
    }
    
    public function set_type_formation($id = 0)
    {
        $this->load->helper('url');
 
        $mail1 = url_title($this->input->post('nom'), 'dash', TRUE);
 
        $data = array(
            'nom' => $this->input->post('nom') 
        );
        
        if ($id == 0) {
            return $this->db->insert('type_formation', $data);
        } else {
            $this->db->where('id', $id);
            return $this->db->update('type_formation', $data);
        }
    }
    
    public function delete_type_formation($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('type_formation');
    }
}

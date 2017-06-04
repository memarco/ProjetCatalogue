<?php
class Filiere_model extends CI_Model {
 
    public function __construct()
    {
        $this->load->database();
    }
    
    public function record_count() {
        return $this->db->count_all("filiere");
    }
    
    public function get_filiere($nom = FALSE)
    {
        if ($nom=== FALSE)
        {
            
            $this->db->order_by("nom", "asc");
            $query = $this->db->get('filiere');
            return $query->result_array();
        }
        
        $this->db->order_by("nom", "asc");
        $query = $this->db->get_where('filiere', array('id' => $nom));
        return $query->row_array();
    }
    
    public function get_filiere_by_id($id = 0)
    {
        if ($id === 0)
        {
            $query = $this->db->get('filiere');
            return $query->result_array();
        }
 
        $query = $this->db->get_where('filiere', array('id' => $id));
        return $query->row_array();
    }
    
    public function set_filiere($id = 0)
    {
        $this->load->helper('url');
 
        $mail1 = url_title($this->input->post('nom'), 'dash', TRUE);
 
        $data = array(
            'nom' => $this->input->post('nom') 
        );
        
        if ($id == 0) {
            return $this->db->insert('filiere', $data);
        } else {
            $this->db->where('id', $id);
            return $this->db->update('filiere', $data);
        }
    }
    
    public function delete_filiere($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('filiere');
    }
}

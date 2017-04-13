<?php
class Niveau_model extends CI_Model {
 
    public function __construct()
    {
        $this->load->database();
    }
    
    public function get_niveau($nom_niveau = FALSE)
    {
        if ($nom_niveau=== FALSE)
        {
            $query = $this->db->get('niveau');
            return $query->result_array();
        }
 
        $query = $this->db->get_where('niveau', array('nom_niveau' => $mail1));
        return $query->row_array();
    }
    
    public function get_niveau_by_id($id = 0)
    {
        if ($id === 0)
        {
            $query = $this->db->get('niveau');
            return $query->result_array();
        }
 
        $query = $this->db->get_where('niveau', array('id' => $id));
        return $query->row_array();
    }
    
    public function set_niveau($id = 0)
    {
        $this->load->helper('url');
 
        $mail1 = url_title($this->input->post('nom_niveau'), 'dash', TRUE);
 
        $data = array(
            'nom_niveau' => $this->input->post('nom_niveau') 
        );
        
        if ($id == 0) {
            return $this->db->insert('niveau', $data);
        } else {
            $this->db->where('id', $id);
            return $this->db->update('niveau', $data);
        }
    }
    
    public function delete_niveau($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('niveau');
    }
}

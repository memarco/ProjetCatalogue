<?php
class Domaine_model extends CI_Model {
 
    public function __construct()
    {
        $this->load->database();
    }
    
     public function record_count() {
        return $this->db->count_all("domaine");
    }
    
    
    public function get_domaine($nom = FALSE, $limit, $start)
    {
        if ($nom=== FALSE)
        {
            
           $this->db->order_by("nom", "asc");
            $this->db->limit($limit, $start); 
            $query = $this->db->get('domaine');           
            return $query->result_array();
        }
     
        $this->db->order_by("nom", "asc");
        $query = $this->db->get_where('domaine', array('id' => $nom));
 
        return $query->row_array();
    }
    
    public function get_domaine_by_id($id = 0)
    {
        if ($id === 0)
        {
            $query = $this->db->get('domaine');
            return $query->result_array();
        }
 
        $query = $this->db->get_where('domaine', array('id' => $id));
        return $query->row_array();
    }
    
    public function set_domaine($id = 0)
    {
        $this->load->helper('url');
 
        $mail1 = url_title($this->input->post('nom'), 'dash', TRUE);
 
        $data = array(
            'nom' => $this->input->post('nom') 
        );
        
        if ($id == 0) {
            return $this->db->insert('domaine', $data);
        } else {
            $this->db->where('id', $id);
            return $this->db->update('domaine', $data);
        }
    }
    
    public function delete_domaine($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('domaine');
    }


}

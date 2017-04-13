<?php
class Fa_model extends Formation_model {
 
    public function __construct()
    {
        $this->load->database();
    }
     
    public function get_fa($nom = FALSE)
    {
        if ($nom=== FALSE)
        {
            
            $this->db->select('*');    
            $this->db->from('type_periode');
            $this->db->join('fa', 'type_periode.id = fa.id_rythme');  
            $query = $this->db->get();
            return $query->result_array();
        }
 
        $query = $this->db->get_where('fa', array('nbre_entreprise' => $nom));
        return $query->row_array();
    }
    
    public function get_fa_by_id($id = 0)
    {
        if ($id === 0)
        { 
            $this->db->select('*');    
            $this->db->from('type_periode');
            $this->db->join('fa', 'type_periode.id = fa.id_rythme');   
                $this->db->where('fa.id',$id);
            $query = $this->db->get();
            return $query->result_array();
        }
        
        $this->db->select('*');    
            $this->db->from('type_periode');
            $this->db->join('fa', 'type_periode.id = fa.id_rythme');   
                $this->db->where('fa.id',$id); 
        $query = $this->db->get();
        return $query->row_array();
    }
    
    public function set_fa($id = 0)
    {
        $this->load->helper('url');
 
        $nbre_entreprise = url_title($this->input->post('nbre_entreprise'), 'dash', TRUE);
 
        $data = array(
            'nbre_entreprise' => $this->input->post('nbre_entreprise'),
            'id_rythme' => $this->input->post('id_rythme'),
            'nbre_ecole' => $this->input->post('nbre_ecole')   
        );
        
        if ($id == 0) {
            return $this->db->insert('fa', $data);
        } else {
            $this->db->where('id', $id);
            return $this->db->update('fa', $data);
        }
    }
    
    public function delete_fa($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('fa');
    }
}

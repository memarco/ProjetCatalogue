<?php
class Diplome_model extends CI_Model {
 
    public function __construct()
    {
        $this->load->database();
    }
    
    public function record_count() {
        return $this->db->count_all("diplome");
    }
     
    public function get_diplome($nom = FALSE)
    {
        if ($nom=== FALSE)
        {
            
            $this->db->select('*');    
            $this->db->from('niveau');
            $this->db->join('diplome', 'niveau.id = diplome.id_niveau');  
            $this->db->order_by("nom", "asc");
            //$this->db->limit($limit, $start);
            $query = $this->db->get();
            return $query->result_array();
        }
        
        $this->db->order_by("nom", "asc");
        $query = $this->db->get_where('diplome', array('id' => $nom));
        return $query->row_array();
    }
    
    public function get_diplome_by_id($id = 0)
    {
        if ($id === 0)
        { 
                $this->db->select('*');    
                $this->db->from('niveau');
                $this->db->join('diplome', 'niveau.id = diplome.id_niveau'); 
                $this->db->where('diplome.id',$id);
            $query = $this->db->get();
            return $query->result_array();
        }
        
        $this->db->select('*');    
        $this->db->from('niveau');
        $this->db->join('diplome', 'niveau.id = diplome.id_niveau'); 
        $this->db->where('diplome.id',$id); 
        $query = $this->db->get();
        return $query->row_array();
    }
    
    public function set_diplome($id = 0)
    {
        $this->load->helper('url');
 
        $mail1 = url_title($this->input->post('nom'), 'dash', TRUE);
 
        $data = array(
            'nom' => $this->input->post('nom'),
            'id_niveau' => $this->input->post('id_niveau')  
        );
        
        if ($id == 0) {
            return $this->db->insert('diplome', $data);
        } else {
            $this->db->where('id', $id);
            return $this->db->update('diplome', $data);
        }
    }
    
    public function delete_diplome($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('diplome');
    }
}

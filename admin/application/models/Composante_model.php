<?php
class Composante_model extends CI_Model {
 
    public function __construct()
    {
        $this->load->database();
    }
    
     public function record_count() {
        return $this->db->count_all("composante");
    }
    
    public function get_composante($mail1 = FALSE, $limit, $start)
    {
        if ($mail1 === FALSE)
        {
             $this->db->limit($limit, $start);
            $query = $this->db->get('composante');
            return $query->result_array();
        }
 
        $query = $this->db->get_where('composante', array('id' => $mail1));
        return $query->row_array();
    }
    
    public function get_composante_by_id($id = 0)
    {
        if ($id === 0)
        {
            $query = $this->db->get('composante');
            return $query->result_array();
        }
 
        $query = $this->db->get_where('composante', array('id' => $id));
        return $query->row_array();
    }
    
    public function set_composante($id = 0)
    {
        $this->load->helper('url');
 
        $mail1 = url_title($this->input->post('mail1'), 'dash', TRUE);
 
        $data = array(
            'nom' => $this->input->post('nom'),
            'mail1' => $mail1,
            'mail2' => $this->input->post('mail2'),
            'sigle' => $this->input->post('sigle')
        );
        
        if ($id == 0) {
            return $this->db->insert('composante', $data);
        } else {
            $this->db->where('id', $id);
            return $this->db->update('composante', $data);
        }
    }
    
    public function delete_composante($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('composante');
    }
}

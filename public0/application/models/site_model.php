<?php
class Site_model extends CI_Model {
 
    public function __construct()
    {
        $this->load->database();
    }
    public function record_count() {
        return $this->db->count_all("site");
    }
    
    
    public function get_site($cp_site = FALSE, $limit, $start)
    {
        if ($cp_site === FALSE)
        {   
            $this->db->limit($limit, $start);
            $query = $this->db->get('site');
            return $query->result_array();
        }
 
        $query = $this->db->get_where('site', array('id' => $cp_site));
        return $query->row_array();
    }
    
    public function get_site_by_id($id = 0)
    {
        if ($id === 0)
        {
            $query = $this->db->get('site');
            return $query->result_array();
        }
 
        $query = $this->db->get_where('site', array('id' => $id));
        return $query->row_array();
    }
    
    public function set_site($id = 0)
    {
        $this->load->helper('url');
 
        $cp_site = url_title($this->input->post('cp_site'), 'dash', TRUE);
 
        $data = array(
            'nom' => $this->input->post('nom'),
            'cp_site' => $cp_site,
            'adresse' => $this->input->post('adresse'),
            'ville' => $this->input->post('ville')
        );
        
        if ($id == 0) {
            return $this->db->insert('site', $data);
        } else {
            $this->db->where('id', $id);
            return $this->db->update('site', $data);
        }
    }
    
    public function delete_site($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('site');
    }
}

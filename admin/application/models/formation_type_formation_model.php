<?php
class formation_type_formation_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get($id = FALSE)
    {
        if ($id=== FALSE)
        {

            $this->db->select('*');
            $this->db->from('formation_type_formation');
            $query = $this->db->get();
            return $query->result_array();
        }

        $query = $this->db->get_where('formation_type_formation', array('id_formation' => $id));

        return $query->row_array();
    }

    public function get_by_id($id = 0)
    {
        if ($id === 0)
        {
            $this->db->select('*');
            $this->db->from('formation_type_formation');
            $this->db->where('formation_type_formation.id_formation',$id);
            $query = $this->db->get();
            return $query->result_array();
        }

        $this->db->select('*');
        $this->db->from('formation_type_formation');
        $this->db->where('formation_type_formation.id_formation',$id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function set($id_formation,$id_types_formation)
    {
        $this->load->helper('url');


        $data = array(
            'id_formation' => $id_formation,
            'id_type_formation' => $id_types_formation
        );

        return $this->db->insert('formation_type_formation', $data);

    }

    public function delete($id_formation)
    {
        $this->db->where('id_formation', $id_formation);
        return $this->db->delete('formation_type_formation');
    }
}

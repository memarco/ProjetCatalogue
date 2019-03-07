<?php
class Type_formation_model extends CI_Model {
 
    public function __construct()
    {
        $this->load->database();
    }

    public function record_count() {
        return $this->db->count_all("type_formation");
    }

    public function get_type_formation($nom = FALSE)
    {
        if ($nom=== FALSE)
        {

            $query = $this->db->get('type_formation');
            return $query->result_array();
        }

        $query = $this->db->get_where('type_formation', array('id' => $nom));
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

    public function get_type_formation_by_id_formation($id = 0)
    {
        if ($id === 0)
        {
            $this->db->select('type_formation.nom as nom_type');
            $this->db->from('formation_type_formation');
            $this->db->join('type_formation', 'type_formation.id = formation_type_formation.id_type_formation');
            $query = $this->db->get();
            return $query->row_array();
        }
        $this->db->select('type_formation.nom as nom_type');
        $this->db->from('formation_type_formation');
        $this->db->join('type_formation', 'type_formation.id = formation_type_formation.id_type_formation');
        $this->db->where('formation_type_formation.id_formation', $id);
        $query = $this->db->get();
        $result = $query->result_array();

        return $result ;
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

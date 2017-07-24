<?php

class Filiere_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function record_count() {
        return $this->db->count_all("filiere");
    }

    public function get_filiere($nom = FALSE, $limit, $start) {
        if ($nom === FALSE) {

            $this->db->order_by("nom", "asc");
            $this->db->limit($limit, $start);
            $query = $this->db->get('filiere');
            return $query->result_array();
        }

        $this->db->order_by("nom", "asc");
        $query = $this->db->get_where('filiere', array('id' => $nom));
        return $query->row_array();
    }

    public function get_filiere_by_id($id = 0) {
        if ($id === 0) {
            $query = $this->db->get('filiere');
            return $query->result_array();
        }

        $query = $this->db->get_where('filiere', array('id' => $id));
        return $query->row_array();
    }

    public function set_filiere($id = 0) {
        $this->load->helper('url');

        $mail1 = url_title($this->input->post('nom'), 'dash', TRUE);

        $data = array(
            'nom' => $this->input->post('nom')
        );

        if ($id == 0) {
            return $this->db->insert('filiere', $data);
        } else {

            $date_modif = date('Y-m-d H:i:s');
            $nom_table = 'filiere';
            $id_user = $this->session->userdata('id');
            $data2 = $this->filiere_model->get_filiere($id, 1, 1);

            $CI = & get_instance();
            $CI->load->model('historique_model');
            foreach ($data2 as $field_name => $value) {
                if ($field_name != 'nbre_modif' &&$field_name != 'id' && $value != $data[$field_name]) {
                    $CI->historique_model->set_historique($date_modif, $nom_table, $id_user, $id, $field_name, $data[$field_name], $value, 0);
                    $this->db->query('UPDATE filiere  SET nbre_modif=nbre_modif+1 WHERE id =' . $id . '');
                }
            }


            $this->db->where('id', $id);
            return $this->db->update('filiere', $data);
        }
    }

    public function delete_filiere($id) {
        $this->db->where('id', $id);
        return $this->db->delete('filiere');
    }

}

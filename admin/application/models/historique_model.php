<?php
class Historique_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function record_count() {
        return $this->db->count_all("historique_t");
    }

    public function get_historique($nom = FALSE, $limit, $start)
    {
        if ($nom=== FALSE)
        {
            $this->db->select(' id_histo ,	id_entity ,	old_value 	,new_value ,	nom_table ,	nom_champ 	,date_modif  , firstName as id_user, libelle');
            $this->db->from('historique_t');
            $this->db->join('rd_formation', 'rd_formation.id = historique_t.id_entity');
            $this->db->join('user', 'user.id = historique_t.id_user');
            $this->db->order_by("date_modif", "desc");
            $query = $this->db->get();
            return $query->result_array();
        }

        $this->db->order_by("date_modif", "asc");
        $query = $this->db->get_where('historique_t', array('id' => $nom));
        return $query->row_array();
    }

    public function get_filiere_by_id($id = 0)
    {
        if ($id === 0)
        {
            $query = $this->db->get('historique_t');
            return $query->result_array();
        }

        $query = $this->db->get_where('historique_t', array('id' => $id));
        return $query->row_array();
    }

    public function set_historique($date_modif, $nom_table, $id_user, $id_entity, $nom_champ, $new_value, $old_value, $id = 0)
    {
        $this->load->helper('url');

        $mail1 = url_title($this->input->post('nom'), 'dash', TRUE);

        $data = array(
            'date_modif' => $date_modif,
            'nom_table' => $nom_table,
            'id_user' => $id_user,
            'id_entity' => $id_entity,
            'nom_champ' => $nom_champ,
            'new_value' => $new_value,
            'old_value' => $old_value
        );

        if ($id == 0) {
            return $this->db->insert('historique_t', $data);
        } else {
            $this->db->where('id', $id);
            return $this->db->update('historique_t', $data);
        }
    }

    public function delete_filiere($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('historique_t');
    }
}

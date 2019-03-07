<?php
class page_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

     public function record_count() {
        return $this->db->count_all("page");
    }

    public function get_page($nom_page = FALSE, $limit, $start)
    {
        if ($nom_page === FALSE)
        {
           $this->db->order_by("nom_page", "asc");
           $this->db->limit($start,$limit);
            $query = $this->db->get('page');
            return $query->result_array();
        }

        $query = $this->db->get_where('page', array('id' => $nom_page));
        return $query->row_array();
    }

    public function get_page_by_id($id = 0)
    {
        if ($id === 0)
        {
            $query = $this->db->get('page');
            return $query->result_array();
        }

        $query = $this->db->get_where('page', array('id' => $id));
        return $query->row_array();
    }

    public function set_page($id = 0)
    {
        $this->load->helper('url');

        $mail1 = url_title($this->input->post('nom_page'), 'dash', TRUE);

        $data = array(
            'nom_page' => $this->input->post('nom_page')
        );

        if ($id == 0) {
            return $this->db->insert('page', $data);
        } else {
            $this->db->where('id', $id);
            return $this->db->update('page', $data);
        }
    }

    public function delete_page($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('page');
    }
}

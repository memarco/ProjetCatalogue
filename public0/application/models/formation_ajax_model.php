<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Formation_ajax_model extends CI_Model {

	var $table = 'rd_formation';
	var $column_order = array('libelle','nom_do','nom_f','nom_typ','nom_site','nom_s',null); //set column field database for datatable orderable
	var $column_search = array('libelle','domaine.nom','domaine.nom','filiere.nom','rd_formation.id_type_formation','composante.sigle'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order = array('id' => 'desc'); // default order

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	private function _get_formation($key) {
					$this->db->select('rd_formation.id as id, type_periode.nom as nom_periode,rd_formation.id_rythme as id_rythme, nbre_entreprise, rd_formation.id_domaine,'
									. 'nbre_ecole, libelle as libelle,niveau, composante.nom as nom_c, composante.sigle as nom_s,filiere.nom as nom_f, rd_formation.id_type_formation,'
									. 'type_formation.nom as nom_typ,type_stage.nom as nom_stage,rd_formation.id_diplome, rd_formation.id_site, regex_stage, regex_alternance,'
									. 'nbre_ecole,nbre_semaine, debut_stage, fin_stage, rd_formation.est_alternance,rd_formation.id_filiere,'
									. 'diplome.nom as nom_d, domaine.nom as nom_do, rd_formation.id_composante, '
									. 'site.nom as nom_site, rd_formation.detail_stage, rd_formation.detail_alt, rd_formation.nbre_modif');
					$this->db->from('rd_formation');
					$this->db->join('composante', 'composante.id = rd_formation.id_composante');
					$this->db->join('filiere', 'filiere.id = rd_formation.id_filiere');
					$this->db->join('type_formation', 'type_formation.id = rd_formation.id_type_formation');
					$this->db->join('diplome', 'diplome.id = rd_formation.id_diplome');
					$this->db->join('domaine', 'domaine.id = rd_formation.id_domaine');
					$this->db->join('site', 'site.id = rd_formation.id_site');
					$this->db->join('type_periode', 'type_periode.id = rd_formation.id_rythme');
					$this->db->join('type_stage', 'type_stage.id = rd_formation.id_type_stage');
			}

	private function _get_datatables_query()
	{
		$this->_get_formation('');


		$i = 0;

		foreach ($this->column_search as $item) // loop column
		{ 
			if($_POST['search']['value']) // if datatable send POST for search
			{

				if($i===0) // first loop
				{
				//	$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				//if(count($this->column_search) - 1 == $i) //last loop
					//$this->db->group_end(); //close bracket
			}
			$i++;
		}

		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		}
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		//$this->db->from($this->table);
		$this->_get_formation('');
		return $this->db->count_all_results();
	}

	public function get_by_id($id)
	{
		//$this->db->from($this->table);
		$this->_get_formation('');
		$this->db->where('rd_formation.id',$id);
		$query = $this->db->get();

		return $query->row();
	}

	public function get_by_filter($id)
	{
		//$this->db->from($this->table);
		$this->_get_formation('');
		$this->db->where('rd_formation.id_type_formation',$id);
		$query = $this->db->get();
		return $query->result();
	}

	public function save($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->table);
	}
}

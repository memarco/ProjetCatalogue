<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Formation_ajax extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('formation_ajax_model','person');
        $this->load->model('formation_model');
        $this->load->model('domaine_model');
        $this->load->model('filiere_model');
        $this->load->model('diplome_model');
        $this->load->model('composante_model');
        $this->load->model('niveau_model');
        $this->load->model('site_model');
        $this->load->model('type_formation_model');
        $this->load->model('type_periode_model');
        $this->load->model('type_stage_model');
        $this->load->model('niveau_model');
        $this->load->helper('url_helper');
        $this->load->library("pagination");
	}

	public function index()
	{
		$this->load->helper('url');
		        $this->load->helper('form');
		        $this->load->library('form_validation');
		        $data['title'] = 'Liste des formations de l\'U-PEC ';
		        $data['total_formation'] = $this->formation_model->record_count('');
		$data['name'] = $this->session->userdata('name');
		$data['type_formation'] = $this->type_formation_model->get_type_formation(FALSE,2147483647,0);
		$data['filiere'] = $this->filiere_model->get_filiere(FALSE,2147483647,0);
		$data['diplome'] = $this->diplome_model->get_diplome(FALSE,2147483647,0);
		$data['composante'] = $this->composante_model->get_composante(FALSE,2147483647,0);
		$data['site'] = $this->site_model->get_site(FALSE,2147483647,0);
		$data['type_periode'] = $this->type_periode_model->get_type_periode(FALSE,2147483647,0);
		$data['domaine'] = $this->domaine_model->get_domaine(FALSE,2147483647,0);
		$data['type_stage'] = $this->type_stage_model->get_type_stage(FALSE,2147483647,0); 
		$this->load->view('formation_view');
	}

	public function ajax_list()
	{
		$list = $this->person->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $person) {
			$no++;
			$row = array();
			$nom_lib = array();
            $lib_typ=$this->type_formation_model->get_type_formation_by_id_formation($person->id);
			for($i=0; $i<count($lib_typ);$i++){
			    array_push($nom_lib,$lib_typ[$i]['nom_type']);
			}
			$row[] = $person->libelle;
			$row[] = $person->nom_do;
			$row[] = $person->nom_f;
			$row[] = $nom_lib;
			$row[] = $person->nom_d;
			$row[] = $person->nom_s;
								//add html for action
								$row[] = '<a class="btn btn-sm btn-success" href="'.site_url('formation/'.$person->id).'" title="Afficher" ><i class="glyphicon glyphicon-search"></i></a>
										<a class="btn btn-sm btn-primary" href="javascript:void(0);"  onclick="edit_formation('.$person->id.')" title="Modifier" ><i class="glyphicon glyphicon-pencil"></i></a>
												<a class="btn btn-sm btn-warning" href="'.site_url('formation/duplicate/'.$person->id).'"  title="Dupliquer" ><i class="glyphicon glyphicon-plus"></i></a>
									  <a class="btn btn-sm btn-danger" href="'.site_url('formation/delete/'.$person->id).'" onClick="return confirm(\'Êtes-vous sûre de vouloir supprimer ?\')" title="Supprimer" ><i class="glyphicon glyphicon-trash"></i></a>';

			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->person->count_all(5),
						"recordsFiltered" => $this->person->count_filtered(5),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->person->get_by_id($id);
		//$data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->_validate();
		$data = array(
				'firstName' => $this->input->post('firstName'),
				'lastName' => $this->input->post('lastName'),
				'gender' => $this->input->post('gender'),
				'address' => $this->input->post('address'),
				'dob' => $this->input->post('dob'),
			);
		$insert = $this->person->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$this->_validate();
		$data = array(
				'firstName' => $this->input->post('firstName'),
				'lastName' => $this->input->post('lastName'),
				'gender' => $this->input->post('gender'),
				'address' => $this->input->post('address'),
				'dob' => $this->input->post('dob'),
			);
		$this->person->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->person->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}


	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('firstName') == '')
		{
			$data['inputerror'][] = 'firstName';
			$data['error_string'][] = 'First name is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('lastName') == '')
		{
			$data['inputerror'][] = 'lastName';
			$data['error_string'][] = 'Last name is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('dob') == '')
		{
			$data['inputerror'][] = 'dob';
			$data['error_string'][] = 'Date of Birth is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('gender') == '')
		{
			$data['inputerror'][] = 'gender';
			$data['error_string'][] = 'Please select gender';
			$data['status'] = FALSE;
		}

		if($this->input->post('address') == '')
		{
			$data['inputerror'][] = 'address';
			$data['error_string'][] = 'Addess is required';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

}

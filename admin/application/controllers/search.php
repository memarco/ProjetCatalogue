<?php
class Search extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if( !$this->session->userdata('isLoggedIn') ) {
		redirect('/login/show_login');
		}
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

	function index()
	{
			$key = $this->input->post('key');
			if($key !=''){
			$data['key_result']='Résultat pour : <span style="color:blue; font-style:italic;">"'.$key.'"</span>';}else{
					 $data['key_result']=''
;        }
			$this->load->helper('form');
			$this->load->library('form_validation');
			$data['title'] = 'Outil de recherche';
			$data['name'] = $this->session->userdata('name');
			$data['total_formation'] = $this->formation_model->record_count($key);
			$config = array();
			$config["base_url"] = base_url() . "index.php/formation/index";
			$total_row = $this->formation_model->record_count($key);
			$config["total_rows"] = $total_row;
			$config["per_page"] = 10;
			$config['first_link'] = 'Début';
			$config['last_link'] = 'Dernier';
			$config['use_page_numbers'] = TRUE;
			$config['num_links'] = 7;
			$config['cur_tag_open'] = '&nbsp;<a class="current">';
			$config['cur_tag_close'] = '</a>';
			$config['next_link'] = 'Suivant';
			$config['prev_link'] = 'Précédent';

			$this->pagination->initialize($config);
			if($this->uri->segment(3)){
					$page = (($this->uri->segment(3))-1)*10 ;
					}
					else{
					$page = 0;
					}
			$str_links = $this->pagination->create_links();
			$data["links"] = explode('&nbsp;',$str_links );
			$this->load->view('templates/header', $data);
			$key=	$this->input->post('something_id');
			$arr["something"] =  $this->formation_model->get_formation(FALSE, $config["per_page"], $page, $key);
			$data['type_formation'] = $this->type_formation_model->get_type_formation(FALSE,2147483647,0);
			$data['filiere'] = $this->filiere_model->get_filiere(FALSE,2147483647,0);
			$data['diplome'] = $this->diplome_model->get_diplome(FALSE,2147483647,0);
			$data['composante'] = $this->composante_model->get_composante(FALSE,2147483647,0);
			$data['site'] = $this->site_model->get_site(FALSE,2147483647,0);
			$data['type_periode'] = $this->type_periode_model->get_type_periode(FALSE,2147483647,0);
			$data['domaine'] = $this->domaine_model->get_domaine(FALSE,2147483647,0);
			$data['type_stage'] = $this->type_stage_model->get_type_stage(FALSE,2147483647,0);
 
			$this->load->view('search/ajax_search_view',$arr);

	}

	function get_something()
	{
	if( !$this->session->userdata('isLoggedIn') ) {
	redirect('/login/show_login');
}else{
		$key =	$this->input->post('something_id');
				$id_type_formation =	$this->input->post('id_type_formation');
						$id_domaine =	$this->input->post('id_domaine');
								$id_filiere =	$this->input->post('id_filiere');
										$id_composante =	$this->input->post('id_composante');
												$id_diplome =	$this->input->post('id_diplome');
														$id_site =	$this->input->post('id_site');
		$this->load->library('ajax');
		$arr['data_list'] =  $this->formation_model->get_formation_by_filter(FALSE,10000, 1, $key,$id_type_formation,$id_domaine,$id_composante,$id_filiere,$id_diplome,$id_site);
 		if ($this->input->post('something_id') == '2')
		{
			$arr['data_list'] = $this->formation_model->get_formation(FALSE,10000, 1, $key);

		}
		$this->ajax->output_ajax($arr);
	}}
}

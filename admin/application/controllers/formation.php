<?php
class formation extends CI_Controller {

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

    public function index()
    {
        $key = $this->input->post('key');
        if($key !=''){
        $data['key_result']=''.$key.'';
              }else{
             $data['key_result']=''
;        }
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['title'] = 'Liste des formations de l\'U-PEC ';
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
        $data["formation"] = $this->formation_model->get_formation(FALSE, $config["per_page"], $page, $key);

    		$data['type_formation'] = $this->type_formation_model->get_type_formation(FALSE,2147483647,0);
    		$data['filiere'] = $this->filiere_model->get_filiere(FALSE,2147483647,0);
    		$data['diplome'] = $this->diplome_model->get_diplome(FALSE,2147483647,0);
    		$data['composante'] = $this->composante_model->get_composante(FALSE,2147483647,0);
    		$data['site'] = $this->site_model->get_site(FALSE,2147483647,0);
    		$data['type_periode'] = $this->type_periode_model->get_type_periode(FALSE,2147483647,0);
    		$data['domaine'] = $this->domaine_model->get_domaine(FALSE,2147483647,0);
    		$data['type_stage'] = $this->type_stage_model->get_type_stage(FALSE,2147483647,0);
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;',$str_links );
        $this->load->view('formation_view', $data);
    }

    public function filierebydomaine()
     {
             $domaine=$this->input->post('id_domaine');
                   $query=$this->filiere_model->get_filiere_by_domaine(); 
                   foreach($query->result() as $row)
                   {
                    echo "<option value='".$row->id."'>".$row->nom."</option>";
                   }
     }
    public function search()
    {
        $config = array();
        $config["base_url"] = base_url() . "index.php/formation/index";
        $total_row = $this->formation_model->record_count($key);
        $config["total_rows"] = $total_row;
        $config["per_page"] = 5;
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
            $page = ($this->uri->segment(3)) ;
            }
            else{
            $page = 1;
            }
        $data["formation"] = $this->formation_model->get_formation(FALSE, $config["per_page"], $page, $key);
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;',$str_links );
        $this->load->view('formation/search', $data);
    }

    public function view($mail1 = NULL)
    {

        $key = $this->input->post('key');
        $data['name'] = $this->session->userdata('name');
        $data['total_formation'] = $this->formation_model->record_count($key);

        $data['formation_item'] = $this->formation_model->get_formation($mail1,0,1,$key);

        //var_dump($data['formation_item']);

        if (empty($data['formation_item']))
        {
            show_404();
        }
        $nom_lib = array();
        $lib_typ=$this->type_formation_model->get_type_formation_by_id_formation($mail1);
        for($i=0; $i<count($lib_typ);$i++){
            array_push($nom_lib,$lib_typ[$i]['nom_type']);
        }
        $data['libelle'] = $data['formation_item']['libelle'];
        $data['nom_do'] = $data['formation_item']['nom_do'];
        $data['nom_f'] = $data['formation_item']['nom_f'];
        $data['nom_typ'] = $lib_typ;
        $data['nom_stage'] = $data['formation_item']['nom_stage'];
        $data['debut_stage'] = $data['formation_item']['debut_stage'];
        $data['fin_stage'] = $data['formation_item']['fin_stage'];
        $data['niveau'] = $data['formation_item']['niveau'];
        $data['nom_c'] = $data['formation_item']['nom_c'];
        $data['nom_d'] = $data['formation_item']['nom_d'];
        $data['nom_site'] = $data['formation_item']['nom_site'];
        $data['detail_stage'] = $data['formation_item']['detail_stage'];
        $this->load->view('templates/header', $data);

        $this->load->view('formation/view', $data);

    }

    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Nouvelle formation';
        $data['name'] = $this->session->userdata('name');

        $this->form_validation->set_rules('mention', 'La mention', 'required');


        if ($this->form_validation->run() === FALSE)
        {
            //$data['domaine'] = $this->domaine_model->get_domaine();
            $data['type_formation'] = $this->type_formation_model->get_type_formation(FALSE,2147483647,0);
            $data['filiere'] = $this->filiere_model->get_filiere(FALSE,2147483647,0);
            $data['diplome'] = $this->diplome_model->get_diplome(FALSE,2147483647,0);
            $data['composante'] = $this->composante_model->get_composante(FALSE,2147483647,0);
            $data['site'] = $this->site_model->get_site(FALSE,2147483647,0);
            $data['type_periode'] = $this->type_periode_model->get_type_periode(FALSE,2147483647,0);
            $data['domaine'] = $this->domaine_model->get_domaine(FALSE,2147483647,0);
            $data['type_stage'] = $this->type_stage_model->get_type_stage(FALSE,2147483647,0);
            $this->load->view('templates/header', $data);
            $this->load->view('formation/create');
            $this->load->model('formation_model');


        }
        else
        {
            $this->formation_model->set_formation();
            $this->load->view('templates/header', $data);
            $this->load->view('formation/success');

        }
    }

    public function edit()
    {
        $id = $this->uri->segment(3);
        $key = $this->input->post('key');
        if (empty($id))
        {
            show_404();
        }

        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Modification des informations';
        $data['name'] = $this->session->userdata('name');
        $data['formation_item'] = $this->formation_model->get_formation_by_id($id);
        $this->form_validation->set_rules('mention', 'Mention', 'required');
            $data['type_formation'] = $this->type_formation_model->get_type_formation(FALSE,2147483647,0);
            $data['type_formation_selected'] = $this->type_formation_model->get_type_formation_by_id_formation($id);
                $data['domaine'] = $this->domaine_model->get_domaine(FALSE,2147483647,0);
                    $data['filiere'] = $this->filiere_model->get_filiere(FALSE,2147483647,0);
                    $data['diplome'] = $this->diplome_model->get_diplome(FALSE,2147483647,0);
                    $data['composante'] = $this->composante_model->get_composante(FALSE,2147483647,0);
                    $data['site'] = $this->site_model->get_site(FALSE,2147483647,0);
                    $data['type_periode'] = $this->type_periode_model->get_type_periode(FALSE,2147483647,0);
                    $data['type_stage'] = $this->type_stage_model->get_type_stage(FALSE,2147483647,0);


        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('formation/edit', $data);
        }
        else
        {
            $this->formation_model->update_formation($id);
            $this->load->view('formation/success_edited');
            //redirect( base_url() . 'index.php/formation');
        }
    }

     public function duplicate()
    {
        $id = $this->uri->segment(3);
        $key = $this->input->post('key');
        if (empty($id))
        {
            show_404();
        }

        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Dupliquer les informations';
        $data['name'] = $this->session->userdata('name');
        $data['formation_item'] = $this->formation_model->get_formation($id,1,0,$key);
        $this->form_validation->set_rules('mention', 'Mention', 'required');
            $data['type_formation'] = $this->type_formation_model->get_type_formation(FALSE,2147483647,0);
                $data['domaine'] = $this->domaine_model->get_domaine(FALSE,2147483647,0);
                    $data['filiere'] = $this->filiere_model->get_filiere(FALSE,2147483647,0);
                    $data['diplome'] = $this->diplome_model->get_diplome(FALSE,2147483647,0);
                    $data['composante'] = $this->composante_model->get_composante(FALSE,2147483647,0);
                    $data['site'] = $this->site_model->get_site(FALSE,2147483647,0);
                    $data['type_periode'] = $this->type_periode_model->get_type_periode(FALSE,2147483647,0);
                    $data['type_stage'] = $this->type_stage_model->get_type_stage(FALSE,2147483647,0);


        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('formation/duplicate', $data);
        }
        else
        {
            $this->formation_model->update_formation($id);
            //$this->load->view('formation/success');
            redirect( base_url() . 'index.php/formation');
        }
    }


    public function delete()
    {
        $id = $this->uri->segment(3);

        if (empty($id))
        {
            show_404();
        }

        $formation_item = $this->formation_model->get_formation_by_id($id);

        $this->formation_model->delete_formation($id);
        redirect( base_url() . 'index.php/formation');
    }

    public function get_formation()
    {
        $result=array();
        $key=$_REQUEST['key'];
        $id_type_formation=$_REQUEST['id_type_formation'];
        $id_domaine=$_REQUEST['id_domaine'];
        $id_composante=$_REQUEST['id_composante'];
        $id_filiere=$_REQUEST['id_filiere'];
        $id_diplome=$_REQUEST['id_diplome'];
        $id_site=$_REQUEST['id_site'];
        //$regex_alternance=$_REQUEST['id_rythme'];

        $list = $this->formation_model->get_formation_by_filter($id_type_formation,$id_domaine,$id_composante,$id_filiere,$id_diplome,$id_site,$key) ;

        $data = array();
        foreach ($list as $person) {
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
            $row[] = '<button type="button" data-toggle="modal" data-target="#detailModal"   class="btn btn-sm btn-success" 
             title="Afficher" onclick="getDetail('.$person->id.')"><i class="glyphicon glyphicon-eye-open"></i></button>
										<a class="btn btn-sm btn-primary" href="javascript:void(0);"  onclick="edit_formation('.$person->id.')"   title="Modifier" ><i class="glyphicon glyphicon-pencil"></i></a>';
/*												<a class="btn btn-sm btn-warning" href="'.site_url('formation/duplicate/'.$person->id).'"  title="Dupliquer" ><i class="glyphicon glyphicon-plus"></i></a>
									  <a class="btn btn-sm btn-danger" href="'.site_url('formation/delete/'.$person->id).'" onClick="return confirm(\'Êtes-vous sûre de vouloir supprimer ?\')" title="Supprimer" ><i class="glyphicon glyphicon-trash"></i></a>;*/

            $data[] = $row;
        }



        $output = array(
            "recordsTotal" => $this->formation_model->record_count(''),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function get_formation_by_id(){

        $id_formation=$_REQUEST['id_formation'];

        $list = $this->formation_model->get_formation_by_id_for_detail($id_formation) ;
        $data = array();
        foreach ($list as $person) {
            $stage ='';
            $alternance='';
            $row = array();
            $nom_lib = array();
            $lib_typ=$this->type_formation_model->get_type_formation_by_id_formation($person->id);
            for($i=0; $i<count($lib_typ);$i++){
                array_push($nom_lib,$lib_typ[$i]['nom_type']);
            }
            if($person->regex_alternance != '' ){
                $alternance ='ALTERNANCE :';
            }
            if($person->regex_stage != ''){
                $stage ='STAGE :';
            }
            $row['libelle'] = $person->libelle;
            $row['nom_do'] = $person->nom_do;
            $row['nom_f'] = $person->nom_f;
            $row['type_formation'] = $nom_lib;
            $row['nom_d'] = $person->nom_d;
            $row['nom_site'] = $person->nom_site."<br/><br/><span class=\"glyphicon glyphicon-map-marker text-default\"></span>".$person->adresse." ".$person->cp_site." ".$person->ville;
            $row['nom_c'] = $person->ville." - ".$person->nom_site;
            $row['entreprise'] = "<b>$stage</b>".$person->regex_stage."<br/><b>$alternance</b>".$person->regex_alternance;
            $row['regex_alternance'] = $person->regex_alternance;
            $row['detail_stage'] = $person->detail_stage;
            $row['skills'] = $person->skills;
            //add html for action
            $data[] = $row;
        }
        $output = array(
            "data" => $data
        );
        //output to json format
        echo json_encode($output);
    }
}

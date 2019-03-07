<?php
class Filiere extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if( !$this->session->userdata('isLoggedIn') ) {
        redirect('/login/show_login');
    }
        $this->load->model('filiere_model');
            $this->load->model('domaine_model');
        $this->load->helper('url_helper');
        $this->load->library("pagination");
    }

    public function index()
    {
        //$data['filiere'] = $this->filiere_model->get_filiere();
        $data['title'] = 'Les filières/parcours de l\'U-PEC';
        $data['name'] = $this->session->userdata('name');

        $data['total_filiere'] = $this->filiere_model->record_count();

        $config = array();
        $config["base_url"] = base_url() . "index.php/filiere/index";
        $total_row = $this->filiere_model->record_count();
        $config["total_rows"] = $total_row;
        $config["per_page"] = 25;
        $config['first_link'] = 'Début';
        $config['last_link'] = 'Dernier';
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = 5;
        $config['cur_tag_open'] = '&nbsp;<a class="current">';
        $config['cur_tag_close'] = '</a>';
        $config['next_link'] = 'Suivant';
        $config['prev_link'] = 'Précédent';

        $this->pagination->initialize($config);
        if($this->uri->segment(3)){
            $page = (($this->uri->segment(3))-1)*25 ;
            }
            else{
            $page = 0;
            }
        $data["filiere"] = $this->filiere_model->get_filiere(FALSE, $config["per_page"], $page);
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;',$str_links );
        $this->load->view('filiere/index', $data);

    }

    public function view($mail1 = NULL)
    {

        $data['name'] = $this->session->userdata('name');
        $data['total_filiere'] = $this->filiere_model->record_count();
        //$data['filiere_item'] = $this->filiere_model->get_filiere($mail1);
        $data['filiere_item'] = $this->filiere_model->get_filiere($mail1,0,1);

        $data['total_filiere'] = $this->filiere_model->record_count();

        if (empty($data['filiere_item']))
        {
            show_404();
        }

        $data['nom'] = $data['filiere_item']['nom_f'];

        $this->load->view('templates/header', $data);
        $this->load->view('filiere/view', $data);

    }

    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Nouvelle filière d\'étude';
        $data['name'] = $this->session->userdata('name');

        $this->form_validation->set_rules('nom', 'Nom', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $data['domaine'] = $this->domaine_model->get_domaine(FALSE,2147483647,0);
            $this->load->view('templates/header', $data);
            $this->load->view('filiere/create');


        }
        else
        {
            $this->filiere_model->set_filiere();
            $this->load->view('templates/header', $data);
            $this->load->view('filiere/success');

        }
    }

    public function edit()
    {
        $id = $this->uri->segment(3);

        if (empty($id))
        {
            show_404();
        }

        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Modification des informations';
        $data['name'] = $this->session->userdata('name');
        $data['domaine_item'] = $this->domaine_model->get_domaine_by_id($id);
        $data['filiere_item'] = $this->filiere_model->get_filiere_by_id($id);

        $this->form_validation->set_rules('nom', 'Nom', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $data['domaine'] = $this->domaine_model->get_domaine(FALSE,2147483647,0);
            $this->load->view('templates/header', $data);
            $this->load->view('filiere/edit', $data);


        }
        else
        {
            $this->filiere_model->set_filiere($id);
            //$this->load->view('filiere/success');
            redirect( base_url() . 'index.php/filiere');
        }
    }

    public function delete()
    {
        $id = $this->uri->segment(3);

        if (empty($id))
        {
            show_404();
        }

        $filiere_item = $this->filiere_model->get_filiere_by_id($id);

        $this->filiere_model->delete_filiere($id);
        redirect( base_url() . 'index.php/filiere');
    }
}

<?php
class Niveau extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if( !$this->session->userdata('isLoggedIn') ) {
        redirect('/login/show_login');
    }
        $this->load->model('niveau_model');
        $this->load->helper('url_helper');
        $this->load->library("pagination");
    }

    public function index()
    {
        //$data['niveau'] = $this->niveau_model->get_niveau();
        $data['title'] = 'Les niveaus de l\'U-PEC';
        $data['name'] = $this->session->userdata('name');

        $data['total_niveau'] = $this->niveau_model->record_count();

        $config = array();
        $config["base_url"] = base_url() . "index.php/niveau/index";
        $total_row = $this->niveau_model->record_count();
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
        $data["niveau"] = $this->niveau_model->get_niveau(FALSE, $config["per_page"], $page);
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;',$str_links );

        $this->load->view('templates/header', $data);
        $this->load->view('niveau/index', $data);

    }

    public function view($mail1 = NULL)
    {
        $data['name'] = $this->session->userdata('name');
        $data['niveau_item'] = $this->niveau_model->get_niveau($mail1,0,1);

        $data['total_niveau'] = $this->niveau_model->record_count();

        if (empty($data['niveau_item']))
        {
            show_404();
        }

        $data['nom_niveau'] = $data['niveau_item']['nom_niveau'];

        $this->load->view('templates/header', $data);
        $this->load->view('niveau/view', $data);

    }

    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Nouveau niveau d\'étude';
        $data['name'] = $this->session->userdata('name');

        $this->form_validation->set_rules('nom_niveau', 'Nom', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('niveau/create');


        }
        else
        {
            $this->niveau_model->set_niveau();
            $this->load->view('templates/header', $data);
            $this->load->view('niveau/success');

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
        $data['niveau_item'] = $this->niveau_model->get_niveau_by_id($id);

        $this->form_validation->set_rules('nom_niveau', 'Nom', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('niveau/edit', $data);


        }
        else
        {
            $this->niveau_model->set_niveau($id);
            //$this->load->view('niveau/success');
            redirect( base_url() . 'index.php/niveau');
        }
    }

    public function delete()
    {
        $id = $this->uri->segment(3);

        if (empty($id))
        {
            show_404();
        }

        $niveau_item = $this->niveau_model->get_niveau_by_id($id);

        $this->niveau_model->delete_niveau($id);
        redirect( base_url() . 'index.php/niveau');
    }
}

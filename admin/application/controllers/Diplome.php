<?php
class diplome extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if( !$this->session->userdata('isLoggedIn') ) {
        redirect('/login/show_login');
    }
        $this->load->model('diplome_model');
        $this->load->model('niveau_model');
        $this->load->helper('url_helper');
        $this->load->library("pagination");
    }

    public function index()
    {
        //$data['diplome'] = $this->diplome_model->get_diplome();
        $data['title'] = 'Les diplomes de l\'U-PEC';
        $data['name'] = $this->session->userdata('name');
        $data['total_diplome'] = $this->diplome_model->record_count();


        $config = array();
        $config["base_url"] = base_url() . "index.php/diplome/index";
        $total_row = $this->diplome_model->record_count();
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
                $page = (($this->uri->segment(3))-1)*5 ;
            }
            else{
            $page = 0;
            }
        $data["diplome"] = $this->diplome_model->get_diplome(FALSE, $config["per_page"], $page);
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;',$str_links );

         $this->load->view('diplome/index', $data);
    }

    public function view($mail1 = NULL)
    {
        $data['name'] = $this->session->userdata('name');

        $data['diplome_item'] = $this->diplome_model->get_diplome($mail1,0,1);

        $data['total_diplome'] = $this->diplome_model->record_count();

         //var_dump($data['diplome_item']);
        if (empty($data['diplome_item']))
        {
            show_404();
        }

        $data['nom'] = $data['diplome_item']['nom'];

        $this->load->view('templates/header', $data);
        $this->load->view('diplome/view', $data);

    }

    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Nouveau diplome d\'étude';
        $data['name'] = $this->session->userdata('name');

        $this->form_validation->set_rules('nom', 'Nom', 'required');


        if ($this->form_validation->run() === FALSE)
        {
            $data['niveau'] = $this->niveau_model->get_niveau(FALSE,0,2147483647);
            $this->load->view('templates/header', $data);
            $this->load->view('diplome/create');
            $this->load->model('diplome_model');


        }
        else
        {
            $this->diplome_model->set_diplome();
            $this->load->view('templates/header', $data);
            $this->load->view('diplome/success');

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
        $data['diplome_item'] = $this->diplome_model->get_diplome_by_id($id);

        $this->form_validation->set_rules('nom', 'Nom', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $data['niveau'] = $this->niveau_model->get_niveau(FALSE,0,2147483647);
            $this->load->model('diplome_model');
            $this->load->view('templates/header', $data);
            $this->load->view('diplome/edit', $data);


        }
        else
        {
            $this->diplome_model->set_diplome($id);
            //$this->load->view('diplome/success');
            redirect( base_url() . 'index.php/diplome');
        }
    }

    public function delete()
    {
        $id = $this->uri->segment(3);

        if (empty($id))
        {
            show_404();
        }

        $diplome_item = $this->diplome_model->get_diplome_by_id($id);

        $this->diplome_model->delete_diplome($id);
        redirect( base_url() . 'index.php/diplome');
    }
}

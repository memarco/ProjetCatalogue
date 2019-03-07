<?php
class Composante extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if( !$this->session->userdata('isLoggedIn') ) {
        redirect('/login/show_login');
    }
        $this->load->model('composante_model');
        $this->load->helper('url_helper');
        $this->load->library("pagination");
    }

    public function index()
    {
        //$data['composante'] = $this->composante_model->get_composante();
        $data['title'] = 'Les composantes de l\'U-PEC';
        $data['name'] = $this->session->userdata('name');

        $data['total_composante'] = $this->composante_model->record_count();

        $config = array();
        $config["base_url"] = base_url() . "index.php/composante/index";
        $total_row = $this->composante_model->record_count();
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
            $page = 0;
            }
        $data["composante"] = $this->composante_model->get_composante(FALSE, $config["per_page"], $page);
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;',$str_links );

        $this->load->view('composante/index', $data);

    }

    public function view($mail1 = NULL)
    {
        $data['name'] = $this->session->userdata('name');
        $data['composante_item'] = $this->composante_model->get_composante($mail1,0,1);

        $data['total_composante'] = $this->composante_model->record_count();

        if (empty($data['composante_item']))
        {
            show_404();
        }

        $data['nom'] = $data['composante_item']['nom'];

        $this->load->view('templates/header', $data);
        $this->load->view('composante/view', $data);

    }

    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Nouvelle composante de l\'U-PEC';
        $data['name'] = $this->session->userdata('name');

        $this->form_validation->set_rules('nom', 'Nom', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('composante/create'); 
        }
        else
        {
            $this->composante_model->set_composante();
            $this->load->view('templates/header', $data);
            $this->load->view('composante/success');

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
        $data['composante_item'] = $this->composante_model->get_composante_by_id($id);

        $this->form_validation->set_rules('nom', 'Nom', 'required');
        $this->form_validation->set_rules('mail1', 'Mail 1', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('composante/edit', $data);


        }
        else
        {
            $this->composante_model->set_composante($id);
            //$this->load->view('composante/success');
            redirect( base_url() . 'index.php/composante');
        }
    }

    public function delete()
    {
        $id = $this->uri->segment(3);

        if (empty($id))
        {
            show_404();
        }

        $composante_item = $this->composante_model->get_composante_by_id($id);

        $this->composante_model->delete_composante($id);
        redirect( base_url() . 'index.php/composante');
    }
}

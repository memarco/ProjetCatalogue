<?php
class Type_stage extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if( !$this->session->userdata('isLoggedIn') ) {
        redirect('/login/show_login');
    }
        $this->load->model('type_stage_model');
        $this->load->helper('url_helper');
    }

    public function index()
    {
        $data['type_stage'] = $this->type_stage_model->get_type_stage();
        $data['title'] = 'Les types de stages de formations';
        $data['name'] = $this->session->userdata('name');

        $data['total_type_stage'] = $this->type_stage_model->record_count();

        $this->load->view('templates/header', $data);
        $this->load->view('type_stage/index', $data);

    }

    public function view($mail1 = NULL)
    {
        $data['name'] = $this->session->userdata('name');

        $data['type_stage_item'] = $this->type_stage_model->get_type_stage($mail1,0,1);

        $data['total_type_stage'] = $this->type_stage_model->record_count();

        if (empty($data['type_stage_item']))
        {
            show_404();
        }

        $data['nom'] = $data['type_stage_item']['nom'];

        $this->load->view('templates/header', $data);
        $this->load->view('type_stage/view', $data);

    }

    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Nouveau type_stage d\'étude';
        $data['name'] = $this->session->userdata('name');

        $this->form_validation->set_rules('nom', 'Nom', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('type_stage/create');


        }
        else
        {
            $this->type_stage_model->set_type_stage();
            $this->load->view('templates/header', $data);
            $this->load->view('type_stage/success');

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
        $data['type_stage_item'] = $this->type_stage_model->get_type_stage_by_id($id);

        $this->form_validation->set_rules('nom', 'Nom', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('type_stage/edit', $data);


        }
        else
        {
            $this->type_stage_model->set_type_stage($id);
            //$this->load->view('type_stage/success');
            redirect( base_url() . 'index.php/type_stage');
        }
    }

    public function delete()
    {
        $id = $this->uri->segment(3);

        if (empty($id))
        {
            show_404();
        }

        $type_stage_item = $this->type_stage_model->get_type_stage_by_id($id);

        $this->type_stage_model->delete_type_stage($id);
        redirect( base_url() . 'index.php/type_stage');
    }
}

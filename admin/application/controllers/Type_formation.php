<?php
class type_formation extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if( !$this->session->userdata('isLoggedIn') ) {
        redirect('/login/show_login');
    }
        $this->load->model('type_formation_model');
        $this->load->helper('url_helper');

    }

    public function index()
    {
      $data['type_formation'] = $this->type_formation_model->get_type_formation();
        $data['title'] = 'Les type de formations de l\'U-PEC';
        $data['name'] = $this->session->userdata('name');
        $data['total_type_formation'] = $this->type_formation_model->record_count();
 
        $this->load->view('type_formation/index', $data);

    }

    public function view($mail1 = NULL)
    {
        $data['name'] = $this->session->userdata('name');
        $data['type_formation_item'] = $this->type_formation_model->get_type_formation($mail1,0,1);

        $data['total_type_formation'] = $this->type_formation_model->record_count();
        if (empty($data['type_formation_item']))
        {
            show_404();
        }

        $data['nom'] = $data['type_formation_item']['nom'];

        $this->load->view('templates/header', $data);
        $this->load->view('type_formation/view', $data);

    }

    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Nouveau type_formation d\'étude';
        $data['name'] = $this->session->userdata('name');

        $this->form_validation->set_rules('nom', 'Nom', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('type_formation/create');


        }
        else
        {
            $this->type_formation_model->set_type_formation();
            $this->load->view('templates/header', $data);
            $this->load->view('type_formation/success');

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
        $data['type_formation_item'] = $this->type_formation_model->get_type_formation_by_id($id);

        $this->form_validation->set_rules('nom', 'Nom', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('type_formation/edit', $data);


        }
        else
        {
            $this->type_formation_model->set_type_formation($id);
            //$this->load->view('type_formation/success');
            redirect( base_url() . 'index.php/type_formation');
        }
    }

    public function delete()
    {
        $id = $this->uri->segment(3);

        if (empty($id))
        {
            show_404();
        }

        $type_formation_item = $this->type_formation_model->get_type_formation_by_id($id);

        $this->type_formation_model->delete_type_formation($id);
        redirect( base_url() . 'index.php/type_formation');
    }
}

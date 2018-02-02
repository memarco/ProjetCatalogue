<?php
class Type_periode extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if( !$this->session->userdata('isLoggedIn') ) {
        redirect('/login/show_login');
    }
        $this->load->model('type_periode_model');
        $this->load->helper('url_helper');
    }

    public function index()
    {
        $data['type_periode'] = $this->type_periode_model->get_type_periode();
        $data['title'] = 'Les rythmes d\'alternance';
        $data['name'] = $this->session->userdata('name');
        $data['total_type_periode'] = $this->type_periode_model->record_count();

        $this->load->view('templates/header', $data);
        $this->load->view('type_periode/index', $data);

    }

    public function view($mail1 = NULL)
    {

        $data['name'] = $this->session->userdata('name');

        $data['type_periode_item'] = $this->type_periode_model->get_type_periode($mail1,0,1);

         $data['total_type_periode'] = $this->type_periode_model->record_count();

        if (empty($data['type_periode_item']))
        {
            show_404();
        }

        $data['nom'] = $data['type_periode_item']['nom'];

        $this->load->view('templates/header', $data);
        $this->load->view('type_periode/view', $data);

    }

    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Nouveau rythme d\'alternance';
        $data['name'] = $this->session->userdata('name');

        $this->form_validation->set_rules('nom', 'Nom', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('type_periode/create');


        }
        else
        {
            $this->type_periode_model->set_type_periode();
            $this->load->view('templates/header', $data);
            $this->load->view('type_periode/success');

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
        $data['type_periode_item'] = $this->type_periode_model->get_type_periode_by_id($id);

        $this->form_validation->set_rules('nom', 'Nom', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('type_periode/edit', $data);


        }
        else
        {
            $this->type_periode_model->set_type_periode($id);
            //$this->load->view('type_periode/success');
            redirect( base_url() . 'index.php/type_periode');
        }
    }

    public function delete()
    {
        $id = $this->uri->segment(3);

        if (empty($id))
        {
            show_404();
        }

        $type_periode_item = $this->type_periode_model->get_type_periode_by_id($id);

        $this->type_periode_model->delete_type_periode($id);
        redirect( base_url() . 'index.php/type_periode');
    }
}

<?php
class Filiere extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
        if( !$this->session->userdata('isLoggedIn') ) {
        redirect('/login/show_login');
    }
        $this->load->model('filiere_model');
        $this->load->helper('url_helper');
    }
 
    public function index()
    {
        $data['filiere'] = $this->filiere_model->get_filiere();
        $data['title'] = 'Les filieres de l\'U-PEC';
        $data['name'] = $this->session->userdata('name');
 
        $this->load->view('templates/header', $data);
        $this->load->view('filiere/index', $data);
        
    }
 
    public function view($mail1 = NULL)
    {
        $data['filiere_item'] = $this->filiere_model->get_filiere($mail1);
        
        if (empty($data['filiere_item']))
        {
            show_404();
        }
 
        $data['nom'] = $data['filiere_item']['nom'];
 
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
        
        $data['title'] = 'Modifier les informations';        
        $data['filiere_item'] = $this->filiere_model->get_filiere_by_id($id);
        
        $this->form_validation->set_rules('nom', 'Nom', 'required'); 
 
        if ($this->form_validation->run() === FALSE)
        {
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

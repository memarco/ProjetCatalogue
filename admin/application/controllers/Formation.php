<?php
class Formation extends CI_Controller {
 
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
    }
 
    public function index()
    {
        $data['formation'] = $this->formation_model->get_formation();
        $data['title'] = 'Les formations de l\'U-PEC';
        $data['name'] = $this->session->userdata('name');
 
        $this->load->view('templates/header', $data);
        $this->load->view('formation/index', $data);
         
         
    }
 
    public function view($mail1 = NULL)
    {
        $data['formation_item'] = $this->formation_model->get_formation($mail1);
        
        if (empty($data['formation_item']))
        {
            show_404();
        }
 
        $data['mention'] = $data['formation_item']['mention'];
 
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
            $data['domaine'] = $this->domaine_model->get_domaine();
            $data['type_formation'] = $this->type_formation_model->get_type_formation();
            $data['filiere'] = $this->filiere_model->get_filiere();
            $data['diplome'] = $this->diplome_model->get_diplome();
            $data['composante'] = $this->composante_model->get_composante();
            $data['site'] = $this->site_model->get_site();
            $data['type_periode'] = $this->type_periode_model->get_type_periode();
            $data['type_stage'] = $this->type_stage_model->get_type_stage();
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
        
        if (empty($id))
        {
            show_404();
        }
        
        $this->load->helper('form');
        $this->load->library('form_validation');
        
        $data['title'] = 'Modifier les informations';         
        $data['formation_item'] = $this->formation_model->get_formation_by_id($id);
        
        $this->form_validation->set_rules('nom', 'Nom', 'required'); 
 
        if ($this->form_validation->run() === FALSE)
        {
            $data['niveau'] = $this->niveau_model->get_niveau(); 
            $this->load->model('formation_model'); 
            $this->load->view('templates/header', $data);
            $this->load->view('formation/edit', $data);
            
 
        }
        else
        {
            $this->formation_model->set_formation($id);
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
}

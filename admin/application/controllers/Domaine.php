<?php
class Domaine extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
        if( !$this->session->userdata('isLoggedIn') ) {
        redirect('/login/show_login');
    }
        $this->load->model('domaine_model');
        $this->load->helper('url_helper');


    }
 
    public function index()
    {
        $data['domaine'] = $this->domaine_model->get_domaine();
        $data['title'] = 'Les domaines de l\'U-PEC';
        $data['name'] = $this->session->userdata('name');
 
        $this->load->view('templates/header', $data);
        $this->load->view('domaine/index', $data);
        
    }
 
    public function view($mail1 = NULL)
    {
        $data['domaine_item'] = $this->domaine_model->get_domaine($mail1);
        $data['name'] = $this->session->userdata('name');
        
        if (empty($data['domaine_item']))
        {
            show_404();
        }
 
        $data['nom'] = $data['domaine_item']['nom'];
 
        $this->load->view('templates/header', $data);
        $this->load->view('domaine/view', $data);
        
    }
    
    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
 
        $data['title'] = 'Nouveau domaine d\'étude';
        $data['name'] = $this->session->userdata('name');
 
        $this->form_validation->set_rules('nom', 'Nom', 'required'); 
 
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('domaine/create');
            
 
        }
        else
        {
            $this->domaine_model->set_domaine();
            $this->load->view('templates/header', $data);
            $this->load->view('domaine/success');
            
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
        $data['domaine_item'] = $this->domaine_model->get_domaine_by_id($id);
        
        $this->form_validation->set_rules('nom', 'Nom', 'required'); 
 
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('domaine/edit', $data);
            
 
        }
        else
        {
            $this->domaine_model->set_domaine($id);
            //$this->load->view('domaine/success');
            redirect( base_url() . 'index.php/domaine');
        }
    }
    
    public function delete()
    {
        $id = $this->uri->segment(3);
        
        if (empty($id))
        {
            show_404();
        }
                
        $domaine_item = $this->domaine_model->get_domaine_by_id($id);
        
        $this->domaine_model->delete_domaine($id);        
        redirect( base_url() . 'index.php/domaine');        
    }



}

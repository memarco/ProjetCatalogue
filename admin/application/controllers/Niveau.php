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
    }
 
    public function index()
    {
        $data['niveau'] = $this->niveau_model->get_niveau();
        $data['title'] = 'Les niveaus de l\'U-PEC';
        $data['name'] = $this->session->userdata('name');
 
        $this->load->view('templates/header', $data);
        $this->load->view('niveau/index', $data);
        
    }
 
    public function view($mail1 = NULL)
    {
        $data['niveau_item'] = $this->niveau_model->get_niveau($mail1);
        
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
        
        $data['title'] = 'Modifier les informations';
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

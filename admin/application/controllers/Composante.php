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
    }
 
    public function index()
    {
        $data['composante'] = $this->composante_model->get_composante();
        $data['title'] = 'Les composantes de l\'U-PEC';
        $data['name'] = $this->session->userdata('name');
 
        $this->load->view('templates/header', $data);
        $this->load->view('composante/index', $data);
        
    }
 
    public function view($mail1 = NULL)
    {
        $data['composante_item'] = $this->composante_model->get_composante($mail1);
        
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
        
        $data['title'] = 'Modifier les informations';   
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

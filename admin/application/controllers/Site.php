<?php
class Site extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
        if( !$this->session->userdata('isLoggedIn') ) {
        redirect('/login/show_login');
    }
        $this->load->model('site_model');
        $this->load->helper('url_helper');
    }
 
    public function index()
    {
        $data['site'] = $this->site_model->get_site();
        $data['title'] = 'Les sites de l\'U-PEC';
        $data['name'] = $this->session->userdata('name');
 
        $this->load->view('templates/header', $data);
        $this->load->view('site/index', $data);
        
    }
 
    public function view($cp_site = NULL)
    {
        $data['site_item'] = $this->site_model->get_site($cp_site);
        
        if (empty($data['site_item']))
        {
            show_404();
        }
 
        $data['nom'] = $data['site_item']['nom'];
 
        $this->load->view('templates/header', $data);
        $this->load->view('site/view', $data);
        
    }
    
    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
 
        $data['title'] = 'Nouveau site de l\'U-PEC';
        $data['name'] = $this->session->userdata('name');
 
        $this->form_validation->set_rules('nom', 'Nom', 'required');
        $this->form_validation->set_rules('adresse', 'Adresse', 'required');
        $this->form_validation->set_rules('cp_site', 'Code Postal', 'required|min_length[5]|max_length[12]|integer');
 
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('site/create');
            
 
        }
        else
        {
            $this->site_model->set_site();
            $this->load->view('templates/header', $data);
            $this->load->view('site/success');
            
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
        $data['name'] = $this->session->userdata('name');
        
        $data['title'] = 'Modifier les informations';        
        $data['site_item'] = $this->site_model->get_site_by_id($id);
        
        $this->form_validation->set_rules('nom', 'Nom', 'required');
        $this->form_validation->set_rules('cp_site', 'Code Postal', 'required');
 
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('site/edit', $data);
            
 
        }
        else
        {
            $this->site_model->set_site($id);
            //$this->load->view('site/success');
            redirect( base_url() . 'index.php/site');
        }
    }
    
    public function delete()
    {
        $id = $this->uri->segment(3);
        
        if (empty($id))
        {
            show_404();
        }
                
        $site_item = $this->site_model->get_site_by_id($id);
        
        $this->site_model->delete_site($id);        
        redirect( base_url() . 'index.php/site');        
    }
}

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
        $this->load->library("pagination");
    }

    public function index()
    {
        //$data['site'] = $this->site_model->get_site();
        $data['title'] = 'Les sites de l\'U-PEC';
        $data['name'] = $this->session->userdata('name');
        $data['total_site'] = $this->site_model->record_count();

        $config = array();
        $config["base_url"] = base_url() . "index.php/site/index";
        $total_row = $this->site_model->record_count();
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
        $data["site"] = $this->site_model->get_site(FALSE, $config["per_page"], $page);
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;',$str_links );

        $this->load->view('site/index', $data);

    }

    public function view($cp_site = NULL)
    {
         $data['name'] = $this->session->userdata('name');
        $data['site_item'] = $this->site_model->get_site($cp_site,0,1);

        $data['total_site'] = $this->site_model->record_count();

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

        $data['title'] = 'Modification des informations';
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

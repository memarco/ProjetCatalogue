<?php
class Page extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if( !$this->session->userdata('isLoggedIn') ) {
        redirect('/login/show_login');
    }
        $this->load->model('page_model');
        $this->load->helper('url_helper');
        $this->load->library("pagination");
    }

    public function index()
    {
        //$data['page'] = $this->page_model->get_page();
        $this->load->model('post_m');
        $data['title'] = 'Les pages de l\'U-PEC';
        $data['name'] = $this->session->userdata('name');

        $data['total_page'] = $this->page_model->record_count();

        $config = array();
        $config["base_url"] = base_url() . "index.php/page/index";
        $total_row = $this->page_model->record_count();
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
          $page = (($this->uri->segment(3))-1)*5 ;
            }
            else{
            $page = 0;
            }
        $data["page"] = $this->page_model->get_page(FALSE,$page, $config["per_page"]);
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;',$str_links );

        $data['page_content'] = $this->post_m->get_page_content(0);
        $this->load->view('page/home', $data);
        $this->load->view('editor/examples/demo.htm');

    }

    public function get_content()
    {
      $id_page = $this->uri->segment(3);
      $this->load->model('post_m');
      $data['page_content'] = $this->post_m->get_page_content($id_page);
      //add the header here
        header('Content-Type: application/json');
        echo json_encode( $data );
    }

    public function save_content()
    {
          $content = $_REQUEST['page_content'];
          $id_page = $this->uri->segment(3);

          $this->page_model->update_content($id_page,$content);

          echo json_encode($content);
    }

    public function view($mail1 = NULL)
    {
        $data['name'] = $this->session->userdata('name');
        $data['page_item'] = $this->page_model->get_page($mail1,0,1);

        $data['total_page'] = $this->page_model->record_count();

        if (empty($data['page_item']))
        {
            show_404();
        }

        $data['nom_page'] = $data['page_item']['nom_page'];

        $this->load->view('templates/header', $data);
        $this->load->view('page/view', $data);

    }

    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Nouvelle page';
        $data['name'] = $this->session->userdata('name');

        $this->form_validation->set_rules('nom_page', 'Nom', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('page/create');


        }
        else
        {
            $this->page_model->set_page();
            $this->load->view('templates/header', $data);
            $this->load->view('page/success');

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
        $data['page_item'] = $this->page_model->get_page_by_id($id);

        $this->form_validation->set_rules('nom_page', 'Nom', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('page/edit', $data);


        }
        else
        {
            $this->page_model->set_page($id);
            //$this->load->view('page/success');
            redirect( base_url() . 'index.php/page');
        }
    }

    public function delete()
    {
        $id = $this->uri->segment(3);

        if (empty($id))
        {
            show_404();
        }

        $page_item = $this->page_model->get_page_by_id($id);

        $this->page_model->delete_page($id);
        redirect( base_url() . 'index.php/page');
    }
}

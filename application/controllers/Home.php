<?php
class Home extends CI_CONTROLLER{
    public function __construct(){
        parent::__construct();
        $this->load->model('Home_model');

        if($this->session->userdata('status') != "login"){
            $this->session->set_flashdata('login', 'Maaf, Anda harus login terlebih dahulu');
			redirect(base_url("login"));
		}
    }

    public function index(){
        $data['header'] = 'Home';
        $data['title'] = 'Home';
        $data['program'] = $this->Home_model->getProgram();

        $this->load->view("templates/header", $data);
        $this->load->view("templates/sidebar");
        $this->load->view("home/index", $data);
        $this->load->view("templates/footer");
    }
}
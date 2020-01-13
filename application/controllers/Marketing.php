<?php

class Marketing extends CI_CONTROLLER{
    public function __construct(){
        parent::__construct();
        $this->load->model("Marketing_model");
    }

    public function si(){
        $data['header'] = 'List Marketing Sharia Institute';
        $data['title'] = 'List Marketing Sharia Institute';
        $data['tab'] = 'si';
        $data['marketing'] = $this->Marketing_model->getAllMarketingSi();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('modal/modal_marketing_si');
        $this->load->view('marketing/marketing_si', $data);
        $this->load->view('templates/footer');
    }
    
    public function agency(){
        $data['header'] = 'List Marketing Agency';
        $data['title'] = 'List Marketing Agency';
        $data['tab'] = 'agency';
        $data['marketing'] = $this->Marketing_model->getAllMarketingAgency();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('modal/modal_marketing_agency');
        $this->load->view('marketing/marketing_agency', $data);
        $this->load->view('templates/footer');
    }
    
    public function getMarketingById(){
        $kd_marketing = $_POST['kd_marketing'];
        $table = $_POST['tabel'];
        $marketing = $this->Marketing_model->getMarketingById($table, $kd_marketing);
        echo json_encode($marketing);
    }

    public function editMarketingAgency(){
        $this->Marketing_model->editMarketingAgency();
        $this->session->set_flashdata('marketing', 'diedit');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function editMarketingSi(){
        $this->Marketing_model->editMarketingSi();
        $this->session->set_flashdata('marketing', 'diedit');
        redirect($_SERVER['HTTP_REFERER']);
    }
}
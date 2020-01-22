<?php

class Lac extends CI_CONTROLLER{
    public function __construct(){
        parent::__construct();
        $this->load->model("Lac_model");
    }

    public function listLac(){
        if($this->session->userdata("level") != "super" && $this->session->userdata("level") != "adminsi"){
            $this->session->set_flashdata('login', 'Maaf, Anda harus login terlebih dahulu');
			redirect(base_url("login"));
        }

        $level = $this->session->userdata("level");

        $data['header'] = 'List LAC';
        $data['title'] = 'List LAC';
        $lac = $this->Lac_model->getAllLac();
        $data['lac'] = [];

        foreach ($lac as $key => $lac) {
            $data['lac'][$key] = $lac;
            $data['lac'][$key]['marketing'] = COUNT($this->Lac_model->getAllMarketingSi($lac['id_lac']));
            $data['lac'][$key]['aktif'] = COUNT($this->Lac_model->getMarketingAktifSi($lac['id_lac']));
            $data['lac'][$key]['nonaktif'] = COUNT($this->Lac_model->getMarketingNonaktifSi($lac['id_lac']));
        }

        $this->load->view('templates/header', $data);

        if($level == "super") {
            $this->load->view('templates/sidebar');
        } else if($level == "adminsi") {
            $this->load->view('templates/si_sidebar');
        }
        
        $this->load->view('modal/modal_add_lac');
        $this->load->view('modal/modal_lac', $data);
        $this->load->view('lac/lac', $data);
        $this->load->view('templates/footer');
    }

    public function getLacById(){
        $id_lac = $_POST['id_lac'];
        $lac = $this->Lac_model->getLacById($id_lac);
        echo json_encode($lac);
    }

    public function getMarketingAktifSi(){
        $id_lac = $_POST['id_lac'];
        $lac = $this->Lac_model->getMarketingAktifSi($id_lac);
        echo json_encode($lac);
    }

    public function getMarketingNonaktifSi(){
        $id_lac = $_POST['id_lac'];
        $lac = $this->Lac_model->getMarketingNonaktifSi($id_lac);
        echo json_encode($lac);
    }

    public function edit(){
        $id_lac = $_POST['id_lac'];
        $this->Lac_model->editLac();
        $this->session->set_flashdata('lac', 'diedit');
        redirect($_SERVER['HTTP_REFERER']);
        
    }

    public function pindahLac(){
        $this->Lac_model->pindahLac();
        $this->session->set_flashdata('marketing', 'Berhasil memindahkan marketing');
        redirect($_SERVER['HTTP_REFERER']);

    }

    public function tambahLac(){
        $this->Lac_model->tambahLac();
        $this->session->set_flashdata('lac', 'ditambahkan');
        redirect($_SERVER['HTTP_REFERER']);
    }
}
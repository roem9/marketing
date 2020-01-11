<?php

class Lac extends CI_CONTROLLER{
    public function __construct(){
        parent::__construct();
        $this->load->model("Lac_model");
    }

    public function listLac(){
        $data['header'] = 'List LAC';
        $data['title'] = 'List LAC';

        $lac = $this->Lac_model->getAllLac();
        $data['lac'] = [];

        foreach ($lac as $key => $lac) {
            $data['lac'][$key] = $lac;
            $data['lac'][$key]['marketing'] = COUNT($this->Lac_model->getAllMarketing($lac['id_lac']));
            $data['lac'][$key]['aktif'] = COUNT($this->Lac_model->getMarketingAktif($lac['id_lac']));
            $data['lac'][$key]['nonaktif'] = COUNT($this->Lac_model->getMarketingNonaktif($lac['id_lac']));
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('modal/modal_lac');
        $this->load->view('lac/lac', $data);
        $this->load->view('templates/footer');
    }
}
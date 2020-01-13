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
    
    
    public function inputMarketingAgency($id_agency, $nama_agency){
        $this->load->model("Agency_model");

        $data['title'] = 'Input Marketing Agency';
        $data['agency'] = $this->Agency_model->getAgencyByIdByName($id_agency, $nama_agency);

        $this->load->view('templates/header', $data);
        $this->load->view('marketing/input_marketing_agency', $data);
        $this->load->view('templates/footer');
    }

    public function insertMarketingAgency(){
        $email = $this->input->post("email", true);
        $hp = $this->input->post("no_wa", true);

        $cek_email_agency = $this->Marketing_model->cekEmailAgency($email);
        $cek_hp_agency = $this->Marketing_model->cekHpAgency($hp);
        $cek_email_si = $this->Marketing_model->cekEmailSi($email);
        $cek_hp_si = $this->Marketing_model->cekHpSi($hp);

        if($cek_email_agency == 0 || $cek_hp_agency == 0 || $cek_email_si == 0 || $cek_hp_si == 0){
            $this->session->set_flashdata('gagal', 'Gagal mendaftarkan agency karena email atau no hp Anda sudah digunakan');
        } else {
            $kd_marketing = $this->Marketing_model->getKdMarketingAgency();
            $this->Marketing_model->insertMarketingAgency($kd_marketing);
        
            $this->load->config('email');
            $this->load->library('email');
            $this->email->set_mailtype("html");
        
            $email = $this->input->post("email", TRUE);
            $nama_agency = $this->input->post("nama_agency", TRUE);

            // var_dump($email);
            $from = $this->config->item('smtp_user');
            $to = $email;
            $subject = 'AGENCY PROPERTY MEMBER OF SHARIA GRUP INDONESIA';
            $message = '
            Terima kasih untuk Anda atas registrasi untuk Kode Unik Marketing<br><br>
            Anda telah terdaftar dengan Nomor Kode Unik Marketing (KUM) : {$kd_marketing} <br><br>
            Dan tergabung dalam Team Agency Sharia Institute Member of Sharia Grup Indonesia<br><br>
            Silahkan disimpan dengan baik dan diingat untuk Kode Unik Marketingnya<br><br>
            Kode Unik Marketing ini digunakan dengan baik dan bijak,<br><br>
            PERHATIAN! : KODE UNIK MARKETING INI BERLAKU HANYA DI DALAM NAUNGAN TEAM MEMBER OF SHARIA GRUP INDONESIA<br><br>
            Terima Kasih banyak, kami do\'akan selalu Anda makin closing rutin property setiap bulan dari satuan hingga puluhan unit, makin kaya berkah melimpah serta selalu bersyukur kepada Allah<br><br>
            Aamiin...<br><br>
            Akhirul Kalam,<br><br>
            Jazakumullah Khair<br><br>
            Sharia Grup Indonesia,<br><br>
            Menjadi Perusahaan Berbasis Syariah No Satu di Indonesia    ';

            $this->email->set_newline("\r\n");
            $this->email->from($from);
            $this->email->to($to);
            $this->email->subject($subject);
            $this->email->message($message);
            
            if ($this->email->send()) {
                $this->Agency_model->hapusAgency($id_agency);
            }

            $this->session->set_flashdata('berhasil', 'Berhasil mendaftarkan data marketing Anda. Silahkan mengecek email untuk mendapatkan kode marketing');
        }
        redirect($_SERVER['HTTP_REFERER']);

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
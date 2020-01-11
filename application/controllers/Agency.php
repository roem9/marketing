<?php
class Agency extends CI_CONTROLLER{
    public function __construct(){
        parent::__construct();
        $this->load->model("Agency_model");
        
        if($this->session->userdata('level') != "super"){
            $this->session->set_flashdata('login', 'Maaf, Anda harus login terlebih dahulu');
			redirect(base_url("login"));
		}
    }

    public function batch($batch){
        $data['header'] = 'List Agency Batch ' . $batch;
        $data['title'] = 'List Agency Batch ' . $batch;
        $agency = $this->Agency_model->getAllAgencyByBatch($batch);
        $data['agency'] = [];

        foreach ($agency as $key => $agency) {
            $data['agency'][$key] = $agency;
            $data['agency'][$key]['marketing'] = COUNT($this->Agency_model->getAllMarketing($agency['id_agency']));
            $data['agency'][$key]['aktif'] = COUNT($this->Agency_model->getMarketingAktif($agency['id_agency']));
            $data['agency'][$key]['nonaktif'] = COUNT($this->Agency_model->getMarketingNonaktif($agency['id_agency']));
        }
        $data['batch'] = $batch;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('modal/modal_add_agency');
        $this->load->view('modal/modal_agency');
        $this->load->view('modal/modal_link');
        $this->load->view('agency/agency', $data);
        $this->load->view('templates/footer');
    }

    public function konfirmasi(){
        $data['header'] = 'List Agency Konfirmasi';
        $data['title'] = 'List Agency Konfirmasi';
        $data['agency'] = $this->Agency_model->getAllAgencyKonfirm();
        $data['batch'] = 6;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('modal/modal_add_agency');
        $this->load->view('modal/modal_agency');
        $this->load->view('agency/konfirm-agency', $data);
        $this->load->view('templates/footer');
    }

    public function konfirm(){
        $num = count($_POST['id_agency']);
        
        $this->load->config('email');
        $this->load->library('email');
        
        if($this->input->post("hapus")){
            foreach ($_POST['id_agency'] as $id_agency) {

                $cek_email = $this->Agency_model->getAgencyById($id_agency);;
                $email = $cek_email['email'];
                $nama_agency = $cek_email['nama_agency'];

                // var_dump($email);
                $from = $this->config->item('smtp_user');
                $to = $email;
                $subject = 'cek';
                $message = 'ditolak boy';
    
                $this->email->set_newline("\r\n");
                $this->email->from($from);
                $this->email->to($to);
                $this->email->subject($subject);
                $this->email->message($message);
                
                if ($this->email->send()) {
                    $this->Agency_model->hapusAgency($id_agency);
                }
            }
            $this->session->set_flashdata('konfirm', 'Berhasil menghapus ' . $num . ' agency');

        } else {
            foreach ($_POST['id_agency'] as $id_agency) {
                
                $cek_email = $this->Agency_model->getAgencyById($id_agency);;
                $email = $cek_email['email'];
                $nama_agency = $cek_email['nama_agency'];

                $from = $this->config->item('smtp_user');
                $to = $email;
                $subject = 'cek';
                $message = "diterima cuy";
    
                $this->email->set_newline("\r\n");
                $this->email->from($from);
                $this->email->to($to);
                $this->email->subject($subject);
                $this->email->message($message);

                if ($this->email->send()) {
                    $this->Agency_model->konfirmAgency($id_agency);
                }

            }
            $this->session->set_flashdata('konfirm', 'Berhasil mengkonfirmasi ' . $num . ' agency');
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function formAgency(){
        $data['header'] = 'List Agency';
        $data['title'] = 'List Agency';

        $this->load->view('templates/header', $data);
        $this->load->view('agency/form-agency', $data);
        $this->load->view('templates/footer');
    }
    
    public function tambahAgency(){
        $email = $this->input->post("email", true);
        $hp = $this->input->post("no_wa", true);

        $cek_email = $this->Agency_model->cekEmail($email);
        $cek_hp = $this->Agency_model->cekHp($hp);

        if($cek_email == 0 && $cek_hp == 0){
            $this->load->config('email');
            $this->load->library('email');
            $nama_agency = rawurlencode($this->input->post("nama_agency", true));
            $id = $this->Agency_model->getLastId();
            $id_agency = $id['id_agency'] + 1;
            
            $from = $this->config->item('smtp_user');
            $to = $this->input->post('email', true);
            $subject = 'cek';
            $message = base_url() . 'agency/akad/' .$id_agency. '/' . $nama_agency;

            $this->email->set_newline("\r\n");
            $this->email->from($from);
            $this->email->to($to);
            $this->email->subject($subject);
            $this->email->message($message);

            if ($this->email->send()) {
                $this->Agency_model->tambahAgency();
            }
            
            $this->session->set_flashdata('berhasil', 'Data agency Anda sudah terdaftar, silahkan cek email Anda untuk melanjutkan pembuatan akad');
        } else {
            
            $this->session->set_flashdata('gagal', 'Gagal mendaftarkan agency karena email atau no hp Anda sudah digunakan');
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function editAgency(){
        $this->Agency_model->editAgency();
        
        $this->session->set_flashdata('agency', 'diedit');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function getAgencyById(){
        $id_agency = $_POST['id_agency'];
        $agency = $this->Agency_model->getAgencyById($id_agency);
        echo json_encode($agency);
    }

    public function akad($id_agency, $nama_agency){
    // public function akad(){
        $data['header'] = 'Form Akad';
        $data['title'] = 'Form Akad';
        $data['agency'] = $this->Agency_model->getAgencyByIdByName($id_agency, $nama_agency);

        // var_dump($data['agency']);
        $this->load->view('templates/header', $data);
        $this->load->view('agency/form-akad', $data);
        $this->load->view('templates/footer');
    }

    public function buatAkad(){
        $id_agency = $this->input->post("id_agency", true);

        $foto = $this->Agency_model->uploadGambar($id_agency);

        $this->Agency_model->insertAkad($id_agency, $foto);

        redirect($_SERVER['HTTP_REFERER']);
    }

    public function suratAkad($id_agency, $nama_agency){
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P', 'margin_top' => '43', 'margin_left' => '25', 'margin_right' => '25', 'margin_bottom' => '40']);
        
        $mpdf->SetDefaultBodyCSS('background', "url('assets/img/kop.png')");
        $mpdf->SetDefaultBodyCSS('background-image-resize', 6);

        $mpdf->SetHTMLFooter('
        <table width="100%" style="font-size: 10px; margin-bottom: 6px">
            <tr>
                <td align="left">Page {PAGENO} of {nbpg}</td>
            </tr>
        </table>');
        
        $akad['akad'] = $this->Agency_model->getSuratAkad($id_agency, $nama_agency);

		$data = $this->load->view('agency/akad', $akad, TRUE);
		$mpdf->WriteHTML($data);
		$mpdf->Output();
    }
    

    public function getMarketingAktif(){
        $id_agency = $_POST['id_agency'];
        $agency = $this->Agency_model->getMarketingAktif($id_agency);
        echo json_encode($agency);
    }

    public function getMarketingNonaktif(){
        $id_agency = $_POST['id_agency'];
        $agency = $this->Agency_model->getMarketingNonaktif($id_agency);
        echo json_encode($agency);
    }
}
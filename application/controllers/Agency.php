<?php
class Agency extends CI_CONTROLLER{
    public function __construct(){
        parent::__construct();
        $this->load->model("Agency_model");
    }

    public function batch($batch){
        if($this->session->userdata('level') != "super" && $this->session->userdata('level') != "adminagency"){
            $this->session->set_flashdata('login', 'Maaf, Anda harus login terlebih dahulu');
			redirect(base_url("login"));
        }

        $level = $this->session->userdata('level');
        
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

        if($level == 'super'){
            $this->load->view('templates/sidebar');
        } else if($level == 'adminagency'){
            $this->load->view('templates/agency_sidebar');
        };

        $this->load->view('modal/modal_agency');
        $this->load->view('agency/agency', $data);
        $this->load->view('templates/footer');
    }

    public function konfirmasi(){
        if($this->session->userdata('level') != "super" && $this->session->userdata('level') != "adminagency"){
            $this->session->set_flashdata('login', 'Maaf, Anda harus login terlebih dahulu');
			redirect(base_url("login"));
        }
        
        $level = $this->session->userdata('level');
        
        $data['header'] = 'List Agency Konfirmasi';
        $data['title'] = 'List Agency Konfirmasi';
        $data['agency'] = $this->Agency_model->getAllAgencyKonfirm();
        $data['batch'] = 6;

        $this->load->view('templates/header', $data);
        
        if($level == 'super'){
            $this->load->view('templates/sidebar');
        } else if($level == 'adminagency'){
            $this->load->view('templates/agency_sidebar');
        };

        $this->load->view('modal/modal_agency');
        $this->load->view('agency/konfirm-agency', $data);
        $this->load->view('templates/footer');
    }

    public function konfirm(){
        if($this->session->userdata('level') != "super"){
            $this->session->set_flashdata('login', 'Maaf, Anda harus login terlebih dahulu');
			redirect(base_url("login"));
        }
        
        $num = count($_POST['id_agency']);
        
        $this->load->config('email');
        $this->load->library('email');
        $this->email->set_mailtype("html");
        
        if($this->input->post("hapus")){
            foreach ($_POST['id_agency'] as $id_agency) {

                $cek_email = $this->Agency_model->getAgencyById($id_agency);;
                $email = $cek_email['email'];
                $nama_agency = $cek_email['nama_agency'];

                // var_dump($email);
                $from = $this->config->item('smtp_user');
                $to = $email;
                $subject = 'AGENCY PROPERTY MEMBER OF SHARIA GRUP INDONESIA';
                $message = '
                <p><b>AGENCY PROPERTY MEMBER OF SHARIA GRUP INDONESIA</b></p><br>
                <p>Assalamua\'alaikum Warahmatullahi Wabarakatuh</p><br>
                <p>Mohon maaf, setelah meninjau registrasi Anda,
                saat ini kami tidak dapat menerima Anda untuk bergabung menjadi Agency Property.</p>
                <p>Kami tidak menyetujui registrasi Anda karena alasan-alasan yang tercantum dibawah ini:</p>
                <p>1. Data Anda belum terdaftar oleh Admin kami.<br>
                2. Data Anda telah didaftarkan sebelumnya (Data Ganda).</p><br><br><br><br><br><br><br><br><br><br>
                <p>Hormat kami,<br>
                Sharia Grup Indonesia<br>
                Recruitment Administrator</p>
                <p>Jalan Darul Quran Ruko C09-C10,<br>
                Loji, Bogor Barat, Kota Bogor. 16117</p>';
    
                $this->email->set_newline("\r\n");
                $this->email->from($from);
                $this->email->to($to);
                $this->email->subject($subject);
                $this->email->message($message);
                $this->email->send();
                $this->Agency_model->hapusAgency($id_agency);
            }
            $this->session->set_flashdata('konfirm', 'Berhasil menghapus ' . $num . ' agency');

        } else {
            foreach ($_POST['id_agency'] as $id_agency) {
                $cek_email = $this->Agency_model->getAgencyById($id_agency);;
                $email = $cek_email['email'];
                $nama_agency = $cek_email['nama_agency'];
                $nama_pemilik = $cek_email['nama_pemilik'];
                $no_wa = $cek_email['no_wa'];

                $from = $this->config->item('smtp_user');
                $to = $email;
                $subject = 'AGENCY PROPERTY MEMBER OF SHARIA GRUP INDONESIA';
                $message = "
                <p>AGENCY PROPERTY MEMBER OF SHARIA GRUP INDONESIA</p><br>
                <p>Assalamua'alaikum Warahmatullahi Wabarakatuh</p><br>
                <p>Selamat!</p>
                <p>Terima Kasih Telah Mendaftar</p>

                <table>
                    <tr>
                        <td>Nama Anda</td>
                        <td>: {$nama_pemilik}</td>
                    </tr>
                    <tr>
                        <td>No. WhatsApp</td>
                        <td>: {$no_wa}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>: {$email}</td>
                    </tr>
                    <tr>
                        <td>URL Akad</td>
                        <td>: " . base_url() . "agency/akad/{$id_agency}/" . rawurlencode($nama_agency) ."</td>
                    </tr>
                </table>
                <br><br><br><br><br>
                <p>Hormat kami,<br>
                Sharia Grup Indonesia<br>
                Recruitment Administrator</p>
                
                <p>Jalan Darul Quran Ruko C09-C10,<br>
                Loji, Bogor Barat, Kota Bogor. 16117</p>";
    
                $this->email->set_newline("\r\n");
                $this->email->from($from);
                $this->email->to($to);
                $this->email->subject($subject);
                $this->email->message($message);
                $this->email->send();
                $this->Agency_model->konfirmAgency($id_agency);
            }
            $this->session->set_flashdata('konfirm', 'Berhasil mengkonfirmasi ' . $num . ' agency');
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function formAgency(){
        $data['header'] = 'Form Agency';
        $data['title'] = 'Form Agency';

        $this->load->view('templates/header', $data);
        $this->load->view('agency/form-agency', $data);
        $this->load->view('templates/footer');
    }
    
    public function tambahAgency(){
        // var_dump($_FILES);
        $email = $this->input->post("email", true);
        $hp = $this->input->post("no_wa", true);

        $cek_email = $this->Agency_model->cekEmail($email);
        $cek_hp = $this->Agency_model->cekHp($hp);

        if($cek_email == 0 && $cek_hp == 0){
            $this->load->config('email');
            $this->load->library('email');
            $this->email->set_mailtype("html");

            $id = $this->Agency_model->getLastId();
            $id_agency = $id['id_agency'] + 1;

            $from = $this->config->item('smtp_user');
            $to = $this->input->post('email', true);
            $subject = 'AGENCY PROPERTY SHARIA GRUP INDONESIA';
            $message = '            
                        <p><b>SELAMAT DATANG DI SHARIA GRUP INDONESIA</b></p><br>
                        <p>Assalamua\'alaikum Warahmatullahi Wabarakatuh</p><br>
                        <p>Terima kasih sudah melakukan registrasi di Agency Property Member of Sharia Grup Indonesia.</p>
                        <p>Permintaan Anda telah dikirimkan ke sistem kami.</p> 
                        <p>Anda akan menerima email konfirmasi ketika registrasi Anda telah disetujui.</p>
                        <p>Silahkan menunggu konfirmasi selanjutnya selama 2 x 24 Jam.</p><br><br><br><br><br>
                        
                        <p>Hormat kami, </p>
                        <p>Sharia Grup Indonesia<br>
                        Recruitment Administrator</p>
                        <p>Jalan Darul Quran Ruko C09-C10,<br>
                        Loji, Bogor Barat, Kota Bogor. 16117</p>';

            $this->email->set_newline("\r\n");
            $this->email->from($from);
            $this->email->to($to);
            $this->email->subject($subject);
            $this->email->message($message);
            $this->email->send();
            $file = $this->Agency_model->uploadBuktiTransfer($id_agency);
            $this->Agency_model->tambahAgency($id_agency, $file);
            
            $this->session->set_flashdata('berhasil', 'Data agency Anda sudah terdaftar, silahkan cek email Anda untuk melanjutkan pembuatan akad');
        } else {
            $this->session->set_flashdata('gagal', 'Maaf, Permintaan Anda ditolak karena Anda telah terdaftar, silahkan menunggu email konfirmasi selanjutnya.');
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

        $foto = $this->Agency_model->uploadKtp($id_agency);

        $this->Agency_model->insertAkad($id_agency, $foto);

        $this->session->set_flashdata('berhasil', 'Berhasil membuat akad syirkah abdan');

        redirect($_SERVER['HTTP_REFERER']);
    }

    public function suratAkad($id_agency, $nama_agency){
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P', 'margin_top' => '43', 'margin_left' => '25', 'margin_right' => '25', 'margin_bottom' => '35']);
        
        $mpdf->SetDefaultBodyCSS('background', "url('assets/img/kop.png')");
        $mpdf->SetDefaultBodyCSS('background-image-resize', 6);

        $mpdf->SetHTMLFooter('
        <table width="100%" style="font-size: 12px; margin-bottom: 13px;">
            <tr>
                <td align="right">Halaman <b>{PAGENO}</b> dari <b>{nbpg}</b></td>
            </tr>
        </table>');
        
        $akad['akad'] = $this->Agency_model->getAgencyByIdByName($id_agency, $nama_agency);

		$data = $this->load->view('agency/akad', $akad, TRUE);
		$data2 = $this->load->view('agency/akad-lanjut', $akad, TRUE);
        $mpdf->WriteHTML($data);
        $mpdf->AddPage();
		$mpdf->WriteHTML($data2);
		$mpdf->Output();
    }
    
    public function getMarketingAktif(){
        if($this->session->userdata('level') != "super"){
            $this->session->set_flashdata('login', 'Maaf, Anda harus login terlebih dahulu');
			redirect(base_url("login"));
		}
        $id_agency = $_POST['id_agency'];
        $agency = $this->Agency_model->getMarketingAktif($id_agency);
        echo json_encode($agency);
    }

    public function getMarketingNonaktif(){
        if($this->session->userdata('level') != "super"){
            $this->session->set_flashdata('login', 'Maaf, Anda harus login terlebih dahulu');
			redirect(base_url("login"));
		}
        $id_agency = $_POST['id_agency'];
        $agency = $this->Agency_model->getMarketingNonaktif($id_agency);
        echo json_encode($agency);
    }
}
<?php

class Agency_model extends CI_MODEL{
    public function getAllMarketing($id_agency){
        $this->db->from("marketing_agency");
        $this->db->where("id_agency", $id_agency);
        return $this->db->get()->result_array();
    }

    public function getMarketingAktif($id_agency){
        $this->db->from("marketing_agency");
        $this->db->where("id_agency", $id_agency);
        $this->db->where("status", 'aktif');
        return $this->db->get()->result_array();
    }

    public function getMarketingNonaktif($id_agency){
        $this->db->from("marketing_agency");
        $this->db->where("id_agency", $id_agency);
        $this->db->where("status", 'nonaktif');
        return $this->db->get()->result_array();
    }

    public function getAllAgencyByBatch($batch){
        $this->db->select("*");
        $this->db->from("agency");
        $this->db->where("batch", $batch);
        $this->db->where("status <>", "konfirm");
        return $this->db->get()->result_array();
    }
    
    public function getAllAgencyKonfirm(){
        $this->db->select("*");
        $this->db->from("agency");
        $this->db->where("status", "konfirm");
        return $this->db->get()->result_array();
    }

    public function cekEmail($email){
        $this->db->from("agency");
        $this->db->where("email", $email);
        return $this->db->get()->num_rows();
    }

    public function cekHp($hp){
        $this->db->from("agency");
        $this->db->where("no_wa", $hp);
        return $this->db->get()->num_rows();
    }

    public function getLastId(){
        $this->db->from("agency");
        $this->db->order_by("id_agency", "desc");
        return $this->db->get()->row_array();
    }

    public function tambahAgency(){
        $data['agency'] = [
            "nama_agency" => $this->input->post('nama_agency', TRUE),
            "nama_pemilik" => $this->input->post('nama', TRUE),
            "email" => $this->input->post('email', TRUE),
            "no_wa" => $this->input->post('no_wa', TRUE),
            "no_hp" => $this->input->post('no_hp', TRUE),
            "no_rek" => $this->input->post('no_rek', TRUE),
            "bank" => $this->input->post('bank', TRUE),
            "an_rek" => $this->input->post('an_rek', TRUE),
            "no_rek" => $this->input->post('no_rek', TRUE),
            "npwp" => $this->input->post('npwp', TRUE),
            "batch" => '5',
            "status_edit" => 'on',
            "status" => 'konfirm',
            "akad" => 'tidak tersedia'
        ];

        $this->db->insert("agency", $data['agency']);
    }

    public function getAgencyById($id_agency){
        $this->db->from("agency");
        $this->db->where("id_Agency", $id_agency);
        return $this->db->get()->row_array();
    }

    public function getAgencyByIdByName($id_agency, $nama_agency){
        $nama_agency = rawurldecode($nama_agency);

        $this->db->from("agency");
        $this->db->where("id_Agency", $id_agency);
        $this->db->where("nama_agency", $nama_agency);
        return $this->db->get()->row_array();
    }
    
    public function getSuratAkad($id_agency, $nama_agency){
        $nama_agency = rawurldecode($nama_agency);

        $this->db->from("akad");
        $this->db->where("id_Agency", $id_agency);
        $this->db->where("nama_agency", $nama_agency);
        return $this->db->get()->row_array();
    }
    
    public function formGetAgencyById($id_agency, $nama){
        $nama = rawurldecode($nama);
        $this->db->from("agency");
        $this->db->where("id_Agency", $id_agency);
        $this->db->where("nama_agency", $nama);
        return $this->db->get()->row_array();
    }

    public function editAgency(){
        $id_agency = $this->input->post("id_agency", TRUE);

        $data['agency'] = [
            "nama_agency" => $this->input->post("nama_agency", TRUE),
            "nama_pemilik" => $this->input->post("nama_pemilik", TRUE),
            "email" => $this->input->post("email", TRUE),
            "no_wa" => $this->input->post("no_wa", TRUE),
            "no_hp" => $this->input->post("no_hp", TRUE),
            "alamat" => $this->input->post("alamat", TRUE),
            "tgl_masuk" => $this->input->post("tgl_masuk", TRUE),
            "no_rek" => $this->input->post("no_rek", TRUE),
            "bank" => $this->input->post("nama_bank", TRUE),
            "an_rek" => $this->input->post("an_rek", TRUE),
            "npwp" => $this->input->post("npwp", TRUE),
            "status" => $this->input->post("status", TRUE),
        ];

        $this->db->where("id_agency", $id_agency);
        $this->db->update("agency", $data['agency']);
    }

    public function hapusAgency($id_agency){
        $this->db->delete("agency", ["id_agency" => $id_agency]);
    }

    public function konfirmAgency($id_agency){
        $this->db->where("id_agency", $id_agency);
        $this->db->update("agency", ["status" => "aktif"]);
    }

    public function uploadGambar($id_agency){
        $config['upload_path'] = './assets/img';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['file_name'] = $id_agency;
        $config['max_size']  = '2048';
        $config['overwrite']  = 'true';
      
        $this->load->library('upload', $config); // Load konfigurasi uploadnya
        $this->upload->do_upload('foto');

        return $config['file_name'];
    }

    public function insertAkad($id_agency, $foto){
        $alamat = ucwords($this->input->post("alamat", true));
        $rt = ucwords($this->input->post("rt", true));
        $rw = ucwords($this->input->post("rw", true));
        $kel_desa = $this->input->post("kel_desa", true);
        $kel = ucwords($this->input->post("kel", true));
        $kec = ucwords($this->input->post("kec", true));
        $kab_kota = ucwords($this->input->post("kab_kota", true));
        $prov = ucwords($this->input->post("prov", true));

        $alamat_lengkap = $alamat . ' RT. ' . $rt . ' / RW. ' . $rw . ', ' . $kel_desa . ' ' . $kel . ', Kec. ' . $kec . ', ' . $kab_kota . ' Provinsi ' . $prov;

        $data['akad'] = [
            "nama" => $this->input->post("nama", TRUE),
            "nama_agency" => $this->input->post("nama_agency", TRUE),
            "no_ktp" => $this->input->post("no_ktp", TRUE),
            "alamat" => $alamat_lengkap,
            "no_hp" => $this->input->post("no_hp", TRUE),
            "tgl_akad" => $this->input->post("tgl_bergabung", TRUE),
            "id_agency" => $this->input->post("id_agency", TRUE)
        ];

        $this->db->insert("akad", $data['akad']);

        $data['agency'] = [
            "alamat" => $alamat_lengkap,
            "tgl_masuk" => $this->input->post("tgl_bergabung", TRUE),
            "akad" => "on",
            "ktp" => $foto
        ];

        $this->db->where("id_agency", $this->input->post("id_agency", TRUE));
        $this->db->update("agency", $data['agency']);
    }
}
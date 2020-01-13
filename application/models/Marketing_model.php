<?php

class Marketing_model extends CI_MODEL{
    public function getAllMarketingAgency(){
        $this->db->select("a.status, kd_marketing, nama_marketing, nama_agency");
        $this->db->from("marketing_agency as a");
        $this->db->join("agency as b", "a.id_agency = b.id_agency");
        return $this->db->get()->result_array();
    }

    public function getAllMarketingSi(){
        $this->db->select("a.status, kd_marketing, nama_marketing, nama_lac");
        $this->db->from("marketing_si as a");
        $this->db->join("lac as b", "a.id_lac = b.id_lac");
        return $this->db->get()->result_array();
    }

    public function getMarketingById($table, $kd_marketing){
        $this->db->from($table);
        $this->db->where("kd_marketing", $kd_marketing);
        return $this->db->get()->row_array();
    }

    public function editMarketingAgency(){
        $kd_marketing = $this->input->post("kd_marketing");

        $data['marketing'] = [
            "status" => $this->input->post("status", TRUE),
            "nama_marketing" => $this->input->post("nama_marketing", TRUE),
            "email" => $this->input->post("email", TRUE),
            "no_wa" => $this->input->post("no_wa", TRUE),
            "no_hp" => $this->input->post("no_hp", TRUE),
            "tgl_masuk" => $this->input->post("tgl_masuk", TRUE),
            "alamat" => $this->input->post("alamat", TRUE),
            "rt" => $this->input->post("rt", TRUE),
            "rw" => $this->input->post("rw", TRUE),
            "kel" => $this->input->post("kel", TRUE),
            "kec" => $this->input->post("kec", TRUE),
            "kab_kota" => $this->input->post("kab_kota", TRUE),
            "no_rek" => $this->input->post("no_rek", TRUE),
            "nama_bank" => $this->input->post("nama_bank", TRUE),
            "an_rek" => $this->input->post("an_rek", TRUE),
            "no_npwp" => $this->input->post("npwp", TRUE)
        ];

        $this->db->where("kd_marketing", $kd_marketing);
        $this->db->update("marketing_agency", $data['marketing']);
    }

    public function editMarketingSi(){
        $kd_marketing = $this->input->post("kd_marketing");

        $data['marketing'] = [
            "status" => $this->input->post("status", TRUE),
            "nama_marketing" => $this->input->post("nama_marketing", TRUE),
            "email" => $this->input->post("email", TRUE),
            "no_wa" => $this->input->post("no_wa", TRUE),
            "no_hp" => $this->input->post("no_hp", TRUE),
            "tgl_masuk" => $this->input->post("tgl_masuk", TRUE),
            "alamat" => $this->input->post("alamat", TRUE),
            "rt" => $this->input->post("rt", TRUE),
            "rw" => $this->input->post("rw", TRUE),
            "kel" => $this->input->post("kel", TRUE),
            "kec" => $this->input->post("kec", TRUE),
            "kab_kota" => $this->input->post("kab_kota", TRUE),
            "no_rek" => $this->input->post("no_rek", TRUE),
            "nama_bank" => $this->input->post("nama_bank", TRUE),
            "an_rek" => $this->input->post("an_rek", TRUE),
            "no_npwp" => $this->input->post("npwp", TRUE)
        ];

        $this->db->where("kd_marketing", $kd_marketing);
        $this->db->update("marketing_si", $data['marketing']);
    }

    public function insertMarketingAgency($kd_marketing){
        $data['marketing'] = [
            "kd_marketing" => $kd_marketing,
            "nama_marketing" => $this->input->post("nama", true),
            "email" => $this->input->post("email", true),
            "no_wa" => $this->input->post("no_wa", true),
            "no_hp" => $this->input->post("no_hp", true),
            "t4_lahir" => $this->input->post("t4_lahir", true),
            "tgl_lahir" => $this->input->post("tgl_lahir", true),
            "alamat" => $this->input->post("alamat", true),
            "rt" => $this->input->post("rt", true),
            "rw" => $this->input->post("rw", true),
            "kel" => $this->input->post("kel", true),
            "kec" => $this->input->post("kec", true),
            "kab_kota" => $this->input->post("kab_kota", true),
            "tgl_masuk" => $this->input->post("tgl_masuk", true),
            "no_rek" => $this->input->post("no_rek", true),
            "nama_bank" => $this->input->post("bank", true),
            "an_rek" => $this->input->post("an_rek", true),
            "no_npwp" => $this->input->post("npwp", true),
            "id_agency" => $this->input->post("id_agency", true),
            "status" => "aktif"
        ];

        $this->db->insert("marketing_agency", $data['marketing']);
    }

    public function cekEmailAgency($email){
        $this->db->from("marketing_agency");
        $this->db->where("email", "$email");
        return $this->db->get()->row_array();
    }

    public function cekHpAgency($no_wa){
        $this->db->from("marketing_agency");
        $this->db->where("no_wa", "$no_wa");
        return $this->db->get()->row_array();
    }

    public function cekEmailSi($email){
        $this->db->from("marketing_si");
        $this->db->where("email", "$email");
        return $this->db->get()->row_array();
    }

    public function cekHpSi($no_wa){
        $this->db->from("marketing_si");
        $this->db->where("no_wa", "$no_wa");
        return $this->db->get()->row_array();
    }

    public function getKdMarketingAgency(){
        
        $mm = date('m');
        $yy = date('y');

        $kd = 0;

        $this->db->select("SUBSTRING(kd_marketing, 6, 5) as kd_marketing");
        $this->db->from("marketing_agency");
        $this->db->where("SUBSTRING(kd_marketing, 3, 2) = ", $yy);
        $this->db->order_by("kd_marketing", "desc");
        
        $kode = $this->db->get()->row_array();

        if($kode){
            $kd = $kode['kd_marketing'] + 1;
        } else {
            $kd = 1;
        }
                
        if ( $kd < 10 ) {
            $urut = "000".$kd;
        } else if ( $kd >= 10 && $kd < 100 ){
            $urut = "00".$kd;
        } else if ( $kd >= 100 && $kd < 1000) {
            $urut = "0".$kd;
        } else if ( $kd >= 1000 && $kd < 9999) {
            $urut = $kd;
        }

        $kd_marketing = $yy . $mm . "." . $urut;
        
        return $kd_marketing;
    }
}
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
}
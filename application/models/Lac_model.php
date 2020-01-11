<?php

class Lac_model extends CI_MODEL{
    public function getAllLac(){
        $this->db->from("lac");
        $this->db->order_by("nama_lac", "ASC");
        return $this->db->get()->result_array();
    }

    public function getAllMarketingSi($id_lac){
        $this->db->from("marketing_si");
        $this->db->where("id_lac", $id_lac);
        return $this->db->get()->result_array();
    }

    public function getMarketingAktifSi($id_lac){
        $this->db->from("marketing_si");
        $this->db->where("id_lac", $id_lac);
        $this->db->where("status", 'aktif');
        return $this->db->get()->result_array();
    }

    public function getMarketingNonaktifSi($id_lac){
        $this->db->from("marketing_si");
        $this->db->where("id_lac", $id_lac);
        $this->db->where("status", 'nonaktif');
        return $this->db->get()->result_array();
    }

    public function getLacById($id_lac){
        $this->db->from("lac");
        $this->db->where("id_lac", $id_lac);
        return $this->db->get()->row_array();
    }

    public function editLac(){
        $id_lac = $this->input->post("id_lac");
        $data = [
            "status" => $this->input->post("status"),
            "nama_lac" => $this->input->post("nama_lac")
        ];

        $this->db->where("id_lac", $id_lac);
        return $this->db->update("lac", $data);
    }

    public function pindahLac(){
        $id_lac = $this->input->post("id_lac");

        foreach ($_POST['id_marketing'] as $id_marketing) {
            $this->db->where("kd_marketing", $id_marketing);
            $this->db->update("marketing_si", ["id_lac" => $id_lac]);
        }
    }

    public function tambahLac(){
        $data = [
            "nama_lac" => $this->input->post("nama", true),
            "status" => "aktif"
        ];

        $this->db->insert("lac", $data);
    }
}
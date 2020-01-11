<?php

class Lac_model extends CI_MODEL{
    public function getAllLac(){
        $this->db->from("lac");
        return $this->db->get()->result_array();
    }

    public function getAllMarketing($id_lac){
        $this->db->from("marketing_si");
        $this->db->where("id_lac", $id_lac);
        return $this->db->get()->result_array();
    }

    public function getMarketingAktif($id_lac){
        $this->db->from("marketing_si");
        $this->db->where("id_lac", $id_lac);
        $this->db->where("status", 'aktif');
        return $this->db->get()->result_array();
    }

    public function getMarketingNonaktif($id_lac){
        $this->db->from("marketing_si");
        $this->db->where("id_lac", $id_lac);
        $this->db->where("status", 'nonaktif');
        return $this->db->get()->result_array();
    }
}
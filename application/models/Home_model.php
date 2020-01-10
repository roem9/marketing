<?php
class Home_model extends CI_MODEL{
    public function getProgram(){
        $this->db->select("program, COUNT(id_peserta) AS peserta");
        $this->db->from("peserta");
        $this->db->group_by("program");
        return $this->db->get()->result_array();
    }
}
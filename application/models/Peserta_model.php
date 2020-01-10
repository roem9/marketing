<?php

class Peserta_model extends CI_Model{
    
    public function getId(){

        $tahun = date('y');
        $tipe = $this->input->post('tipe_peserta');

        if ($tipe == 'reguler'){
            $tipe = 'PR';
        } else if ($tipe == 'pv khusus'){
            $tipe = 'PK';
        } else if ($tipe == 'pv luar'){
            $tipe = 'PL';
        }

        $this->db->from('peserta');
        $this->db->where('SUBSTRING(id_peserta, 5, 2) = ', $tahun);
        $this->db->where('SUBSTRING(id_peserta, 1, 2) = ', $tipe);
        $this->db->order_by('id_peserta', 'desc');
        return $this->db->get()->row_array();

    }

    public function tambahWl(){

    }
    
    public function getAllPesertaByTipe($type){
        $this->db->from('peserta');
        $this->db->where('tipe_peserta', $type);
        return $this->db->get()->result_array();
    }

    public function getPesertaById($id_peserta){
        $this->db->select('*');
        $this->db->from('peserta as a');
        $this->db->join('alamat as b', 'a.id_peserta = b.id_peserta');
        $this->db->join('pekerjaan as c', 'a.id_peserta = c.id_peserta');
        $this->db->join('ortu as d', 'a.id_peserta = d.id_peserta');
        $this->db->where('a.id_peserta', $id_peserta);
        return $this->db->get()->row_array();

    }

    public function editDataPeserta($id_peserta){
        $data['peserta'] = [
            "nama_peserta" => $this->input->post('nama', true),
            "t4_lahir" => $this->input->post('t4_lahir', true),
            "tgl_lahir" => $this->input->post('tgl_lahir', true),
            "jk" => $this->input->post('jk', true),
            "pendidikan" => $this->input->post('pendidikan', true),
            "status_nikah" => $this->input->post('status_nikah', true),
            "no_hp" => $this->input->post('no_hp', true),
            "info" => $this->input->post('info', true),
            // "status" => 'wl',
            "umur" => $this->input->post('umur', true),
            "program" => $this->input->post('program', true),
            "hari" => $this->input->post('hari', true),
            "jam" => $this->input->post('jam', true),
            "tempat" => $this->input->post('tempat', true)
        ];

        $this->db->where('id_peserta', $id_peserta);
        $this->db->update('peserta', $data['peserta']);

        $data['alamat'] = [
            "alamat" => $this->input->post('alamat_peserta', true),
            "kab_kota" => $this->input->post('kab_kota', true),
            "provinsi" => $this->input->post('provinsi', true),
            "email" => $this->input->post('email', true),
            "kec" => $this->input->post('kec', true),
            "kel" => $this->input->post('kel', true),
            "no_telp" => $this->input->post('no_telp', true),
            "kd_pos" => $this->input->post('kd_pos', true)
        ];

        $this->db->where('id_peserta', $id_peserta);
        $this->db->update('alamat', $data['alamat']);

        $data['ortu'] = [
            "nama_ayah" => $this->input->post('nama_ayah', true),
            "t4_lahir_ayah" => $this->input->post('t4_lahir_ayah', true),
            "tgl_lahir_ayah" => $this->input->post('tgl_lahir_ayah', true),
            "nama_ibu" => $this->input->post('nama_ibu', true),
            "t4_lahir_ibu" => $this->input->post('t4_lahir_ibu', true),
            "tgl_lahir_ibu" => $this->input->post('tgl_lahir_ibu', true)
        ];
        
        $this->db->where('id_peserta', $id_peserta);
        $this->db->update('ortu', $data['ortu']);

        $data['pekerjaan'] = [
            "pekerjaan" => $this->input->post('pekerjaan', true),
            "nama_perusahaan" => $this->input->post('nama_instansi', true),
            "no_telp_perusahaan" => $this->input->post('telp_instansi', true),
            "alamat_perusahaan" => $this->input->post('alamat_instansi', true)
        ];
        
        $this->db->where('id_peserta', $id_peserta);
        $this->db->update('pekerjaan', $data['pekerjaan']);
    }
}
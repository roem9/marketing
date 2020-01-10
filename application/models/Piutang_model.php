<?php

class Piutang_model extends CI_MODEL{
    
    public function getPiutangPeserta(){
        $this->db->select('a.id_peserta, a.status, nama_peserta, c.program, d.hari, d.jam, nama_kpq, SUM(nominal) AS piutang, COUNT(b.id_invoice) AS invoice');
        $this->db->from('peserta as a');
        $this->db->join('invoice_peserta as b', 'a.id_peserta = b.id_peserta');
        $this->db->join('kelas as c', 'a.id_kelas = c.id_kelas');
        $this->db->join('jadwal as d', 'c.id_kelas = d.id_kelas');
        $this->db->join('kpq as e', 'c.nip = e.nip');
        $this->db->join('invoice as f', 'f.id_invoice = b.id_invoice');
        $this->db->join('uraian_invoice as g', 'g.id_invoice = f.id_invoice');
        $this->db->where('d.status', 'aktif');
        $this->db->where('f.status', 'piutang');
        $this->db->group_by('a.id_peserta');
        return $this->db->get()->result_array();
    }

    public function getPiutangKelasByTipe($tipe){
        $this->db->select('a.id_kelas, a.status, nama_peserta, c.no_hp, a.program, nama_kpq, SUM(nominal) AS piutang, COUNT(e.id_invoice) AS invoice');
        $this->db->from('kelas as a');
        $this->db->join('kelas_koor as b', 'a.id_kelas = b.id_kelas');
        $this->db->join('peserta as c', 'b.id_peserta = c.id_peserta');
        $this->db->join('kpq as d', 'a.nip = d.nip');
        $this->db->join('invoice_kelas as e', 'a.id_kelas = e.id_kelas');
        $this->db->join('invoice as f', 'f.id_invoice = e.id_invoice');
        $this->db->join('uraian_invoice as g', 'g.id_invoice = f.id_invoice');
        $this->db->where('a.ket', $tipe);
        $this->db->group_by('a.id_kelas');
        return $this->db->get()->result_array();
    }

    public function getPiutangKpq(){
        $this->db->select('a.nip, a.nama_kpq, SUM(nominal) AS piutang, COUNT(b.id_invoice) AS invoice');
        $this->db->from('kpq as a');
        $this->db->join('invoice_kpq as b', 'b.nip = a.nip');
        $this->db->join('invoice as c', 'b.id_invoice = c.id_invoice');
        $this->db->join('uraian_invoice as d', 'd.id_invoice = c.id_invoice');
        // $this->db->join('uraian_invoice as d', 'd.id_invoice = f.id_invoice');
        $this->db->group_by('a.nip');
        return $this->db->get()->result_array();
    }

    public function getPengajarReguler(){
        $this->db->select('a.nip, nama_kpq');
        $this->db->from('kpq as a');
        $this->db->join('kelas as b', 'a.nip = b.nip');
        $this->db->where('tipe_kelas', 'reguler');
        $this->db->group_by('nip');
        $this->db->order_by('nama_kpq', 'asc');
        return $this->db->get()->result_array();
    }
    
    public function getAllPengajar(){
        $this->db->select('a.nip, nama_kpq');
        $this->db->from('kpq as a');
        $this->db->order_by('nama_kpq', 'asc');
        return $this->db->get()->result_array();
    }

    public function getPesertaRegulerByPengajar($nip){
        $this->db->select('a.id_peserta, nama_peserta');
        $this->db->from('peserta as a');
        $this->db->join('kelas as b', 'a.id_kelas = b.id_kelas');
        $this->db->where('tipe_kelas', 'reguler');
        $this->db->where('nip', $nip);
        $this->db->order_by('nama_peserta', 'asc');
        return $this->db->get()->result_array();
    }
    
    public function getKoorByPengajar($nip){
        $this->db->select('a.id_kelas, nama_peserta');
        $this->db->from('peserta as a');
        $this->db->join('kelas as b', 'a.id_kelas = b.id_kelas');
        $this->db->join('kelas_koor as c', 'a.id_peserta = c.id_peserta');
        $this->db->where('nip', $nip);
        $this->db->order_by('nama_peserta', 'asc');
        return $this->db->get()->result_array();
    }

    public function getNamaKoor($id_kelas){
        $this->db->select('nama_peserta');
        $this->db->from('peserta as a');
        $this->db->join('kelas_koor as c', 'a.id_peserta = c.id_peserta');
        $this->db->where('a.id_kelas', $id_kelas);
        return $this->db->get()->row_array();
    }

    public function getIdInvoice(){
        $this->db->select('*');
        $this->db->from('invoice');
        $this->db->order_by('id_invoice', 'desc');
        return $this->db->get()->row_array();
    }

    public function tambahPiutangKelas($id_invoice, $nama){
        $data['invoice'] = [
            "id_invoice" => $id_invoice,
            "tgl_invoice" => date('Y-m-d'),
            "nama_invoice" => $nama,
            "status" => "piutang"
        ];

        $this->db->insert('invoice', $data['invoice']);
        
        $nominal = $this->input->post('nominal', true);
        $nominal = str_replace("Rp. ", "", $nominal);
        $nominal = str_replace(".", "", $nominal);

        $data['uraian'] = [
            "uraian" => $this->input->post('uraian', TRUE),
            "nominal" => $nominal,
            "id_invoice" => $id_invoice
        ];

        $this->db->insert('uraian_invoice', $data['uraian']);

        $data['kelas'] = [
            "id_invoice" => $id_invoice,
            "id_kelas" => $this->input->post('id_kelas', TRUE)
        ];

        $this->db->insert('invoice_kelas', $data['kelas']);
    }

    public function getNamaPeserta($id_peserta){
        $this->db->from('peserta');
        $this->db->where("id_peserta", $id_peserta);
        return $this->db->get()->row_array();
    }

    public function tambahPiutangPeserta($id_invoice, $nama){
        $data['invoice'] = [
            "id_invoice" => $id_invoice,
            "tgl_invoice" => date('Y-m-d'),
            "nama_invoice" => $nama,
            "status" => "piutang"
        ];

        $this->db->insert('invoice', $data['invoice']);

        $nominal = $this->input->post('nominal', true);
        $nominal = str_replace("Rp. ", "", $nominal);
        $nominal = str_replace(".", "", $nominal);

        $data['uraian'] = [
            "uraian" => $this->input->post('uraian', TRUE),
            "nominal" => $nominal,
            "id_invoice" => $id_invoice
        ];

        $this->db->insert('uraian_invoice', $data['uraian']);

        $data['peserta'] = [
            "id_invoice" => $id_invoice,
            "id_peserta" => $this->input->post('id_peserta', TRUE)
        ];

        $this->db->insert('invoice_peserta', $data['peserta']);
    }
    
    public function getNamaPengajar($nip){
        $this->db->from("kpq");
        $this->db->where("nip", $nip);
        return $this->db->get()->row_array();
    }

    public function tambahPiutangKpq($id_invoice, $nama){
        $data['invoice'] = [
            "id_invoice" => $id_invoice,
            "tgl_invoice" => date('Y-m-d'),
            "nama_invoice" => $nama,
            "status" => "piutang"
        ];

        $this->db->insert('invoice', $data['invoice']);

        
        $nominal = $this->input->post('nominal', true);
        $nominal = str_replace("Rp. ", "", $nominal);
        $nominal = str_replace(".", "", $nominal);

        $data['uraian'] = [
            "uraian" => $this->input->post('uraian', TRUE),
            "nominal" => $nominal,
            "id_invoice" => $id_invoice
        ];

        $this->db->insert('uraian_invoice', $data['uraian']);

        $data['kpq'] = [
            "id_invoice" => $id_invoice,
            "nip" => $this->input->post('nip', TRUE)
        ];

        $this->db->insert('invoice_kpq', $data['kpq']);
    }

    public function getInvoiceKelas($id_kelas){
        $this->db->from("invoice as a");
        $this->db->join("invoice_kelas as b", "a.id_invoice=b.id_invoice");
        $this->db->join("uraian_invoice as c", "a.id_invoice=c.id_invoice");
        $this->db->join("kelas_koor as d", "b.id_kelas=d.id_kelas");
        $this->db->join("peserta as e", "e.id_peserta=d.id_peserta");
        $this->db->where("b.id_kelas", $id_kelas);
        return $this->db->get()->result_array();
    }

    public function getInvoicePeserta($id_peserta){
        $this->db->from("invoice as a");
        $this->db->join("invoice_peserta as b", "a.id_invoice=b.id_invoice");
        $this->db->join("uraian_invoice as c", "a.id_invoice=c.id_invoice");
        $this->db->join("peserta as e", "e.id_peserta=b.id_peserta");
        $this->db->where("b.id_peserta", $id_peserta);
        return $this->db->get()->result_array();
    }

    public function getInvoiceKpq($nip){
        $this->db->from("invoice as a");
        $this->db->join("invoice_kpq as b", "a.id_invoice=b.id_invoice");
        $this->db->join("uraian_invoice as c", "a.id_invoice=c.id_invoice");
        $this->db->join("kpq as e", "e.nip=b.nip");
        $this->db->where("b.nip", $nip);
        return $this->db->get()->result_array();
    }

    public function hapusInvoice($id_invoice){
        $this->db->where_in('id_invoice', $id_invoice);
        $this->db->delete('invoice_peserta');
        $this->db->where_in('id_invoice', $id_invoice);
        $this->db->delete('invoice_kelas');
        $this->db->where_in('id_invoice', $id_invoice);
        $this->db->delete('invoice_kpq');
        $this->db->where_in('id_invoice', $id_invoice);
        $this->db->delete('invoice');
    }

}
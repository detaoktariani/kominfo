<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {

function __construct(){
        parent::__construct();
		$this->load->model('Model');
}

public function index(){
        if($this->session->userdata('login') and $this->session->userdata('status')== '1'){
        $data=array(
            'isi' => 'DataKehadiran',
            'data'=> $this->Model->kehadiran(),
        );
            
            $this->load->view('Homepage',$data);
             }else{
             $error['error'] = 'Please login first.';
             $this->load->view('Vlogin',$error);
         }
    }

    public function grafik(){
        $sumber = 'https://sirup.lkpp.go.id/sirup/servicecdn/paketpenyediapersatkertampil?idSatker=95966&tahunAnggaran=2018';
        $konten = file_get_contents($sumber);
         $data=array(
            'isi' => 'grafik',
            'data' => json_decode(file_get_contents('https://sirup.lkpp.go.id/sirup/servicecdn/paketpenyediapersatkertampil?idSatker=95966&tahunAnggaran=2018'),true),
        );
            
            $this->load->view('Homepage',$data);
    }

public function tambah_data(){
         $data=array(
            'isi' => 'Vtambah_data',
        );
            
            $this->load->view('Homepage',$data);
    }

    public function ubah_data(){
         $data=array(
            'isi' => 'Vubah_data',
        );
            
            $this->load->view('Homepage',$data);
    }

    public function get_nip()
    {
        $query=$this->db->query('select * from pegawai');
        $result= $query->result();
        $data=array();
        foreach($result as $r)
        {
            $data['value']=$r->nip;
            $data['label']=$r->nip;
            $data['nama']=$r->nama;
            $json[]=$data;            
        }
        echo json_encode($json);
            
    }

    public function namapegawai(){
          $result=$this->db->where('nip',$_POST['id'])
                            ->from('pegawai')
                            ->get()
                            ->result();
        $data=array();
        foreach($result as $r)
        {
            $data['nama'] =$r->nama;
            $json[]=$data;
        }
        echo json_encode($json);
    }

public function get_keterangan()
    {
        $query=$this->db->query('select * from keterangan');
        $result= $query->result();
        $data=array();
        foreach($result as $r)
        {
            $data['value']=$r->id_ket;
            $data['label']=$r->nama_ket;
            $json[]=$data;            
        }
        echo json_encode($json);
            
    }

    public function get_sub()
    {
          $result=$this->db->where('sub_keterangan.id_ket',$_POST['id'])
                            ->from('sub_keterangan')
                            ->join('keterangan', 'keterangan.id_ket = sub_keterangan.id_ket', 'right')
                            ->get()
                            ->result();
        $data=array();
        foreach($result as $r)
        {
            $data['value']=$r->id_sub;
            $data['label']=$r->nama_sub;
            $json[]=$data;
        }
        echo json_encode($json);
    }

     public function tambah(){
            $data=array(
                'id_kehadiran'          => $this->input->post('id_kehadiran'),
                'nip'        => $this->input->post('nip'),
                'tanggal_mulai'     => $this->input->post('tanggal_mulai'),
                'tanggal_selesai'          => $this->input->post('tanggal_selesai'),
                'id_ket'        => $this->input->post('id_ket'),
                'id_sub'     => $this->input->post('id_sub'),
                'nomor_surat'          => $this->input->post('nomor_surat'),
                'keterangan'        => $this->input->post('keterangan'),
                'tanggal'     => date('Y-m-d'),
                );
            if (strlen($data['nip']) > 18) {
                $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Jumlah karakter NIP terlalu panjang <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('Homepage/tambah_data');
            }
            else{
                $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data berhasil ditambah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                $this->Model->tambah_data($data);
                redirect('Homepage/index');
            }
    }

    public function ubah(){
            $data=array(
                'id_kehadiran1'          => $this->input->post('id_kehadiran1'),
                'nip1'        => $this->input->post('nip1'),
                'tanggal_mulai1'     => $this->input->post('tanggal_mulai1'),
                'tanggal_selesai1'          => $this->input->post('tanggal_selesai1'),
                'id_ket1'        => $this->input->post('id_ket1'),
                'id_sub1'     => $this->input->post('id_sub1'),
                'nomor_surat1'          => $this->input->post('nomor_surat1'),
                'keterangan1'        => $this->input->post('keterangan1'),
                'tanggal1'     => date('Y-m-d'),
                );
            $where = array('id_kehadiran' => $this->input->post('id_kehadiran1'));
            $res = $this->db->update('kehadiran', $data, $where);
            if($res >= 1){
                $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('Homepage/index');
            }
            else{
                $this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert"> Data Gagal diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('Homepage/index');
            }
    }

    public function hapus($id){
         $res = $this->db->delete('kehadiran', array('id_kehadiran' => $id));
         if($res>=1){
             $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil dihapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('Homepage/index');
         }else{
             $this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert"> Data gagal dihapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
             redirect('Homepage/index');
         }
        
    }

}

<?php

use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No Direct Acess Allowed');
require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';

class Mitrastatistik extends REST_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->model('Mitrastatistik_model');
    }

    public function index_get(){
        $nik = $this->get('nik');
        $data = $this->Mitrastatistik_model->getMitrastatistik($nik);  
        if($data){
            $this->response([
                'status' => true,
                'data' => $data,
            ], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => false,
                'message' => 'data tidak ditemukan',
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function index_post(){
        $data = [
            "nik"           => $this->post('nik'),
            "nama"          => $this->post('nama'), 
            "tmpt_lhr"      => $this->post('tmpt_lhr'), 
            "tgl_lhr"       => $this->post('tgl_lhr'),
            "jk"            => $this->post('jk'), 
            "alamat_domisili"=> $this->post('alamat_domisili'),
            "desa"          => $this->post('desa'), 
            "kec"           => $this->post('kec'),
            "kab"           => $this->post('kab'), 
            "prop"          => $this->post('prop'), 
            "pekerjaan"     => $this->post('pekerjaan'),
            "no_hp"         => $this->post('no_hp'), 
            "tipe_hp"       => $this->post('tipe_hp'), 
            "email"         => $this->post('email'), 
            "ijazah"        => $this->post('ijazah'), 
            "pengalaman1"   => $this->post('pengalaman1'), 
            "sebagai1"      => $this->post('sebagai1'), 
            "pengalaman2"   => $this->post('pengalaman2'),
            "sebagai2"      => $this->post('sebagai2'),
            "pengalaman3"   => $this->post('pengalaman3'), 
            "sebagai3"      => $this->post('sebagai3'), 
            "pengalaman4"   => $this->post('pengalaman4'), 
            "sebagai4"      => $this->post('sebagai4'), 
            "pengalaman5"   => $this->post('pengalaman5'),
            "sebagai5"      => $this->post('sebagai5')
        ];

        if($this->Mitrastatistik_model->insertMitrastatistik($data) > 0){
            $this->response([
                'status' => true,
                'message' => 'mitra statistik berhasil diinput',
            ], REST_Controller::HTTP_CREATED);
        }else{
            $this->response([
                'status' => false,
                'message' => 'data gagal diinput',
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function index_put(){
        $nik                = $this->put('nik');            
        $data = [
            "nama"          => $this->put('nama'), 
            "tmpt_lhr"      => $this->put('tmpt_lhr'), 
            "tgl_lhr"       => $this->put('tgl_lhr'),
            "jk"            => $this->put('jk'), 
            "alamat_domisili"=> $this->put('alamat_domisili'),
            "desa"          => $this->put('desa'), 
            "kec"           => $this->put('kec'),
            "kab"           => $this->put('kab'), 
            "prop"          => $this->put('prop'), 
            "pekerjaan"     => $this->put('pekerjaan'),
            "no_hp"         => $this->put('no_hp'), 
            "tipe_hp"       => $this->put('tipe_hp'), 
            "email"         => $this->put('email'), 
            "ijazah"        => $this->put('ijazah'), 
            "pengalaman1"   => $this->put('pengalaman1'), 
            "sebagai1"      => $this->put('sebagai1'), 
            "pengalaman2"   => $this->put('pengalaman2'),
            "sebagai2"      => $this->put('sebagai2'),
            "pengalaman3"   => $this->put('pengalaman3'), 
            "sebagai3"      => $this->put('sebagai3'), 
            "pengalaman4"   => $this->put('pengalaman4'), 
            "sebagai4"      => $this->put('sebagai4'), 
            "pengalaman5"   => $this->put('pengalaman5'),
            "sebagai5"      => $this->put('sebagai5')
        ];

        if($this->Mitrastatistik_model->updateMitrastatistik($data,$nik) > 0){
            $this->response([
                'status' => true,
                'message' => 'mitra statistik berhasil didiupdate',
            ], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => false,
                'message' => 'data gagal diupdate',
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function index_delete(){
        $nik = $this->delete('nik');
        if($nik === null){
            $this->response([
                'status' => false,
                'message' => 'nik kosong',
            ], REST_Controller::HTTP_BAD_REQUEST);
        }else{
            if($this->Mitrastatistik_model->deleteMitrastatistik($nik)>0){
                $this->response([
                    'status' => true,
                    'message' => 'mitra statistik berhasil dihapus',
                ], REST_Controller::HTTP_OK);
            }else{
                $this->response([
                    'status' => false,
                    'message' => 'data tidak ditemukan',
                ], REST_Controller::HTTP_NOT_FOUND);
            }
        }            
    }

}
<?php

use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No Direct Acess Allowed');
require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';

class Wilayah extends REST_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->model('Wilayah_model');
    }

    public function index_get(){
        $kode = [
            'kode_prop'=> $this->get('kode_prop'),
            'kode_kab'=> $this->get('kode_kab'),
            'kode_kec'=> $this->get('kode_kec'),
            'kode_desa'=> $this->get('kode_desa')
        ];
        if($kode==null){
            $this->response([
                'status' => false,
                'message' => 'kode tidak boleh kosong',
            ], REST_Controller::HTTP_BAD_REQUEST);
        }else{
            if($this->get('tipe')=='list'){
                $data = $this->Wilayah_model->getWilayah($kode);  
            }else{
                $data = $this->Wilayah_model->getWilayahById($kode);      
            }
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
    }
}
<?php

use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No Direct Acess Allowed');
require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';

class Pendidikan extends REST_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->model('Pendidikan_model');
    }

    public function index_get(){
        $kode = $this->get('kode_pendidikan');
        $data = $this->Pendidikan_model->getPendidikan($kode);      
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
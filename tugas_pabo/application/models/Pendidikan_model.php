<?php
    class Pendidikan_model extends CI_Model{
        public function getPendidikan($kode = null){
            if($kode===null){
                if($this->db->get("mitrastatistik")->num_rows()==0){
                    return false;
                }else{
                    return $this->db->get("kode_pendidikan")->result_array();;
                }
            }else{
                return $this->db->query("SELECT * FROM kode_pendidikan WHERE id_pendidikan='".$kode."'")->result_array();
            }
        }
    }
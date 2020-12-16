<?php
    class Mitrastatistik_model extends CI_Model{
        public function getMitrastatistik($nik = null){
            if($nik===null){
                if($this->db->get("mitrastatistik")->num_rows()==0){
                    return false;
                }else{
                    return $this->db->query("select nik, nama, no_hp from mitrastatistik")->result_array();;
                }
            }else{
                return $this->db->query("SELECT * FROM mitrastatistik WHERE nik='".$nik."'")->result_array();
            }
        }

        public function deleteMitrastatistik($nik = null){
            $this->db->delete('mitrastatistik',['nik'=>$nik]);
            return $this->db->affected_rows();            
        }

        public function insertMitrastatistik($data){
            $this->db->insert('mitrastatistik',$data);
            return $this->db->affected_rows();            
        }

        public function updateMitrastatistik($data,$nik){
            $this->db->update('mitrastatistik',$data,['nik' => $nik]);
            return $this->db->affected_rows();            
        }
    }
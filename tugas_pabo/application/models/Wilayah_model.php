<?php
    class Wilayah_model extends CI_Model{
        public function getWilayah($kode = null){
            //var_dump($kode);
            $kodewil = "";
            if($kode['kode_prop']!=null){
                $kodewil .= $kode['kode_prop'];
                if($kode['kode_kab']!=null){
                    $kodewil.=".".$kode['kode_kab'];
                    if($kode['kode_kec']!=null){
                        $kodewil.=".".$kode['kode_kec'];
                        if($kode['kode_desa']!=null){
                            $kodewil.=".".$kode['kode_desa'];
                        }
                    }
                }
            }if($kode['kode_prop']==null){
                return $this->db->query("select * from wilayah_2020 where CHAR_LENGTH(kode)=2 ORDER BY kode")->result_array();
            }else{
                if(strlen($kodewil)<=5){
                    $pj_kode = strlen($kodewil)+3;
                }else if(strlen($kodewil)==8){
                    $pj_kode = strlen($kodewil)+5;
                }else if(strlen($kodewil)==13){
                    $pj_kode = 13;
                }
                return $this->db->query("select * from wilayah_2020 where kode like '".$kodewil."%' and CHAR_LENGTH(kode)=".$pj_kode." ORDER BY kode")->result_array();        
            }
        }
        public function getWilayahById($kode = null){
            if($kode == null){
                return false;
            }else {
                $kodewil = "";
                if($kode['kode_prop']!=null){
                    $kodewil .= $kode['kode_prop'];
                    if($kode['kode_kab']!=null){
                        $kodewil.=".".$kode['kode_kab'];
                        if($kode['kode_kec']!=null){
                            $kodewil.=".".$kode['kode_kec'];
                            if($kode['kode_desa']!=null){
                                $kodewil.=".".$kode['kode_desa'];
                            }
                        }
                    }
                }
                return $this->db->query("select * from wilayah_2020 where kode = '".$kodewil."'")->result_array();
            }
        }

    }
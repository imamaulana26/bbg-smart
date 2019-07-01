<?php
defined('BASEPATH')OR exit('No direct script access allowed'); 

class Api_dukcapil extends CI_Controller {
    public function get_data($nik){
        $uid = 'BSM138712538';
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://10.0.1.144:8080/wsapp/ektp?uid=".$uid."&nik=".$nik."&cc=0");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);

        $respon = json_decode($output);
        
        $data['NAMA_LGKP'] = $respon->content[0]->NAMA_LGKP;
        $data['TMPT_LHR'] = $respon->content[0]->TMPT_LHR;
        $data['TGL_LHR'] = $respon->content[0]->TGL_LHR;
        $data['NAMA_LGKP_IBU'] = $respon->content[0]->NAMA_LGKP_IBU;
        $data['AGAMA'] = $respon->content[0]->AGAMA;
        $data['NO_KK'] = $respon->content[0]->NO_KK;
        $data['KODE_POS'] = $respon->content[0]->KODE_POS;
        $data['NO_RT'] = $respon->content[0]->NO_RT;
        $data['NO_RW'] = $respon->content[0]->NO_RW;
        $data['KEL_NAME'] = $respon->content[0]->KEL_NAME;
        $data['ALAMAT'] = $respon->content[0]->ALAMAT;

        echo json_encode($data);
    }
}
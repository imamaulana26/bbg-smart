<?php
defined('BASEPATH')OR exit('No direct script access allowed'); 

class Not_found extends CI_Controller {
    public function index(){
        $this->load->view('templates/_header');
        $this->load->view('templates/v_404');
        $this->load->view('templates/_footer');
    }
}
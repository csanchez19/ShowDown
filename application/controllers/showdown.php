<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class showdown extends CI_Controller {

    public function __construct()
        {
                parent::__construct();
                $this->load->helper(array('form', 'url'));
                $this->load->library('template');
                $this->load->library('form_validation');
                $this->load->database();
        }

        public function _output($dades){
                echo $dades;
        }

        //VISTA HOME
	public function index()
	{
		$data['title'] = 'ShowDown! - Competeix i Guanya!';

                $this->template->load('layout', 'home', $data);
	}

        //VISTA REGISTRE PERSONA
        public function register_user(){

                $data['title'] = 'ShowDown! - Registrat!';

                $this->template->load('layout', 'register_user', $data);
        }

        //VISTA LOGIN USUARI
        public function login(){

                $data['title'] = 'ShowDown! - Loguejat!';

                $this->template->load('layout', 'login', $data);
        }
}

?>

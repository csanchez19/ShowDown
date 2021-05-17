<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class showdown extends CI_Controller {

    public function __construct()
        {
                parent::__construct();
                $this->load->helper(array('form', 'url'));
                $this->load->library('template');
        }

	public function index()
	{
		$data['title'] = 'ShowDown! - Competeix i Guanya!';

                $this->template->load('layout', 'home', $data);
	}

        public function register_user(){

                $data['title'] = 'ShowDown! - Registrat!';

                $this->template->load('layout', 'register_user', $data);
        }

        public function login(){

                $data['title'] = 'ShowDown! - Loguejat!';

                $this->template->load('layout', 'login', $data);
        }
}

?>

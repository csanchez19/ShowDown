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
<<<<<<< HEAD
		$data['title'] = 'ShowDown! - i ';
=======
		$data['title'] = 'ShowDown! - Competeix i Guanya!';
>>>>>>> e139352988d734d9b6df90b956afc1e0bbfde527

        $data['test'] = 'Victor';

        $this->template->load('layout', 'home', $data);
	}
}

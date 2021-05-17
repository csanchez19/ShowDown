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
		$data['title'] = 'ShowDown! - Competeix i guanya!';

        $data['carles'] = 'tus huevos';
        $this->template->load('layout', 'home', $data);
	}
}

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

                $this->template->load('layout', 'register_user');

                
        }

        //VALIDACIO DADES USUARI
        public function validation(){
                if(isset($_POST['register'])){
                        $this->form_validation->run();
                        $this->form_validation->set_rules('nom', 'Nom', 'required|max_length[20]',array('required' => 'Obligatori omplir el camp %s', 'max_length' => 'Mida màxima de %s és 20.'));
                        $this->form_validation->set_rules('cognoms', 'Cognoms', 'required|max_length[40]',array('required' => 'Obligatori omplir el camp %s', 'max_length' => 'Mida màxima de %s és 20.'));
                        $this->form_validation->set_rules('usuari', 'Usuari', 'required|max_length[20]|is_unique[usuaris.usuari]',array('required' => 'Obligatori omplir el camp %s', 'max_length' => 'Mida màxima de %s és 20.', 'is_unique' => 'Aquest usuari ja existeix.'));
                        $this->form_validation->set_rules('dni', 'Dni', 'required|max_length[9]',array('required' => 'Obligatori omplir el camp %s', 'max_length' => 'Mida màxima de %s és 20.'));
                        $this->form_validation->set_rules('correu', 'Correu', 'required|valid_email|',array('required' => 'Obligatori omplir el camp %s', 'valid_email' => 'El correu introduït ha de tenir un format vàlid.'));
                        $this->form_validation->set_rules('naix', 'Data de naixement', 'required',array('required' => 'Obligatori omplir el camp %s'));
                        $this->form_validation->set_rules('password', 'Password', 'required',array('required' => 'Obligatori omplir el camp %s', 'max_length' => 'Mida màxima de %s és 20.'));
                        $this->form_validation->set_rules('password2', 'Password', 'Matches[password]',array('Matches' => 'Les contrasenyes no coincideixen.'));
                        $this->form_validation->set_rules('paypal', 'Paypal', 'required|valid_email|',array('required' => 'Obligatori omplir el camp %s', 'valid_email' => 'El paypal introduït ha de tenir un format vàlid.'));
                        
                        $dades = $this->input->post();

                        if ($this->form_validation->run() == FALSE){
                                $this->template->load('layout', 'register_user', $dades);
                        }else{
                                //$this->load->model('ModelFinal');
                                //$res['resultat'] = $this->ModelFinal->inserirUsuari($_POST);

                                echo '<script language="javascript">';
                                echo 'alert("Usuari registrat correctament. Ja pots loguejar-te")';
                                echo '</script>';
                                
                                $this->template->load('layout', 'home', $dades);
                        }
                }
        }

        //VISTA LOGIN USUARI
        public function login(){

                $data['title'] = 'ShowDown! - Loguejat!';

                $this->template->load('layout', 'login', $data);
        }
}

?>

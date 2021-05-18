<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class showdown extends CI_Controller {

    public function __construct()
        {
                parent::__construct();
                $this->load->helper(array('form', 'url'));
                $this->load->library('template');
                $this->load->library('form_validation');
                $this->load->library('session');
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
                        $this->form_validation->set_rules('dni', 'Dni', 'required|max_length[9]|callback_valid_dni',array('required' => 'Obligatori omplir el camp %s', 'max_length' => 'Mida màxima de %s és 20.', 'valid_dni' => 'El dni es incorrecte.'));
                        $this->form_validation->set_rules('correu', 'Correu', 'required|valid_email',array('required' => 'Obligatori omplir el camp %s', 'valid_email' => 'El correu introduït ha de tenir un format vàlid.'));
                        $this->form_validation->set_rules('naix', 'Data de naixement', 'required',array('required' => 'Obligatori omplir el camp %s'));
                        $this->form_validation->set_rules('password', 'Password', 'required',array('required' => 'Obligatori omplir el camp %s', 'max_length' => 'Mida màxima de %s és 20.'));
                        $this->form_validation->set_rules('password2', 'Password', 'Matches[password]',array('Matches' => 'Les contrasenyes no coincideixen.'));
                        $this->form_validation->set_rules('paypal', 'Paypal', 'required|valid_email',array('required' => 'Obligatori omplir el camp %s', 'valid_email' => 'El paypal introduït ha de tenir un format vàlid.'));
                        
                        $dades = $this->input->post();

                        if ($this->form_validation->run() == FALSE){

                                $this->template->load('layout', 'register_user', $dades);

                        }else{
                                $this->load->model('users_model');
                                $res['resultat'] = $this->users_model->inserirUsuari($_POST);

                                echo '<script language="javascript">';
                                echo 'alert("Usuari registrat correctament. Ja pots loguejar-te")';
                                echo '</script>';
                                
                                redirect(base_url()); 
                        }
                }else if(isset($_POST['login'])){
                        $this->form_validation->run();
                        $this->form_validation->set_rule('usuari', 'Usuari', 'required|max_length[20]', array('required' => 'Obligatori omplir el camp %s', 'max_length' => 'Mida màxima de %s és 20.'));
                        $this->form_validation->set_rules('password3', 'Password', 'required',array('required' => 'Obligatori omplir el camp %s', 'max_length' => 'Mida màxima de %s és 20.'));
                
                        $dades=$this->input->post();

                        if($this->form_validation->run() == FALSE){
                                $this->template->load('layout', 'login', $dades);
                        }else{
                                $username = $this->input->post('usuari');
                                $password = $this->input->post('password3');

                                //modelo can login
                                $this->load->model('users_model');
                                if($this->users_model->can_login($username, $password)){
                                        $session_data = array(
                                                'username' => $username
                                        );
                                        $this->session->set_userdata($session_data);
                                        redirect(base_url()); 
                                }

                        }
                }
        }

        //VISTA LOGIN USUARI
        public function login(){

                $data['title'] = 'ShowDown! - Loguejat!';

                $this->template->load('layout', 'login', $data);
        }

        /**
        * Valid DNI
        *
        * @access	public
        * @param	string
        * @return	bool
        */
        public function valid_dni($str)
        {
                $str = trim($str);  
                $str = str_replace("-","",$str);  
                $str = str_ireplace(" ","",$str);

                if ( !preg_match("/^[0-9]{7,8}[a-zA-Z]{1}$/" , $str) )
                {
                        return FALSE;
                }
                else
                {
                        $n = substr($str, 0 , -1);		
                        $letter = substr($str,-1);
                        $letter2 = substr ("TRWAGMYFPDXBNJZSQVHLCKE", $n%23, 1); 
                        if(strtolower($letter) != strtolower($letter2))
                                return FALSE;
                }
                return TRUE;
        }
}

?>

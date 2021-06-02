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
                $this->load->library('cart');
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
                        $this->form_validation->set_rules('provincia', 'Provincia', 'required',array('required' => 'Obligatori omplir el camp %s'));
                        $this->form_validation->set_rules('poblacio', 'Poblacio', 'required',array('required' => 'Obligatori omplir el camp %s'));
                        $this->form_validation->set_rules('codipostal', 'Codi Postal', 'required',array('required' => 'Obligatori omplir el camp %s'));
                        $this->form_validation->set_rules('carrer', 'Carrer', 'required',array('required' => 'Obligatori omplir el camp %s'));
                        $this->form_validation->set_rules('numero', 'numero', 'required',array('required' => 'Obligatori omplir el camp %s'));
                        
                        $dades = $this->input->post();

                        if ($this->form_validation->run() == FALSE){

                                $this->template->load('layout', 'register_user', $dades);

                        }else{
                                $this->load->model('users_model');
                                $res['resultat'] = $this->users_model->inserirUsuari($_POST);

                                echo '<script type="text/javascript">';
                                echo 'alert("Usuari registrat correctament, ja pots loguejar-te")';
                                echo '</script>';
                                
                                redirect(base_url()); 
                        }
                }else if(isset($_POST['login'])){
                        $this->form_validation->run();
                        $this->form_validation->set_rules('usuari', 'Usuari', 'required|max_length[20]', array('required' => 'Obligatori omplir el camp %s', 'max_length' => 'Mida màxima de %s és 20.'));
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
                                }else{
                                        $this->session->set_flashdata('error', 'Usuari o contrasenya incorrectes.'); 
                                        redirect(base_url() . 'index.php/showdown/login'); 
                                }

                        }
                }else if(isset($_POST['register_tourn'])){
                        $this->load->model('tourns_model');

                        $this->form_validation->run();
                        $this->form_validation->set_rules('nom', 'Nom', 'required|is_unique[torneig.nom]',array('required' => 'Obligatori omplir el camp %s', 'is_unique' => 'Ja existeix un torneig amb aquest nom.'));
                        $this->form_validation->set_rules('data', 'Data del torneig', 'required',array('required' => 'Obligatori omplir el camp %s'));
                        $this->form_validation->set_rules('jocs', 'Joc', 'required',array('required' => 'Obligatori omplir el camp %s'));
                        $this->form_validation->set_rules('places', 'Número de places', 'required',array('required' => 'Obligatori omplir el camp %s'));
                        $this->form_validation->set_rules('desc', 'Descripció', 'required',array('required' => 'Obligatori omplir el camp %s'));

                        $dades=$this->input->post();

                        if($this->form_validation->run() == FALSE){
                                //sel jocs
                                $dades['result'] = $this->tourns_model->sel_jocs();

                                $this->template->load('layout', 'register_tourn', $dades);
                        }else{
                                $res['resultat'] = $this->tourns_model->inserirTourn($_POST);

                                echo '<script>';
                                echo 'alert("Usuari registrat correctament, ja pots loguejar-te")';
                                echo '</script>';
                                
                                redirect(base_url()); 
                        }

                        
                }else if(isset($_POST['modifyP'])){
                        $this->form_validation->run();
                        $this->form_validation->set_rules('nom', 'Nom', 'required|max_length[20]',array('required' => 'Obligatori omplir el camp %s', 'max_length' => 'Mida màxima de %s és 20.'));
                        $this->form_validation->set_rules('cognoms', 'Cognoms', 'required|max_length[40]',array('required' => 'Obligatori omplir el camp %s', 'max_length' => 'Mida màxima de %s és 20.'));
                        $this->form_validation->set_rules('correu', 'Correu', 'required|valid_email',array('required' => 'Obligatori omplir el camp %s', 'valid_email' => 'El correu introduït ha de tenir un format vàlid.'));
                        $this->form_validation->set_rules('naix', 'Data de naixement', 'required',array('required' => 'Obligatori omplir el camp %s'));
                        $this->form_validation->set_rules('password', 'Password', 'required',array('required' => 'Obligatori omplir el camp %s', 'max_length' => 'Mida màxima de %s és 20.'));
                        $this->form_validation->set_rules('password2', 'Password', 'Matches[password]',array('Matches' => 'Les contrasenyes no coincideixen.'));
                        $this->form_validation->set_rules('paypal', 'Paypal', 'required|valid_email',array('required' => 'Obligatori omplir el camp %s', 'valid_email' => 'El paypal introduït ha de tenir un format vàlid.'));
                        $this->form_validation->set_rules('provincia', 'Provincia', 'required',array('required' => 'Obligatori omplir el camp %s'));
                        $this->form_validation->set_rules('poblacio', 'Poblacio', 'required',array('required' => 'Obligatori omplir el camp %s'));
                        $this->form_validation->set_rules('codipostal', 'Codi Postal', 'required',array('required' => 'Obligatori omplir el camp %s'));
                        $this->form_validation->set_rules('carrer', 'Carrer', 'required',array('required' => 'Obligatori omplir el camp %s'));

                        $dades = $this->input->post();

                        if ($this->form_validation->run() == FALSE){
                                $this->load->model('users_model');
                
                                $username = $this->session->userdata('username');

                                //sel usuari
                                $dades['result'] = $this->users_model->sel_usuaris($username);

                                $this->template->load('layout', 'modificarPerfil', $dades);

                        }else{
                                $this->load->model('users_model');

                                $res['resultat'] = $this->users_model->updateP();

                                echo '<script type="text/javascript">';
                                echo 'alert("Usuari modificat correctament")';
                                echo '</script>';
                                
                                redirect(base_url() . 'index.php/showdown/perfil'); 
                        }
                }
        }

        //VISTA LOGIN USUARI
        public function login(){

                $data['title'] = 'ShowDown! - Loguejat!';

                $this->template->load('layout', 'login', $data);
        }

        //VISTA TERMES I CONDICIONS
        public function termes(){
                $this->template->load('layout', 'termes');
        }

        //VISTA TOTS ELS TORNEJOS
        public function tournaments(){
                $this->load->model('tourns_model');

                //sel tornejos
                $dades['result'] = $this->tourns_model->sel_tornejos();

                //sel jocs
                $dades['resultJocs'] = $this->tourns_model->sel_jocs();

                $this->template->load('layout', 'tournaments', $dades);
        }

        //PERFIL
        public function perfil()
        {
                $this->load->model('users_model');
                
                $username = $this->session->userdata('username');

                //sel usuari
                $dades['result'] = $this->users_model->sel_usuaris($username);

                $this->template->load('layout', 'perfil', $dades);
        }

        //MODIFICAR PERFIL
        public function modificarPerfil(){
                $this->load->model('users_model');
                
                $username = $this->session->userdata('username');

                //sel usuari
                $dades['result'] = $this->users_model->sel_usuaris($username);

                $this->template->load('layout', 'modificarPerfil', $dades);
        }

        public function WinnersLeague()
        {
                $this->load->model('users_model');
                
                $this->load->model('product_model');

                $username = $this->session->userdata('username');

                $this->load->library('cart');

                $dades['result'] = $this->users_model->sel_puntos();

                $dades['product'] = $this->product_model->load_products();

                $dades['pick'] = $this->users_model->sel_usuaris($username);

                $dades['username'] = $this->session->userdata('username');
                
                $this->template->load('layout', 'winnersleague', $dades);
        }

        public function carrito($codiProducte)
        {
                $this->load->model('product_model');

                $premi = $this->product_model->product_id($codiProducte);

                $preu = $premi[0]['valor'];
                $nom = $premi[0]['Nom'];
                $tipo = $premi[0]['tipo'];
                $foto = $premi[0]['foto'];

                $data = array(
                        'id'      => $codiProducte,
                        'qty'     => 1,
                        'price'   => $preu,
                        'name'    => $nom,
                        'options' => array('tipus' => $tipo, 'foto' => $foto)
                );
                
                $this->cart->insert($data);

                $this->WinnersLeague();
        }


        //VISTA TORNEIG INDIVIDUAL
        public function tournament($codiTorneig)
        {       
                $this->load->model('tourns_model');

                $dades['result'] = $this->tourns_model->selTorneig($codiTorneig);

                $this->template->load('layout', 'tournament', $dades);
        }

        public function selPartida($codiTorneig){
                // get data
                $this->load->model('tourns_model');

                $data = $this->tourns_model->bracket($codiTorneig);

                echo json_encode($data);
        }

        //VISTA REGISTRE TORNEIG
        public function register_tourn(){
                $this->load->model('tourns_model');

                //sel jocs
                $dades['result'] = $this->tourns_model->sel_jocs();

                $this->template->load('layout', 'register_tourn', $dades);
        }

        //LOG OUT
        public function logout(){  
                $this->session->unset_userdata('username');  
                redirect(base_url());  
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

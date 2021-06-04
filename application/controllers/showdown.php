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

                $this->load->model('tourns_model');

                $data['fifa'] = $this->tourns_model->contFifa();
                $data['sf'] = $this->tourns_model->contSf();
                $data['lol'] = $this->tourns_model->contLol();

                $this->template->load('layout', 'home', $data);
	}

        //VISTA ADMIN
        public function admin(){
                $this->load->model('tourns_model');

                $dades['tornejos'] = $this->tourns_model->sel_tornejos();

                $this->load->view('admin_home', $dades);
        }

        public function admin_partida($codiTorneig){

                $this->load->model('tourns_model');

                $this->load->model('users_model');

                $dades['tornejos'] = $this->tourns_model->sel_tornejos();

                $dades['result'] = $this->tourns_model->selTorneig($codiTorneig);

                $dades['participants'] = $this->tourns_model->participants_torneig($codiTorneig);

                $this->load->view('admin_partida', $dades);

                if(isset($_POST['ingressar1'])){
                        $this->form_validation->run();
                        $this->form_validation->set_rules('participant', 'Participant', 'required',array('required' => 'Obligatori omplir el camp %s'));
                        $this->form_validation->set_rules('resultat', 'Resultat', 'required',array('required' => 'Obligatori omplir el camp %s'));

                        $dades = $this->input->post();

                        if ($this->form_validation->run() == FALSE){

                                $dades['tornejos'] = $this->tourns_model->sel_tornejos();

                                $dades['result'] = $this->tourns_model->selTorneig($codiTorneig);

                                $dades['participants'] = $this->tourns_model->participants_torneig($codiTorneig);

                                //$this->template->load('layout', 'admin_partida', $dades);
                                header("Refresh:0");

                        }else{
                                $res['resultat'] = $this->tourns_model->inserirRonda1($codiTorneig);

                                echo '<script language="javascript">';
                                echo 'alert("Resultat guardat.")';
                                echo '</script>';

                                header("Refresh:0");
                        }
                }else if(isset($_POST['ingressar2'])){
                        $this->form_validation->run();
                        $this->form_validation->set_rules('participant', 'Participant', 'required',array('required' => 'Obligatori omplir el camp %s'));
                        $this->form_validation->set_rules('resultat', 'Resultat', 'required',array('required' => 'Obligatori omplir el camp %s'));

                        $dades = $this->input->post();

                        if ($this->form_validation->run() == FALSE){

                                $dades['tornejos'] = $this->tourns_model->sel_tornejos();

                                $dades['result'] = $this->tourns_model->selTorneig($codiTorneig);

                                $dades['participants'] = $this->tourns_model->participants_torneig($codiTorneig);

                                //$this->template->load('layout', 'admin_partida', $dades);
                                header("Refresh:0");

                        }else{
                                $res['resultat'] = $this->tourns_model->inserirRonda2($codiTorneig);

                                echo '<script language="javascript">';
                                echo 'alert("Resultat guardat.")';
                                echo '</script>';

                                header("Refresh:0");
                        }
                }else if(isset($_POST['ingressar3'])){
                        $this->form_validation->run();
                        $this->form_validation->set_rules('participant', 'Participant', 'required',array('required' => 'Obligatori omplir el camp %s'));
                        $this->form_validation->set_rules('resultat', 'Resultat', 'required',array('required' => 'Obligatori omplir el camp %s'));

                        $dades = $this->input->post();

                        if ($this->form_validation->run() == FALSE){

                                $dades['tornejos'] = $this->tourns_model->sel_tornejos();

                                $dades['result'] = $this->tourns_model->selTorneig($codiTorneig);

                                $dades['participants'] = $this->tourns_model->participants_torneig($codiTorneig);

                                //$this->template->load('layout', 'admin_partida', $dades);
                                header("Refresh:0");

                        }else{
                                $res['resultat'] = $this->tourns_model->inserirRonda3($codiTorneig);

                                echo '<script language="javascript">';
                                echo 'alert("Resultat guardat.")';
                                echo '</script>';

                                $this->load->view('admin', $dades);
                        }
                }else if(isset($_POST['decideWin'])){
                        $this->form_validation->run();
                        $this->form_validation->set_rules('guanyador', 'Guanyador', 'required',array('required' => 'Obligatori omplir el camp %s'));

                        $dades = $this->input->post();

                        if ($this->form_validation->run() == FALSE){

                                $dades['tornejos'] = $this->tourns_model->sel_tornejos();

                                $dades['result'] = $this->tourns_model->selTorneig($codiTorneig);

                                $dades['participants'] = $this->tourns_model->participants_torneig($codiTorneig);

                                $this->load->view('admin_partida', $dades);
                                //header("Refresh:0");

                        }else{
                                $res['resultat'] = $this->tourns_model->inserirGuanyador($codiTorneig);

                                $res['mespunts'] = $this->users_model->augmentarPunts($_POST);

                                echo '<script language="javascript">';
                                echo 'alert("Guanyador guardat.")';
                                echo '</script>';

                                header("Refresh:0");
                        }
                }

                
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

                                echo '<script language="javascript">';
                                echo 'alert("Compte creat. Ja pots loguejar-te.")';
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
                                $password = md5($this->input->post('password3'));

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
                        $this->form_validation->set_rules('hora', 'Hora del torneig', 'required',array('required' => 'Obligatori omplir el camp %s'));
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

                                //$res['resultat2'] = $this->tourns_model->inserirRondes($_POST);

                                echo '<script language="javascript">';
                                echo 'alert("Torneig registrat correctament.")';
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

                                echo '<script language="javascript">';
                                echo 'alert("Usuari modificat correctament.")';
                                echo '</script>';
                                
                                redirect(base_url() . 'index.php/showdown/perfil'); 
                        }
                }else if(isset($_POST['imgPerfil'])){

                        $config['upload_path']          = './uploads/';
                        $config['allowed_types']        = 'gif|jpg|png';
                        $config['max_size']             = 100;
                        $config['max_width']            = 1024;
                        $config['max_height']           = 768;

                        $username = $this->session->userdata('username');

                        $this->load->library('upload', $config);

                        $this->load->model('users_model');

                        if ( ! $this->upload->do_upload('imatge'))
                        {
                                $error = array('error' => $this->upload->display_errors());

                                echo '<script language="javascript">';
                                echo 'alert('.$error.')';
                                echo '</script>';

                                header("Refresh:0");
                        }
                        else
                        {
                                $this->users_model->store_pic_data_profile($this->upload->data(), $username);

                                echo '<script language="javascript">';
                                echo 'alert("Arxiu pujat correctament")';
                                echo '</script>';

                                redirect(base_url() . 'index.php/showdown/perfil');
                        }
                
                }else if(isset($_POST["apuntarse"])){
                        $this->form_validation->run();
                        $this->form_validation->set_rules('ingame', 'Nom ingame', 'required|is_unique[partida.ingame]',array('required' => 'Obligatori omplir el camp %s', 'is_unique' => 'Ja existeix un participant amb aquest nom.'));
                        
                        $dades = $this->input->post();

                        $this->load->model('tourns_model');

                        $res['result'] = $this->tourns_model->inserirPartida();

                        redirect(base_url() . 'index.php/showdown/tournament/' . $_POST["torneig"]);
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

                $this->load->model('tourns_model');

                $username = $this->session->userdata('username');

                //sel tornejos propis
                $dades['tourns'] = $this->users_model->sel_torneig_user($username);

                //sel tornejos apuntat
                $dades['joined'] = $this->users_model->joined($username);

                //sel usuari
                $dades['result'] = $this->users_model->sel_usuaris($username);

                //check if admin
                $dades['admin'] = $this->users_model->checkAdmin($username);

                //CONTADORS

                $dades['tornejos'] = $this->users_model->contTornejos();

                $dades['participacions'] = $this->users_model->contParticipacions();

                $dades['wins'] = $this->users_model->contWins();

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

                $puntos = $this->users_model->sel_punts_user($username);

                $dades['puntsUser'] = $puntos;

                $gastat = ($puntos[0]['punts']) - ($this->cart->total());

                $dades['gastat'] = $gastat;
                
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

                redirect('http://localhost/showdown/index.php/showdown/WinnersLeague');
        }

        public function pay()
        {
                $this->load->model('users_model');

                $this->load->model('compra_model');

                $this->load->model('comanda_model');

                $username = $this->session->userdata('username');

                $puntos = $this->users_model->sel_punts_user($username);

                $idUser = $this->users_model->sel_usuaris($username);

                $this->compra_model->comprar($username);

                $cont = 0;
                        
                foreach ($this->cart->contents() as $items)
                {
                        $cont++;

                        $codiProducte = $items['id'];

                        $compra = $this->compra_model->sel_usr_compra($username);

                        $this->comanda_model->comandar($compra[0]['codiCompra'],$codiProducte);
                }             

                $gastat = ($puntos[0]['punts']) - ($this->cart->total());

                $this->users_model->restarPunts($username,$gastat);

                $this->cart->destroy();

                redirect('http://localhost/showdown/index.php/showdown/WinnersLeague');
        }

        public function destruirCarro()
        {
                $this->cart->destroy();

                redirect('http://localhost/showdown/index.php/showdown/WinnersLeague');
        }


        //VISTA TORNEIG INDIVIDUAL
        public function tournament($codiTorneig)
        {       
                $this->load->model('tourns_model');

                $dades['result'] = $this->tourns_model->selTorneig($codiTorneig);

                $dades['participants'] = $this->tourns_model->selParticipants($codiTorneig);

                $dades['check'] = $this->tourns_model->checkPart($codiTorneig);

                $dades['model'] = $this->tourns_model;

                $this->template->load('layout', 'tournament', $dades);
        }

        //JUGAR PARTIDA
        public function jugar($codiTorneig){
                $this->load->model('tourns_model');

                $dades['result'] = $this->tourns_model->selTorneig($codiTorneig);

                $username = $this->session->userdata('username');

                $dades['partida'] = $this->tourns_model->participants($codiTorneig, $username);


                $this->template->load('layout', 'jugar', $dades);

                //PUJAR ARXIU
                if(isset($_POST['pujar'])){
                                
                        $config['upload_path']          = './uploads/';
                        $config['allowed_types']        = 'gif|jpg|png';
                        $config['max_size']             = 100;
                        $config['max_width']            = 1024;
                        $config['max_height']           = 768;

                        $this->load->library('upload', $config);

                        if ( ! $this->upload->do_upload('ronda1'))
                        {
                                $error = array('error' => $this->upload->display_errors());

                                echo '<script language="javascript">';
                                echo 'alert('.$error.')';
                                echo '</script>';

                                header("Refresh:0");
                        }
                        else
                        {
                                $this->tourns_model->store_pic_data($this->upload->data(), $username, $codiTorneig);

                                echo '<script language="javascript">';
                                echo 'alert("Arxiu pujat correctament")';
                                echo '</script>';

                                header("Refresh:0");
                        }
                }else if(isset($_POST['pujar2'])){

                        $config['upload_path']          = './uploads/';
                        $config['allowed_types']        = 'gif|jpg|png';
                        $config['max_size']             = 100;
                        $config['max_width']            = 1024;
                        $config['max_height']           = 768;

                        $this->load->library('upload', $config);

                        if ( ! $this->upload->do_upload('ronda2'))
                        {
                                $error = array('error' => $this->upload->display_errors());

                                echo '<script language="javascript">';
                                echo 'alert('.$error.')';
                                echo '</script>';

                                header("Refresh:0");
                        }
                        else
                        {
                                $this->tourns_model->store_pic_data2($this->upload->data(), $username, $codiTorneig);

                                echo '<script language="javascript">';
                                echo 'alert("Arxiu pujat correctament")';
                                echo '</script>';

                                header("Refresh:0");
                        }
                }else if(isset($_POST['pujar3'])){

                        $config['upload_path']          = './uploads/';
                        $config['allowed_types']        = 'gif|jpg|png';
                        $config['max_size']             = 100;
                        $config['max_width']            = 1024;
                        $config['max_height']           = 768;

                        $this->load->library('upload', $config);

                        if ( ! $this->upload->do_upload('ronda3'))
                        {
                                $error = array('error' => $this->upload->display_errors());

                                echo '<script language="javascript">';
                                echo 'alert('.$error.')';
                                echo '</script>';

                                header("Refresh:0");
                        }
                        else
                        {
                                $this->tourns_model->store_pic_data3($this->upload->data(), $username, $codiTorneig);

                                echo '<script language="javascript">';
                                echo 'alert("Arxiu pujat correctament")';
                                echo '</script>';

                                header("Refresh:0");
                        }
                }
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

                $username = $this->session->userdata('username');

                //sel jocs
                $dades['result'] = $this->tourns_model->sel_jocs($username);

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
        * @param	string $str el dni que recibe por parametro
        * @return	bool true si el dni es valido
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

<?php

    class users_model extends CI_Model{
        public function __construct()
        {
            $this->load->database();
        }
        /**
        * Insercio de les dades d'un nou usuari per mètode POST
        *
        * @access	public
        */
        public function inserirUsuari(){
            
            $nom = $_POST["nom"];
            $cognoms = $_POST["cognoms"];
            $usuari = $_POST["usuari"];
            $dni = $_POST["dni"];
            $correu = $_POST["correu"];
            $naix = $_POST["naix"];
            $pass = $_POST["password"];
            $paypal = $_POST["paypal"];
            $provincia = $_POST["provincia"];
            $poblacio = $_POST["poblacio"];
            $codipostal = $_POST["codipostal"];
            $direccio = $_POST["carrer"]." ".$_POST["numero"]." ".$_POST["pis"];  
            $rol = "usuari";
            $punts = 0;

            $sql = "INSERT INTO usuaris(nom,cognoms,usuari,dni,correu,data,contrasenya,paypal,provincia,poblacio,codiPostal,direccio,rol,punts)
                    VALUES('$nom','$cognoms','$usuari','$dni','$correu','$naix','$pass','$paypal','$provincia','$poblacio','$codipostal','$direccio','$rol',$punts) ";
            
            $this->db->query($sql);
            $num_files = $this->db->affected_rows();

            return $num_files;
        }

        /**
        * Comprova si existeix l'usuari amb les dades introduïdes
        *
        * @access	public
        * @param	string $username usuari del client registrat
        * @param    string $password contrasenya del client registrat
        * @return	bool true si l'usuari existeix
        */
        public function can_login($username, $password){
            $this->db->where('usuari', $username);
            $this->db->where('contrasenya', $password);
            $query = $this->db->get('usuaris'); //SELECT * FROM usuaris WHERE usuari = '$username' AND contrasenya = '$password'
        
            if($query->num_rows() > 0){
                return true;
            }else{
                return false;
            }
        }

        //UPDATE dades perfil
        /**
        * Actualització de les dades d'un usuari per mètode POST
        *
        * @access	public
        */
        public function updateP(){
            $nom = $_POST["nom"];
            $cognoms = $_POST["cognoms"];
            $correu = $_POST["correu"];
            $naix = $_POST["naix"];
            $pass = $_POST["password"];
            $paypal = $_POST["paypal"];
            $provincia = $_POST["provincia"];
            $poblacio = $_POST["poblacio"];
            $codipostal = $_POST["codipostal"];
            $direccio = $_POST["carrer"];  

            $username = $this->session->userdata('username');

            $sql = "UPDATE usuaris SET nom = '".$nom."', cognoms = '".$cognoms."', correu = '".$correu."', data = '".$naix."', contrasenya = '".$pass."', paypal = '".$paypal."', provincia = '".$provincia."',
                                        poblacio = '".$poblacio."', codiPostal = '".$codipostal."', direccio = '".$direccio."' WHERE usuari = '".$username."';";
                                        

            echo $sql;
                                        

            $this->db->query($sql);

            $num_files = $this->db->affected_rows();

            return $num_files;
        }

        /**
        * Selecció d'usuari en concret 
        *
        * @access	public
        * @param	string $username usuari guardat la session
        * @return	array $query amb les dades de l'usuari trobat
        */
        public function sel_usuaris($username)
        {
            $query = $this->db->query('SELECT * FROM usuaris WHERE usuari = "'.$username.'"');

            return $query->row();
        }

        /**
        * Selecció de tots els usuaris
        *
        * @access	public
        * @return	array $query amb les dades de tots els usuaris la base de dades
        */
        public function sel_usuarisAll()
        {
            $query = $this->db->query('SELECT * FROM usuaris');

            return $query->row();
        }

        /**
        * Selecció d'usuaris segons els seus punts
        *
        * @access	public
        * @return	array $query amb les dades de tots els usuaris la base de dades per punts descendents
        */
        public function sel_puntos()
        {
            $query = $this->db->query('SELECT * FROM usuaris ORDER BY punts DESC');

            return $query->result();
        }

        /**
        * Selecció de dades d'un usuari en concret
        *
        * @access	public
        * @param	int $idUser usuari guardat la session
        * @return	array $query amb les dades trobades
        */
        public function sel_usr_points($idUser)
        {
            $query = $this->db->query('SELECT * FROM usuaris WHERE id ='.$idUser.'');

            return $query->result();
        }

        public function sel_punts_user($idUser)
        {
            $query = $this->db->query('SELECT * FROM usuaris WHERE usuari = "'.$idUser.'"');

            return $query->result_array();
        }

        public function sel_usr_id($idUser)
        {
            //$query = $this->db->query('SELECT username')
        }

        //SELECT TORNEJOS ALS QUE ESTA APUNTAT
        public function joined($username){
            $query = $this->db->query('SELECT * FROM torneig t JOIN partida p ON(p.idTorneo = t.codiTorneig) JOIN joc j ON(t.codiJoc = j.Id) WHERE p.participant = "'.$username.'"');

            return $query->result();
        }

        //SELECT TORNEJOS CREATS PER L'USUARI
        public function sel_torneig_user($username){
            $query = $this->db->query('SELECT * FROM torneig t JOIN joc j ON(j.Id = t.codiJoc) WHERE t.creador = "'.$username.'"');

            return $query->result();
        }

        
        /**
        * Comprovació si l'usuari passat per paràmetres es administrador o no
        *
        * @access	public
        * @param	string $username usuari a comprovar
        * @return	array $query amb el resultat TRUE o FALSE
        */
        public function checkAdmin($username){
            $query = $this->db->query("SELECT( CASE WHEN EXISTS
                                                (
                                                    SELECT * FROM usuaris
                                                    WHERE usuari = '".$username."'
                                                    AND rol = 'administrador'
                                                )
                                                    THEN 1
                                                    ELSE 0
                                                    END

                                                ) AS isAdmin");

            return $query->row();
        }

        /**
        * Pujada d'imatge de perfil de l'usuari passat per paràmetre
        *
        * @access	public
        * @param	string $data totes les dades de la imatge pujada per l'usuari
        * @param	string $username usuari a comprovar
        */
        public function store_pic_data_profile($data, $username){

            $imgdata = file_get_contents($data['full_path']); //pillar la ruta de la imagen completa
            //$imgname = $this->upload->data('file_name');
            $imgtype = $this->upload->data('file_type');
            $data = array(
                'tipus' => $imgtype,
                'imatge' => $imgdata
            );

            $on = array('usuari' => $username);

            $this->db->where($on);
            $this->db->update('usuaris', $data);
        }

        //AUGMENTAR PUNTS
        public function augmentarPunts(){
            $winner = $_POST['guanyador'];

            $query = $this->db->query('UPDATE usuaris SET punts = punts + 450 WHERE usuari = "'.$winner.'"');

            $this->db->query($query);

            $num_files = $this->db->affected_rows();

            return $num_files;;
        }

        //CONTADORS

        //CONTADOR TORNEJOS CREATS
        public function contTornejos(){
            $usuari = $this->session->userdata('username');

            $query = $this->db->query('SELECT COUNT(*) AS contador FROM torneig WHERE creador = "'.$usuari.'"');

            return $query->row();
        }

        //CONTADOR PARTICIPACIONS EN TORNEJOS
        public function contParticipacions(){
            $usuari = $this->session->userdata('username');

            $query = $this->db->query('SELECT COUNT(*) AS contador FROM partida WHERE participant = "'.$usuari.'"');

            return $query->row();
        }

        //CONTADOR WINS
        public function contWins(){
            $usuari = $this->session->userdata('username');

            $query = $this->db->query('SELECT COUNT(*) AS contador FROM torneig WHERE guanyador = "'.$usuari.'"');

            return $query->row();
        }

        public function restarPunts($idUser, $preuCarrito)
        {
            $query = $this->db->query('UPDATE usuaris SET punts = '.$preuCarrito.' WHERE usuari = "'.$idUser.'"');

            $this->db->query($query);

            $num_files = $this->db->affected_rows();

            return $num_files;
        }

    }


?>
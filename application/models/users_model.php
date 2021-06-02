<?php

    class users_model extends CI_Model{
        public function __construct()
        {
            $this->load->database();
        }

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

            $sql = "INSERT INTO usuaris(nom,cognoms,usuari,dni,correu,data,contrasenya,paypal,provincia,poblacio,codiPostal,direccio,rol)
                    VALUES('$nom','$cognoms','$usuari','$dni','$correu','$naix','$pass','$paypal','$provincia','$poblacio','$codipostal','$direccio','$rol') ";
            
            $this->db->query($sql);
            $num_files = $this->db->affected_rows();

            return $num_files;
        }

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

        public function sel_usuaris($username)
        {
            $query = $this->db->query('SELECT * FROM usuaris WHERE usuari = "'.$username.'"');

            return $query->row();
        }

        public function sel_usuarisAll()
        {
            $query = $this->db->query('SELECT * FROM usuaris');

            return $query->row();
        }

        public function sel_puntos()
        {
            $query = $this->db->query('SELECT * FROM usuaris ORDER BY punts DESC');

            return $query->result();
        }

        public function sel_usr_points($idUser)
        {
            $query = $this->db->query('SELECT * FROM usuaris WHERE id ='.$idUser.'');

            return $query->result();
        }

        public function sel_usr_id($idUser)
        {
            $query = $this->db->query('SELECT username')
        }

    }


?>
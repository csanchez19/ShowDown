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

            $sql = "INSERT INTO usuaris(nom,cognoms,usuari,dni,correu,data,contrasenya,paypal)
                    VALUES('$nom','$cognoms','$usuari','$dni','$correu','$naix','$pass','$paypal') ";
            
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
    }


?>
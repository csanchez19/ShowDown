<?php

    class tourns_model extends CI_Model{
        public function __construct()
        {
            $this->load->database();
        }

        //SELECT JOCS REGISTER
        public function sel_jocs(){
            $query = $this->db->query('SELECT * FROM joc');

            return $query->result();
        }

        //INSERT TORNEIG
        public function inserirTourn(){
            $nom = $_POST["nom"];
            $data = $_POST["data"];
            $idJoc = $_POST["jocs"];
            $places = $_POST["places"];
            $desc = $_POST["desc"];
            $actiu = FALSE;

            $sql = "INSERT INTO torneig(nom,descripcio,data,places,activo,codiJoc)
                    VALUES('$nom','$desc','$data','$places','$actiu','$idJoc')";

            $this->db->query($sql);
            $num_files = $this->db->affected_rows();

            return $num_files;
        }
    }

    //ALTER TABLE torneig ADD CONSTRAINT fk_joc FOREIGN KEY (codiJoc) REFERENCES joc(Id)


?>
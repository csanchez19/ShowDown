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

        //SELECT TOTS ELS TORNEJOS
        public function sel_tornejos(){
            $query = $this->db->query('SELECT * FROM torneig t JOIN joc j ON(j.Id = t.codiJoc)');

            return $query->result();
        }

        //SELECT TORNEIG INDIVIDUAL
        public function selTorneig($codiTorneig){
            $query = $this->db->query('SELECT * FROM torneig t JOIN joc j ON(j.Id = t.codiJoc) WHERE t.codiTorneig ='.$codiTorneig);

            return $query->row();
        }

        //INSERT TORNEIG
        public function inserirTourn(){
            $nom = $_POST["nom"];
            $data = $_POST["data"];
            $idJoc = $_POST["jocs"];
            $places = $_POST["places"];
            $desc = $_POST["desc"];
            $actiu = FALSE;

            $username = $this->session->userdata('username');

            $creador = $username;

            $sql = "INSERT INTO torneig(nom,descripcio,data,places,activo,codiJoc,creador)
                    VALUES('$nom','$desc','$data','$places','$actiu','$idJoc','$creador')";

            $this->db->query($sql);
            $num_files = $this->db->affected_rows();

            return $num_files;
        }

        //SELECT BRACKET DEL TORNEO
        public function bracket($codiTorneig){

            $response = array();

            $this->db->select('u.usuari, p.resultat');
            $this->db->from('partida p');
            $this->db->join('usuaris u', 'u.id = p.participant');
            $this->db->where('idTorneo', $codiTorneig);
            $records = $this->db->get();
            $response = $records->result_array();

            return $response;
        }
    }

    //ALTER TABLE torneig ADD CONSTRAINT fk_joc FOREIGN KEY (codiJoc) REFERENCES joc(Id)


?>
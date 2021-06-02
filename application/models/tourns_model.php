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
            $query = $this->db->query('SELECT * FROM torneig t JOIN joc j ON(j.Id = t.codiJoc) WHERE activo = 1');

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
            $actiu = TRUE;

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
            $sql = 'SELECT * FROM partida WHERE idTorneo ='. $codiTorneig;            
            $query = $this->db->query($sql);
            // Fetch the result array from the result object and return it
            return $query->result();
        }

        //SELECT JOC DEL TORNEIG
        public function sel_joc_torneig($codiTorneig){
            $query = $this->db->query('SELECT j.Nom FROM torneig t JOIN joc j ON(j.Id = t.codiJoc) WHERE t.codiTorneig ='.$codiTorneig);

            return $query->row();
        }

        //SELECT JOC DE L'USUARI
        public function sel_joc_usuari($joc, $username){
            if($joc == "League of legends"){
                $query = $this->db->query('SELECT usuari_lol FROM usuaris WHERE usuari =' .$username);

                return $query->result();
            }
        }

        //INSERIR PARTICIPANT A PARTIDA
        public function inserirPartida(){
            $usuari = $_POST["usuari"];
            $ingame = $_POST["ingame"];
            $codiTorneig = $_POST["torneig"];

            $sql = "INSERT INTO partida(idTorneo,participant,ingame)
                    VALUES('$codiTorneig','$usuari','$ingame')";

            $this->db->query($sql);
            $num_files = $this->db->affected_rows();

            return $num_files;
        }

        //CONTADOR PARTICIPANTS EN TORNEIG
        public function selParticipants($codiTorneig){
            /*$this->db->select('count(*) as count');
            $this->db->from('partida');
            $this->db->where('idTorneo', $codiTorneig);
            $query = $this->db->get();*/
            $query = $this->db->query('SELECT COUNT(*) AS contador FROM partida WHERE idTorneo ='.$codiTorneig);


            return $query->row();
        }


    }

    //ALTER TABLE torneig ADD CONSTRAINT fk_joc FOREIGN KEY (codiJoc) REFERENCES joc(Id)


?>
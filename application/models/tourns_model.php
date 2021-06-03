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
            $data = $_POST["data"] . " " . $_POST["hora"];
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
            $sql = 'SELECT id, idTorneo, participant, ingame, guanyador, ronda_1, ronda_2, ronda_3 FROM partida WHERE idTorneo ='. $codiTorneig;            
            $query = $this->db->query($sql);
            // Fetch the result array from the result object and return it
            return $query->result();
        }

        //SELECT PARTICIPANT
        public function participants($codiTorneig, $username){
            $sql = 'SELECT * FROM partida WHERE participant = "'.$username.'" AND idTorneo ='. $codiTorneig;            
            $query = $this->db->query($sql);
            // Fetch the result array from the result object and return it
            return $query->row();
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

        //PUJAR IMATGE RESULTAT
        public function store_pic_data($data, $username, $codiTorneig){

            $imgdata = file_get_contents($data['full_path']); //pillar la ruta de la imagen completa
            $imgname = $this->upload->data('file_name');
            $imgtype = $this->upload->data('file_type');
            $data = array(
                'tipus1' => $imgtype,
                'foto1' => $imgdata,
                'nomFitxer1' => $imgname
            );

            $on = array('participant' => $username, 'idTorneo' => $codiTorneig);

            $this->db->where($on);
            $this->db->update('partida', $data);
        }

        public function store_pic_data2($data, $username, $codiTorneig){

            $imgdata = file_get_contents($data['full_path']); //pillar la ruta de la imagen completa
            $imgname = $this->upload->data('file_name');
            $imgtype = $this->upload->data('file_type');
            $data = array(
                'tipus2' => $imgtype,
                'foto2' => $imgdata,
                'nomFitxer2' => $imgname
            );

            $on = array('participant' => $username, 'idTorneo' => $codiTorneig);

            $this->db->where($on);
            $this->db->update('partida', $data);
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

        //CHECK SI L'USUARI JA HA PARTICIPAT
        public function checkPart($codiTorneig){
            $usuari = $this->session->userdata('username');

            $query = $this->db->query('SELECT COUNT(*) AS contador2 FROM partida WHERE participant = "'.$usuari.'" AND idTorneo ='.$codiTorneig);

            return $query->row();
        }

        //CONTADORS
        public function contFifa(){
            $query = $this->db->query('SELECT COUNT(*) AS contador FROM torneig t JOIN joc j ON(j.Id = t.codiJoc) WHERE j.Nom = "Fifa"');

            return $query->row();
        }
        
        public function contSf(){
            $query = $this->db->query('SELECT COUNT(*) AS contador FROM torneig t JOIN joc j ON(j.Id = t.codiJoc) WHERE j.Nom = "Street fighter"');

            return $query->row();
        }

        public function contLol(){
            $query = $this->db->query('SELECT COUNT(*) AS contador FROM torneig t JOIN joc j ON(j.Id = t.codiJoc) WHERE j.Nom = "League of legends"');

            return $query->row();
        }


    }

    //ALTER TABLE torneig ADD CONSTRAINT fk_joc FOREIGN KEY (codiJoc) REFERENCES joc(Id)


?>
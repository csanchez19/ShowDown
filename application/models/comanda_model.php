<?php

    class comanda_model extends CI_Model{
        public function __construct()
        {
            $this->load->database();
        }

        public function comandar($codiCompra,$codiProducte)
        {
            $data = array(
                'codiCompra'=> $codiCompra,
                'codiProducte' => $codiProducte
            );
         
            $this->db->insert('comandes',$data);
        }

        public function sel_usr_compra($codiUsuari)
        {
            $query = $this->db->query('SELECT * FROM compres WHERE codiUsuari = "'.$codiUsuari.'"');

            return $query -> result_array();
        }

        public function product_id($codiPremi)
        {
            $query = $this->db->query('SELECT codiCompra FROM premios WHERE codiPremi = '.$codiPremi);

            return $query -> result_array();
        }
    }


?>
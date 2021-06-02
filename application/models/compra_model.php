<?php

    class compra_model extends CI_Model{
        public function __construct()
        {
            $this->load->database();
        }

        public function comprar($codiUsuari)
        {

            $data = array(
                'codiUsuari'=> $codiUsuari
            );
         
            $this->db->insert('compres',$data);
        }

        public function sel_usr_compra($codiUsuari)
        {
            $query = $this->db->query('SELECT codiCompra FROM compres WHERE codiUsuari = "'.$codiUsuari.'" ORDER BY codiCompra DESC');

            return $query -> result_array();
        }

        public function product_id($codiPremi)
        {
            $query = $this->db->query('SELECT codiCompra FROM premios WHERE codiPremi = '.$codiPremi);

            return $query -> result_array();
        }
    }


?>
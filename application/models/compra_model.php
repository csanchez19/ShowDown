<?php

    class compra_model extends CI_Model{
        public function __construct()
        {
            $this->load->database();
        }

        public function comprar($codiUsuari)
        {
            $query = $this->db->query('INSERT INTO compres ("codiCompra","codiUsuari") VALUES ("0","'.$codiUsuari.'")');

            return $query -> result();
        }

        public function sel_usr_compra($codiUsuari)
        {
            $query = $this->db->query('SELECT codiCompra FROM compres WHERE codiUsuari = "'.$codiUsuari.'"');

            return $query -> result();
        }

        public function product_id($codiPremi)
        {
            $query = $this->db->query('SELECT codiCompra FROM premios WHERE codiPremi = '.$codiPremi);

            return $query -> result_array();
        }
    }


?>
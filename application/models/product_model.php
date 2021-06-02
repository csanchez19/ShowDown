<?php

    class product_model extends CI_Model{
        public function __construct()
        {
            $this->load->database();
        }

        public function load_products()
        {
            $query = $this->db->query('SELECT * FROM premios');

            return $query -> result();
        }

        public function product_id($codiPremi)
        {
            $query = $this->db->query('SELECT * FROM premios WHERE codiPremi = '.$codiPremi);

            return $query -> result_array();
        }
    }


?>
<?php

class pagination_model extends CI_Model {

    protected $table = 'pagination';

    public function __construct() {
        parent::__construct();
    }

    public function get_count() {
        return $this->db->count_all($this->table);
    }

    public function get_pagination($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get($this->table);

        return $query->result();
    }
}
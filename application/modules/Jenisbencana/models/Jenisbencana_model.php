<?php

class Jenisbencana_model extends CI_model{
    //fungsi tampil data
    public function getAll() {
        $this->db->select('*');
        $this->db->from('jenis_bencana');
        return $this->db->get();
    }

}
?>
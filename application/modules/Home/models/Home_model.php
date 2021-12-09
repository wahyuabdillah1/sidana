<?php

class Home_model extends CI_model{
    //fungsi tampil data
    public function getAll() {
        $this->db->select('*');
        $this->db->from('bencana');
        $this->db->join('jenis_bencana', 'bencana.jenis_bencana_id = jenis_bencana.id');
        return $this->db->get();
    }

}
?>
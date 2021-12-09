<?php

class Bencana_model extends CI_model{
    //fungsi tampil data
    public function getAll() {
        $this->db->select('*');
        $this->db->from('bencana');
        $this->db->join('jenis_bencana', 'bencana.jenis_bencana_id = jenis_bencana.id');
        return $this->db->get();
    }
    

    //fungsi insert data
    public function insert($data){
        $this->db->insert('bencana',$data);
    }

    //fungsi edit data
    public function edit($ID){
        $this->db->where('ID',$ID);
        return $this->db->get('bencana')->row_array();
    }

    //fungsi update data
    public function update($id,$data){
        $this->db->where('id',$id);
        $this->db->update('bencana',$data);
        
    }

    //fungsi delete data
    public function delete($ID){
        $this->db->where('id',$ID);
        $this->db->delete('bencana');
        
    }

}
?>
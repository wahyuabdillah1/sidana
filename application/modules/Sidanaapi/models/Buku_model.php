<?php

class Buku_model extends CI_Model{
public function getAll(){
    $this->db->select('*');
    $this->db->from('bencana');
    return $this->db->get();
}

public function get($id){
    $this->db->where('id',$id);
    $this->db->select('*');
    $this->db->from('artikel');
    return $this->db->get();
}

public function create($data){
    $this->db->insert('bencana',$data);
}

public function update($id,$data){
    $this->db->where('id',$id);
    $this->db->update('bencana',$data);
}
public function delete($id){
    $this->db->where('id',$id);
    $this->db->delete('bencana');
}

}
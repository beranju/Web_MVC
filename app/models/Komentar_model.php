<?php

class Komentar_model{
    private $table_komentar = 'tb_komentar';
    private $db;


    public function __construct(){
        $this->db = new Database;
    }

    public function addKomentar($data){  
        $this->db->query("INSERT INTO tb_komentar VALUES ('', :nama, :email, :isi, :status_komentar, :id_post)");
        //bind
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('isi', $data['komentar']);
        $this->db->bind('status_komentar', 0);
        $this->db->bind('id_post', $data['id']);

        $this->db->execute();
        return $this->db->rowCount();

    }

    public function getAllKomentar(){ 
        $query = "SELECT * FROM tb_komentar WHERE status_komentar=:status_komentar";
        $this->db->query($query);
        $this->db->bind('status_komentar', 1); 
       return  $this->db->resultSet();
    }

    public function getKomentar(){
        $status_komentar = 0;
        $query = "SELECT * FROM tb_komentar WHERE status_komentar=:status_komentar";
        $this->db->query($query);
        $this->db->bind('status_komentar', $status_komentar);
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function draftkomentar($id_komentar){
        $query = "UPDATE tb_komentar SET status_komentar= :status_komentar WHERE id_komentar= :id_komentar";
        $this->db->query($query);
        $this->db->bind('status_komentar', 1);
        $this->db->bind('id_komentar', $id_komentar);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function hapuskomentar($id_komentar){
        $query = "DELETE FROM tb_komentar WHERE id_komentar=:id_komentar";
        $this->db->query($query); 
        $this->db->bind('id_komentar', $id_komentar);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getKomentarById($id){ 
        $query = "SELECT * FROM tb_artikel INNER JOIN tb_komentar ON tb_artikel.id=tb_komentar.id_post WHERE tb_komentar.id_post=:id AND tb_komentar.status_komentar = :status_komentar";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->bind('status_komentar', 1);
        $this->db->execute();
        return $this->db->resultSet();
    }
}
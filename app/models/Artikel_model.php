<?php

class Artikel_model{
    private $table_artikel = 'tb_artikel';//variable nama table
    private $table_kategori = 'tb_kategori'; 
    private $db;

    //load database
    public function __construct(){
        $this->db = new Database;
    }

    public function getAllArtikel(){
        $this->db->query('SELECT * FROM tb_artikel INNER JOIN tb_kategori ON  tb_artikel.id_kategori = tb_kategori.id_kategori INNER JOIN tb_author ON tb_author.email = tb_artikel.email WHERE tb_artikel.status_post=1');
        return $this->db->resultSet();
    }
   public function getAllKategori(){
        $this->db->query('SELECT * FROM '. $this->table_kategori);
        return $this->db->resultSet();
    } 
   public function getKategori($id_kategori){
        $this->db->query('SELECT * FROM '. $this->table_kategori. ' WHERE id_kategori=:id_kategori');
        $this->db->bind('id_kategori', $id_kategori);
        return $this->db->singleSet();
    } 
    public function getDraftArtikel(){
        $this->db->query('SELECT * FROM tb_artikel INNER JOIN tb_kategori ON  tb_artikel.id_kategori = tb_kategori.id_kategori INNER JOIN tb_author ON tb_author.email = tb_artikel.email WHERE tb_artikel.status_post=0');
        return $this->db->resultSet();
    }

    public function setKodeArtikel(){
        $this->db->query('SELECT max(id) as id_terbesar FROM '. $this->table_artikel);
        $data = $this->db->singleSet();
        $id = $data['id_terbesar'];
        $id++;
        $huruf = "A";
        return $kode_post = $huruf . sprintf("%06s", $id);
    } 

    public function tambahArtikel($data)
    {
        $kode_post = $data['kode_post'];
        $thumnail = $_FILES['thumnail']['name'];
        $ekstensi = substr($thumnail, strlen($thumnail)-4, strlen($thumnail));
        $ekstensiAcc = array(".jpg",".jpeg",".png",".gif");
        $file_tmp = $_FILES['thumnail']['tmp_name'];
        if(in_array($ekstensi, $ekstensiAcc)){
            $newthumnail = md5($thumnail).$ekstensi;
            move_uploaded_file($file_tmp, __DIR__ . "/../../public/img/$newthumnail");
        }
        if(isset($data['post'])){
            $status_post = 1;
            
        }else{
            $status_post = 0;
        }  
        $this->db->query("INSERT INTO ".$this->table_artikel." VALUES ('', :kode_post, :judulartikel, :isiartikel, :thumnail, :kategori, :status_post, :email, :editedby)");
        //bind
        $this->db->bind('kode_post', $kode_post);
        $this->db->bind('judulartikel', $data['judulartikel']);
        $this->db->bind('thumnail', $newthumnail);
        $this->db->bind('kategori', $data['kategori']);
        $this->db->bind('isiartikel', $data['isiartikel']);
        $this->db->bind('status_post', $status_post);
        $this->db->bind('email', $data['email']);
        $this->db->bind('editedby', $data['editedby']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function draftPost($id){
        $this->db->query('UPDATE tb_artikel SET status_post= :status_post WHERE id=:id');
        $this->db->bind('status_post', 0);
        $this->db->bind('id', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }
    public function undraftPost($id){
        $this->db->query('UPDATE tb_artikel SET status_post= :status_post WHERE id=:id');
        $this->db->bind('status_post', 1);
        $this->db->bind('id', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }
    
    public function hapusPost($id){
        $this->db->query('DELETE FROM tb_artikel WHERE id=:id'); 
        $this->db->bind('id', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getArtikelById($id){
        $query = 'SELECT * FROM tb_artikel INNER JOIN tb_kategori ON  tb_artikel.id_kategori = tb_kategori.id_kategori WHERE tb_artikel.id=:id';
        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->resultSet();
    }

    public function editPost($data){
        $kode_post = $data['kode_post'];
        $thumnail = $_FILES['thumnail']['name'];
        $ekstensi = substr($thumnail, strlen($thumnail)-4, strlen($thumnail));
        $ekstensiAcc = array(".jpg",".jpeg",".png",".gif");
        $file_tmp = $_FILES['thumnail']['tmp_name'];
        if(in_array($ekstensi, $ekstensiAcc)){
            $newthumnail = md5($thumnail).$ekstensi;
            move_uploaded_file($file_tmp, __DIR__ . "/../../public/img/$newthumnail");
        }
        if(isset($data['post'])){
            $status_post = 1;
            
        }else{
            $status_post = 0;
        }  
    
    
        $query = "UPDATE tb_artikel SET 
        kode_post = :kode_post,
        judul_post = :judul_post,
        isi_post = :isi_post,
        thumnail_post = :thumnail_post,
        id_kategori = :id_kategori,
        status_post = :status_post,
        email= :email,
        editedby = :editedby
        WHERE id=:id
        ";
        $this->db->query($query);
        //bind
        $this->db->bind('kode_post', $kode_post);
        $this->db->bind('judul_post', $data['judulartikel']);
        $this->db->bind('isi_post', $data['isiartikel']);
        $this->db->bind('thumnail_post', $newthumnail);
        $this->db->bind('id_kategori', $data['kategori']);
        $this->db->bind('status_post', $status_post);
        $this->db->bind('id', $data['id_post']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('editedby', $data['editedby']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getNewPost(){ 
        $this->db->query('SELECT * FROM tb_artikel INNER JOIN tb_kategori ON  tb_artikel.id_kategori = tb_kategori.id_kategori WHERE tb_artikel.status_post=:status_post LIMIT 1');
        $this->db->bind('status_post', 1);
        return $this->db->resultSet();
    }

    public function tambahkategori($data){
        $query = "INSERT INTO tb_kategori VALUES('', :nama_kategori)";
        $this->db->query($query);
        $this->db->bind('nama_kategori', $data['namakategori']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deletekategori($id){
        $this->db->query("DELETE FROM tb_kategori WHERE id_kategori=:id");
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    } 

    public function getArtikelByKategori($id_kategori){
        $this->db->query("SELECT * FROM tb_artikel  INNER JOIN tb_kategori ON  tb_artikel.id_kategori = tb_kategori.id_kategori INNER JOIN tb_author ON tb_author.email=tb_artikel.email WHERE tb_kategori.id_kategori=:id_kategori ");
        $this->db->bind('id_kategori', $id_kategori); 
        return $this->db->resultSet();

    }

    public function getPostPop(){
        $this->db->query("SELECT * FROM tb_artikel  INNER JOIN tb_kategori ON  tb_artikel.id_kategori = tb_kategori.id_kategori WHERE tb_artikel.status_post=:status_post LIMIT 5");
        $this->db->bind('status_post', 1); 
        return $this->db->resultSet();
    }
    
    public function getPostById($id){
        $this->db->query("SELECT * FROM tb_artikel  INNER JOIN tb_kategori ON  tb_artikel.id_kategori = tb_kategori.id_kategori WHERE tb_artikel.id=:id AND tb_artikel.status_post=:status_post ");
        $this->db->bind('id', $id); 
        $this->db->bind('status_post', 1); 
        return $this->db->resultSet();
    }

    public function tambahkomentar($data){
        $query = "INSERT INTO ".$this->table_komentar." VALUES ('', :nama, :email, :isi, :status_komentar, :id_post)";
         
        $this->db->query($query);
        //bind
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('isi', $data['komentar']);
        $this->db->bind('status_komentar', 0); 
        $this->db->bind('id_post', $data['id_post']); 

        $this->db->execute();
        return $this->db->rowCount();

    } 

    public function cariArtikel(){
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM tb_artikel INNER JOIN tb_kategori ON tb_artikel.id_kategori=tb_kategori.id_kategori INNER JOIN tb_author ON tb_author.email=tb_artikel.email WHERE tb_artikel.judul_post LIKE :keyword AND tb_artikel.status_post=:status_post";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        $this->db->bind('status_post', 1);
        return $this->db->resultSet();
    } 
   

   

}
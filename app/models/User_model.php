<?php

class User_model{
    private $table_user = 'tb_author';
    private $db;

    public function __construct(){
        $this->db = new Database;
    } 

    public function daftarUser($data){
        try{ 
            $status_admin = 1;
            $pass = password_hash($data['password'], PASSWORD_BCRYPT);
            $foto = $_FILES['foto']['name'];
            $ekstensi = substr($foto, strlen($foto)-4, strlen($foto));
            $ekstensiAcc = array(".jpg", ".png", ".jpeg", ".gif");
            $file_tmp = $_FILES['foto']['tmp_name'];
            if(in_array($ekstensi, $ekstensiAcc)){
                $newfoto = md5($foto).$ekstensi;
                move_uploaded_file($file_tmp, __DIR__."/../../public/img/$newfoto");
            }
    
            $query = "INSERT INTO ".$this->table_user." VALUES (:email, :password, :nama, :foto, :status)";
            $this->db->query($query);
            $this->db->bind('nama', html($data['nama']));
            $this->db->bind('email', html($data['email']));
            $this->db->bind('password', $pass);
            $this->db->bind('foto', $newfoto); 
            $this->db->bind('status', $status_admin); 
             $this->db->execute();
        }catch(\PDOException $e){
            echo $e->getMessage();
            echo $e->getCode() ;
        }
          
        return $this->db->rowCount();
    }

    public function loginUser($data){
        try{
            $query = "SELECT * FROM ".$this->table_user." WHERE email=:email AND status_admin !=:status";
            $this->db->query($query);
            $this->db->bind('email', html($data['email']));            
            $this->db->bind('status', 1);

            $this->db->execute();
            $user =  $this->db->rowCount();
            if($user != 0){
            session_start();
            $_SESSION['user-webmvc'] = $data['email']; 

        }
        }catch(\PDOException $e){
            echo $e->getCode()." ".$e->getMessage; 
        }
        
        
        return $user;
    }
    public function cekEmail($data){ 
        try{
            $query = "SELECT * FROM ".$this->table_user." WHERE email=:email ";
            $this->db->query($query);
            $this->db->bind('email', $data['email']);
            if($this->db->rowCount == 0){
                return true;
            }else{
                return false;
            }
        }catch(\PDOException $e){
            echo $e->getMessage;

        } 
    }
    public function cekStatus($data){ 
        try{
            $query = "SELECT * FROM ".$this->table_user." WHERE status_admin=:status";
            $this->db->query($query);
            $this->db->bind('status', 1);
            if($this->db->rowCount > 1){
                return false;
            }else{
                return true;
            }
        }catch(\PDOException $e){
            echo $e->getMessage;

        } 
    }

    public function getuser(){
        try{
            $query = "SELECT * FROM tb_author INNER JOIN tb_jenisuser ON tb_author.status_admin=tb_jenisuser.id WHERE tb_author.status_admin != :status_admin";
            $this->db->query($query);
            $this->db->bind('status_admin', 1);
        }catch(\PDOException $e){
            echo $e->getCode." ".$e->getMessage;
        }
        return $this->db->resultSet();
    }
    public function getLoginUser( ){
        $email = $_SESSION['user-webmvc'];
        try{
            $query = "SELECT * FROM tb_author INNER JOIN tb_jenisuser ON tb_author.status_admin=tb_jenisuser.id WHERE tb_author.email = :email";
            $this->db->query($query);
            $this->db->bind('email', $email);
        }catch(\PDOException $e){
            echo $e->getCode." ".$e->getMessage;
        }
        return $this->db->resultSet();
    }
    
    public function getdetailuser($email){
        try{
            $query = "SELECT * FROM tb_author INNER JOIN tb_jenisuser ON tb_author.status_admin=tb_jenisuser.id WHERE tb_author.email = :email";
            $this->db->query($query);
            $this->db->bind('email', $email);
        }catch(\PDOException $e){
            echo $e->getCode." ".$e->getMessage;
        }
        return $this->db->resultSet();
    }
    public function getDraftUser(){
        try{ 
            $query = "SELECT * FROM tb_author INNER JOIN tb_jenisuser ON tb_author.status_admin=tb_jenisuser.id WHERE tb_author.status_admin=:status_admin";
            $this->db->query($query);
            $this->db->bind('status_admin', 1);
        }catch(\PDOException $e){
            echo $e->getCode." ".$e->getMessage;
        }
        return $this->db->resultSet();
    }

    public function draftUser($email){
        try{
            $query = "UPDATE tb_author SET status_admin=:status_admin WHERE email=:email";
            $this->db->query($query);
            $this->db->bind('email', $email);
            $this->db->bind('status_admin', 1);
        }catch(\PDOException $e){
            echo $e->getCode." ".$e->getMessage;
        }
        return $this->db->resultSet();
    }
    public function setUser($email){
        try{
            $query = "UPDATE tb_author SET status_admin=:status_admin WHERE email=:email";
            $this->db->query($query);
            $this->db->bind('email', $email);
            $this->db->bind('status_admin', 2);
        }catch(\PDOException $e){
            echo $e->getCode." ".$e->getMessage;
        }
        return $this->db->resultSet();
    }
    
 
}
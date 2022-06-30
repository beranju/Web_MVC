<?php

class Admin extends Controller{
    public function index()
    {
        $data['judul'] = 'Admin';
        $data['kategori'] = $this->model('Artikel_model')->getAllKategori();
        $data['artikel'] = $this->model('Artikel_model')->getAllArtikel();
        $data['draft'] = $this->model('Artikel_model')->getDraftArtikel();
        $data['komentar'] = $this->model('Komentar_model')->getKomentar(); 
        $this->view('templates/header-admin', $data);
        if(!isset($_SESSION['user-webmvc'])){
            $this->view('admin/login');
        }else{ 
            $data['user'] = $_SESSION['user-webmvc']; 
            $data['loginuser'] = $this->model('User_model')->getLoginUser($_SESSION['user-webmvc']);
            $this->view('admin/index', $data);            
        }        
        $this->view('templates/footer-admin');

    }

    public function login(){
        $this->view('admin/login');
    }
    public function daftar(){
        $this->view('admin/daftar');
    }
    public function keluar(){ 
        session_unset( );
        session_destroy();
        $this->view('admin/login');
    }
    public function artikel()
    {
        $data['judul'] = 'Artikel'; 
        $data['artikel'] = $this->model('Artikel_model')->getAllArtikel(); 
        $this->view('templates/header-admin', $data);
        if(!isset($_SESSION['user-webmvc'])){
            $this->view('admin/login');
        }else{ 
            $data['user'] = $_SESSION['user-webmvc']; 
            $data['loginuser'] = $this->model('User_model')->getLoginUser($_SESSION['user-webmvc']);
            $this->view('admin/artikel', $data);        
        }        
       
        $this->view('templates/footer-admin');

    }

    public function komentar()
    {
        $data['judul'] = 'Komentar'; 
        $data['komentar'] = $this->model('Komentar_model')->getAllKomentar(); 
        $this->view('templates/header-admin', $data);
        if(!isset($_SESSION['user-webmvc'])){
            $this->view('admin/login');
        }else{ 
            $data['user'] = $_SESSION['user-webmvc']; 
            $data['loginuser'] = $this->model('User_model')->getLoginUser($_SESSION['user-webmvc']);
            $this->view('admin/komentar', $data);           
        }        
        
        $this->view('templates/footer-admin', $data);
    }

    public function addartikel()
    {
        $data['judul'] = 'Tambah Artikel';
        $data['kategori'] = $this->model('Artikel_model')->getAllKategori();
        $data['artikel'] = $this->model('Artikel_model')->getAllArtikel();
        $data['kode_post'] = $this->model('Artikel_model')->setKodeArtikel(); 
        $this->view('templates/header-admin', $data);
        if(!isset($_SESSION['user-webmvc'])){
            $this->view('admin/login');
        }else{ 
            $data['user'] = $_SESSION['user-webmvc']; 
            $data['loginuser'] = $this->model('User_model')->getLoginUser($_SESSION['user-webmvc']);
            $this->view('admin/addartikel', $data);          
        }        
        
        $this->view('templates/footer-admin');
    }
    public function editartikel($id)
    {
        $data['judul'] = 'Edit Artikel'; 
        $data['kategori'] = $this->model('Artikel_model')->getAllKategori();
        $data['artikel'] = $this->model('Artikel_model')->getArtikelById($id);  
        $this->view('templates/header-admin', $data);
        if(!isset($_SESSION['user-webmvc'])){
            $this->view('admin/login');
        }else{ 
            $data['user'] = $_SESSION['user-webmvc']; 
            $data['loginuser'] = $this->model('User_model')->getLoginUser($_SESSION['user-webmvc']);
            $this->view('admin/editartikel', $data);         
        }        
        
        $this->view('templates/footer-admin');
    }

    public function tambah(){
        if($this->model('Artikel_model')->tambahArtikel($_POST) > 0){
            Flasher::setFlash('Artikel','berhasil', 'ditambahkan', 'success');
            header("Location: ".BASEURL."/admin/artikel");
            exit;
        }else{
            Flasher::setFlash('Artikel', 'Gagal', 'ditambahkan', 'danger');
            header("Location: ".BASEURL."/admin/artikel");
            exit;
        }
    }

    public function draft($id){
        if($this->model('Artikel_model')->draftPost($id)){
            Flasher::setFlash('Artikel', 'berhasil', 'dibuat ke draft', 'success');
            header("Location: ".BASEURL."/admin/artikel");
            exit;
        }else{
            Flasher::setFlash('Artikel','Gagal', 'dibuat ke draft', 'danger');
            header("Location: ".BASEURL."/admin/artikel");
            exit;
        }
    }
    public function undraft($id){
        if($this->model('Artikel_model')->undraftPost($id)){
            Flasher::setFlash('Artikel', 'berhasil', 'dipost', 'success');
            header("Location: ".BASEURL."/admin/artikel");
            exit;
        }else{
            Flasher::setFlash('Artikel','Gagal', 'dipost', 'danger');
            header("Location: ".BASEURL."/admin/index");
            exit;
        }
    }

    public function hapus($id){
        if($this->model('Artikel_model')->hapusPost($id)){
            Flasher::setFlash('Artikel', 'berhasil', 'dihapus', 'success');
            header("Location: ".BASEURL."/admin/artikel");
            exit;
        }else{
            Flasher::setFlash('Artikel', 'Gagal', 'dihapus', 'danger');
            header("Location: ".BASEURL."/admin/artikel");
            exit;
        }
    } 

    public function edit(){
        if($this->model('Artikel_model')->editPost($_POST) > 0){
            Flasher::setFlash('Artikel','berhasil', 'diedit', 'success');
            header("Location: ".BASEURL."/admin/artikel");
            exit;
        }else{
            Flasher::setFlash('Artikel','Gagal', 'diedit', 'danger');
            header("Location: ".BASEURL."/admin/artikel");
            exit;
        }
    }

    public function addkategori(){
        if($this->model('Artikel_model')->tambahkategori($_POST) > 0){
            Flasher::setFlash('Kategori', 'berhasil', 'ditambahkan', 'success');
            header("Location: ".BASEURL."/admin/index");
            exit;
        }else{
            Flasher::setFlash('Kategori','Gagal', 'ditambahkan', 'danger');
            header("Location: ".BASEURL."/admin/index");
            exit;
        }
    }

    public function hapuskategori($id){
        if($this->model('Artikel_model')->deletekategori($id) > 0){
            Flasher::setFlash('Kategori', 'berhasil', 'dihapus', 'success');
            header("Location: ".BASEURL."/admin/index");
            exit;
        }else{
            Flasher::setFlash('Kategori','Gagal', 'dihapus', 'danger');
            header("Location: ".BASEURL."/admin/index");
            exit;
        }
    }

    public function draftkomentar($id_komentar){
        if($this->model('Komentar_model')->draftkomentar($id_komentar) > 0){
            Flasher::setFlash('Komentar', 'berhasil', 'dipost', 'success');
            header("Location: ".BASEURL."/admin/index");
            exit;
        }else{
            Flasher::setFlash('Komentar','Gagal', 'dipost', 'danger');
            header("Location: ".BASEURL."/admin/index");
            exit;
        }
    }
    public function hapuskomentar($id_komentar){
        if($this->model('Komentar_model')->hapuskomentar($id_komentar) > 0){
            Flasher::setFlash('Komentar', 'berhasil', 'dihapus', 'success');
            header("Location: ".BASEURL."/admin/index");
            exit;
        }else{
            Flasher::setFlash('Komentar','Gagal', 'dihapus', 'danger');
            header("Location: ".BASEURL."/admin/index");
            exit;
        }
    }

    public function daftaruser(){
        if($this->model('User_model')->daftarUser($_POST) > 0){
            Flasher::setFlash('Anda', 'berhasil', 'mendaftar', 'success');
            header("Location: ".BASEURL."/admin/login"); 
            exit;
        }elseif($this->model('User_model')->cekEmail($_POST) > 0){
            Flasher::setFlash('Email', 'sudah', 'terdaftar', 'danger');
            header("Location: ".BASEURL."/admin/daftar");
            exit; 
        }else{
            Flasher::setFlash('Anda','Gagal', 'mendaftar', 'danger');
            header("Location: ".BASEURL."/admin/daftar");
            exit;
        }
    }
    public function loginuser(){
        if($this->model('User_model')->loginUser($_POST) > 0){
            Flasher::setFlash('Anda', 'berhasil', 'login', 'success'); 
            header("Location: ".BASEURL."/admin/index");
            exit;
        }elseif($this->model('User_model')->cekStatus($_POST)> 0){
            Flasher::setFlash('Anda', 'belum', 'diverifikasi', 'danger'); 
            header("Location: ".BASEURL."/admin/login");
            exit;
        }else{
            Flasher::setFlash('Anda','Gagal', 'login', 'danger');
            header("Location: ".BASEURL."/admin/login");
            exit;
        }
    }

    public function user(){
        $data['judul'] = 'Daftar User';
        $data['kategori'] = $this->model('Artikel_model')->getAllKategori();
        $data['daftaruser'] = $this->model('User_model')->getuser();
       
        $this->view('templates/header-admin', $data);
        if(!isset($_SESSION['user-webmvc'])){
            $this->view('admin/login');
        }else{ 
            $data['user'] = $_SESSION['user-webmvc']; 
            $data['loginuser'] = $this->model('User_model')->getLoginUser($_SESSION['user-webmvc']);
            $data['draftuser'] = $this->model('User_model')->getDraftUser();
            $this->view('admin/user', $data);          
        }        
        
        $this->view('templates/footer-admin');
    }
    public function detailuser($email){
        $data['judul'] = 'Detail User';
        $data['kategori'] = $this->model('Artikel_model')->getAllKategori();
        $data['detailruser'] = $this->model('User_model')->getdetailuser($email);
        $this->view('templates/header-admin', $data);
        if(!isset($_SESSION['user-webmvc'])){
            $this->view('admin/login');
        }else{ 
            $data['user'] = $_SESSION['user-webmvc']; 
            $data['loginuser'] = $this->model('User_model')->getLoginUser($_SESSION['user-webmvc']);
            $this->view('admin/detailuser', $data);          
        }        
        
        $this->view('templates/footer-admin');
    }


    public function draftuser($email){
        if($this->model('User_model')->draftUser($email) > 0){
            Flasher::setFlash('user', 'berhasil', 'diblock', 'success');
            header("Location: ".BASEURL."/admin/user");
            exit;
        }else{
            Flasher::setFlash('user','Gagal', 'di block', 'danger');
            header("Location: ".BASEURL."/admin/user");
            exit;
        }
    }
    public function setuser($email){
        if($this->model('User_model')->setUser($email) > 0){
            Flasher::setFlash('user', 'berhasil', 'diset', 'success');
            header("Location: ".BASEURL."/admin/user");
            exit;
        }else{
            Flasher::setFlash('user','Gagal', 'diset', 'danger');
            header("Location: ".BASEURL."/admin/user");
            exit;
        }
    }

}
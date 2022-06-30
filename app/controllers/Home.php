<?php

class Home extends Controller{

    public function index()
    {
        $data['judul'] = 'Home'; 
        $data['artikel'] = $this->model('Artikel_model')->getAllArtikel(); 
        $data['kategori'] = $this->model('Artikel_model')->getAllKategori();
        $data['populer'] = $this->model('Artikel_model')->getPostPop();
        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer', $data);

    }

    public function post($id){
        $data['judul'] = 'Post';   
        $data['kategori'] = $this->model('Artikel_model')->getAllKategori();
        $data['artikel'] = $this->model('Artikel_model')->getAllArtikel();
        $data['post'] = $this->model('Artikel_model')->getPostById($id);
        $data['komentar'] = $this->model('Komentar_model')->getKomentarById($id);
        $data['populer'] = $this->model('Artikel_model')->getPostPop();
        $this->view('templates/header', $data);
        $this->view('home/post', $data);
        $this->view('templates/footer', $data);
    }

    public function kategori($id_kategori)
    { 
        $data['judul'] = 'Kategori'; 
        $data['kategori'] = $this->model('Artikel_model')->getAllKategori();
        $data['breadcrum'] = $this->model('Artikel_model')->getKategori($id_kategori);
        $data['post'] = $this->model('Artikel_model')->getArtikelByKategori($id_kategori);
        $data['populer'] = $this->model('Artikel_model')->getPostPop();
        $this->view('templates/header', $data);
        $this->view('home/kategori', $data);
        $this->view('templates/footer', $data);
    } 
    public function about()
    {
        $data['judul'] = 'About';  
        $data['kategori'] = $this->model('Artikel_model')->getAllKategori();
        $data['populer'] = $this->model('Artikel_model')->getPostPop();
        $this->view('templates/header', $data);
        $this->view('home/about', $data);
        $this->view('templates/footer', $data);

    }

    public function komentar(){ 
        if($this->model('Komentar_model')->addKomentar($_POST)>0){
            Flasher::setFlash('Komentar', 'berhasil', 'ditambahkan', 'success');
            header("Location: ".BASEURL."/home/post/".$_POST['id']);
            exit;
        }else{
            Flasher::setFlash('Komentar','Gagal', 'dibuat ke draft', 'danger');
            header("Location: ".BASEURL."/home/post".$_POST['id']);
            exit;
        }

    }

    public function cari(){
        $data['judul'] = 'Home'; 
        $data['artikel'] = $this->model('Artikel_model')->cariArtikel();
        $data['newpost'] = $this->model('Artikel_model')->getNewPost();
        $data['kategori'] = $this->model('Artikel_model')->getAllKategori();
        $data['populer'] = $this->model('Artikel_model')->getPostPop();
        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer', $data);
    }
     
    
}
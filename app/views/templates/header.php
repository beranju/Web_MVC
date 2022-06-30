<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- absolute link -->
    <link rel="stylesheet" href="<?= BASEURL;?>/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="<?= BASEURL;?>/css/style.css"> 
    <link rel="stylesheet" href="<?= BASEURL;?>/fontawesome/css/all.min.css"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
 
    <title>AccLaptop | <?= $data['judul'];?></title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light sticky-top" style="background-color:#112B3C;">
  <div class="container">
    <a class="navbar-brand" href="<?= BASEURL?>" style="color:#EF4B4C ;">AccLaptop</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav  me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?= BASEURL?>" style="color:white;">Home</a>
        </li>
        <?php 
        if (is_array($data['kategori']) || is_object($data['kategori'])){
          foreach($data['kategori']  as $kategori):
        ?>
        <li class="nav-item">
          <a class="nav-link" href="<?= BASEURL?>/home/kategori/<?=$kategori['id_kategori'];?>" style="color:white;"><?=$kategori['nama_kategori'];?></a>
        </li>
        <?php endforeach;}?>
        <li class="nav-item">
          <a class="nav-link" href="<?= BASEURL?>/home/about" style="color:white;">About</a>
        </li> 
      </ul>
      <form  class="d-flex" role="search" action="<?=BASEURL;?>/home/cari" method="POST" name="kolomcari">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="keyword"  style="height:2.5rem;">
            <button class="btn btn-success" type="submit" name="cari"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form> 
    </div>
  </div>
</nav>
<div class="container-fluid">
    <div class="row main" >
        <?php include_once  '../app/views/templates/side-left.php';?>

        <div class="col-md-10 pt-2 maincontrol ">
            <div class="flasher mb-1">
                <?php Flasher::flash()?>
            </div>
            <div class="container pt-4">  
                <div class="row"> 
                    <div class="col-md-12">
                        <div class="card shadow">
                            <div class="card-body">
                                <p class="card-text"><i class="fas fa-solid fa-layer-group ikon mx-1"></i> Kategori Artikel</p>
                                <div class="d-flex justify-content-end "> 
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahkategori"> tambah kategori</button>
                                    <button type="button" class="btn btn-primary mx-2" data-bs-toggle="modal" data-bs-target="#daftarkategori"> daftar kategori</button> 
                                </div> 
                            </div>
                        </div>
                    </div> 
                </div> 
            </div>
            <div class="row p-3 mb-2 mt-2">
                <h5 class="bg-light p-2 rounded titledraft">Draft Postingan</h5>
                <div class="container daftardraft p-3 rounded" >
                    <?php foreach($data['draft'] as $artikel):?>
                        <div class="d-flex align-items-center mb-2 bg-light p-1 rounded">
                            <div class="flex-shrink-0">
                                <img src="<?=BASEURL;?>/img/<?=$artikel['thumnail_post'];?>" alt="<?=$artikel['judul_post'];?>" class="rounded" height= "75rem" width= "75rem" >
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5>
                                    <?php 
                                        $caption = $artikel['judul_post'];
                                        $long = strip_tags(html_entity_decode($caption, ENT_QUOTES, "ISO-8859-1"));
                                        echo substr($long, 0, 60);
                                    ?>
                                </h5>
                                <div class="d-flex" style="float:left;">
                                    <span class="badge rounded bg-info " style="color:black; text-decoration:none;">Kategori: <b><?=$artikel['nama_kategori'];?></b></span>
                                    <span class="badge rounded bg-info mx-1" style="color:black; text-decoration:none;">by: <b><?=$artikel['nama_author'];?></b></span>
                                </div>
                                <div class="d-flex" style="float:right;">
                                    <a href="<?=BASEURL;?>/admin/undraft/<?=$artikel['id']?>" class="rounded bg-warning p-1" style="color:white;"><i class="fa-solid fa-cloud-arrow-up"></i></a>
                                    <a href="<?=BASEURL;?>/admin/editartikel/<?=$artikel['id']?>" class="rounded bg-primary p-1 mx-1 tampilmodul" style="color:white;" ><i class="fa-solid fa-pen"></i></a>
                                    <a href="<?=BASEURL;?>/admin/hapus/<?=$artikel['id']?>" class="rounded bg-danger p-1" onclick="return confirm('Yakin?')" style="color:white;"><i class="fa-solid fa-trash-can"></i></a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;?> 
                </div>
            </div>
            <div class="row p-3 mb-2 mt-2">
                <h5 class=" bg-light p-2 rounded titledraft">Draft Komentar</h5>
                <div class="container daftardraft p-3 rounded">
                    <?php foreach($data['komentar'] as $komentar):?>
                        <div class="d-flex align-items-center mb-2 bg-light p-1 rounded ">
                            <div class="flex-shrink-0">
                                <img src="<?=BASEURL;?>/img/userpp.png" alt="profil" class="rounded" height= "50rem" width= "50rem" >
                            </div>
                            <div class="flex-grow-1 ms-3 p-2">
                                <h6><strong><?=$komentar['nama'];?></strong></h6>
                                
                                <div   style="float:left;">
                                <p><?=$komentar['isi'];?></p>
                                </div>
                                <div class="d-flex" style="float:right;">
                                    <a href="<?=BASEURL;?>/admin/draftkomentar/<?=$komentar['id_komentar'];?>" class="rounded bg-warning p-1 mx-2" style="color:white;"><i class="fa-solid fa-cloud-arrow-up"></i></a> 
                                    <a href="<?=BASEURL;?>/admin/hapuskomentar/<?=$komentar['id_komentar'];?>" class="rounded bg-danger p-1" onclick="return confirm('Yakin?')" style="color:white;"><i class="fa-solid fa-trash-can"></i></a>
                                </div>
                                
                            </div>
                        </div>
                    <?php endforeach;?> 
                </div>
            </div>
            <p class="footer">@2022 AccLaptop Serve with Love</p>  
        </div>
    </div>
</div>
 
<!-- Modal -->
<div class="modal fade" id="tambahkategori" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="judultambahkategori" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="judultambahkategori">Tambah Kategori</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="<?=BASEURL;?>/admin/addkategori" method="post">
            <div class="modal-body">
                <div class="mb-3">
                    <label for="namakategori" class="form-label">Nama Kategori</label>
                    <input type="text" name="namakategori" class="form-control" id="namakategori" placeholder="type...">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="daftarkategori" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="juduldaftarkategori" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="juduldaftarkategori">Daftar Kategori</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
         
        <div class="modal-body">
        <ul class="list-group">
            <?php foreach($data['kategori']  as $kategori): ?>
            <li class="list-group-item d-flex justify-content-between">
                <?= $kategori['nama_kategori'];?>
                <a href="<?=BASEURL;?>/admin/hapuskategori/<?=$kategori['id_kategori'];?>" class="badge bg-danger" onclick="return confirm('Yakin?')"><i class="fa-solid fa-trash-can"></i> </a>
            </li> 
            <?php endforeach;?>
        </ul>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Oke</button> 
        </div>
         
    </div>
  </div>
</div>


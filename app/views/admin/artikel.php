
<div class="container-fluid ">
    <div class="row main" >
        <?php include_once  '../app/views/templates/side-left.php';?>

        <div class="col-md-10 pt-2 maincontrol" >
            <div class="container p-3">
                <div class="flasher mb-1">
                    <?php Flasher::flash()?>
                </div>
                <a href="<?=BASEURL;?>/admin/addartikel/">
                <button type="button" class="btn rounded-circle btn-success mt-4 mb-4 tambahartikel " data-bs-toggle="tooltip" data-bs-placement="top"
                    data-bs-custom-class="custom-tooltip" title="Tambah postingan">
                    <i class="fa-solid fa-plus"></i>
                </button> 
                </a>
                
                <div class="container p-1 daftarartikel"   > 
                    <?php foreach($data['artikel'] as $artikel):?>
                        <div class="d-flex align-items-center mb-2 bg-light p-1 rounded">
                            <div class="flex-shrink-0">
                                <img src="<?=BASEURL;?>/img/<?=$artikel['thumnail_post'];?>" alt="<?=$artikel['judul_post'];?>" class="rounded" height= "75rem" width= "75rem" >
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h4>
                                    <?php 
                                        $caption = $artikel['judul_post'];
                                        $long = strip_tags(html_entity_decode($caption, ENT_QUOTES, "ISO-8859-1"));
                                        echo substr($long, 0, 60);
                                    ?>
                                </h4>
                                <div class="d-flex" style="float:left;">
                                    <span class="badge rounded bg-info " style="color:black; text-decoration:none;">Kategori: <b><?=$artikel['nama_kategori'];?></b></span>
                                    <span class="badge rounded bg-info mx-1" style="color:black; text-decoration:none;">by: <b><?=$artikel['nama_author'];?></b></span>
                                    <span class="badge rounded bg-info mx-1" style="color:black; text-decoration:none;">Edited by: <b><?=$artikel['editedby'];?></b></span>
                                </div>
                                <div class="d-flex" style="float:right;">
                                    <a href="<?=BASEURL;?>/admin/draft/<?=$artikel['id']?>" class="rounded bg-warning p-1" style="color:white;"><i class="fas fa-solid fa-cloud-arrow-down"></i></a>
                                    <a href="<?=BASEURL;?>/admin/editartikel/<?=$artikel['id']?>" class="rounded bg-primary p-1 mx-1 tampilmodul" style="color:white;" ><i class="fa-solid fa-pen"></i></a>
                                    <a href="<?=BASEURL;?>/admin/hapus/<?=$artikel['id']?>" class="rounded bg-danger p-1" onclick="return confirm('Yakin?')" style="color:white;"><i class="fa-solid fa-trash-can"></i></a>
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



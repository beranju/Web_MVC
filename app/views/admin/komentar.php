
<div class="container-fluid ">
    <div class="row main" >
        <?php include_once  '../app/views/templates/side-left.php';?>

        <div class="col-md-10 pt-2 maincontrol" >
            <div class="container p-3">
                <div class="flasher mb-1">
                    <?php Flasher::flash()?>
                </div>
                
                <div class="container p-1 daftarartikel"   > 
                <?php 
                if (is_array($data['komentar']) || is_object($data['komentar'])){
                foreach($data['komentar'] as $komentar):?>
                        <div class="d-flex align-items-center mb-2 bg-light p-1 rounded ">
                            <div class="flex-shrink-0">
                                <img src="<?=BASEURL;?>/img/userpp.png" alt="profil" class="rounded" height= "50rem" width= "50rem" >
                            </div>
                            <div class="flex-grow-1 ms-3 p-2">
                                <h5><strong><?=$komentar['nama'];?></strong></h5>
                                
                                <div   style="float:left;">
                                <p><?=$komentar['isi'];?></p>
                                </div>
                                <div class="d-flex" style="float:right;">
                                    <a href="<?=BASEURL;?>/admin/draftkomentar/<?=$komentar['id_komentar'];?>" class="rounded bg-warning p-1 mx-2" style="color:white;"><i class="fa-solid fa-cloud-arrow-down"></i></a> 
                                    <a href="<?=BASEURL;?>/admin/hapuskomentar/<?=$komentar['id_komentar'];?>" class="rounded bg-danger p-1" onclick="return confirm('Yakin?')" style="color:white;"><i class="fa-solid fa-trash-can"></i></a>
                                </div>
                                
                            </div>
                        </div>
                    <?php endforeach;}?> 
                </div>  
            </div> 
            <p class="footer">@2022 AccLaptop Serve with Love</p> 
            
        </div> 
    </div>   
</div>



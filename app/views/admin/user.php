<div class="container-fluid">
    <div class="row main" >
        <?php include_once  '../app/views/templates/side-left.php';
        
        ?>

        <div class="col-md-10 pt-2 maincontrol ">
            <div class="flasher mb-1">
                <?php Flasher::flash()?>
            </div>
            <div class="container"> 
            <h2 class="text-center mb-3">Daftar User</h2>
                <div class="container daftardraft p-3 rounded" >
                    <ul class="list-group w-75" style="margin: 0 auto;">
                        <?php   
                        foreach($data['daftaruser'] as $user):?>
                        <li class="list-group-item mb-2" style="<?= $user['email'] == $loginuser['email'] ? "display:none":"display:block;";?>">
                            <p><?=$user['nama_author'];?></p> 
                            <span class="float-left badge bg-info"><?=$user['nama'];?></span>   
                            <?php foreach($data['loginuser'] as $loginuser):?>
                            <a href="<?=BASEURL;?>/admin/draftuser/<?=$user['email'];?>" class="badge bg-danger float-end mx-2" onclick="return confirm('yakin?');" style="<?=$loginuser['status_admin'] == 2 ? "display:none;":"display:block;"; ?> text-decoration:none;"> Unset</a>             
                            <span type="button" class="badge bg-secondary float-end detailuser"><a href="<?=BASEURL;?>/admin/detailuser/<?=$user['email'];?>" style="color: white; text-decoration:none;">detail</a></span> 
                            <?php endforeach;?>
                        </li> 
                        <?php endforeach;?>
                    </ul>
                </div>

                <div style="<?=$loginuser['status_admin'] == 2 ? "display:none;":"display:block";?>">
                    <h2 class="text-center mb-3">Menunggu verifikasi</h2> 
                    <div class="container daftardraft p-3 rounded" >
                        <ul class="list-group w-75" style="margin: 0 auto;">
                            <?php   
                            foreach($data['draftuser'] as $draftuser):?>
                            <li class="list-group-item mb-2">
                                <p><?=$draftuser['nama_author'];?></p> 
                                <span class="float-left badge bg-info"><?=$draftuser['nama'];?></span>   
                                <a href="<?=BASEURL;?>/admin/setuser/<?=$draftuser['email'];?>" class="badge bg-success float-end mx-2" onclick="return confirm('yakin?');" style="<?=$loginuser['status_admin'] == 2 ? "display:none;":"display:block;"; ?> text-decoration:none;"> Set User</a>             
                                <span type="button" class="badge bg-secondary float-end detailuser"><a href="<?=BASEURL;?>/admin/detailuser/<?=$draftuser['email'];?>" style="color: white; text-decoration:none;">detail</a></span> 

                            </li> 
                            <?php endforeach;?>
                        </ul>
                    </div>
                </div>
            </div> 
            
            <p class="footer">@2022 AccLaptop Serve with Love</p>  
        </div>
    </div>
</div>

 
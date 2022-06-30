<div class="container-fluid">
    <div class="row main" >
        <?php include_once  '../app/views/templates/side-left.php';?>

        <div class="col-md-10 pt-2 maincontrol ">
            <div class="flasher mb-1">
                <?php Flasher::flash()?>
            </div>
            <div class="container p-5  ">
                <h3 class="text-center">Detail user</h3>
                <div class="card shadow p-4 w-75" style="margin: 0 auto;">
                    <div class="row">
                        <?php foreach($data['detailruser'] as $user):?>
                        <div class="col-md-8">
                            <table class="table table-borderless"> 
                                <tr>
                                    <th scope="row">nama</th>
                                    <td><?=$user['nama_author'];?></td> 
                                </tr> 
                                <tr>
                                    <th scope="row">email</th>
                                    <td><?=$user['email'];?></td> 
                                </tr> 
                                <tr>
                                    <th scope="row">status</th>
                                    <td><?= $user['nama'];?></td> 
                                </tr> 
                            </table> 
                        </div>
                        <div class="col-md-4">
                            <img width="100rem" height="100rem" class="rounded" src="<?=BASEURL;?>/img/<?=$user['foto'];?>">
                        </div>
                        <?php endforeach;?>
                    </div>
                </div>
            
            </div>
            
            <p class="footer">@2022 AccLaptop Serve with Love</p>  
        </div>
    </div>
</div>

 
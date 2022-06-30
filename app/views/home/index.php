<div class="container mt-3">
    <div class="row">
        <div class="col-md-9">
            <div class="container-fluid">
                <div id="carouselnews" class="carousel slide mb-4" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <?php 
                        for($i = 0; $i < 5; $i++){
                        ?>
                        <button type="button" data-bs-target="#carouselnews" data-bs-slide-to="<?= $i ?>" <?= $i == 0 ? 'class="active"': ''?> aria-current="true"></button> 
                        <?php
                         }
                        ?>
                    </div>
                    <div class="carousel-inner">
                        <?php 
                            $i = 0;
                            foreach ($data['artikel'] as $newpost): 
                        ?>
                        <div <?= $i == 0 ? 'class="carousel-item active"' : 'class="carousel-item"'?>  >
                            <a href="<?=BASEURL;?>/home/post/<?=$newpost['id'];?>" ><img class="thum" src="<?= BASEURL;?>/img/<?=$newpost['thumnail_post'];?> " alt=""></a>
                            <div class="carousel-caption ">
                                <a href="<?=BASEURL;?>/home/post/<?=$newpost['id'];?>"><h3><?=$newpost['judul_post'];?></h3></a>
                                <p><?php 
                                $isi = $newpost['isi_post']; 
                                echo substr(html($isi), 0, 150);
                                ?></p>
                            </div>
                        </div>
                        <?php
                        $i++;
                        if($i == 4) break;
                            endforeach;
                        ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselnews" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselnews" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div> 

                <div class="row"> 
                <?php
                
                 foreach($data['artikel'] as $artikel):?>
                    <div class="col-md-4 mb-2"> 
                           <div class="card">
                                <img src="<?= BASEURL;?>/img/<?=$artikel['thumnail_post'];?>" width=100%; height="40%"  alt=" ">
                                <div class="captionn p-3"> 
                                    <a href="<?=BASEURL;?>/home/post/<?=$artikel['id'];?>" style="color:black; text-decoration:none;">
                                        <h3 class="card-title">
                                            <?php
                                            $judul = $artikel['judul_post']; 
                                            echo substr(html($judul), 0, 40);
                                            ?>
                                        </h3>
                                    </a>
                                    <span class="badge float-right bg-secondary"><?=$artikel['nama_kategori'];?></span>
                                    <span class="badge float-right bg-info"><?=$artikel['nama_author'];?></span>
                                    <p class="card-text">
                                         <?php 
                                         $isi = $artikel['isi_post']; 
                                         echo substr(html($isi), 0, 150);

                                         ?>
                                    </p>
                                    <a href="<?=BASEURL;?>/home/post/<?=$artikel['id'];?>" class="btn btn-light">Read more</a>
                                    <a href="<?=BASEURL;?>" class="btn btn-success" style="color: #E9E9EB;"><i class="fa-solid fa-cart-shopping"></i></a> 
                                </div>
                            </div> 
                    </div> 
                    <?php endforeach;?> 
                </div> 
            </div>  
        </div>

        <div class="col-md-3">
            <div class="row"> 
                <?php 
                if (is_array($data['populer']) || is_object($data['populer'])) { 
                    foreach($data['populer'] as $pop):?>
                <div class="card shadow side-bar mb-2">
                    <a href="<?=BASEURL;?>/home/post/<?=$pop['id'];?>"><img src="<?=BASEURL;?>/img/<?= $pop['thumnail_post'];?>" class="card-img-top " alt=""></a> 
                    <div class="card-body">
                       
                        <h7 class="card-title"><a href="<?=BASEURL;?>/home/post/<?=$pop['id'];?>">
                         <?=$pop['judul_post'];?>
                        </a></h7>
                        <p class="isi-mobile">
                        <?php 
                        $isi = $pop['isi_post']; 
                        echo substr(html($isi), 0, 100);

                        ?>
                        </p>

                    </div>
				</div>
                <?php endforeach;}?>
            </div>
        </div>
    </div>
</div>
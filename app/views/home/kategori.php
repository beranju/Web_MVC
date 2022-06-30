<div class="container mt-3">
    <div class="row">
        <div class="col-md-9">
            <div class="container-fluid"> 

                    <div class="row">                     
                    <?php 
                    if (is_array($data['post']) || is_object($data['post'])) {
                        foreach ($data['post'] as $post): ?> 
                            <div class="col-md-4 mb-2"> 
                            
                            <div class="card">
                                <img src="<?= BASEURL;?>/img/<?=$post['thumnail_post'];?>" width=100%; height="40%"  alt=" ">
                                <div class="captionn p-3"> 
                                    <a href="<?=BASEURL;?>/post/" style="color:black; text-decoration:none;">
                                        <h3 class="card-title">
                                            <?php
                                            $judul = $post['judul_post'];
                                            $long = strip_tags(html_entity_decode($judul, ENT_QUOTES, "ISO-8859-1"));
                                            echo substr($long, 0, 40);
                                            ?>
                                        </h3>
                                    </a>
                                    <span class="badge float-right bg-secondary"><?=$post['nama_kategori'];?></span>
                                    <span class="badge float-right bg-info"><?=$post['nama_author'];
                                    ?></span>
                                    <p class="card-text">
                                            <?php 
                                            $isi = $post['isi_post'];
                                            $long = strip_tags(html_entity_decode($isi, ENT_QUOTES, "ISO-8859-1"));
                                            echo substr($long, 0, 150);
    
                                            ?>
                                    </p>
                                    <a href="<?=BASEURL;?>/home/post/<?=$post['id'];?>" class="btn btn-light">Read more</a>
                                    <a href="<?=BASEURL;?>" class="btn btn-success" style="color: #E9E9EB;"><i class="fa-solid fa-cart-shopping"></i></a> 
                                </div>
                            </div> 
                        </div> 
                        <?php endforeach;}?> 
                </div> 
            </div>  
        </div>

        <div class="col-md-3">
            <div class="row"> 
                <?php 
                if (is_array($data['populer']) || is_object($data['populer'])) { 
                    foreach($data['populer'] as $pop):?>
                <div class="card shadow side-bar mb-2" style="<?= $pop['id_kategori'] == $post['id_kategori'] ? "display:none;":"display:block;";?>">
                    <a href="<?=BASEURL;?>"><img src="<?=BASEURL;?>/img/<?= $pop['thumnail_post'];?>" class="card-img-top " alt=""></a> 
                    <div class="card-body">
                       
                        <h7 class="card-title"><a href="<?=BASEURL;?>/post">
                         <?=$pop['judul_post'];?>
                        </a></h7>
                        <p class="isi-mobile">
                        <?php 
                        $isi = $pop['isi_post'];
                        $long = strip_tags(html_entity_decode($isi, ENT_QUOTES, "ISO-8859-1"));
                        echo substr($long, 0, 150);

                        ?>
                        </p>

                    </div>
				</div>
                <?php endforeach;}?>
            </div>
        </div>
    </div>
</div>
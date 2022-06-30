<div class="container mt-3">
    <div class="row">
        <div class="col-md-10">
        <?php 
        if (is_array($data['post']) || is_object($data['post'])){
          foreach($data['post']  as $post):
        ?>        
            <div class="container-fluid mb-3">
            <nav class="bg-light"style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=BASEURL;?>/home">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?= BASEURL?>/home/kategori/<?=$post['id_kategori'];?>"><?=$post['nama_kategori'];?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?=$post['judul_post'];?></li>
                </ol>
            </nav>
                 <h1 class="mb-3"><?= $post['judul_post'];?></h1>
                 <img class="thum mb-2" src="<?=BASEURL;?>/img/<?=$post['thumnail_post'];?>">
                <div class="mb-3">
                    <?= $post['isi_post'];?>
                </div>
            </div> 
            <hr>
            <div class="container mt-4">
                <h4 class="bg-light">komentar</h4>
                <div class="flasher mb-1">
                    <?php Flasher::flash()?>
                </div>
                <form action="<?=BASEURL;?>/home/komentar/<?=$post['id'];?>" method="post">
                    <?php $id = $post['id'];?>
                    <input name="id"type="hidden" value="<?=$id;?>">  
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input name="nama" type="text" class="form-control" id="nama" >
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input name="email" type="email" class="form-control" id="email" placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="komentar" class="form-label">komentar</label>
                        <textarea name="komentar" class="form-control" id="komentar" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div> 
            <?php endforeach;}?>

            <div class="container mt-5 mb-2">
                <div class="d-flex align-items-center mb-2 bg-light p-1 rounded ">
                    <?php foreach($data['komentar'] as $komentar):?>
                    <div class="flex-shrink-0">
                        <img src="<?=BASEURL;?>/img/userpp.png" alt="profil" class="rounded" height= "75rem" width= "75rem" >
                    </div>
                    <div class="flex-grow-1 ms-3 p-2">
                        <h4><?=$komentar['nama'];?></h4>
                        <p><?=$komentar['isi'];?></p>                         
                    </div>
                    <?php endforeach;?>
                </div> 
            </div>
        </div>

        <div class="col-md-2">
            <h4>Postingan Populer</h4>
            <div class="row">
            <?php 
                if (is_array($data['populer']) || is_object($data['populer'])) { 
                    foreach($data['populer'] as $pop):?>
                <div class="card shadow side-bar mb-2" style="<?= $pop['kode_post'] == $post['kode_post'] ? "display:none;":"display:block;";?>">
                    <a href="<?=BASEURL;?>/home/post/<?=$pop['id'];?>"><img src="<?=BASEURL;?>/img/<?= $pop['thumnail_post'];?>" class="card-img-top " alt=""></a> 
                    <div class="card-body">
                       
                        <h7 class="card-title"><a href="<?=BASEURL;?>/home/post/<?=$pop['id'];?>">
                         <?=$pop['judul_post'];?>
                        </a></h7>
                        <p class="isi-mobile">
                        <?php 
                        $isi = $pop['isi_post'];
                        $long = strip_tags(html_entity_decode($isi, ENT_QUOTES, "ISO-8859-1"));
                        echo substr($long, 0, 60);

                        ?>
                        </p>

                    </div>
				</div>
                <?php endforeach;}?>
            </div>
        </div>
    </div>
</div>
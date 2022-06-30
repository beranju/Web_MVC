
<div class="container-fluid ">
    <div class="row main" >
        <?php include_once  '../app/views/templates/side-left.php';?>

        <div class="col-md-10 pt-2 maincontrol" >
            <div class="container p-3">
                <a href="<?=BASEURL;?>/admin/artikel/"><button type="button" class="btn bg-light mb-2"  ><i class="fa-solid fa-angle-left"></i></button></a>
                <h3 class="title mb-3 bg-light"><center>Tambah Artikel</center></h3>
                <form action="<?=BASEURL;?>/admin/tambah" method="POST" enctype="multipart/form-data">
                    <input type="hidden" id="kode_post" name="kode_post" class="form-control" value="<?=$data['kode_post'];?>" >
                    <input type="hidden" name="status_post" class="form-control" id="status_post" >
                    <input type="hidden" name="id_post" class="form-control" id="id_post" > 
                    <input type="hidden" name="email" class="form-control" id="email" value="<?=$data['user']?>"> 
                    <input type="hidden" name="editedby" class="form-control" id="editedby" value=" "> 
                    <div class="mb-2">
                        <label for="judulartikel" class="form-label bg-light">Judul Post</label>
                        <input type="text" name="judulartikel" class="form-control" id="judulartikel" >
                    </div>
                    <div class="mb-2 d-flex">
                        <div>
                            <label for="thumnail" class="form-label bg-light">Gambar/Thumnail</label><br>
                            <input type="file" class="file" name="thumnail" id="thumnail">
                        </div>
                        <div>
                            <label for="pilihkategori" class="form-label bg-light">Kategori</label>
                            <select name="kategori" class="form-select mb-2" aria-label="Default select example" id="pilihkategori">
                            <option selected>Artikel</option>
                            <?php foreach($data['kategori'] as $kategori) :?>
                            <option value="<?=$kategori['id_kategori'];?>"><?=$kategori['nama_kategori'];?></option> 
                            <?php endforeach;?>
                            </select> 
                        </div>
                    </div>
                
                    <div class="mb-2">
                        <label for="isiartikel" class="form-label bg-light">Isi Post</label>
                        <input type="hidden" name="content" id="content">
                        <textarea  name="isiartikel" class="isiartikel" id="isiartikel" rows="5"> </textarea>
                    </div> 
                    </div>
                    <div class="mt-2 d-flex justify-content-end">
                        <button name="draft" type="submit" class="btn btn-secondary draft mx-2">Draft</button>
                        <button name="post" type="submit" class="btn btn-primary post">Post</button>
                    </div>
                </form>
            </div> 
        </div> 
    </div>  

 



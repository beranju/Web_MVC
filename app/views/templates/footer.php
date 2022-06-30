<div class="container-fluid p-3 mt-3 footersection" style="background-color:#112B3C; text-align:center; bottom:0;">
    <div class="row">
        <div class="col-md-6 d-flex justify-content-center">
            <div class="container">
                <ul>
                    <li>
                        <a href="<?= BASEURL;?>/" style="color:#EF4B4C ;">Acclaptop.com</a> 
                    </li> 
                    <li>
                    <a href="<?=BASEURL;?>/">Home</a>
                    </li>  
                    <?php 
                    if (is_array($data['kategori']) || is_object($data['kategori'])){
                    foreach($data['kategori']  as $kategori):
                    ?>
                    <li class="nav-item">
                    <a class="nav-link" href="<?= BASEURL?>/home/kategori/<?=$kategori['id_kategori'];?>" style="color:white;"><?=$kategori['nama_kategori'];?></a>
                    </li>
                    <?php endforeach;}?>
                    <li>
                        <a href="<?=BASEURL;?>"  >About</a> 
                    </li> 
                </ul>
            </div> 
        </div>
        <div class="col-6 d-flex justify-content-center">
			<ul>
				<li>
					<h2 class="logo" style="color:#EF4B4C ;">AccLaptop.com</h2>
				</li>
				<li>
					<p class="alamat" style="color:white;">Medan, Indonesia</p>
				</li> 
				<li>
					<ul class="d-flex">
						<li><a href="https://youtube.com"> <i class="fa-brands fa-youtube"></i></a></li>
						<li><a href="https://facebook.com"><i class="fa-brands fa-facebook-f mx-3"></i></a></li>
						<li><a href="https://instagram.com"><i class="fa-brands fa-instagram"></i></a></li>
					</ul>
				</li> 
			</ul>	 
		</div> 
    </div>
</div>



<script src="<?= BASEURL;?>/js/bootstrap.bundle.min.js"></script> 
<script src="<?= BASEURL;?>/js/script.js"></script>  
  
</body>
</html>
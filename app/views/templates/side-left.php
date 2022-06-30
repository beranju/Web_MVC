 
<div class="col-md-2 pt-2" style="background-color:black;">
    <nav class="nav flex-column pt-4">
        <a class="navbar-brand" href="index.php?halaman=dashboard" style="color:#EF4B4C ;">
            AccLaptop
        </a>   
        <?php foreach($data['loginuser'] as $user):?>
        <p class="user" style="color:white;">Halo, <a href="<?=BASEURL;?>/admin/detailuser/<?=$user['email'];?>" style="color:white; text-decoration:none;"><?=$user['nama_author'] ?></a> </p>  
        <?php endforeach;?>
        <a class="nav-link active" style="color:white;" aria-current="page" href="<?=BASEURL;?>/admin/index/">Dashboard</a>
        <a class="nav-link" style="color:white;" href="<?=BASEURL;?>/admin/artikel/">Artikel</a>
        <a class="nav-link" style="color:white;" href="<?=BASEURL;?>/admin/komentar/">Komentar</a>
        <div class="dropdown">
            <a class="nav-link   dropdown-toggle"  style="color:white;" type="button" id="dropdownadmin" data-bs-toggle="dropdown" aria-expanded="false">Admin</a>
            <ul class="dropdown-menu" aria-labelledby="dropdownadmin">
                <li><a class="dropdown-item" href="<?=BASEURL;?>/admin/user">daftar user</a></li>
                <li><a class="dropdown-item" href="<?=BASEURL;?>/admin/keluar ">logout</a></li> 
            </ul>
        </div>
           
    </nav> 
</div>



 
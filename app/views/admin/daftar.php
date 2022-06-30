<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Acclaptop | daftar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
        .wrapper{ 
            margin: 0 auto; 
            width: 25rem; 
            height: 35rem;
            padding: 2rem;
        }
        .btn{
            margin: 0 auto;
        }
        .badge{
            color: black;
            float: right;
            text-decoration: none;
        }
    </style>
  </head>
  <body> 

    <div class="container-fluid m-0 p-5 d-flex justify-content-center">
        
        <div class="wrapper card shadow  " >
            <h4 class="text-center">Sign In</h4>
            <?php Flasher::flash()?>
            <form action="<?=BASEURL;?>/admin/daftaruser" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nama" class="form-label">nama</label>
                    <input type="text" name="nama" class="form-control" id="nama" placeholder="isi nama kamu" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">email</label>
                    <input type="text" name="email" class="form-control" id="email" placeholder="123@gmail.com" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">password</label>
                    <input type="password" name="password" class="form-control" id="password" required>
                </div>
                <div class="mb-3">
                    <label for="formFileSm" class="form-label">foto</label>
                    <input name="foto" class="form-control form-control-sm" id="formFileSm" type="file" required>
                </div>

                <div class="mb-3 d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary float-left">sign in</button> 
                </div> 
            </form>
                <div class="text-center">sudah punya akun? <a href="<?=BASEURL;?>/admin/login">login</a></div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>

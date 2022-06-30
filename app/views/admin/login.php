<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Acclaptop | login</title>
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
            text-decoration: none;
        }
    </style>
  </head>
  <body> 

    <div class="container-fluid m-0 p-5 d-flex justify-content-center">
        <div class="wrapper card shadow  " >
            <h4 class="text-center mb-5">Login</h4>
            <div class="flasher mb-1">
                <?php Flasher::flash()?>
            </div>
            <form action="<?=BASEURL;?>/admin/loginuser" method="post"  enctype="multipart/form-data"> 
                <div class="mb-3">
                    <label for="email" class="form-label">email</label>
                    <input type="text" name="email" class="form-control" id="email" placeholder="123@gmail.com" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">password</label>
                    <input type="password" name="password" class="form-control" id="password"  required>
                </div> 
                <a class="badge mb-1 d-flex justify-content-center">lupa password</a>
                <div class="mb-3 d-flex justify-content-center">
                    
                    <button type="submit" class="btn btn-primary float-left">log in</button>
                    
                </div> 
                <div class="text-center">belum punya akun? <a href="<?=BASEURL;?>/admin/daftar">daftar</a></div>
            </form
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>

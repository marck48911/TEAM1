<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
   <meta name="description" content="">
   <meta name="keywords" content="">
   <meta name="author" content="">
   <title>Login</title>
   <link rel="stylesheet" href="../../app/css/bootstrap.css">
   <link rel="stylesheet" href="../../vendor/fontawesome/css/font-awesome.min.css">
   <link rel="stylesheet" href="../../vendor/animo/animate+animo.css">
   <link rel="stylesheet" href="../../app/css/app.css">
   <script src="../../vendor/modernizr/modernizr.js" type="application/javascript"></script>
   <script src="../../vendor/fastclick/fastclick.js" type="application/javascript"></script>
</head>
<body>
    <div style="height: 100%; padding: 50px 0; background-color: #2c3037" class="row row-table">
      <div class="col-lg-3 col-md-6 col-sm-8 col-xs-12 align-middle">
         <div data-toggle="play-animation" data-play="fadeInUp" data-offset="0" class="panel panel-default panel-flat">
            <p class="text-center mb-lg">
               <br>
            </p>
            
            <p class="text-center mb-lg">
               <strong>CUYOTEC LOGIN</strong>
            </p>
            <?php echo form_open_multipart('Welcome/validarusr'); ?>
                <div class="panel-body">
                              <form role="form" class="mb-lg" >
                                  <div class="form-group has-feedback">
                                    <input name="email" type="text" placeholder="Ingrese su usuario" class="form-control">
                                    <span class="fa fa-envelope form-control-feedback text-muted"></span>
                                 </div>
                                 <div class="form-group has-feedback">
                                    <input name="password" type="password" placeholder="Password" class="form-control">
                                    <span class="fa fa-lock form-control-feedback text-muted"></span>
                                 </div>

                     <button type="submit">Ingresar</button>
                       </form>
                           </div>
             <?php echo form_close();?>
              
              
                </div>
                <a>
                  <?php echo form_open_multipart('Welcome/nuevo'); ?>
                  <button type="submit"  class="btn btn-link nounderline">
                    <em class="fa fa-wrench"></em>
                    <span class="item-text">Crear Usuario</span>
                  </button>
                  <?php echo form_close();?>
                </a>
      </div>
   </div>
   <script src="../../vendor/jquery/jquery.min.js"></script>
   <script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>
   <script src="../../vendor/animo/animo.min.js"></script>
   <script src="../../app/js/pages.js"></script>
</body>
</html>

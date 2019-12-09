
<!DOCTYPE html>
<html lang="en" class="no-ie">
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
   <meta name="description" content="">
   <meta name="keywords" content="">
   <meta name="author" content="">
   <title>Cuyotec</title>
   <link rel="stylesheet" href="../../app/css/bootstrap.css">
   <link rel="stylesheet" href="../../vendor/fontawesome/css/font-awesome.min.css">
   <link rel="stylesheet" href="../../vendor/animo/animate+animo.css">
   <link rel="stylesheet" href="../../vendor/csspinner/csspinner.min.css">
   <link rel="stylesheet" href="../../app/css/app.css">
   <script src="../../vendor/modernizr/modernizr.js" type="application/javascript"></script>
   <script src="../../vendor/fastclick/fastclick.js" type="application/javascript"></script>
   <script src="../../ajax/jquery.min.js"></script>
</head>

<body>
<section class="wrapper">
      <!-- START Top Navbar-->
      <nav id="breadcrumb_bar" class="navbar navbar-default navbar-top navbar-fixed-top" role="navigation">
         <!-- START navbar header-->
         <div class="navbar-header">
            <a class="navbar-brand" href="javascript:void(0);">
               <div class="brand-logo">Cursos Cuyotec</div>
            </a>
         </div>
         <div class="nav-wrapper">
           <ul class="nav navbar-nav">
             <li>
                <a href="#" data-toggle="aside">
                   <em class="fa fa-align-left"></em>
                </a>
             </li>
           </ul>
           <ul id="breadcrumb_items" class="breadcrumb align-items-bottom">
           </ul>
         </div>
         <style>
          ul.breadcrumb {
            padding: 18px 0px 0px 20px;
            background-color: #ffffff00;
            display: inline-block;
          }
          .nounderline {
            text-decoration: none !important;
            color: white;
          }
          .breadcrumb-button {
            padding: 0;
            border: none;
            background: none;
          }
         </style>
      </nav>
      <?php
 if (!$this->session->userdata['estado']) {
    redirect('usuario/index');
  } 
 ?>
      <aside class="aside">
         <nav class="sidebar">
            <ul class="nav">
              <?php  
              if ($this->session->userdata['estado']==2 ||$this->session->userdata['estado']==3) 
              {
              ?>
              <li>
                <a>
                  <?php echo form_open_multipart('curso/index'); ?>
                  <button type="submit"  class="btn btn-link nounderline">
                    <em class="fa fa-check-square-o"></em>
                    <span class="item-text">Cursos</span>
                  </button>
                  <?php echo form_close();?>
                </a>
              </li>
              <li>
                <a>
                  <?php echo form_open_multipart('certificado/index'); ?>
                  <button type="submit"  class="btn btn-link nounderline">
                    <em class="fa fa-certificate"></em>
                    <span class="item-text">Certificados</span>
                  </button>
                  <?php echo form_close();?>
                </a>
              </li>
              <li>
                <a>
                  <?php echo form_open_multipart('usuario/mod_usuario_actual'); ?>
                  <button type="submit"  class="btn btn-link nounderline">
                    <em class="fa fa-wrench"></em>
                    <span class="item-text">Restablecer Password</span>
                  </button>
                  <?php echo form_close();?>
                </a>
              </li>
              <?php  
              }
              ?>
              <?php  
              if ($this->session->userdata['estado']==1) 
              {
              ?>
              <li>
                <a>
                  <?php echo form_open_multipart('usuario_curso/index'); ?>
                  <button type="submit"  class="btn btn-link nounderline">
                    <em class="fa fa-check-square-o"></em>
                    <span class="item-text">Tomar cursos</span>
                  </button>
                  <?php echo form_close();?>
                </a>
              </li>
              <li>
                <a>
                  <?php echo form_open_multipart('usuario/mod_usuario_actual'); ?>
                  <button type="submit"  class="btn btn-link nounderline">
                    <em class="fa fa-wrench"></em>
                    <span class="item-text">Restablecer Password</span>
                  </button>
                  <?php echo form_close();?>
                </a>
              </li>
                        <li>
                <a>
                  <?php echo form_open_multipart('usuario/donacion'); ?>
                  <button type="submit"  class="btn btn-link nounderline">
                    <em class="fa fa-wrench"></em>
                    <span class="item-text">Donar a Cuyotec</span>
                  </button>
                  <?php echo form_close();?>
                </a>
              </li>
              <?php  
              }
              ?>
              
          
              <?php  
              if ($this->session->userdata['estado']==3) 
              {
              ?>   
          
              <li>
                <a>
                  <?php echo form_open_multipart('usuario/index'); ?>
                  <button type="submit"  class="btn btn-link nounderline">
                    <em class="fa fa-users"></em>
                    <span class="item-text">Administrar usuarios</span>
                  </button>
                  <?php echo form_close();?>
                </a>
              </li>
              
              <?php  
              }
              ?>
              <li>
                <a>
                  <?php echo form_open_multipart('Welcome/logout'); ?>
                  <button type="submit"  class="btn btn-link nounderline">
                    <em class="fa fa-sign-out"></em>
                    <span class="item-text">Cerrar sesion</span>
                  </button>
                  <?php echo form_close();?>
                </a>
              </li>
                 
            </ul>
          </nav>
        </aside>




   

         <section class="main-content">

         <section class="main-content">
               <?php
               $atributos = array('class' => 'form-horizontal', 'role' => 'form');
                 echo form_open_multipart('usuario/validarusr',$atributos);
               ?>

            <h3><?php $this->session->userdata('idusuario'); ?></h3>
            <?php
            echo form_close();
            ?>
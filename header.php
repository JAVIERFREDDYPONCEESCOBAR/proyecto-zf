<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/bootstrap.min.css"       crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/animate.min.css"         crossorigin="anonymous">
      <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/font-awesome.css"      crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/main.css?ver:d4t5x4263snsr"      crossorigin="anonymous">

    <title>ZF</title>
  </head>


<header>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="datos_de_orden" class="modal-body">

      </div>

    </div>
  </div>
</div>





<?php
setlocale(LC_TIME, 'es_MX.UTF-8');
$userid = get_current_user_id();
$Home_menu_pvp= wp_get_nav_menu_items('Menú principal pvp');
$Home_menu_dac= wp_get_nav_menu_items('Menú principal dac');
$actual_link1 = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$mas_con=''.home_url().'/?login=failed';
$current_user = wp_get_current_user();



?>
<div class="container">

<div class="row">
  <div class="col-12 col-md-3">
    <a href="<?php echo home_url() ?>">


      <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo-bogue-min.png" alt="..." class="">
       </a>
  </div>
</div>

</div>
</header>




<!-- Modal  carga de facturaS-->
<div class="modal fade" id="status_alta_de_facturas" tabindex="-1" role="dialog" aria-labelledby="status_alta_de_facturas" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header"><!--
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5> -->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div  class="modal-body">


        <h2 id="mensaje_factura"></h2>



      </div>
  <!--     <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>
  <body>


<?php


$actual_sitio = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";


if ($actual_sitio =='http://zf.toolskg.net/wp/') { }elseif (($actual_sitio =='http://zf.toolskg.net/wp/mi-cuenta/')&&($current_user->roles[0]=='administradordac') ) {
  echo '<footer  style="position:absolute !important">
<div class="psicito">
  <div class="container-fluid">
    <div class="col-md-12">
      <div class="marff">
      <a href="">AVISO DE PRIVACIDAD</a>

      </div>
      <div class="marff">
           <a href="">CONVENIO DE ASOCIACIÓN COMERCIAL</a>
      </div>
        <div class="marff">
      <p>LAS IMÁGENES MOSTRADAS EN EL SIITO WEB "PROGRAMA DE LEALTAD POR ZF" SON DE CARÁCTER ILUSTRATIVO.
© 2018 | TODOS LOS DERECHOS RESERVADOS ZF SERVICES MÉXICO</p>
         </div>
    </div>
  </div>
  </div>
</footer>';
  
}elseif (($actual_sitio =='http://zf.toolskg.net/wp/carrito/' )||($actual_sitio =='http://zf.toolskg.net/wp/estado-de-cuenta/' )||($actual_sitio =='http://zf.toolskg.net/wp/convenios/' )) {

  echo '<footer style="position:relative !important">
  <div class="psicito">
    <div class="container-fluid">
      <div class="col-md-12">
        <div class="marff">
        <a href="">AVISO DE PRIVACIDAD</a>

        </div>
        <div class="marff">
             <a href="">CONVENIO DE ASOCIACIÓN COMERCIAL</a>
        </div>
          <div class="marff">
        <p>LAS IMÁGENES MOSTRADAS EN EL SIITO WEB "PROGRAMA DE LEALTAD POR ZF" SON DE CARÁCTER ILUSTRATIVO.
  © 2018 | TODOS LOS DERECHOS RESERVADOS ZF SERVICES MÉXICO</p>
           </div>
      </div>
    </div>
    </div>
  </footer>';
}elseif(($actual_sitio =='http://zf.toolskg.net/wp/mi-cuenta/')&&($current_user->roles[0]=='administradorpvp') ){


echo '<footer  style="position:relative !important">
<div class="psicito">
  <div class="container-fluid">
    <div class="col-md-12">
      <div class="marff">
      <a href="">AVISO DE PRIVACIDAD</a>

      </div>
      <div class="marff">
           <a href="">CONVENIO DE ASOCIACIÓN COMERCIAL</a>
      </div>
        <div class="marff">
      <p>LAS IMÁGENES MOSTRADAS EN EL SIITO WEB "PROGRAMA DE LEALTAD POR ZF" SON DE CARÁCTER ILUSTRATIVO.
© 2018 | TODOS LOS DERECHOS RESERVADOS ZF SERVICES MÉXICO</p>
         </div>
    </div>
  </div>
  </div>
</footer>';
 }else{



echo '<footer  style="position:absolute !important">
<div class="psicito">
  <div class="container-fluid">
    <div class="col-md-12">
      <div class="marff">
      <a href="">AVISO DE PRIVACIDAD</a>

      </div>
      <div class="marff">
           <a href="">CONVENIO DE ASOCIACIÓN COMERCIAL</a>
      </div>
        <div class="marff">
      <p>LAS IMÁGENES MOSTRADAS EN EL SIITO WEB "PROGRAMA DE LEALTAD POR ZF" SON DE CARÁCTER ILUSTRATIVO.
© 2018 | TODOS LOS DERECHOS RESERVADOS ZF SERVICES MÉXICO</p>
         </div>
    </div>
  </div>
  </div>
</footer>';


 } ?>






    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jQuery_v_3_3_1_.min.js"  crossorigin="anonymous"></script>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/bootstrap.min.js"        crossorigin="anonymous"></script>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/popper.min.js"           crossorigin="anonymous"></script>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/wow.min.js"              crossorigin="anonymous"></script>
    <script> themeurl = '<?php echo get_template_directory_uri(); ?>';  </script>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/main.js?ver:re1eer4e44xe"     crossorigin="anonymous"></script>
  </body>
</html>

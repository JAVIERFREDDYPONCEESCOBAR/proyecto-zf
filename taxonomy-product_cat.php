<?php 
include 'header.php';
if ( is_user_logged_in() ) { 
if ( ($current_user->roles[0] =='administradorpvp')||($current_user->roles[0] =='administrator') ) {
  include 'componentes/menu.php';
}elseif ( ($current_user->roles[0] =='administradordac')||($current_user->roles[0] =='administrator') ) {
  include 'componentes/menu_dac.php';
}
 include 'componentes/implem_trimestre.php'; 
include 'componentes/menu_puntos.php'; 
?>

<section id="contendio">
  <div class="container">
    <div class="col-md-12">
  <div class="row">
      <div class="col-md-12">  <h1><?php echo get_queried_object()->name; ?></h1></div>
  </div>

      	
        <div id="estado_de_cuenta">

<div class="row">
  
<?php 
$productos = array(
    'post_type' => 'product',
    'posts_per_page'=>-1,
    'orderby'=>'post_date',
    'order'=> 'DESC',
    'tax_query' => array(
    array(
      'taxonomy' => 'product_cat',
      'field' => 'slug',
      'terms' => get_queried_object()->name
    )
  )
);



foreach ( get_posts($productos) as  $valor_producto ) {
$precio_rebajado = get_post_meta($valor_producto->ID,'_sale_price'); 
$precio_normal   = get_post_meta($valor_producto->ID,'_regular_price');

//print_r($precio_rebajado);

$imagen_destacda = wp_get_attachment_image_src(get_post_thumbnail_id($valor_producto->ID ) ,'thumb')[0];
$imagen_vacio=''.get_template_directory_uri().'/img/no-image.png';
?>

<div class="col-md-3">
<div class="tarjeta"><!-- 
  <a href="<?php //echo get_permalink($valor_producto->ID); ?>"> -->
    <a >
  <div class="imagen_dust">
      <img  src="<?php if (empty($imagen_destacda)){ echo$imagen_vacio; }else{echo$imagen_destacda;} ?>" alt="Card image cap">
  </div>
  </a>
  <div class="descripcion">
    <h5><?php echo$valor_producto->post_title; ?></h5>
            <?php  if ( (!empty($precio_normal[0])) && (empty($precio_rebajado[0]) ) ){ ?>

   <div class="item-price"><?php echo number_format(get_post_meta($valor_producto->ID,'_regular_price')[0]); ?> <b>BOGE-POINTS</b></div>

<?php }elseif ( (!empty($precio_normal[0])) && (!empty($precio_rebajado[0]) ) ){ ?>
   <div class="item-price"><?php echo number_format(get_post_meta($valor_producto->ID,'_regular_price')[0]); ?>: <b>BOGE-POINTS</b></div>
 
<?php }elseif ( (empty($precio_normal[0]))&& (empty($precio_rebajado[0]) ) ){
                  echo'<div class="item-price">SIN DISPONIBILIDAD</div>';
                } elseif ( (empty($precio_normal[0]))&& (!empty($precio_rebajado[0]) ) ){ ?>
<div class="item-price"><?php echo number_format(get_post_meta($valor_producto->ID,'_sale_price')[0]); ?> <b>BOGE-POINTS</b></div>

 <?php } ?>
    <!--<a href="?add-to-cart=<?php //echo$valor_producto->ID; ?>" class="btn ">Agregar al carrito</a>-->


<?php 


if ($implement_p<=0) {
 }else{

?>
 <form action="<?php echo'?add-to-cart='.$valor_producto->ID.'';?>" class="cart" method="post" enctype="multipart/form-data">
   <?php echo woocommerce_quantity_input( array(), $valor_producto, false ); ?>
    <button type="submit" class="btn">Agregar al carrito</button>
    </form> 
<?php } ?>
    
  </div>
</div>
</div>


<?php } ?>








</div>




          </div>
    </div>
  </div>
</section>

<?php 
include 'componentes/menu_derecha.php';

} else { } 
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

 ?>






    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jQuery_v_3_3_1_.min.js"  crossorigin="anonymous"></script>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/bootstrap.min.js"        crossorigin="anonymous"></script>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/popper.min.js"           crossorigin="anonymous"></script>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/wow.min.js"              crossorigin="anonymous"></script>
    <script> themeurl = '<?php echo get_template_directory_uri(); ?>';  </script>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/main.js?ver:re1ee44xe"     crossorigin="anonymous"></script>
  </body>
</html>
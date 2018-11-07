<?php 
include 'header.php';
if ( is_user_logged_in() ) { 

if ( ($current_user->roles[0] =='administradorpvp')||($current_user->roles[0] =='administrator') ) {
  include 'componentes/menu.php';
}elseif (($current_user->roles[0] =='administradordac')||($current_user->roles[0] =='administrator')) {
  include 'componentes/menu_dac.php';
}


include 'componentes/implem_trimestre.php'; 
include 'componentes/menu_puntos.php'; 
?>




<section id="contendio">
  <div class="container">
    <div class=" col-md-8 offset-md-2">
        <div class="row">
      <div class="col-md-5">  <h1><?php echo $post->post_title; ?></h1></div>
      <div class="col-md-5">  <h3 style="margin: 5px;padding: 5px;text-align: center;text-transform: uppercase;">
      </div>

        <div class="col-md-2">
          <a href="<?php echo get_post_meta(get_page_by_path('convenios')->ID, 'imagen_descarga', true);?>" target="_blank" class="id_descarga_convenio" >Descargar</a> 
        </div>
  </div>
        <div id="estado_de_cuenta">

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
<?php 
 $the_gallery = get_post_gallery($post, false);
 $the_gallery_ids =  explode(',',$the_gallery['ids']);

$num=1;
$nun=1;
 foreach ( $the_gallery_ids as $the_gallery_image){

	$image_url = wp_get_attachment_image_src( $the_gallery_image, 'thumb' );
	$image_meta = wp_prepare_attachment_for_js($the_gallery_image);
	?>


<div class="carousel-item <?php if($nun++ == 1){ echo'active';}else{} ?>">

<img  class="d-block w-100 img-responsive"  data-id="<?php echo$num++; ?>" src="<?php echo$image_url[0]; ?>" alt="<?php echo$image_meta[title];?>" />
</div>
<?php  } ?>

</div>


  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>



</div>
</div>
</div>
</section>



<?php 
include 'componentes/menu_derecha.php';

}else{ } 
include 'footer.php';
?>
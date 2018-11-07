<?php 
include 'header.php';
if ( is_user_logged_in() ) { 
if ( ($current_user->roles[0] =='administradorpvp')||($current_user->roles[0] =='administrator') ) {
  include 'componentes/menu.php';
}elseif ( ($current_user->roles[0] =='administradordac')||($current_user->roles[0] =='administrator') ) {
  include 'componentes/menu_dac.php';
}
 include 'componentes/implem_trimestre.php'; 

?>




<section id="tienda_detalles"> 
<div class="container ">
<div class="col-md-12">
  <div class="row">
      <div class="col-md-12">  <h1><?php echo $post->post_title; ?></h1></div>
  </div>

<?php 

?>

<table style="width:100%">
  <!--<caption>Monthly savings</caption>-->
  <tr>
  	<th>No.</th>
    <th>Nombre</th>
    <th>Correo</th>
    <th>Telefono</th>
    <th>Fecha de afiliación</th>
    <th>Fecha de Renovación</th>
    <th>RFC</th>
  </tr>



</table>






</div>
</div>
</section>





<?php 
include 'componentes/menu_derecha.php';
}else{ } 
include 'footer.php';
?>
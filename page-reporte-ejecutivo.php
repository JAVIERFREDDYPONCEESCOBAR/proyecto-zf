<?php
include 'header.php';
if ( is_user_logged_in() ) {
if ( ($current_user->roles[0] =='administradorpvp')||($current_user->roles[0] =='administrator') ) {
include 'componentes/menu.php';
}elseif ( ($current_user->roles[0] =='administradordac')||($current_user->roles[0] =='administrator') ) {
include 'componentes/menu_dac.php';

}
 //include 'componentes/implem_trimestre.php';
 //include 'componentes/menu_puntos.php';
 ?>

 <section id="contendio">
   <div class="container">
     <div class="col-md-12">
 <h1>Reporte ejecutivo</h1>

<div class="reporte_general">
 <?php if( get_option('reporte_ejecutivo')=='' ){ }else{ ?>
<table class="report_eje">
  <tr>
    <th>Nombre</th>
    <th>descarga</th>
  </tr>
  <tr>
    <td><?php echo get_option('nombre_reporte_ejecutivo');?></td>
      <td><a href="<?php echo get_option('reporte_ejecutivo');?>" download="Reporte_ejecutivo" >
         <i class="color_azul fa fa-file-excel-o fa-2x" aria-hidden="true"></i>
       </a>
     </td>
     </tr>
</table>


 <?php } ?>


</div>
</div>
</div>
</section>

 <?php
 include 'componentes/menu_derecha.php';

 } else { }
 include 'footer.php';
 ?>

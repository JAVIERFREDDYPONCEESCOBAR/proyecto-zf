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
<div class="container-fluid">
<div class="col-md-12">
  <div class="row">
      <div class="col-md-6">  <h1><?php echo $post->post_title; ?></h1></div>
      <div class="col-md-6">  <h1><?php //echo $puntos_automatic_anuales; ?></h1></div>
  </div>

<table id="historial_fact" >
  <!--<caption>Monthly savings</caption>-->
  <tr>
    <th>No.Afiliado</th>
    <th>Nombre de Afiliado</th>
  	<th>No.Factura</th>
    <th>Nombre Factura </th>
    <th>Fecha factura</th>
    <th>Consumo Automatic</th>
    <th>Consumo Bogas</th>
    <th>Consumo Extreme</th>
    <th class="centrar_tabla">XML</th>
    <th class="centrar_tabla">PDF</th>
  </tr>





<?php
$primer_arreglo= array(
    'post_type' => 'facturas_agregadas',
    'posts_per_page'=>-1,
    'orderby'=>'post_date',
    'order'=> 'DESC'
);

foreach (get_posts($primer_arreglo) as $value) {
$automatic = get_post_meta($value->ID,'ftrs_ttl_automatic');
$bogas     = get_post_meta($value->ID,'ftrs_ttl_bogas');
$extream   = get_post_meta($value->ID,'ftrs_ttl_extream');
$xml       = get_post_meta($value->ID,'ftrs_url_xml');
$pdf       = get_post_meta($value->ID,'ftrs_url_pdf');
$nombre_afiliado_factura       = get_post_meta($value->ID,'ftrs_receptor_nombre');

?>
  <tr>
    <td>7</td>
    <td>GOMEZ</td>
  	<td><?php echo$value->ID; ?></td>
    <td><?php echo$nombre_afiliado_factura[0];?></td>
    <td><?php echo$value->post_date; ?></td>
    <td><?php echo number_format($automatic[0]); ?></td>
    <td><?php echo number_format($bogas[0]); ?></td>
    <td><?php if (!empty($extream[0])) {echo number_format($extream[0]);}else{echo "0";} ?></td>
    <td class="centrar_tabla"><a href="<?php echo htmlspecialchars($xml[0]);?>" target="_blank"><i class="color_f fa fa-file-text-o fa-2x" aria-hidden="true"></i></a></td>
    <td class="centrar_tabla"><a href="<?php echo htmlspecialchars($pdf[0]);?>" target="_blank"><i class=" color_f fa fa-file-pdf-o fa-2x" aria-hidden="true"></i></a></td>
  </tr>




<?php } ?>



</table>








</div>
</div>
</section>





<?php
include 'componentes/menu_derecha.php';
}else{ }
include 'footer.php';
?>

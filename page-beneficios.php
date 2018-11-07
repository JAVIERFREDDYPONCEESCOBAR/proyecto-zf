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
      <div class="col-md-12">  <h1><?php echo $post->post_title; ?></h1></div>
  </div>
        <div id="estado_de_cuenta">


<table id="beneficios_table" >

	<tr>
		<td  style="text-align: center;">
			<font >DESCRIPCIÓN </font></td>
		<td colspan="6" style="text-align: center;">
			<font >DIAMANTE</font></td>
	</tr>

	<tr style="border-top: 1px solid; border-bottom:1px solid;">
		<td >Rotulación y pintura de fachada</td>
		<td colspan="6" style="text-align: center;" > <a  class="id_descarga_convenio" >Solicitar</a> </td>

	</tr>
	<tr>
<td >Colocación de bastidor o réplica de amortiguador.</td>
<td colspan="6" style="text-align: center;" > <a    class="id_descarga_convenio" >Solicitar</a> </td>
	</tr>
	<tr style="border-top: 1px solid; border-bottom:1px solid;">
       <td >Colocación de material P.O.P.</td>
       <td colspan="6" style="text-align: center;"> <a   class="id_descarga_convenio" >Solicitar</a> </td>
	</tr>
<tr style="border-top: 1px solid; border-bottom:1px solid;">
		<td >Playeras tipo polo Dry Fit</td>
		<td colspan="3" style="text-align: right;">  <a   class="id_descarga_convenio" >Solicitar</a> </td>
		<td colspan="3" style="text-align: left;">  <a   class="id_descarga_convenio" >Solicitar</a> </td>
	</tr>
<tr style="border-top: 1px solid transparent; border-bottom:1px solid transparent;">
		<td  rowspan="5" style="border-bottom: 1px solid;">Cajas de carga para motocicleta.</td>
		<td colspan="3" style="text-align: right;"> <a    class="id_descarga_convenio" >Solicitar</a> </td>
		<td colspan="3" style="text-align: left;"> <a   class="id_descarga_convenio" >Solicitar</a> </td>
	</tr>
	<tr>
		<td colspan="3" style="text-align: right;"> <a   class="id_descarga_convenio" >Solicitar</a> </td>
		<td colspan="3" style="text-align: left;"> <a   class="id_descarga_convenio" >Solicitar</a> </td>
	</tr>

	<tr style="border-top: 1px solid transparent; border-bottom:1px solid;">
		<td colspan="6" style="text-align: center;"> <a    class="id_descarga_convenio" >Solicitar</a> </td>
	</tr>


</table>

</div>
</div>
</div>
</section>



<?php
include 'componentes/menu_derecha.php';

} else { }
include 'footer.php';
?>

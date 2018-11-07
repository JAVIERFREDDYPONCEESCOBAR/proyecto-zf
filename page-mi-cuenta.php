<?php
if ( is_user_logged_in() ) {
include 'header.php';
if ( ($current_user->roles[0] =='administradorpvp')||($current_user->roles[0] =='administrator') ) {
include 'componentes/menu.php';
$usuario_activo = wp_get_current_user();
$id_usuario = $usuario_activo->data->ID;

  $user_nom_comercial      = esc_attr( get_the_author_meta( 'user_nom_comercial',    $id_usuario ) );
  $user_cla_afiliado       = esc_attr( get_the_author_meta( 'user_cla_afiliado',     $id_usuario ) );
  $user_razon_social       = esc_attr( get_the_author_meta( 'user_razon_social',     $id_usuario ) );
  $user_rfc_afiliado       = esc_attr( get_the_author_meta( 'user_rfc_afiliado',     $id_usuario ) );
  $user_fecha_afiliacion   = esc_attr( get_the_author_meta( 'user_fecha_afiliacion', $id_usuario ) );
  $user_fecha_arenovacion  = esc_attr( get_the_author_meta( 'user_fecha_arenovacion',$id_usuario ) );
  $user_fecha_beneficios   = esc_attr( get_the_author_meta( 'user_fecha_beneficios', $id_usuario ) );
  $user_fecha_baja         = esc_attr( get_the_author_meta( 'user_fecha_baja',       $id_usuario ) );
  $user_contacto           = esc_attr( get_the_author_meta( 'user_contacto',         $id_usuario ) );
  $user_direccion          = esc_attr( get_the_author_meta( 'user_direccion',        $id_usuario ) );
  $user_email_contacto     = esc_attr( get_the_author_meta( 'user_email_contacto',   $id_usuario ) );
  $user_whatsapp_contacto  = esc_attr( get_the_author_meta( 'user_whatsapp_contacto',$id_usuario ) );
  $telefono_user           = esc_attr( get_the_author_meta( 'billing_phone',         $id_usuario ) );
  $user_direccion1         = esc_attr( get_the_author_meta( 'billing_address_1',     $id_usuario ) );
  $user_direccion2         = esc_attr( get_the_author_meta( 'billing_address_2',     $id_usuario ) );
  $user_apellidos          = esc_attr( get_the_author_meta( 'billing_last_name',     $id_usuario ) );

setlocale(LC_MONETARY, 'es_MX');
 include 'componentes/implem_trimestre.php';
 include 'componentes/menu_puntos.php';
 ?>






<section id="contendio">
  <div class="container">
    <div class="col-md-12">
  <div class="row">
      <div class="col-md-12">  <h1>Mi cuenta</h1></div>
  </div>

        <div id="estado_de_cuenta">
<div class="table-responsive">
    <table class="table table-condensed">
      <thead></thead>
      <tbody>
  <tr>
          <td style="width:100%; background: rgb(133,207,234);"><i>
            <?php echo ''.get_user_meta( $userid,'pits')[0].' '.get_user_meta( $userid,'pits_nombre')[0].''; ?></i></td>
        </tr>
      </tbody>
    </table>
  </div>

<div class="table-responsive">
    <table class="table table-condensed">
      <thead></thead>
      <tbody>
        <tr>
          <td><i>RAZÓN SOCIAL:</i></td>
          <td><label><?php echo get_user_meta( $userid,'user_razon_social')[0]; ?></label></td>
          <td><label>Distribuidor:</label></td>
          <td><label>MARAL</label></td>
        </tr>
        <tr>
          <td><i>CONTACTO(S):</i></td>
          <td><label><?php echo''.$usuario_activo->data->display_name.' '.$user_apellidos.''; ?> - TEL(S): <?php  echo$telefono_user;  ?></label></td>
          <td><label>Promotor:</label></td>
          <td><label>FELIPE PEÑALOZA</label></td>
        </tr>
        <tr>
          <td><i>DIRECCIÓN:</i></td>
          <td><label><?php echo get_user_meta( $userid,'user_direccion')[0]; ?> </label></td>
          <td><label>Tel:</label></td>
          <td><label>(55)9199 2379</label></td>
        </tr>
        <tr>
          <td><i>CORREO:</i></td>
          <td><label><?php  echo get_user_meta( $userid,'user_email_contacto')[0]; ?> - ZONA: CENTRO</label></td>
          <td><label>CORREO:</label></td>
          <td><label>felipe.penaloza@zf.com</label></td>
        </tr>
      </tbody>
    </table>
  </div>

 <div class="table-responsive">
            <table class="table table-condensed" cellspacing=0 border=1>
      <thead></thead>
      <tbody>
        <tr>
          <td style="min-width:50px; text-align:center;" class="danger" colspan="7 ">RESUMEN</td>
        </tr>
        <tr>
          <td style="min-width:50px; text-align:center;"  class="danger">Periodo</td>
          <td style="min-width:50px; text-align:center;"  class="danger" colspan="2">Firma de convenio 18´</td>
          <td style="min-width:50px; text-align:center;"  class="danger">Beneficios</td>
          <td style="min-width:50px; text-align:center;"  class="danger" colspan="2">Cumplimiento de promedio anual</td>
          <td style="min-width:50px; text-align:center;"  class="danger">Compras totales 2018</td>
        </tr>
  <tr>
    <td style="min-width:50px; text-align:center;"  >
      <?php  echo date_format(date_create(get_user_meta( $userid,'user_fecha_afiliacion')[0]), 'M m'); ?>'
    </td>

    <td style="min-width:50px; text-align:center;"  colspan="2 ">
        <?php  echo date_format(date_create(get_user_meta( $userid,'user_fecha_beneficios')[0]), 'd/m/Y'); ?>
      </td>


  <td style="min-width:50px; text-align:center;"  >
        <?php  echo date_format(date_create(get_user_meta( $userid,'user_fecha_beneficios')[0]), 'M-y'); ?>
    </td>

</td>
    <td style="min-width:50px; text-align:center;"  colspan="2 ">%</td>
    <td style="min-width:50px; text-align:center;"  ><?php echo '$ '.number_format($compras_totales).''; ?></td>
  </tr>
        <tr>
          <td style="min-width:50px; text-align:center;" class="danger">Pts automatic</td>
          <td style="min-width:50px; text-align:center;" class="danger">Bonificación trimp</td>
          <td style="min-width:50px; text-align:center;" class="danger">Bonificación lealtad</td>
          <td style="min-width:50px; text-align:center;" class="danger">Bonificación vip</td>
          <td style="min-width:50px; text-align:center;" class="danger">Pts prorroga</td>
          <td style="min-width:50px; text-align:center;" class="danger">Pts canjeados</td>
          <td style="min-width:50px; text-align:center;" class="danger">Saldo final</td>
        </tr>
        <tr>
          <td style="min-width:50px; text-align:center;" ><?php echo number_format($puntos_automatic_anuales);?></td>
          <td style="min-width:50px; text-align:center;" >0</td>
          <td style="min-width:50px; text-align:center;" >0</td>
          <td style="min-width:50px; text-align:center;" >0</td>
          <td style="min-width:50px; text-align:center;" >0</td>
          <td style="min-width:50px; text-align:center;" >0</td>
          <td style="min-width:50px; text-align:center;" ><?php
            if (empty($compras_totales)) {echo "0";}else{echo number_format($compras_totales);}
           ?></td>
        </tr>
      </tbody>
    </table>
  </div>



        </div>
      </div>
    </div>
  </section>




<?php
}elseif (($current_user->roles[0] =='administradordac')||($current_user->roles[0] =='administrator')) {
  include 'componentes/menu_dac.php';
?>


<section id="contendio">
  <div class="container">
    <div class="col-md-12">

     <div class="row">
      <div class="col-md-12">  <h1><?php echo $post->post_title; ?></h1></div>
  </div>


<div class="table-responsive">
<table id="reporte_ejecutivo" >

<tr>
  <th>N.BCT</th>
  <th>Nombre afiliado</th>
  <th>Razón social</th>
  <th>Promotor</th>
  <th>Dac</th>
  <th>Categoría actual</th>
  <th>Movimiento sugerido</th>
  <th>Renovacion</th>
</tr>

<tr>

    <td>45</td>
    <td>GOMEZ</td>
    <td>CENTRAL DE SUSPENSIONES GOMEZ SA DE CV</td>
    <td>1</td>
    <td>Maral</td>
    <td>Diamante plus</td>
    <td> -- </td>
    <td>2019-09-14</td>
  
  </tr>

  <tr>

    <td>45</td>
    <td>GOMEZ</td>
    <td>CENTRAL DE SUSPENSIONES GOMEZ SA DE CV</td>
    <td>1</td>
    <td>Maral</td>
    <td>Diamante plus</td>
    <td> -- </td>
    <td>2019-09-14</td>
  
  </tr>

  <tr>

    <td>45</td>
    <td>GOMEZ</td>
    <td>CENTRAL DE SUSPENSIONES GOMEZ SA DE CV</td>
    <td>1</td>
    <td>Maral</td>
    <td>Diamante plus</td>
    <td> -- </td>
    <td>2019-09-14</td>
  
  </tr>
  <tr>

    <td>45</td>
    <td>GOMEZ</td>
    <td>CENTRAL DE SUSPENSIONES GOMEZ SA DE CV</td>
    <td>1</td>
    <td>Maral</td>
    <td>Diamante plus</td>
    <td> -- </td>
    <td>2019-09-14</td>
  
  </tr>
  <tr>

    <td>45</td>
    <td>GOMEZ</td>
    <td>CENTRAL DE SUSPENSIONES GOMEZ SA DE CV</td>
    <td>1</td>
    <td>Maral</td>
    <td>Diamante plus</td>
    <td> -- </td>
    <td>2019-09-14</td>
  
  </tr>
  <tr>

    <td>45</td>
    <td>GOMEZ</td>
    <td>CENTRAL DE SUSPENSIONES GOMEZ SA DE CV</td>
    <td>1</td>
    <td>Maral</td>
    <td>Diamante plus</td>
    <td> -- </td>
    <td>2019-09-14</td>
  
  </tr>
  <tr>

    <td>45</td>
    <td>GOMEZ</td>
    <td>CENTRAL DE SUSPENSIONES GOMEZ SA DE CV</td>
    <td>1</td>
    <td>Maral</td>
    <td>Diamante plus</td>
    <td> -- </td>
    <td>2019-09-14</td>
  
  </tr>
  <tr>

    <td>45</td>
    <td>GOMEZ</td>
    <td>CENTRAL DE SUSPENSIONES GOMEZ SA DE CV</td>
    <td>1</td>
    <td>Maral</td>
    <td>Diamante plus</td>
    <td> -- </td>
    <td>2019-09-14</td>
  
  </tr>
  <tr>

    <td>45</td>
    <td>GOMEZ</td>
    <td>CENTRAL DE SUSPENSIONES GOMEZ SA DE CV</td>
    <td>1</td>
    <td>Maral</td>
    <td>Diamante plus</td>
    <td> -- </td>
    <td>2019-09-14</td>
  
  </tr>

<tr>
<?php 

$usuarios = get_users('orderby=nicename&role=administradorpvp');
foreach ($usuarios as $usuariopvp) {
 $dac_seleccionado       = esc_attr( get_the_author_meta( 'selec_dac',$usuariopvp->ID ) );
if ($current_user->user_login == $dac_seleccionado) {
echo'
    <td>'.esc_attr( get_the_author_meta( 'pits',$usuariopvp->data->ID)).'</td>
    <td>'.$usuariopvp->data->user_login.'</td>
    <td>'.$usuariopvp->data->display_name.'</td>
    <td>'.esc_attr( get_the_author_meta( 'selec_promotor',$usuariopvp->data->ID)).'</td>
    <td>'.esc_attr( get_the_author_meta( 'selec_dac',$usuariopvp->data->ID ) ).'</td>
    <td>'.esc_attr( get_the_author_meta( 'user_ctegoria',$usuariopvp->data->ID ) ).'</td>
    <td> -- </td>
    <td>'.esc_attr( get_the_author_meta( 'user_fecha_arenovacion',$usuariopvp->data->ID ) ).'</td>
';
}else{

}





}




 ?>
  
  </tr>
  

</table>
</div>
<div class="agrup">


   <div class="col-md-6 offset-md-5">
  <nav aria-label="...">
  <ul class="pagination pagination-sm">
    <li class="page-item disabled">
      <a class="page-link" href="#" tabindex="-1">1</a>
    </li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
  </ul>
</nav>
</div>


</div>
</div>
</div>
</section>



<?php
}
include 'componentes/menu_derecha.php';

}else{ }
include 'footer.php';
?>

<?php
include 'header.php';
if ( is_user_logged_in() ) {
if ( ($current_user->roles[0] =='administradorpvp')||($current_user->roles[0] =='administrator') ) {
  include 'componentes/menu.php';
}elseif (($current_user->roles[0] =='administradordac')||($current_user->roles[0] =='administrator')) {
  include 'componentes/menu_dac.php';
}





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
  $categoria_actr          =  esc_attr(get_the_author_meta( 'user_ctegoria',         $id_usuario ) );




setlocale(LC_MONETARY, 'es_MX');
$tipo_categoria=183001;

 include 'componentes/implem_trimestre.php';
 include 'componentes/menu_puntos.php';
 ?>





<section id="contendio">
  <div class="container">
    <div class="col-md-12">
  <div class="row">
      <div class="col-md-5">  <h1>Estado de cuenta</h1></div>
      <div class="col-md-5">  </div>
      <div class="col-md-2">


   <a href="http://zf.toolskg.net/wp/wp-content/themes/produccion_zf/componentes/imprimir_estado_cuenta.php" target="_blank" class="id_descarga_convenio" >Descargar</a>

       </div>
  </div>


        <div id="estado_de_cuenta">

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

    <table class="table table-condensed" cellspacing="0" border="1">
      <thead></thead>
      <tbody>
        <tr>
          <td style=text-align:center class="danger" rowspan="2">2018</td>
          <td style=text-align:center class="danger" colspan="3">1er TRIMESTRE</td>
          <td style=text-align:center class="danger" colspan="3">2do TRIMESTRE</td>
          <td style=text-align:center class="danger" colspan="3">3er TRIMESTRE</td>
          <td style=text-align:center class="danger" colspan="3">4to TRIMESTRE</td>
        </tr>
        <tr>
<?php
echo '<td style="text-align:center; text-transform: capitalize;" >'.$mes[0].'</td>
      <td style="text-align:center; text-transform: capitalize;">'.$mes[1].'</td>
      <td style="text-align:center; text-transform: capitalize;">'.$mes[2].'</td>
      <td style="text-align:center; text-transform: capitalize;" >'.$mes[3].'</td>
      <td style="text-align:center; text-transform: capitalize;" >'.$mes[4].'</td>
      <td style="text-align:center; text-transform: capitalize;" >'.$mes[5].'</td>
      <td style="text-align:center; text-transform: capitalize;">'.$mes[6].'</td>
      <td style="text-align:center; text-transform: capitalize;" >'.$mes[7].'</td>
      <td style="text-align:center; text-transform: capitalize;" >'.$mes[8].'</td>
      <td style="text-align:center; text-transform: capitalize;" >'.$mes[9].'</td>
      <td style="text-align:center; text-transform: capitalize;" >'.$mes[10].'</td>
      <td style="text-align:center; text-transform: capitalize;" >'.$mes[11].'</td>
     ';
?>
        </tr>
        <tr>
          <td>CATEGORIA</td>
          <td style=text-align:center colspan="3"><?php echo$categoria_primer_trimestre; ?></td>
          <td style=text-align:center colspan="3"><?php echo$categoria_segundo_trimestre; ?></td>
          <td style=text-align:center colspan="3"><?php echo$categoria_tercero_trimestre; ?></td>
          <td style=text-align:center colspan="3"><?php echo$categoria_cuarto_trimestre; ?></td>
        </tr>
        <tr>
          <td class="menu_tab" style=min-width:50px>COMPRA TOTAL</td>
          <td style=min-width:50px><?php echo money_format('%(#10n',$comptra_total_enero); ?></td>
          <td style=min-width:50px><?php echo money_format('%(#10n',$comptra_total_febrero); ?></td>
          <td style=min-width:50px><?php echo money_format('%(#10n',$comptra_total_marzo); ?></td>
          <td style=min-width:50px><?php echo money_format('%(#10n',$comptra_total_abril); ?></td>
          <td style=min-width:50px><?php echo money_format('%(#10n',$comptra_total_mayo); ?></td>
          <td style=min-width:50px><?php echo money_format('%(#10n',$comptra_total_junio); ?></td>
          <td style=min-width:50px><?php echo money_format('%(#10n',$comptra_total_julio); ?></td>
          <td style=min-width:50px><?php echo money_format('%(#10n',$comptra_total_agosto); ?></td>
          <td style=min-width:50px><?php echo money_format('%(#10n',$comptra_total_septiembre); ?></td>
          <td style=min-width:50px><?php echo money_format('%(#10n',$comptra_total_octubre); ?></td>
          <td style=min-width:50px><?php echo money_format('%(#10n',$comptra_total_noviembre); ?></td>
          <td style=min-width:50px><?php echo money_format('%(#10n',$comptra_total_diciembre); ?></td>
        </tr>
        <tr>
          <td class="menu_tab" style=min-width:50px>COMPRA AUTOMATIC</td>
          <td style=min-width:50px><?php echo money_format('%(#10n',$automatic_enero); ?></td>
          <td style=min-width:50px><?php echo money_format('%(#10n',$automatic_febrero); ?></td>
          <td style=min-width:50px><?php echo money_format('%(#10n',$automatic_marzo); ?></td>
          <td style=min-width:50px><?php echo money_format('%(#10n',$automatic_abril); ?></td>
          <td style=min-width:50px><?php echo money_format('%(#10n',$automatic_mayo); ?></td>
          <td style=min-width:50px><?php echo money_format('%(#10n',$automatic_junio); ?></td>
          <td style=min-width:50px><?php echo money_format('%(#10n',$automatic_julio); ?></td>
          <td style=min-width:50px><?php echo money_format('%(#10n',$automatic_agosto); ?></td>
          <td style=min-width:50px><?php echo money_format('%(#10n',$automatic_septiembre); ?></td>
          <td style=min-width:50px><?php echo money_format('%(#10n',$automatic_octubre); ?></td>
          <td style=min-width:50px><?php echo money_format('%(#10n',$automatic_noviembre); ?></td>
          <td style=min-width:50px><?php echo money_format('%(#10n',$automatic_diciembre); ?></td>
        </tr>
        <tr>
          <td class="menu_tab" style=min-width:50px>CUMPLIMIENTO TRIMESTRAL</td>
          <td style="min-width:50px; text-align:center;"  colspan="3 "><?php echo number_format($cump_trimestre_uno,2); ?> %</td>
          <td style="min-width:50px; text-align:center;"  colspan="3 "><?php echo number_format($cump_trimestre_dos,2); ?> %</td>
          <td style="min-width:50px; text-align:center;"  colspan="3 "><?php echo number_format($cump_trimestre_tres,2); ?> %</td>
          <td style="min-width:50px; text-align:center;"  colspan="3 "><?php echo number_format($cump_trimestre_cuatro,2); ?> %</td>
        </tr>
        <tr>
          <td class="menu_tab " style=min-width:50px>PUNTOS GENERADOS</td>
          <td  style="min-width:50px; text-align:center;"  ><?php echo number_format($puntos_enero);   ?></td>
          <td  style="min-width:50px; text-align:center;"  ><?php echo number_format($puntos_febrero); ?></td>
          <td  style="min-width:50px; text-align:center;"  ><?php echo number_format($puntos_marzo);   ?></td>
          <td  style="min-width:50px; text-align:center;"  ><?php echo number_format($puntos_abril);   ?></td>
          <td  style="min-width:50px; text-align:center;"  ><?php echo number_format($puntos_mayo);   ?></td>
          <td  style="min-width:50px; text-align:center;"  ><?php echo number_format($puntos_junio);   ?></td>
          <td  style="min-width:50px; text-align:center;"  ><?php echo number_format($puntos_julio);   ?></td>
          <td  style="min-width:50px; text-align:center;"  ><?php echo number_format($puntos_agosto);   ?></td>
          <td  style="min-width:50px; text-align:center;"  ><?php echo number_format($puntos_septiembre);?></td>
          <td  style="min-width:50px; text-align:center;"  ><?php echo number_format($puntos_octubre);   ?></td>
          <td  style="min-width:50px; text-align:center;"  ><?php echo number_format($puntos_noviembre);   ?></td>
          <td  style="min-width:50px; text-align:center;"  ><?php echo number_format($puntos_diciembre);   ?></td>
        </tr>
        <tr>
          <td class="menu_tab " style=min-width:50px>COMPRA TRIMESTRAL</td>
          <td style="min-width:50px; text-align:center;"  colspan="3 "><?php echo money_format('%(#10n',$primer_trimestral); ?> </td>
          <td style="min-width:50px; text-align:center;"  colspan="3 "><?php echo money_format('%(#10n',$segundo_trimestral); ?></td>
          <td style="min-width:50px; text-align:center;"  colspan="3 "><?php echo money_format('%(#10n',$tercero_trimestral); ?></td>
          <td style="min-width:50px; text-align:center;"  colspan="3 "><?php echo money_format('%(#10n',$cuarto_trimestral); ?></td>
        </tr>
        <tr>
          <td class="menu_tab " style=min-width:50px>COMPRAS FALTANTES</td>
          <td style="min-width:50px; text-align:center;"  colspan="3 ">0</td>
          <td style="min-width:50px; text-align:center;"  colspan="3 ">0</td>
          <td style="min-width:50px; text-align:center;"  colspan="3 ">0</td>
          <td style="min-width:50px; text-align:center;"  colspan="3 ">0</td>
        </tr>
        <tr>
          <td class="menu_tab" style=min-width:50px>BONIFICACIÓN TRIMESTRAL</td>
          <td style="min-width:50px; text-align:center;"  colspan="3 ">0<?php //echo number_format($bonificacion_trimestral);?></td>
          <td style="min-width:50px; text-align:center;"  colspan="3 ">0</td>
          <td style="min-width:50px; text-align:center;"  colspan="3 ">0</td>
          <td style="min-width:50px; text-align:center;"  colspan="3 ">0</td>
        </tr>
      </tbody>
    </table>

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
          <td style="min-width:50px; text-align:center;" ><?php echo$puntos_automatic_anuales;?></td>
          <td style="min-width:50px; text-align:center;" >0</td>
          <td style="min-width:50px; text-align:center;" >0</td>
          <td style="min-width:50px; text-align:center;" >0</td>
          <td style="min-width:50px; text-align:center;" >0</td>
          <td style="min-width:50px; text-align:center;" >0</td>
          <td style="min-width:50px; text-align:center;" ><?php
            if (empty($compras_totales)) {echo "0";}else{echo number_format($compras_totales);} ?></td>
        </tr>
      </tbody>
    </table>

    <table class="table table-condensed" cellspacing=0 border=1>
      <thead></thead>
      <tbody>
        <tr>
          <td style="min-width:50px; text-align:center;" class="danger">Bono mostrador</td>
          <td style="min-width:50px; text-align:center;" class="danger">1er TRIMESTRE</td>
          <td style="min-width:50px; text-align:center;" class="danger">2to TRIMESTRE</td>
          <td style="min-width:50px; text-align:center;" class="danger">3to TRIMESTRE</td>
          <td style="min-width:50px; text-align:center;" class="danger">4to TRIMESTRE</td>
        </tr>
        <tr>
          <td style="min-width:50px; text-align:center;">Generado</td>
          <td style="min-width:50px; text-align:center;">0</td>
          <td style="min-width:50px; text-align:center;">0</td>
          <td style="min-width:50px; text-align:center;">0</td>
          <td style="min-width:50px; text-align:center;">0</td>
        </tr>
        <tr>
          <td style="min-width:50px; text-align:center;">Utilizado</td>
          <td style="min-width:50px; text-align:center;">0</td>
          <td style="min-width:50px; text-align:center;">0</td>
          <td style="min-width:50px; text-align:center;">0</td>
          <td style="min-width:50px; text-align:center;">0</td>
        </tr>
      </tbody>
    </table>

    <table class="table table-condensed">
      <thead></thead>
      <tbody>
        <tr>
          <td>
            <table class="table table-condensed">
              <thead></thead>
              <tbody>
                <tr>
                  <td style="min-width:50px; text-align:center;" class="danger">Visitas 2018</td>
                </tr>
                <tr>
                  <td style="text-align:center;" >0</td>
                </tr>
                <tr>
                  <td style="min-width:50px; text-align:center;" class="danger">Ultima visita</td>
                </tr>
                <tr>
                  <td style="text-align:center;" >-</td>
                </tr>
              </tbody>
            </table>
          </td>
          <td>
            <table class="table table-condensed">
              <thead></thead>
              <tbody>
                <tr>
                  <td style="min-width:50px; text-align:center;" class="danger">Rotulacion</td>
                </tr>
                <tr>
                  <td style="text-align:center;">-</td>
                </tr>
                <tr>
                  <td style="min-width:50px; text-align:center;" class="danger">Bastidor</td>
                </tr>
                <tr>
                  <td style="text-align:center;">0</td>
                </tr>
              </tbody>
            </table>
          </td>
          <td>
            <table class="table table-condensed">
              <thead></thead>
              <tbody>
                <tr>
                  <td style="min-width:50px; text-align:center;" class="danger">Réplica</td>
                </tr>
                <tr>
                  <td style="text-align:center;">0</td>
                </tr>
                <tr>
                  <td style="min-width:50px; text-align:center;" class="danger">Playeras</td>
                </tr>
                <tr>
                  <td style="text-align:center;">0</td>
                </tr>
              </tbody>
            </table>
          </td>
          <td>
            <table class="table table-condensed">
              <thead></thead>
              <tbody>
                <tr>
                  <td style="min-width:50px; text-align:center;" class="danger">Caja moto</td>
                </tr>
                <tr>
                  <td style="text-align:center;">0 de 5</td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
      </tbody>
    </table>


    <table class="table table-condensed" cellspacing=0 border=1>
      <thead></thead>
      <tbody>
        <tr>
          <td style="min-width:50px; text-align:center;" class="danger" colspan="3 ">Material P.O.P.</td>
        </tr>
        <tr>
          <td style="min-width:50px; text-align:center;" class="danger">Mostrador</td>
          <td style="min-width:50px; text-align:center;" class="danger">Display</td>
          <td style="min-width:50px; text-align:center;" class="danger">Calcomania</td>
        </tr>
        <tr>
          <td style="text-align:center;">0</td>
          <td style="text-align:center;">0</td>
          <td style="text-align:center;">0</td>
        </tr>
        <tr>
          <td style="min-width:50px; text-align:center;" class="danger">Banderolas</td>
          <td style="min-width:50px; text-align:center;" rowspan="2 "> </td>
          <td style="min-width:50px; text-align:center;" class="danger">Otros</td>
        </tr>
        <tr>
          <td style="min-width:50px; text-align:center;">0</td>
          <td style="min-width:50px; text-align:center;">0</td>
        </tr>
      </tbody>
    </table>

    <table class="table table-condensed" cellspacing=0 border=1>
      <thead></thead>
      <tbody>
        <tr>
          <td style="min-width:50px; text-align:center;" class="danger" colspan="6 ">Historial de canjes 2018</td>
        </tr>
        <tr>
          <td style="min-width:50px; text-align:center;" class="danger">No.canje</td>
          <td style="min-width:50px; text-align:center;" class="danger" colspan="4 ">Fecha canje</td>
          <td style="min-width:50px; text-align:center;" class="danger">Boge-points canjeados</td>
        </tr>
<?php
$my_orders_columns = apply_filters( 'woocommerce_my_account_my_orders_columns', array(
    'order-number'  => __( 'ID', 'woocommerce' ),
    'order-date'    => __( 'Date', 'woocommerce' ),
    //'order-total'   => __( 'Packages', 'woocommerce' ),
    'order-total'   => __( 'Price', 'woocommerce' ),
  //    'order-status'  => __( 'Status', 'woocommerce' ),
  //  'order-actions' => '&nbsp;',
) );

$customer_orders = get_posts( apply_filters( 'woocommerce_my_account_my_orders_query', array(
    'numberposts' => $order_count,
    'meta_key'    => '_customer_user',
    'meta_value'  => get_current_user_id(),
    'post_type'   => wc_get_order_types( 'view-orders' ),
    'post_status' => array_keys( wc_get_order_statuses() )
) ) );

if ( $customer_orders ) :

 foreach ( $customer_orders as $customer_order ) :
                $order      = wc_get_order( $customer_order );
                $item_count = $order->get_item_count();  ?>
                <tr class="order">



  <?php foreach ( $my_orders_columns as $column_id => $column_name ) :?>


                        <td style="min-width:50px; text-align:center;"  data-title="<?php echo esc_attr( $column_name ); ?>" colspan="<?php if ( 'order-date' === $column_id ){echo'4';}else{} ?> ">
                            <?php if ( has_action( 'woocommerce_my_account_my_orders_column_' . $column_id ) ) : ?>
                                <?php do_action( 'woocommerce_my_account_my_orders_column_' . $column_id, $order ); ?>

                            <?php elseif ( 'order-number' === $column_id ) : ?>
                               <!-- <a href="<?php// echo esc_url( $order->get_view_order_url() ); ?>"> -->
                                <span class="activar_mob" data-orden="<?php echo$order->get_order_number(); ?>" >
                          <?php echo _x( '#', 'hash before order number', 'woocommerce' ) . $order->get_order_number(); ?>
                                 <!--</a>-->
                               </span>

                            <?php elseif ( 'order-date' === $column_id ) : ?>
                                <time datetime="<?php echo date( 'Y-m-d', strtotime( $order->order_date ) ); ?>" title="<?php echo esc_attr( strtotime( $order->order_date ) ); ?>"><?php echo date_i18n( get_option( 'date_format' ), strtotime( $order->order_date ) ); ?></time>


                            <?php elseif ( 'order-total' === $column_id ) : ?>
                                <?php echo  ''.$order->get_formatted_order_total(),$item_count.' B-POINTS'; ?>


                            <?php endif; ?>
                        </td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>

 <?php endif; ?>



      </tbody>
    </table>
  </div>

  <p> Queda prohibida la reproducción parcial y/o total de la información aqui contenida por cualquier medio conocido o por conocer sin autorización por escrito de zf services, sa. de cv.</p>

        </div>
    </div>
  </div>
</section>

<?php
include 'componentes/menu_derecha.php';
}else{ }
include 'footer.php';
?>

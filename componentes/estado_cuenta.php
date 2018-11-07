<?php 

error_reporting(E_ALL); 
ini_set("display_errors", 1); 
define('WP_USE_THEMES', false);
require('../../../../wp-load.php');
?>

<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>ZF</title>
  </head>


  <header>
  
  <body>
  


          
<style type="text/css">

h1{
text-align: center;
width: 100%;
}
table{
width: 100%;
margin-bottom: 1rem;
background-color: transparent;
display: block;
margin-left:auto;
margin-right:auto;
left:0;
right:0;
}

tr {
    padding: .75rem;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
}

tr td.danger {
    background-color: #000;
    color: #fff;
    font-size: 10px;
    text-align: center;
}

#estado_de_cuenta .table-responsive{
width: 100%;
text-align: center;
}

</style>


   
  <div class="container">
    <div class="col-md-12">
  <div class="row">
      <div class="col-md-12">  <h1>Estado de cuenta</h1></div>
  </div>

 
        <div id="estado_de_cuenta">   
          
<div class="table-responsive">
    <table class="table">

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
    </table>
  </div>




  <div class="table-responsive">
    <table class="table" cellspacing="0" border="1">
     
        <tr>
          <td  class="danger" rowspan="2">2018</td>
          <td  class="danger" colspan="3">1er TRIMESTRE</td>
          <td  class="danger" colspan="3"> 2do TRIMESTRE</td>
          <td  class="danger" colspan="3">3er TRIMESTRE</td>
          <td  class="danger" colspan="3">4to TRIMESTRE</td>
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
    </table>
  </div>



  <div class="table-responsive">
        <table class="table table-condensed" cellspacing=0 border=1>
    
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
    <td style="min-width:50px; text-align:center;"  ><?php echo money_format('%(#10n',$compras_totales); ?></td>
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
          <td style="min-width:50px; text-align:center;" >0</td>
        </tr>
     
    </table>
  </div>


  <div class="table-responsive">
    <table class="table table-condensed" cellspacing=0 border=1>

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
    </table>
  </div>





  <div class="table-responsive">
    <table class="table table-condensed">
        <tr>
          <td>
            <table class="table table-condensed">
                <tr>
                  <td style="min-width:50px; text-align:center;" class="danger">Visitas 2018</td>
                </tr>
                <tr>
                  <td>..</td>
                </tr>
                <tr>
                  <td style="min-width:50px; text-align:center;" class="danger">Ultima visita</td>
                </tr>
                <tr>
                  <td>0</td>
                </tr>
            </table>
          </td>
          <td>
            <table class="table table-condensed">

                <tr>
                  <td style="min-width:50px; text-align:center;" class="danger">Rotulacion</td>
                </tr>
                <tr>
                  <td>..</td>
                </tr>
                <tr>
                  <td style="min-width:50px; text-align:center;" class="danger">Bastidor</td>
                </tr>
                <tr>
                  <td>..</td>
                </tr>
            </table>
          </td>
          <td>
            <table class="table table-condensed">
                <tr>
                  <td style="min-width:50px; text-align:center;" class="danger">Réplica</td>
                </tr>
                <tr>
                  <td>..</td>
                </tr>
                <tr>
                  <td style="min-width:50px; text-align:center;" class="danger">Playeras</td>
                </tr>
                <tr>
                  <td>..</td>
                </tr>
            </table>
          </td>
          <td>
            <table class="table table-condensed">
                <tr>
                  <td style="min-width:50px; text-align:center;" class="danger">Caja moto</td>
                </tr>
                <tr>
                  <td>..</td>
                </tr>
            
            </table>
          </td>
        </tr>
    </table>
  </div>




  <div class="table-responsive">
    <table class="table table-condensed" cellspacing=0 border=1>
        <tr>
          <td style="min-width:50px; text-align:center;" class="danger" colspan="3 ">Material P.O.P.</td>
        </tr>
        <tr>
          <td style="min-width:50px; text-align:center;" class="danger">Mostrador</td>
          <td style="min-width:50px; text-align:center;" class="danger">Display</td>
          <td style="min-width:50px; text-align:center;" class="danger">Calcomania</td>
        </tr>
        <tr>
          <td>..</td>
          <td>..</td>
          <td>..</td>
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
    </table>
  </div>

  <div class="table-responsive">
    <table class="table table-condensed" cellspacing=0 border=1>

        <tr>
          <td style="min-width:50px; text-align:center;" class="danger" colspan="6 ">Historial de canjes 2018</td>
        </tr>
        <tr>
          <td style="min-width:50px; text-align:center;" class="danger">Fecha</td>
          <td style="min-width:50px; text-align:center;" class="danger" colspan="4 ">Descripción</td>
          <td style="min-width:50px; text-align:center;" class="danger">Total b-pts</td>
        </tr>
        <tr>
          <td style="min-width:50px; text-align:center;" >0</td>
          <td style="min-width:50px; text-align:center;" colspan="4 ">0</td>
          <td style="min-width:50px; text-align:center;" >0</td>
        </tr>
        <tr>
          <td style="min-width:50px; text-align:center;">0</td>
          <td style="min-width:50px; text-align:center;" colspan="4 ">0</td>
          <td style="min-width:50px; text-align:center;">0</td>
        </tr>
        <tr>
          <td style="min-width:50px; text-align:center;">0</td>
          <td style="min-width:50px; text-align:center;" colspan="4 ">0</td>
          <td style="min-width:50px; text-align:center;">0</td>
        </tr>
        <tr>
          <td>..</td>
          <td colspan="4 ">..</td>
          <td>..</td>
        </tr>
        <tr>
          <td>..</td>
          <td colspan="4 ">..</td>
          <td>..</td>
        </tr>
        <tr>
          <td>..</td>
          <td colspan="4 ">..</td>
          <td>..</td>
        </tr>
        <tr>
          <td>..</td>
          <td colspan="4 ">..</td>
          <td>..</td>
        </tr>
        <tr>
          <td>..</td>
          <td colspan="4 ">..</td>
          <td>..</td>
        </tr>
    </table>
  </div>

  <div class="table-responsive">
    <table class="table table-condensed"  cellspacing=0 border=1>

        <tr>
          <td class="danger">Nueva solicitud de canje</td>
        </tr>
        <tr>
          <td>..</td>
        </tr>
        <tr>
          <td>..</td>
        </tr>
        <tr>
          <td>..</td>
        </tr>
        <tr>
          <td>..</td>
        </tr>
    </table>
  </div>

  <p> Queda prohibida la reproducción parcial y/o total de la información aqui contenida por cualquier medio conocido o por conocer sin autorización por escrito de zf services, sa. de cv.</p>

       
    </div>
  </div>
   </div>



  </body>
</html>
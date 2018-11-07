<?php


$facturas_agregadaas = array(
  'numberposts' => -1,
  'post_type'   => 'facturas_agregadas'
);
 
$factura_datos = get_posts( $facturas_agregadaas );
$rfc_usuario_afiliado = get_the_author_meta( 'user_rfc_afiliado',$userid );

//$categoria_actr        = esc_attr(get_the_author_meta( 'user_ctegoria'    ,$userid ));




foreach ($factura_datos as $key_factura => $factura_value) {
$rfc_afiliado_general   = get_post_meta($factura_value->ID, 'ftrs_receptor_rfc', true);
  if ($rfc_usuario_afiliado==$rfc_afiliado_general ) {

$ventas_automatic[]       = get_post_meta($factura_value->ID, 'ftrs_ttl_automatic', true);
$ventas_bogas[]          = get_post_meta($factura_value->ID, 'ftrs_ttl_bogas', true);
$ventas_extream[]         = get_post_meta($factura_value->ID, 'ftrs_ttl_extream', true);

$fecha_agrego_factura[]         = strftime("%B",strtotime(get_post_meta($factura_value->ID,'ftrs_fecha', true))); 
             

}else{
 
}
}


// print_r($ventas_automatic );
// print_r($ventas_bogas);
// print_r($ventas_extream);

$meses_anow=array(
  1=>"enero", 
  "febrero", 
  "marzo", 
  "abril", 
  "mayo", 
  "junio", 
  "julio",
  "agosto", 
  "septiembre", 
  "octubre", 
  "noviembre", 
  "diciembre");





            
      $categoria_primer_trimestre  = $categoria_actr;
      $categoria_segundo_trimestre = $categoria_actr;
      $categoria_tercero_trimestre = $categoria_actr;
      $categoria_cuarto_trimestre  = $categoria_actr;


$en=0;$fb=0;$mr=0;$ab=0;$my=0;$ju=0;$jul=0;$ag=0;$sp=0;$oc=0;$no=0;$di=0;
$p1=0;$p2=0;$p3=0;$p4=0;$p5=0;$p6=0;$p7=0;$p8=0;$p9=0;$p10=0;$p11=0;$p12=0;
$pb1=0;$pb2=0;$pb3=0;$pb4=0;$pb5=0;$pb6=0;$pb7=0;$pb8=0;$pb9=0;$pb10=0;$pb11=0;$pb12=0;
$pe1=0;$pe2=0;$pe3=0;$pe4=0;$pe5=0;$pe6=0;$pe7=0;$pe8=0;$pe9=0;$pe10=0;$pe11=0;$pe12=0;
foreach ($meses_anow as $key_mes => $value_mes) {


$mes[]=$value_mes;



if ($fecha_agrego_factura[$en++]=='enero') {

      $B_enero             +=$ventas_bogas[$pb1++];
      $E_enero             +=$ventas_extream[$pe1++];
      $automatic_enero     +=$ventas_automatic[$p1++];
      $tipo_categoria       =$automatic_enero;//colocar cantidad generada durante 
  
  }


  elseif ($fecha_agrego_factura[$fb++]=='febrero') {

      $B_febrero             += $ventas_bogas[$pb2++];
      $E_febrero             +=$ventas_extream[$pe2++];
      $automatic_febrero     += $ventas_automatic[$p2++];
      $tipo_categoria         = $automatic_febrero;
  

  }elseif ($fecha_agrego_factura[$mr++]=='marzo') {
      $B_marzo              += $ventas_bogas[$pb3++];
      $E_marzo              += $ventas_extream[$pe3++];
      $automatic_marzo      += $ventas_automatic[$p3++];
      $tipo_categoria        = $automatic_marzo ;

 
  }elseif ($fecha_agrego_factura[$ab++]=='abril') {
      $B_abril             += $ventas_bogas[$pb4++];
      $E_abril             +=$ventas_extream[$pe4++];
      $automatic_abril     += $ventas_automatic[$p4++];
      $tipo_categoria       = $automatic_abril ;

 
  }elseif ($fecha_agrego_factura[$my++]=='mayo') {
      $B_mayo              += $ventas_bogas[$pb5++];
      $E_mayo              += $ventas_extream[$pe5++];
      $automatic_mayo      += $ventas_automatic[$p5++];
      $tipo_categoria       = $automatic_mayo ;
  //print_r($A_B_mayo);
 
  }elseif ($fecha_agrego_factura[$ju++]=='junio') {
      $B_junio             += $ventas_bogas[$pb6++];
      $E_junio             +=$ventas_extream[$pe6++];
      $automatic_junio     += $ventas_automatic[$p6++];
      $tipo_categoria       = $automatic_junio;

 
  }elseif ($fecha_agrego_factura[$jul++]=='julio') {
      $B_julio              += $ventas_bogas[$pb7++];
      $E_julio              +=$ventas_extream[$pe7++];
      $automatic_julio      += $ventas_automatic[$p7++];
      $tipo_categoria       = $automatic_julio ;

 
  }elseif ($fecha_agrego_factura[$ag++]=='agosto') {
      $B_agosto            += $ventas_bogas[$pb8++];
      $E_agosto            += $ventas_extream[$pe8++];
      $automatic_agosto    += $ventas_automatic[$p8++];
      $tipo_categoria        = $automatic_agosto ;

 
  }elseif ($fecha_agrego_factura[$sp++]=='septiembre') {
      $B_septiembre             += $ventas_bogas[$pb9++];
      $E_septiembre             += $ventas_extream[$pe9++];
      $automatic_septiembre     += $ventas_automatic[$p9++];
      $tipo_categoria            = $automatic_septiembre ;

 
  }elseif ($fecha_agrego_factura[$oc++]=='octubre') {
      $B_octubre             += $ventas_bogas[$pb10++];
      $E_octubre             += $ventas_extream[$pe10++];
      $automatic_octubre     += $ventas_automatic[$p10++];
      $tipo_categoria         = $automatic_octubre;

 
  }elseif ($fecha_agrego_factura[$no++]=='noviembre') {
      $B_noviembre              += $ventas_bogas[$pb11++];
      $E_noviembre              += $ventas_extream[$pe11++];
      $automatic_noviembre      += $ventas_automatic[$p11++];
      $tipo_categoria           = $automatic_noviembre;

 
  }elseif ($fecha_agrego_factura[$di++]=='diciembre') {
      $B_diciembre            += $ventas_bogas[$pb12++];
      $E_diciembre            += $ventas_bogas[$pe12++];
      $automatic_diciembre    += $ventas_bogas[$pb12++];
      $tipo_categoria           = $automatic_diciembre;

 
  }



}

$comptra_total_enero        = $B_enero      + $E_enero      + $automatic_enero;
$comptra_total_febrero      = $B_febrero    + $E_febrero    + $automatic_febrero;
$comptra_total_marzo        = $B_marzo      + $E_mayo       + $automatic_marzo;
$comptra_total_abril        = $B_abril      + $E_abril      + $automatic_abril;
$comptra_total_mayo         = $B_mayo       + $E_mayo       + $automatic_mayo;
$comptra_total_junio        = $B_junio      + $E_junio      + $automatic_junio;
$comptra_total_julio        = $B_julio      + $E_julio      + $automatic_julio;
$comptra_total_agosto       = $B_agosto     + $E_agosto     + $automatic_agosto;
$comptra_total_septiembre   = $B_septiembre + $E_septiembre + $automatic_septiembre;
$comptra_total_octubre      = $B_octubre    + $E_octubre    + $automatic_octubre;
$comptra_total_noviembre    = $B_noviembre  + $E_noviembre  + $automatic_noviembre;
$comptra_total_diciembre    = $B_diciembre  + $E_diciembre  + $automatic_diciembre;


//primr trimestre

$cumplimiento_t_e   =($comptra_total_enero       / 183001)*100;
$cumplimiento_t_f   =($comptra_total_febrero     / 183001)*100;
$cumplimiento_t_m   =($comptra_total_marzo       / 183001)*100;
$cumplimiento_t_ab  =($comptra_total_abril       / 183001)*100;
$cumplimiento_t_ma  =($comptra_total_mayo        / 183001)*100;
$cumplimiento_t_jun =($comptra_total_junio       / 183001)*100;
$cumplimiento_t_jul =($comptra_total_julio       / 183001)*100;
$cumplimiento_t_ago =($comptra_total_agosto      / 183001)*100;
$cumplimiento_t_sep =($comptra_total_septiembre  / 183001)*100;
$cumplimiento_t_oct =($comptra_total_octubre     / 183001)*100;
$cumplimiento_t_nov =($comptra_total_noviembre   / 183001)*100;
$cumplimiento_t_dic =($comptra_total_diciembre   / 183001)*100;




$primer_trimestral  = $comptra_total_enero   + $comptra_total_febrero   + $comptra_total_marzo;
$segundo_trimestral = $comptra_total_abril   + $comptra_total_mayo      + $comptra_total_junio;
$tercero_trimestral = $comptra_total_julio   + $comptra_total_agosto    + $comptra_total_septiembre;
$cuarto_trimestral  = $comptra_total_octubre + $comptra_total_noviembre + $comptra_total_diciembre;

$compras_totales = $primer_trimestral + $segundo_trimestral + $tercero_trimestral + $cuarto_trimestral;

$form1=183001*3;

$cump_trimestre_uno    =($primer_trimestral  / $form1)*100;
$cump_trimestre_dos    =($segundo_trimestral / $form1)*100;
$cump_trimestre_tres   =($tercero_trimestral / $form1)*100;
$cump_trimestre_cuatro =($cuarto_trimestral  / $form1)*100;

$puntos_enero=$automatic_enero*.2; 
$puntos_febrero=$automatic_febrero*.2; 
$puntos_marzo=$automatic_marzo*.2;
$puntos_abril=$automatic_abril*.2; 
$puntos_mayo=$automatic_mayo*.2; 
$puntos_junio=$automatic_junio*.2; 
$puntos_julio=$automatic_julio*.2; 
$puntos_agosto=$automatic_agosto*.2; 
$puntos_septiembre=$automatic_septiembre*.2; 
$puntos_octubre=$automatic_octubre*.2; 
$puntos_noviembre=$automatic_noviembre*.2; 
$puntos_diciembre=$automatic_diciembre*.2; 


$total_puntoss=$puntos_enero+$puntos_febrero+$puntos_marzo+$puntos_abril+$puntos_mayo+$puntos_junio+$puntos_julio+$puntos_agosto+$puntos_septiembre+$puntos_octubre+$puntos_noviembre+$puntos_diciembre;

if (empty($total_puntoss)) {
  $puntos_automatic_anuales=0;
}else{
$puntos_automatic_anuales=round($total_puntoss);
}

$bonificacion_trimestral =11750;

  ?>
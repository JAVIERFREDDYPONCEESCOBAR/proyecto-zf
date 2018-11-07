<?php 
include 'header.php';
if ( is_user_logged_in() ) { 
if ( ($current_user->roles[0] =='administradorpvp')||($current_user->roles[0] =='administrator') ) {
  include 'componentes/menu.php';
}elseif ( ($current_user->roles[0] =='administradordac')||($current_user->roles[0] =='administrator') ) {
  include 'componentes/menu_dac.php';
}


?>

<section id="contendio">
  <div class="container">
    <div class="col-md-12">
      <h1><?php echo$post->post_title; ?></h1>
        <div id="estado_de_cuenta">
	<div class="wrap">

		<h2>
			Administrador de Facturas Digitales BOGE
		</h2>
		<p>
			En el siguiente formulario escoge las facturas digitales de tus PVP <b>(Puntos de Venta al Público)</b>. Antes de empezar te recomendamos seguir las siguientes instrucciones:</p>
		<h3>
			Una factura válida será:
		</h3>
		<ul>
			<li>Si se suben dos archivos con el mismo nombre una de tipo .PDF y otra de tipo .XML. Ej. 000001.pdf y 000001.xml</li>
			<li>Si la fecha de la factura coincide con el periodo hábil para subir las facturas. Es decir, si la factura es de Marzo de 2017 y se quiere subir en Octubre de 2017, esta al ya no pertenecer al perido hábil es inválida y no se podrá subir al administrador.</li>
			<li>Si el DAC y el PVP son válidos y se encuentran registrados en el administrador.</li>
		</ul>

	</div>

	<div class="wrap container-factura-admin">
		<form id="form-factura-admin" method="post"  enctype="multipart/form-data" novalidate class="form-factura-admin">
			<div class="form-group">
				<label for="file"><strong>Selecciona tus facturas</strong><br>
					<input type="file" name="files[]" id="file" multiple="" class="form-control"/>
				</label>
				<button type="submit" class="btn-submit">Validar archivos</button>
			</div>
		</form>
	</div>


</div>
</div>
</div>
</section>

<?php

 function get_DAC_RFC($id){
	 global $wpdb;
	 $results = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}prflxtrflds_user_field_data WHERE user_id = {$userid} AND field_id = 18", OBJECT );
	 return $results;
 }

 function is_valid_PVP_RFC($rfc){
	 global $wpdb;
	 $results = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}prflxtrflds_user_field_data WHERE user_value = '{$rfc}' AND field_id = 17", OBJECT );
	 return $results;
 }

function hasPoints($id){
	global $wpdb;
	$resultado = $wpdb->get_results( "SELECT `id`, `sku` FROM {$wpdb->prefix}productos_automatic WHERE `sku` = '".$userid."'", OBJECT );
	if (count($resultado) === 0) { return; }
	return array($resultado[0]->sku); }



		if (!empty($_FILES['files'])) {


			/*
			 * Detecting if a file has an upload error
			 * If the error occurs then exit and send warning label
			 */
			foreach ($_FILES['files']['error'] as $key => $error) {
				if($error != 0){
					$message = "Error, Archivos corruptos o dañados, verifique los archivos";
					echo $message;
				}
			}

$extencion_pdf = substr($_FILES['files']['name'][0], -3);
$extencion_xml = substr($_FILES['files']['name'][1], -3);
// condicionar extencion de tipo de archivo
			foreach ($_FILES['files']['name'] as $value=>$tipo_file) {

			/*
				 * Detect Files match name, xxx.pdf - xxx.xml
				 * The Files come from two
				 */
				//$selectedFiles;
				// Is XMl or PDF

				$ext = preg_replace("/\s\s+/", "", trim(pathinfo($tipo_file, PATHINFO_EXTENSION)));


			 		     if($ext = "pdf" && $ext = "xml"){

			 		$match = array_search(str_replace("pdf", "xml", $tipo_file), $_FILES['files']['name']);
					$fileName1 = str_replace(array(".xml", ".pdf"), "", $tipo_file);
	                $match2 = array_search(str_replace("pdf", "xml", $tipo_file), $_FILES['files']['name']);

                
			        }else{
			        	$message = "Error , Extensión de archivo '.".$ext."' no permitido, verifique los archivos.";
			 		    echo $message;
			        }
			 	

				if(($ext == 'xml')||($ext == 'XML')){
					// Has a PDF Friend match?
					//$match0 = array_search(str_replace("xml", "PDF", $file), $_FILES['files']['name']);

					if($match){
						if(!array_search($fileName1, array_column($selectedFiles, 'file', 'file'))){
							$selectedFiles[] = [
																	'key' => $value,
																	'file' => $fileName1,
																	'xml' =>$_FILES['files']['name'][$match],
																	'tmp_name_xml' => $_FILES['files']['tmp_name'][$match],
																	'pdf' => $_FILES['files']['name'][$value],
																	'tmp_name_pdf' => $_FILES['files']['tmp_name'][$value]
																	];
						}
					}
				}elseif(($ext == 'pdf')||($ext == 'PDF')){

					// Has a XML Friend match?
					//$match0 = array_search(str_replace("PDF", "xml", $file), $_FILES['files']['name']);
					//echo $match2;

					if($match2){
						
						if(!array_search($fileName1, array_column($selectedFiles, 'file', 'file'))){
							$selectedFiles[] = [
																	'key' => $value,
																	'file' => $fileName1,
																	'xml' => $_FILES['files']['name'][$match2],
																	'tmp_name_xml' => $_FILES['files']['tmp_name'][$value],
																	'pdf' => $_FILES['files']['name'][$value],
																	'tmp_name_pdf' => $_FILES['files']['tmp_name'][$match2]
																	];
						}
					}
				}


}

}

?>
				
		<div class="results" <?php if (!empty($selectedFiles)) { ?> style="display:block!important;" <?php } ?> >

			<div class="info">
				<p>Información procesada</p>
				<ul>
					<li>Facturas recibidas: <?php echo count($selectedFiles); ?>
	<input type="hidden" data-agregadas="<?php echo count($selectedFiles); ?>" name="cat_fact" id="cat_fact" value="<?php echo count($selectedFiles); ?>">
					</li>
				</ul>
			</div>


<?php 

		if (!empty($selectedFiles)) {
$current_user = $current_user->data->ID;
//$dac_rfc = get_DAC_RFC($current_user)[0]->user_value;



		$initcontador=1; $count = 1; $ttl_automatic = 0; $ttl_boge_ext = 0; 
			foreach ($selectedFiles as $key => $value) {

		

				$tblHF = true; $cant = 0;
				$isDacValid = true;
				$isPvpValid = true;
				$xml = new XMLReader();
				$xml->open( $value["tmp_name_xml"] );

				while( $xml->read() ) {


if( 'cfdi:Comprobante' === $xml->name ) {
if (empty($xml->getAttribute('Version'))){$version = $xml->getAttribute('version');}else{$version = $xml->getAttribute('Version');}
if (empty($xml->getAttribute('Serie'))) {$serie = $xml->getAttribute('serie');}else{$serie = $xml->getAttribute('Serie');}
if (empty($xml->getAttribute('Folio'))) {$folio = $xml->getAttribute('folio');}else{$folio = $xml->getAttribute('Folio');}
if (empty($xml->getAttribute('Fecha'))) {$fecha = $xml->getAttribute('fecha');}else{$fecha = $xml->getAttribute('Fecha');}
}

   if( 'cfdi:Emisor' === $xml->name ) {

if (empty($xml->getAttribute('Rfc'))) {$emisorRFC = $xml->getAttribute('rfc');}else{$emisorRFC = $xml->getAttribute('Rfc');}
if (empty($xml->getAttribute('Nombre'))){$emisorNombre = $xml->getAttribute('nombre');}else{$emisorNombre = $xml->getAttribute('Nombre');}
if (empty($xml->getAttribute('RegimenFiscal'))) {$emisorRegimenFiscal = $xml->getAttribute('Regimen');}else{$emisorRegimenFiscal = $xml->getAttribute('RegimenFiscal');}

						//if($emisorRFC !== $dac_rfc){ $isDacValid = false; $message = "Error ,El archivo " . $value["pdf"] . " no concuerda con el DAC asociado."; break; }
						//if(is_valid_PVP_RFC("VOL131031P76")->user_value){ $isPvpValid = false; $message = "Error , El PVP afiliado no está registrado"; break; }
}


    if( 'cfdi:Receptor' === $xml->name ) {
if (empty($xml->getAttribute('Rfc'))) {$receptorRFC = $xml->getAttribute('rfc');}else{$receptorRFC = $xml->getAttribute('Rfc');}
if (empty($xml->getAttribute('Nombre'))) {$receptorNombre = $xml->getAttribute('nombre');}else{$receptorNombre = $xml->getAttribute('Nombre');}
if (empty($xml->getAttribute('UsoCFDI'))) {$receptorCFDI = $xml->getAttribute('UsoCFDI');}else{$receptorCFDI = $xml->getAttribute('UsoCFDI');}
 }




if ($xml->nodeType == XMLReader::ELEMENT && $xml->name == 'cfdi:Concepto') {
//if ('cfdi:Concepto'==$xml->name) {
	//$contar_productos = $initcontador++;
//$contar_p[] =$contar_productos;

//$p_descripcion_acumulado[] = $xml->getAttribute('descripcion');



				

if (empty($xml->getAttribute('NoIdentificacion'))) {
	$sku_product[] = $xml->getAttribute('noIdentificacion'); 
	$contar_p[]=$initcontador++;
	
	
}else{

	$sku_product[] = $xml->getAttribute('NoIdentificacion'); 
	$contar_p[]=$initcontador++;
}

	if (empty($xml->getAttribute('descripcion'))) {
$Descripcion_product[]  =	$xml->getAttribute('Descripcion');                                       
}else{
$Descripcion_product[]  =   $xml->getAttribute('descripcion');
}



if (empty($xml->getAttribute('cantidad'))) {
$Descripcion_cantidad[]   =	$xml->getAttribute('Cantidad');
}else{
$Descripcion_cantidad[]   =	$xml->getAttribute('cantidad');
}

if (empty($xml->getAttribute('unidad'))) {
$Descripcion_unidad[]   =	$xml->getAttribute('claveUnidad');
}else{
$Descripcion_unidad[]   =	$xml->getAttribute('unidad');
}


if (empty($xml->getAttribute('valorUnitario'))) {
$Descripcion_valor_un[]   =	$xml->getAttribute('ValorUnitario');
}else{
$Descripcion_valor_un[]   =	$xml->getAttribute('valorUnitario');
}

if (empty($xml->getAttribute('importe'))) {
$Descripcion_importe[]   =	$xml->getAttribute('Importe');
}else{
$Descripcion_importe[]   =	$xml->getAttribute('importe');
}

}







$array = $hasPoint;

if(isset($array)){ 
$ttl_automatic = $ttl_automatic + $xml->getAttribute('Importe'); 			
}else{ 
$ttl_boge_ext = $ttl_boge_ext + $xml->getAttribute('Importe');
}



}



if($isDacValid && $isPvpValid){

				$url_files = $_SERVER["DOCUMENT_ROOT"] . '/wp/wp-content/themes/produccion_zf/zf_facturas/';
				$url_link = 'http://' . $_SERVER[HTTP_HOST] . '/wp/wp-content/themes/produccion_zf/zf_facturas/';

				$target_file = $url_files . basename($value["xml"]);
				move_uploaded_file($value["tmp_name_xml"], $target_file);
				$target_file = $url_files . basename($value["pdf"]);
				move_uploaded_file($value["tmp_name_pdf"], $target_file);

				$array_ftrs_version[] = $version;
				$array_ftrs_serie[] = $serie;
				$array_ftrs_folio[] = $folio;
				$array_ftrs_fecha[] = $fecha;
				$array_ftrs_emisor_rfc[] = $emisorRFC;
				$array_ftrs_emisor_nombre[] = $emisorNombre;
				$array_ftrs_emisor_regimen[] = $emisorRegimenFiscal;
				$array_ftrs_receptor_rfc[] = $receptorRFC;
				$array_ftrs_receptor_nombre[] = $receptorNombre;
				$array_ftrs_receptor_regimen[] = $receptorCFDI;
				$array_ftrs_pdf[] = $url_link . $value["pdf"];
				$array_ftrs_xml[] = $url_link . $value["xml"];
				$array_ttl_automatic[] = $ttl_automatic;
				$array_ttl_bogas_ext[] = $ttl_boge_ext;



$array_descripcion_product[]  =$Descripcion_product;
$array_descripcion_cantidad[] =$Descripcion_cantidad;
$array_descripcion_unidad[]   =$Descripcion_unidad;
$array_descripcion_valor_un[] =$Descripcion_valor_un;
$array_descripcion_importe[]  =$Descripcion_importe;
$array_descripcion_sku[]      =$sku_product;


			}



}

// print_r($array_descripcion_cantidad[0]);
// print_r($array_descripcion_unidad[0]);
// print_r($array_descripcion_valor_un[0]);
// print_r($array_descripcion_importe[0]);
$cantida_pr= end( $contar_p);

//print_r($cantida_pr);

$productos_no_parte = array(
        'posts_per_page' => -1,
        'post_type'      => 'realcion_no_parte',    
        'orderby'        => 'post_date',
        'order'          => 'DESC',
    );



foreach($array_ftrs_version as $key => $value){

for ($i=0; $i <$cantida_pr; $i++) { 
	$decp[]  = '~~~'.$array_descripcion_product[0][$i].'';
	$decp1[] = '~~~'.$array_descripcion_cantidad[0][$i].'';
	$decp2[] = '~~~'.$array_descripcion_unidad[0][$i].'';
	$decp3[] = '~~~'.$array_descripcion_valor_un[0][$i].'';
	$decp4[] = '~~~'.$array_descripcion_importe[0][$i].'';
	$decp5[] = '~~~'.$array_descripcion_sku[0][$i].'';

	
}

//print_r($decp5);

$tre=0;
foreach (get_posts($productos_no_parte) as $key_eval => $value_aval) {
$tet=$tre++;
$cat_ev             = get_post_meta($value_aval->ID,'tipo_linea', true); 
$pro_ev             = get_post_meta($value_aval->ID,'sku_product', true);
$new_product_name[] = array($tet,$pro_ev,$cat_ev);

}

$ib=0;
for ($i=0; $i <$cantida_pr; $i++) { 

	 global $wpdb;
$limpiando = explode('~~~', $decp5[$i]);
$maslimpio = trim($limpiando[1]);
//print_r($limpiando[1]);
//$results = $wpdb->get_results( "select post_id, meta_key from $wpdb->postmeta where meta_value =$maslimpio", ARRAY_A );
$results = $wpdb->get_results("SELECT*FROM $wpdb->postmeta WHERE meta_value='$maslimpio'",ARRAY_A);
$tipo_p = get_post_meta($results[0][post_id], 'tipo_linea', true);
$sku_p= get_post_meta($results[0][post_id], 'sku_product', true);

//print_r($results);

$arrayName_p = array(
	'post_ID'=>$results[0][post_id],
	'categoria'=>$tipo_p,
	'descripcion' =>explode('~~~',$decp[$i])[1],
	'cantidad'    =>explode('~~~',$decp1[$i])[1],
	'unidad'      =>explode('~~~',$decp2[$i])[1],
	'valor'       =>explode('~~~',$decp3[$i])[1],
	'importe'     =>explode('~~~',$decp4[$i])[1],
	'sku_no_parte'=>explode('~~~',$decp5[$i])[1]
	 );


if ($tipo_p=='AUTOMATIC') {

	$decp_a[]  = '~~~'.$arrayName_p[descripcion] .'';
	$decp1_a[] = '~~~'.$arrayName_p[cantidad] .'';
	$decp2_a[] = '~~~'.$arrayName_p[unidad] .'';
	$decp3_a[] = '~~~'.$arrayName_p[valor] .'';
	$decp4_a[] = '~~~'.$arrayName_p[importe] .'';
	$decp5_a[] = '~~~'.$arrayName_p[sku_no_parte] .'';

		$cantida_pr_a[]   =count($arrayName_p[post_ID]);
		
	

}elseif ($tipo_p=='BOGAS') {
	


	$decp_b[]  = '~~~'.$arrayName_p[descripcion] .'';
	$decp1_b[] = '~~~'.$arrayName_p[cantidad] .'';
	$decp2_b[] = '~~~'.$arrayName_p[unidad] .'';
	$decp3_b[] = '~~~'.$arrayName_p[valor] .'';
	$decp4_b[] = '~~~'.$arrayName_p[importe] .'';
	$decp5_b[] = '~~~'.$arrayName_p[sku_no_parte] .'';

	$cantida_pr_b[]   =count($arrayName_p[post_ID]);
	

}elseif ($tipo_p=='XTREME') {
	
	$decp_x[]  = '~~~'.$arrayName_p[descripcion] .'';
	$decp1_x[] = '~~~'.$arrayName_p[cantidad] .'';
	$decp2_x[] = '~~~'.$arrayName_p[unidad] .'';
	$decp3_x[] = '~~~'.$arrayName_p[valor] .'';
	$decp4_x[] = '~~~'.$arrayName_p[importe] .'';
	$decp5_x[] = '~~~'.$arrayName_p[sku_no_parte] .'';

		$cantida_pr_x[]   =count($arrayName_p[post_ID]);	
	
	

}elseif ($tipo_p==' ') { }

}






	


for ($h1=0; $h1 <=count($cantida_pr_a); $h1++) { 
 $a0[]=$decp_a[$h1];
 $a1[]=$decp1_a[$h1];
 $a2[]=$decp2_a[$h1];
 $a3[]=$decp3_a[$h1];
 $a4[]=$decp4_a[$h1];
 $a5[]=$decp5_a[$h1];
}

for ($h2=0; $h2 <=count($cantida_pr_b); $h2++) { 
 $p0[]=$decp_b[$h2];
 $p1[]=$decp1_b[$h2];
 $p2[]=$decp2_b[$h2];
 $p3[]=$decp3_b[$h2];
 $p4[]=$decp4_b[$h2];
 $p5[]=$decp5_b[$h2];
}

for ($h3=0; $h3 <=count($cantida_pr_x); $h3++) { 
 $x0[]=$decp_x[$h3];
 $x1[]=$decp1_x[$h3];
 $x2[]=$decp2_x[$h3];
 $x3[]=$decp3_x[$h3];
 $x4[]=$decp4_x[$h3];
 $x5[]=$decp5_x[$h3];

}

//Suma automatic

$filt_a1=implode(" ", $a4);
$filt_a2=explode('~~~',$filt_a1);
for ($ia=0; $ia <=count($cantida_pr_a); $ia++) { 
	$suma_automatic+=$filt_a2[$ia];
}


//print_r($suma_automatic);
//Suma bogas

$filt_b1=implode(" ", $p4);
$filt_b2=explode('~~~',$filt_b1);
for ($ib=0; $ib <=count($cantida_pr_b); $ib++) { 
	$suma_bogas+=$filt_b2[$ib];
}
//print_r($suma_bogas);
//Suma extream

$filt_x1=implode(" ", $x4);
$filt_x2=explode('~~~',$filt_x1);
for ($ix=0; $ia <=count($cantida_pr_x); $ix++) { 
	$suma_extream+=$filt_x2[$ix];
}
//print_r($suma_extream);

// echo'autopatic: '; //print_r(implode(" ", $a5));
// print_r($a5);
// print_r(count($cantida_pr_a));
//   echo "

//  ";
//  echo'bogas: '; //print_r( $decp5_b);
// print_r(implode(" ", $p5));
// print_r(count($cantida_pr_b));
//  echo "

//   ";
// echo'xtream: ';//print_r( $decp5_x);
//   print_r($x5);
//   print_r(count($cantida_pr_x));


		$post_id = wp_insert_post(array (
		   'post_type' => 'facturas_agregadas',
		   'post_title' => $array_ftrs_emisor_nombre[$key]."-".date("d-m-y_H-i-s"),
		   'post_content' => "",
		   'post_author' => $userid, 
		   'post_status' => 'publish',
		   'comment_status' => 'closed',  
		   'ping_status' => 'closed',      
		));
		if ($post_id) {
		   // insert post meta
		   add_post_meta($post_id, 'ftrs_version', $array_ftrs_version[$key]);
		   add_post_meta($post_id, 'ftrs_serie', $array_ftrs_serie[$key]);
		   add_post_meta($post_id, 'ftrs_folio', $array_ftrs_folio[$key]);
		   add_post_meta($post_id, 'ftrs_fecha', $array_ftrs_fecha[$key]);
		   add_post_meta($post_id, 'ftrs_emisor_rfc', $array_ftrs_emisor_rfc[$key]);
		   add_post_meta($post_id, 'ftrs_emisor_nombre', $array_ftrs_emisor_nombre[$key]);
		   add_post_meta($post_id, 'ftrs_emisor_regimen', $array_ftrs_emisor_regimen[$key]);
		   add_post_meta($post_id, 'ftrs_receptor_rfc', $array_ftrs_receptor_rfc[$key]);
		   add_post_meta($post_id, 'ftrs_receptor_nombre', $array_ftrs_receptor_nombre[$key]);
		   add_post_meta($post_id, 'ftrs_receptor_regimen', $array_ftrs_receptor_regimen[$key]);

		   add_post_meta($post_id, 'ftrs_url_pdf', $array_ftrs_pdf[$key]);
		   add_post_meta($post_id, 'ftrs_url_xml', $array_ftrs_xml[$key]);

		   add_post_meta($post_id, 'ftrs_ttl_automatic',$suma_automatic);
		   add_post_meta($post_id, 'ftrs_ttl_bogas', $suma_bogas);
		   add_post_meta($post_id, 'ftrs_ttl_extream', $suma_extream);


           add_post_meta($post_id, 'automatic_list_product_sku',implode(" ", $a5));
		   add_post_meta($post_id, 'automatic_list_product',implode(" ", $a0));
		   add_post_meta($post_id, 'automatic_list_product2',implode(" ", $a1));
		   add_post_meta($post_id, 'automatic_list_product3',count($cantida_pr_a));
		   add_post_meta($post_id, 'automatic_list_product4',implode(" ", $a3));
		   add_post_meta($post_id, 'automatic_list_product5',implode(" ", $a4));


		   add_post_meta($post_id, 'bogas_list_product_sku',implode(" ", $p5));
		   add_post_meta($post_id, 'bogas_list_product',implode(" ", $p0));
		   add_post_meta($post_id, 'bogas_list_product2',implode(" ", $p1));
		   add_post_meta($post_id, 'bogas_list_product3',count($cantida_pr_b));
		   add_post_meta($post_id, 'bogas_list_product4',implode(" ", $p3));
		   add_post_meta($post_id, 'bogas_list_product5',implode(" ", $p4));


		   add_post_meta($post_id, 'extrem_list_product_sku',implode(" ", $x5));
		   add_post_meta($post_id, 'extrem_list_product',implode(" ", $x0));
		   add_post_meta($post_id, 'extrem_list_product2',implode(" ", $x1));
		   add_post_meta($post_id, 'extrem_list_product3',count($cantida_pr_x));
		   add_post_meta($post_id, 'extrem_list_product4',implode(" ", $x3));
		   add_post_meta($post_id, 'extrem_list_product5',implode(" ", $x4));
		}












} 

}

?>
		





			
<?php 
include 'componentes/menu_derecha.php';
}else{ } 
include 'footer.php';
?>
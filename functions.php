<?php
add_theme_support('menus');
add_theme_support('post-thumbnails');
function style_administrador() { ?>
<link type="text/css" rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/font-awesome.css"/>
<link type="text/css" rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/administrador.css?ver:1.00d1w3d"/>
<?php
}
add_action( 'admin_head', 'style_administrador' );






$Tipo_perfil = wp_get_current_user();
function my_custom_login_redirect($redirect_to, $request, $user) {
  global $user;

  if ( isset( $user->roles ) && is_array( $user->roles ) ) {
    if ( (in_array( 'administradorpvp', $user->roles ))||(in_array( 'administradordac', $user->roles) ) ){
      return home_url("mi-cuenta");
    }
  }

  return $redirect_to;
}
add_filter( 'login_redirect', 'my_custom_login_redirect', 10, 3 );



function add_custom_fields_to_users_dac( $user ) {
$user_rfc_dac  = esc_attr( get_the_author_meta( 'user_rfc_dac',$user->ID ) );


?>

 <h3>Campos requeridos DAC</h3>

<table class="form-table">


      <tr>
    <th><label for="user_rfc_afiliado">Rfc dac</label></th>
<td>
  <input type="text" name="user_rfc_dac" id="user_rfc_dac" class="regular-text"  value="<?php echo $user_rfc_dac;?>">
   </td>
    </tr>

</table>
<?php
}

if(($Tipo_perfil->roles[0] == "administradordac")||($Tipo_perfil->roles[0] == "administrator")){
add_action( 'show_user_profile', 'add_custom_fields_to_users_dac' );
add_action( 'edit_user_profile', 'add_custom_fields_to_users_dac' );
 }


// Agregamos los campos adicionales a Tu Perfil y Editar Usuario
function add_custom_fields_to_users( $user ) {

  $user_nom_comercial      = esc_attr( get_the_author_meta( 'user_nom_comercial',    $user->ID ) );
  $user_cla_afiliado       = esc_attr( get_the_author_meta( 'user_cla_afiliado',     $user->ID ) );
  $user_razon_social       = esc_attr( get_the_author_meta( 'user_razon_social',     $user->ID ) );
  $user_rfc_afiliado       = esc_attr( get_the_author_meta( 'user_rfc_afiliado',     $user->ID ) );
  $user_fecha_afiliacion   = esc_attr( get_the_author_meta( 'user_fecha_afiliacion', $user->ID ) );
  $user_fecha_arenovacion  = esc_attr( get_the_author_meta( 'user_fecha_arenovacion',$user->ID ) );
  $user_fecha_beneficios   = esc_attr( get_the_author_meta( 'user_fecha_beneficios', $user->ID ) );
  $user_fecha_baja         = esc_attr( get_the_author_meta( 'user_fecha_baja',       $user->ID ) );
  $user_contacto           = esc_attr( get_the_author_meta( 'user_contacto',         $user->ID ) );
  $user_direccion          = esc_attr( get_the_author_meta( 'user_direccion',        $user->ID ) );
  $user_email_contacto     = esc_attr( get_the_author_meta( 'user_email_contacto',   $user->ID ) );
  $user_whatsapp_contacto  = esc_attr( get_the_author_meta( 'user_whatsapp_contacto',$user->ID ) );
  $pits                    = esc_attr( get_the_author_meta( 'pits',$user->ID ) );
  $pits_nombre             = esc_attr( get_the_author_meta( 'pits_nombre',$user->ID ) );

  $user_status     = esc_attr( get_the_author_meta( 'user_estatus',$user->ID ) );
  $selec_dac       = esc_attr( get_the_author_meta( 'selec_dac',$user->ID ) );
  $selec_promotor  = esc_attr( get_the_author_meta( 'selec_promotor',$user->ID ) );
  $user_ctegoria   = esc_attr( get_the_author_meta( 'user_ctegoria',$user->ID ) );


?>

  <h3>Campos requeridos PVP</h3>



  <table class="form-table">
  <tr>
    <th><label for="user_rfc_afiliado">No Pits</label></th>
   <td>
  <input type="text" name="pits" id="pits" class="regular-text"  value="<?php echo $pits;?>">
   </td>
    </tr>
  <tr>
    <th><label for="user_rfc_afiliado">Nombre Pits</label></th>
   <td>
  <input type="text" name="pits_nombre" id="pits_nombre" class="regular-text"  value="<?php echo $pits_nombre;?>">
   </td>
    </tr>


    <tr>
    <th><label for="dac_asociado">DAC asigando</label></th>
 	<td>



					<select name="selec_dac" id="selec_dac">
  						<option <?php if($selec_dac == 'Maral') echo"selected"; ?> value="Maral">Maral</option>
  						<option <?php if($selec_dac == 'DAC2') echo"selected"; ?> value="dac2">DAC 2</option>
  						<option <?php if($selec_dac == 'DAC3') echo"selected"; ?> value="dac3">DAC 3</option>
  						<option <?php if($selec_dac == 'DAC4') echo"selected"; ?> value="dac4">DAC 4</option>
					</select>
	</td>
    </tr>

    <tr>
    <th><label for="selec_promotor">Promotor asignado</label></th>
 	<td>
					<select name="selec_promotor" id="selec_promotor">
  						<option  <?php if($selec_promotor == '1') echo"selected"; ?>  value="1">PROMOTOR 1</option>
  						<option  <?php if($selec_promotor == '2') echo"selected"; ?>  value="2">PROMOTOR 2</option>
  						<option  <?php if($selec_promotor == '3') echo"selected"; ?>  value="3">PROMOTOR 3</option>
  						<option  <?php if($selec_promotor == '4') echo"selected"; ?>  value="4">PROMOTOR 4</option>
					</select>
	</td>
    </tr>


    <tr>
    <th><label for="user_ctegoria">Categoría</label></th>
 	<td>
	<select name="user_ctegoria" id="user_ctegoria">
  			<option <?php if($user_ctegoria == 'Diamante') echo"selected"; ?>  value="Diamante">Diamante</option>
        <option <?php if($user_ctegoria == 'Diamante plus') echo"selected"; ?>  value="Diamante plus">Diamante plus</option>
  			<option <?php if($user_ctegoria == 'Platino') echo"selected"; ?>  value="Platino">Platino</option>
  			<option <?php if($user_ctegoria == 'Oro') echo"selected"; ?>  value="Oro">Oro</option>
  			<option <?php if($user_ctegoria == 'Plus') echo"selected"; ?>  value="Plus">Plus</option>
  			<option <?php if($user_ctegoria == 'Básico') echo"selected"; ?>  value="Básico">Básico</option>
  			<option <?php if($user_ctegoria == 'Small') echo"selected"; ?>  value="Small">Small</option>
	</select>
	</td>
    </tr>


    <tr>
    <th><label for="user_nom_comercial">Nombre Comercial</label></th>
 	<td>
 	<input type="text" name="user_nom_comercial" id="user_nom_comercial" class="regular-text"  value="<?php echo $user_nom_comercial;?>">
	</td>
    </tr>


    <tr>
    <th><label for="user_cla_afiliado">Clave afiliado</label></th>
 	<td>
	<input type="text" name="user_cla_afiliado" id="user_cla_afiliado" class="regular-text"  value="<?php echo $user_cla_afiliado;?>">
	</td>
    </tr>


    <tr>
    <th><label for="user_razon_social">Razon social	</label></th>
 	<td>
	<input type="text" name="user_razon_social" id="user_razon_social" class="regular-text"  value="<?php echo $user_razon_social;?>">
    </tr>


    <tr>
    <th><label for="user_rfc_afiliado">RFC afiliado</label></th>
 	<td>
	<input type="text" name="user_rfc_afiliado" id="user_rfc_afiliado" class="regular-text"  value="<?php echo $user_rfc_afiliado;?>">
    </tr>



    <tr>
    <th><label for="user_estatus">Estatus</label></th>
 	<td>
	<select name="user_estatus" id="user_estatus">
  		<option <?php if($user_status == 'DAC1') echo"selected"; ?> value="DAC1">Estatus 1</option>
  		<option <?php if($user_status == 'DAC2') echo"selected"; ?> value="DAC2">Estatus 2</option>
  		<option <?php if($user_status == 'DAC3') echo"selected"; ?> value="DAC3">Estatus 3</option>
  		<option <?php if($user_status == 'DAC4') echo"selected"; ?> value="DAC4">Estatus 4</option>
	</select>




    </tr>

    <tr>
    <th><label for="user_fecha_afiliacion">Fecha de afiliación</label></th>
 	<td>
	<input type="date" name="user_fecha_afiliacion" id="user_fecha_afiliacion" class="regular-text"  value="<?php echo $user_fecha_afiliacion;?>">
    </tr>

    <tr>
    <th><label for="user_fecha_arenovacion">Fecha de Renovación</label></th>
 	<td>
	<input type="date" name="user_fecha_arenovacion" id="user_fecha_arenovacion" class="regular-text"  value="<?php echo $user_fecha_arenovacion;?>">
    </tr>

    <tr>
    <th><label for="user_fecha_beneficios">Fecha de beneficios</label></th>
 	<td>
	<input type="date" name="user_fecha_beneficios" id="user_fecha_beneficios" class="regular-text"  value="<?php echo $user_fecha_beneficios;?>">
    </tr>


    <tr>
    <th><label for="user_fecha_baja">Fecha de baja</label></th>
 	<td>
	<input type="date" name="user_fecha_baja" id="user_fecha_baja" class="regular-text"  value="<?php echo $user_fecha_baja;?>">
    </tr>



    <tr>
    <th><label for="user_contacto">Nombre contacto</label></th>
    <td><input type="text" name="user_contacto" id="user_contacto" class="regular-text" value="<?php echo $user_contacto;?>" />
    </td>
    </tr>


    <tr>
    <th><label for="user_direccion">Dirección contacto</label></th>
    <td><input type="text" name="user_direccion" id="user_direccion" class="regular-text" value="<?php echo $user_direccion;?>" />
    </td>
    </tr>

    <tr>
    <th><label for="user_email_contacto">E-mail contacto</label></th>
    <td><input type="email" name="user_email_contacto" id="user_email_contacto" class="regular-text" value="<?php echo $user_email_contacto;?>" />
    </td>
    </tr>

   <tr>
   <th><label for="user_whatsapp_contacto">Whatsapp contacto</label></th>
   <td><input type="tel" name="user_whatsapp_contacto" id="user_whatsapp_contacto" class="regular-text" value="<?php echo $user_whatsapp_contacto;?>" />
   </td>
   </tr>


  </table>
<?php
 }

if(($Tipo_perfil->roles[0] == "administradorpvp")||($Tipo_perfil->roles[0] == "administrator")){
add_action( 'show_user_profile', 'add_custom_fields_to_users' );
add_action( 'edit_user_profile', 'add_custom_fields_to_users' );
 }
add_action( 'personal_options_update', 'save_extra_user_profile_fields' );
add_action( 'edit_user_profile_update', 'save_extra_user_profile_fields' );

function save_extra_user_profile_fields( $user_id ) {
    if ( !current_user_can( 'edit_user', $user_id ) ) {
        return false;
    }
    update_user_meta( $user_id, 'user_nom_comercial',     $_POST['user_nom_comercial'] );
    update_user_meta( $user_id, 'user_cla_afiliado',      $_POST['user_cla_afiliado'] );
    update_user_meta( $user_id, 'user_razon_social',      $_POST['user_razon_social'] );
    update_user_meta( $user_id, 'user_rfc_afiliado',      $_POST['user_rfc_afiliado'] );
    update_user_meta( $user_id, 'user_fecha_afiliacion',  $_POST['user_fecha_afiliacion'] );
    update_user_meta( $user_id, 'user_fecha_arenovacion', $_POST['user_fecha_arenovacion'] );
    update_user_meta( $user_id, 'user_fecha_beneficios',  $_POST['user_fecha_beneficios'] );
    update_user_meta( $user_id, 'user_fecha_baja',        $_POST['user_fecha_baja'] );
    update_user_meta( $user_id, 'user_contacto',          $_POST['user_contacto'] );
    update_user_meta( $user_id, 'user_direccion',         $_POST['user_direccion'] );
    update_user_meta( $user_id, 'user_email_contacto',    $_POST['user_email_contacto'] );
    update_user_meta( $user_id, 'user_whatsapp_contacto', $_POST['user_whatsapp_contacto'] );
    update_user_meta( $user_id, 'user_rfc_dac',           $_POST['user_rfc_dac'] );
    update_user_meta( $user_id, 'pits_nombre',            $_POST['pits_nombre'] );
    update_user_meta( $user_id, 'pits',                   $_POST['pits'] );
    update_user_meta( $user_id, 'user_estatus',           $_POST['user_estatus'] );
    update_user_meta( $user_id, 'selec_dac',              $_POST['selec_dac'] );
    update_user_meta( $user_id, 'selec_promotor',         $_POST['selec_promotor'] );
    update_user_meta( $user_id, 'user_ctegoria',          $_POST['user_ctegoria'] );
}




function Facturas_ini() {

    $labels = array(
        'name'               => _x( 'Facturas', 'post type general name',  'your-plugin-textdomain' ),
        'singular_name'      => _x( 'Facturas', 'post type singular name', 'your-plugin-textdomain' ),
        'menu_name'          => _x( 'Facturas', 'admin menu', 'your-plugin-textdomain' ),
        'name_admin_bar'     => _x( 'Facturas', 'add new on admin bar', 'your-plugin-textdomain' ),
        'add_new'            => _x( 'Añadir nueva factura', 'logro', 'your-plugin-textdomain' ),
        'add_new_item'       => __( 'Añadir nueva factura', 'your-plugin-textdomain' ),
        'new_item'           => __( 'Nueva factura', 'your-plugin-textdomain' ),
        'edit_item'          => __( 'Editar factura', 'your-plugin-textdomain' ),
        'view_item'          => __( 'Ver factura', 'your-plugin-textdomain' ),
        'all_items'          => __( 'Todas las facturas', 'your-plugin-textdomain' ),
        'search_items'       => __( 'Search factura', 'your-plugin-textdomain' ),
        'parent_item_colon'  => __( 'Parent factura:', 'your-plugin-textdomain' ),
        'not_found'          => __( 'No factura found.', 'your-plugin-textdomain' ),
        'not_found_in_trash' => __( 'No factura found in Trash.', 'your-plugin-textdomain' )
    );



    $args = array(

        'labels'             => $labels,
        'description'        => __( 'Facturas.', 'your-plugin-textdomain' ),
        'public'             => true,
        'menu_icon'           => 'dashicons-admin-generic',
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'facturas_ag',
                                       'with_front' => false,
                                       'hierarchical' => true
                                       ),

        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 4,
        'supports'           => array('title')

    );



    register_post_type( 'facturas_agregadas', $args );

}

add_action( 'init', 'Facturas_ini' );



function Relacion_no_parte_ini() {

    $labels_relacion = array(
        'name'               => _x( 'Relación No parte', 'post type general name',  'your-plugin-textdomain' ),
        'singular_name'      => _x( 'Relación No parte', 'post type singular name', 'your-plugin-textdomain' ),
        'menu_name'          => _x( 'Relación No parte', 'admin menu', 'your-plugin-textdomain' ),
        'name_admin_bar'     => _x( 'Relación No parte', 'add new on admin bar', 'your-plugin-textdomain' ),
        'add_new'            => _x( 'Añadir nuevo producto', 'logro', 'your-plugin-textdomain' ),
        'add_new_item'       => __( 'Añadir nuevo producto', 'your-plugin-textdomain' ),
        'new_item'           => __( 'Nuevo producto', 'your-plugin-textdomain' ),
        'edit_item'          => __( 'Editar producto', 'your-plugin-textdomain' ),
        'view_item'          => __( 'Ver producto', 'your-plugin-textdomain' ),
        'all_items'          => __( 'Todos los productos', 'your-plugin-textdomain' ),
        'search_items'       => __( 'Search producto', 'your-plugin-textdomain' ),
        'parent_item_colon'  => __( 'Parent producto:', 'your-plugin-textdomain' ),
        'not_found'          => __( 'No producto found.', 'your-plugin-textdomain' ),
        'not_found_in_trash' => __( 'No producto found in Trash.', 'your-plugin-textdomain' )
    );



    $args_relacion = array(

        'labels'             => $labels_relacion,
        'description'        => __( 'Relación No parte', 'your-plugin-textdomain' ),
        'public'             => true,
        'menu_icon'           => 'dashicons-image-filter',
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'productos_no_parte',
                                       'with_front' => false,
                                       'hierarchical' => true
                                       ),

        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 4,
        'supports'           => array('title')

    );



    register_post_type( 'realcion_no_parte', $args_relacion );

}

add_action( 'init', 'Relacion_no_parte_ini' );


function taxonomiax() {
        register_taxonomy('categorias', 'realcion_no_parte', array(
                     'hierarchical'               => true,
                     'label'                      => 'Categorias',
                     'show_admin_column'          => true,
                     'show_in_nav_menus'          => true,
                     'show_ui'                    => true,
                     ));

        register_taxonomy('promotor', 'facturas_agregadas', array(
                     'hierarchical'               => true,
                     'label'                      => 'Promotor',
                     'show_admin_column'          => true,
                     'show_in_nav_menus'          => true,
                     'show_ui'                    => true,
                     ));
        register_taxonomy('dac_padre', 'facturas_agregadas', array(
                     'hierarchical'               => true,
                     'label'                      => 'Dac',
                     'show_admin_column'          => true,
                     'show_in_nav_menus'          => true,
                     'show_ui'                    => true,
                     ));
           }
    add_action('init', 'taxonomiax', 0);

function Formulario_relacion_no_parte(){
    add_meta_box( 'meta-box-ids', __( 'Informacion de productos', 'INFORMACION_PRODUCTOS' ), 'formulario_de_producto', 'realcion_no_parte');
}
add_action( 'add_meta_boxes', 'Formulario_relacion_no_parte' );



function formulario_de_producto($post){
  $tipo_linea                = get_post_meta($post->ID, 'tipo_linea', true);
  $sku_product               = get_post_meta($post->ID, 'sku_product', true);
  ?>

<h3><b class="masw">Información producto</b></h3>

<table class="total_ancho">
   <tr>
       <td><label>Tipo de linea</label></td>
       <td>: <input type="text" name="tipo_linea" value="<?php echo htmlspecialchars($tipo_linea);?>"></td>
   </tr>
   <tr>
      <td> <label>Sku producto</label></td>
      <td>: <input type="text" name="sku_product" value="<?php echo htmlspecialchars($sku_product);?>"></td>
  </tr>
</table>

  <?php
}


function Formulario_sucursales_z(){
    add_meta_box( 'meta-box-ids', __( 'Facturas datos', 'INFORMACION_SUCURSALES' ), 'formulario_detalles_producto', 'facturas_agregadas');
}
add_action( 'add_meta_boxes', 'Formulario_sucursales_z' );




function formulario_detalles_producto($post){

$ftrs_version             = get_post_meta($post->ID, 'ftrs_version', true);
$ftrs_serie               = get_post_meta($post->ID, 'ftrs_serie', true);
$ftrs_folio               = get_post_meta($post->ID, 'ftrs_folio', true);
$ftrs_fecha               = get_post_meta($post->ID, 'ftrs_fecha', true);
$ftrs_emisor_rfc          = get_post_meta($post->ID, 'ftrs_emisor_rfc', true);
$ftrs_emisor_nombre       = get_post_meta($post->ID, 'ftrs_emisor_nombre', true);
$ftrs_emisor_regimen      = get_post_meta($post->ID, 'ftrs_emisor_regimen', true);
$ftrs_receptor_rfc        = get_post_meta($post->ID, 'ftrs_receptor_rfc', true);
$ftrs_receptor_nombre     = get_post_meta($post->ID, 'ftrs_receptor_nombre', true);
$ftrs_receptor_regimen    = get_post_meta($post->ID, 'ftrs_receptor_regimen', true);

$ftrs_url_pdf             = get_post_meta($post->ID, 'ftrs_url_pdf', true);
$ftrs_url_xml             = get_post_meta($post->ID, 'ftrs_url_xml', true);

$ftrs_ttl_automatic       = get_post_meta($post->ID, 'ftrs_ttl_automatic', true);
$ftrs_ttl_bogas           = get_post_meta($post->ID, 'ftrs_ttl_bogas', true);
$ftrs_ttl_extream         = get_post_meta($post->ID, 'ftrs_ttl_extream', true);
$nombre_afiliado          = get_post_meta($post->ID, 'nombre_afiliado', true);
$id_afiliado              = get_post_meta($post->ID, 'id_afiliado', true);

?>

<h3><b class="masw">Detalles Afiliado</b></h3>

<table class="total_ancho">
   <tr>
       <td><label>ID Afiliado</label></td>
       <td>: <input type="text" name="id_afiliado" value="<?php echo htmlspecialchars($id_afiliado);?>"></td>
   </tr>
   <tr>
      <td> <label>Nombre Afiliado</label></td>
      <td>: <input type="text" name="nombre_afiliado" value="<?php echo htmlspecialchars($nombre_afiliado);?>"></td>
  </tr>
</table>

<h3><b class="masw">Ventas totales</b></h3>

<table class="total_ancho">
   <tr>
       <td><label>Consumo AUTOMATIC</label></td>
       <td>: <input type="text" name="ftrs_ttl_automatic" value="<?php echo htmlspecialchars($ftrs_ttl_automatic);?>"></td>
   </tr>
   <tr>
      <td> <label>Consumo BOGAS</label></td>
      <td>: <input type="text" name="ftrs_ttl_bogas" value="<?php echo htmlspecialchars($ftrs_ttl_bogas);?>"></td>
  </tr>
     <tr>
      <td> <label>Consumo EXTREME</label></td>
      <td>: <input type="text" name="ftrs_ttl_extream" value="<?php echo htmlspecialchars($ftrs_ttl_extream);?>"></td>
  </tr>
</table>


<h3><b class="masw">Detalles de Factura</b></h3>

<table class="total_ancho">
  <tr>
     <td><label>Factura version</label></td>
     <td>: <input type="text" name="ftrs_version" value="<?php echo htmlspecialchars($ftrs_version);?>"></td>
  </tr>
  <tr>
        <td><label>Factura serie</label></td>
        <td>: <input type="text" name="ftrs_serie" value="<?php echo htmlspecialchars($ftrs_serie);?>"></td>
   </tr>
     <tr>
        <td><label>Factura folio</label></td>
        <td>: <input type="text" name="ftrs_folio" value="<?php echo htmlspecialchars($ftrs_folio);?>"></td>
   </tr>
  <tr>
        <td><label>Factura fecha</label></td>
        <td>: <input type="text" name="ftrs_fecha" value="<?php echo htmlspecialchars($ftrs_fecha);?>"></td>
  </tr>
    <tr>
        <td><label>Factura emisor rfc</label></td>
        <td>: <input type="text" name="ftrs_emisor_rfc" value="<?php echo htmlspecialchars($ftrs_emisor_rfc);?>"></td>
  </tr>
  <tr>
        <td><label>Factura emisor nombre </label></td>
        <td>: <input type="text" name="ftrs_emisor_nombre" value="<?php echo htmlspecialchars($ftrs_emisor_nombre);?>"></td>
  </tr>
  <tr>
        <td><label>Factura emisor regimen </label></td>
        <td>: <input type="text" name="ftrs_emisor_regimen" value="<?php echo htmlspecialchars($ftrs_emisor_regimen);?>"></td>
  </tr>
    <tr>
        <td><label>Factura receptor rfc </label></td>
        <td>: <input type="text" name="ftrs_receptor_rfc" value="<?php echo htmlspecialchars($ftrs_receptor_rfc);?>"></td>
    </tr>
      <tr>
        <td><label>Factura receptor nombre </label></td>
        <td>: <input type="text" name="ftrs_receptor_nombre" value="<?php echo htmlspecialchars($ftrs_receptor_nombre);?>"></td>
    </tr>
<tr>
        <td><label>Factura receptor regimen </label></td>
        <td>: <input type="text" name="ftrs_receptor_regimen" value="<?php echo htmlspecialchars($ftrs_receptor_regimen);?>"></td>
    </tr>

 </table>

 <h3><b class="masw">Archivos de Factura</b></h3>

<table class="total_ancho">
   <tr>
       <td><label>PDF</label></td>
       <td>: <input type="text" name="ftrs_url_pdf" value="<?php echo htmlspecialchars($ftrs_url_pdf);?>"></td>
        <td><a href="<?php echo htmlspecialchars($ftrs_url_pdf);?>" target="_blank">
          <i class=" color_f fa fa-file-pdf-o fa-2x" aria-hidden="true"></i></a>
        </td>
   </tr>
   <tr>
      <td> <label>XML</label></td>
      <td>: <input type="text" name="ftrs_url_xml" value="<?php echo htmlspecialchars($ftrs_url_xml);?>"></td>
      <td><a href="<?php echo htmlspecialchars($ftrs_url_xml);?>" target="_blank" >
          <i class="color_f fa fa-file-text-o fa-2x" aria-hidden="true"></i></a>
      </td>
  </tr>
</table>


 <h3><b class="masw">Productos adquiridos AUTOMATIC</b></h3>
<table class="automatic_p">
   <tr>
       <th class="mas_b"><label><b>Sku</b></label></th>
       <th class="mas_b"><label><b>Cantidad </b></label></th>
       <th class="mas_b"><label><b>Descripción </b></label></th>
       <th class="mas_b"><label><b></b>Importe pza</label></th>
       <th class="mas_b"><label><b>Importe total</b></label></th>
   </tr>
   <?php wp_nonce_field(PLUGIN_BASENAME, 'property_noncename');

        $automatic_list_product = esc_html(get_post_meta($post->ID, 'automatic_list_product', true));
        $automatic_list_product2 = esc_html(get_post_meta($post->ID, 'automatic_list_product2', true));
        $automatic_list_product3 = esc_html(get_post_meta($post->ID, 'automatic_list_product3', true));
        $automatic_list_product4 = esc_html(get_post_meta($post->ID, 'automatic_list_product4', true));
        $automatic_list_product5 = esc_html(get_post_meta($post->ID, 'automatic_list_product5', true));
        $automatic_list_product_sku = esc_html(get_post_meta($post->ID, 'automatic_list_product_sku', true));

print '

<input type="hidden" id="automatic_list_product_sku" name="automatic_list_product_sku" value="' . esc_attr(get_post_meta($post->ID, 'automatic_list_product_sku', true)) . '" />
<input type="hidden" id="automatic_list_product" name="automatic_list_product" value="' . esc_attr(get_post_meta($post->ID, 'automatic_list_product', true)) . '" />
<input type="hidden" id="automatic_list_product2" name="automatic_list_product2" value="' . esc_attr(get_post_meta($post->ID, 'automatic_list_product2', true)) . '" />
<input type="hidden" id="automatic_list_product3" name="automatic_list_product3" value="' . esc_attr(get_post_meta($post->ID, 'automatic_list_product3', true)) . '" />
<input type="hidden" id="automatic_list_product4" name="automatic_list_product4" value="' . esc_attr(get_post_meta($post->ID, 'automatic_list_product4', true)) . '" />
<input type="hidden" id="automatic_list_product5" name="automatic_list_product5" value="' . esc_attr(get_post_meta($post->ID, 'automatic_list_product5', true)) . '" />

';
$sku_product_autm = explode('~~~', $automatic_list_product_sku);
$descr_product_autm = explode('~~~', $automatic_list_product);
$cantidad_product_autm = explode('~~~', $automatic_list_product2);
$unitario_product_autm = explode('~~~', $automatic_list_product4);
$importe_product_autm = explode('~~~', $automatic_list_product5);
$cant_product_autm = $automatic_list_product3;
         $mas_a_1=1;  $mas_a_2=1;  $mas_a_3=1;  $mas_a_4=1;  $mas_a_5=1;



for ($i=1; $i <=$cant_product_autm; $i++) {

echo '
<tr>
<td><label>'.$sku_product_autm[$i].'</label></td>
<td><label>'.round($cantidad_product_autm[$i]).' PZA</label></td>
<td><label>'.$descr_product_autm[$i].'</label></td>
<td><label>$'.$unitario_product_autm[$i].'</label></td>
<td><label>$'.$importe_product_autm[$i].'</label></td>
</tr>
';
$sumado_automatic += $importe_product_autm[$i];

}

?>


</table>

 <h3><b class="masw">Productos adquiridos BOGAS</b></h3>
<table class="automatic_p">
   <tr>
       <th class="mas_b"><label><b>Sku</b></label></th>
       <th class="mas_b"><label><b>Cantidad </b></label></th>
       <th class="mas_b"><label><b>Descripción </b></label></th>
       <th class="mas_b"><label><b></b>Importe pza</label></th>
       <th class="mas_b"><label><b>Importe total</b></label></th>
   </tr>
   <?php wp_nonce_field(PLUGIN_BASENAME, 'property_noncename');

        $bogas_list_product = esc_html(get_post_meta($post->ID, 'bogas_list_product', true));
        $bogas_list_product2 = esc_html(get_post_meta($post->ID, 'bogas_list_product2', true));
        $bogas_list_product3 = esc_html(get_post_meta($post->ID, 'bogas_list_product3', true));
        $bogas_list_product4 = esc_html(get_post_meta($post->ID, 'bogas_list_product4', true));
        $bogas_list_product5 = esc_html(get_post_meta($post->ID, 'bogas_list_product5', true));
        $bogas_list_product_sku = esc_html(get_post_meta($post->ID, 'bogas_list_product_sku', true));

print '
<input type="hidden" id="bogas_list_product_sku" name="bogas_list_product_sku" value="' . esc_attr(get_post_meta($post->ID, 'bogas_list_product_sku', true)) . '" />
<input type="hidden" id="bogas_list_product" name="bogas_list_product" value="' . esc_attr(get_post_meta($post->ID, 'bogas_list_product', true)) . '" />
<input type="hidden" id="bogas_list_product2" name="bogas_list_product2" value="' . esc_attr(get_post_meta($post->ID, 'bogas_list_product2', true)) . '" />
<input type="hidden" id="bogas_list_product3" name="bogas_list_product3" value="' . esc_attr(get_post_meta($post->ID, 'bogas_list_product3', true)) . '" />
<input type="hidden" id="bogas_list_product4" name="bogas_list_product4" value="' . esc_attr(get_post_meta($post->ID, 'bogas_list_product4', true)) . '" />
<input type="hidden" id="bogas_list_product5" name="bogas_list_product5" value="' . esc_attr(get_post_meta($post->ID, 'bogas_list_product5', true)) . '" />
';
?>

<?php
$sku_product_bogas = explode('~~~', $bogas_list_product_sku);
$descr_product_bogas = explode('~~~', $bogas_list_product);
$cantidad_product_bogas = explode('~~~', $bogas_list_product2);
$unitario_product_bogas = explode('~~~', $bogas_list_product4);
$importe_product_bogas = explode('~~~', $bogas_list_product5);
$cant_product_bogas = $bogas_list_product3;
         $mas_a_1b=1;  $mas_a_2b=1;  $mas_a_3b=1;  $mas_a_4b=1;  $mas_a_5b=1;



for ($i=1; $i <=$cant_product_bogas; $i++) {
echo '
<tr>
<td><label>'.$sku_product_bogas[$i].'</label></td>
<td><label>'.round($cantidad_product_bogas[$i]).' PZA</label></td>
<td><label>'.$descr_product_bogas[$i].'</label></td>
<td><label>$'.$unitario_product_bogas[$i].'</label></td>
<td><label>$'.$importe_product_bogas[$i].'</label></td>
</tr>
';
$sumado_bogas += $importe_product_bogas[$i];
}

?>


</table>
 <h3><b class="masw">Productos adquiridos EXTREME</b></h3>
<table class="automatic_p">
   <tr>
       <th class="mas_b"><label><b>Sku</b></label></th>
       <th class="mas_b"><label><b>Cantidad </b></label></th>
       <th class="mas_b"><label><b>Descripción </b></label></th>
       <th class="mas_b"><label><b></b>Importe pza</label></th>
       <th class="mas_b"><label><b>Importe total</b></label></th>
   </tr>
   <?php wp_nonce_field(PLUGIN_BASENAME, 'property_noncename');

        $extrem_list_product = esc_html(get_post_meta($post->ID, 'extrem_list_product', true));
        $extrem_list_product2 = esc_html(get_post_meta($post->ID, 'extrem_list_product2', true));
        $extrem_list_product3 = esc_html(get_post_meta($post->ID, 'extrem_list_product3', true));
        $extrem_list_product4 = esc_html(get_post_meta($post->ID, 'extrem_list_product4', true));
        $extrem_list_product5 = esc_html(get_post_meta($post->ID, 'extrem_list_product5', true));
        $extrem_list_product_sku = esc_html(get_post_meta($post->ID, 'extrem_list_product_sku', true));

print '
<input type="hidden" id="extrem_list_product_sku" name="extrem_list_product_sku" value="' . esc_attr(get_post_meta($post->ID, 'extrem_list_product_sku', true)) . '" />
<input type="hidden" id="extrem_list_product" name="extrem_list_product" value="' . esc_attr(get_post_meta($post->ID, 'extrem_list_product', true)) . '" />
<input type="hidden" id="extrem_list_product2" name="extrem_list_product2" value="' . esc_attr(get_post_meta($post->ID, 'extrem_list_product2', true)) . '" />
<input type="hidden" id="extrem_list_product3" name="extrem_list_product3" value="' . esc_attr(get_post_meta($post->ID, 'extrem_list_product3', true)) . '" />
<input type="hidden" id="extrem_list_product4" name="extrem_list_product4" value="' . esc_attr(get_post_meta($post->ID, 'extrem_list_product4', true)) . '" />
<input type="hidden" id="extrem_list_product5" name="extrem_list_product5" value="' . esc_attr(get_post_meta($post->ID, 'extrem_list_product5', true)) . '" />
';
?>

<?php
$sku_product_extrem      = explode('~~~', $extrem_list_product_sku);
$descr_product_extrem    = explode('~~~', $extrem_list_product);
$cantidad_product_extrem = explode('~~~', $extrem_list_product2);
$unitario_product_extrem = explode('~~~', $extrem_list_product4);
$importe_product_extrem  = explode('~~~', $extrem_list_product5);
$cant_product_extrem     = $extrem_list_product3;
         $mas_a_1b=1;  $mas_a_2b=1;  $mas_a_3b=1;  $mas_a_4b=1;  $mas_a_5b=1;



for ($i=1; $i <=$cant_product_extrem; $i++) {
echo '
<tr>
<td><label>'.$sku_product_extrem[$i].'</label></td>
<td><label>'.round($cantidad_product_extrem[$i]).' PZA</label></td>
<td><label>'.$descr_product_extrem[$i].'</label></td>
<td><label>$'.$unitario_product_extrem[$i].'</label></td>
<td><label>$'.$importe_product_extrem[$i].'</label></td>
</tr>
';
$sumado_xtream += $importe_product_extrem[$i];
}



?>
</table>

<?php
}





function Guardar_contenido_entrada( $post_id ) {
if(isset($_POST['ftrs_version'])){update_post_meta($post_id,'ftrs_version',$_POST['ftrs_version']);}
if(isset($_POST['ftrs_serie'])){update_post_meta($post_id,'ftrs_serie',$_POST['ftrs_serie']);}
if(isset($_POST['ftrs_folio'])){update_post_meta($post_id,'ftrs_folio',$_POST['ftrs_folio']);}
if(isset($_POST['ftrs_fecha'])){update_post_meta($post_id,'ftrs_fecha',$_POST['ftrs_fecha']);}
if(isset($_POST['ftrs_emisor_rfc'])){update_post_meta($post_id,'ftrs_emisor_rfc',$_POST['ftrs_emisor_rfc']);}
if(isset($_POST['ftrs_emisor_nombre'])){update_post_meta($post_id,'ftrs_emisor_nombre',$_POST['ftrs_emisor_nombre']);}
if(isset($_POST['ftrs_emisor_regimen'])){update_post_meta($post_id,'ftrs_emisor_regimen',$_POST['ftrs_emisor_regimen']);}
if(isset($_POST['ftrs_receptor_rfc'])){update_post_meta($post_id,'ftrs_receptor_rfc',$_POST['ftrs_receptor_rfc']);}
if(isset($_POST['ftrs_receptor_nombre'])){update_post_meta($post_id,'ftrs_receptor_nombre',$_POST['ftrs_receptor_nombre']);}
if(isset($_POST['ftrs_receptor_regimen'])){update_post_meta($post_id,'ftrs_receptor_regimen',$_POST['ftrs_receptor_regimen']);}
if(isset($_POST['ftrs_url_pdf'])){update_post_meta($post_id,'ftrs_url_pdf',$_POST['ftrs_url_pdf']);}
if(isset($_POST['ftrs_url_xml'])){update_post_meta($post_id,'ftrs_url_xml',$_POST['ftrs_url_xml']);}
if(isset($_POST['ftrs_ttl_automatic'])){update_post_meta($post_id,'ftrs_ttl_automatic',$_POST['ftrs_ttl_automatic']);}
if(isset($_POST['ftrs_ttl_bogas'])){update_post_meta($post_id,'ftrs_ttl_bogas',$_POST['ftrs_ttl_bogas']);}
if(isset($_POST['ftrs_ttl_extream'])){update_post_meta($post_id,'ftrs_ttl_extream',$_POST['ftrs_ttl_extream']);}
if(isset($_POST['tipo_linea'])){update_post_meta($post_id,'tipo_linea',$_POST['tipo_linea']);}
if(isset($_POST['sku_product'])){update_post_meta($post_id,'sku_product',$_POST['sku_product']);}
if(isset($_POST['automatic_list_product'])) {update_post_meta($post_id, 'automatic_list_product', sanitize_text_field($_POST['automatic_list_product']));}
if(isset($_POST['automatic_list_product2'])) {update_post_meta($post_id, 'automatic_list_product2', sanitize_text_field($_POST['automatic_list_product2']));}
if(isset($_POST['automatic_list_product3'])) {update_post_meta($post_id, 'automatic_list_product3', sanitize_text_field($_POST['automatic_list_product3']));}
if(isset($_POST['automatic_list_product4'])) {update_post_meta($post_id, 'automatic_list_product4', sanitize_text_field($_POST['automatic_list_product4']));}
if(isset($_POST['automatic_list_product5'])) {update_post_meta($post_id, 'automatic_list_product5', sanitize_text_field($_POST['automatic_list_product5']));}
if(isset($_POST['automatic_list_product_sku'])) {update_post_meta($post_id, 'automatic_list_product_sku', sanitize_text_field($_POST['automatic_list_product_sku']));}
if(isset($_POST['imagen_descarga'])) {update_post_meta($post_id, 'imagen_descarga', sanitize_text_field($_POST['imagen_descarga']));}
if(isset($_POST['nombre_afiliado'])) {update_post_meta($post_id, 'nombre_afiliado', sanitize_text_field($_POST['nombre_afiliado']));}
if(isset($_POST['id_afiliado'])) {update_post_meta($post_id, 'id_afiliado', sanitize_text_field($_POST['id_afiliado']));}
 }
add_action( 'save_post', 'Guardar_contenido_entrada' );
add_action( 'template_redirect', 'wc_custom_redirect_after_purchase' );

function wc_custom_redirect_after_purchase() {
    global $wp;

    if ( is_checkout() && ! empty( $wp->query_vars['order-received'] ) ) {
        wp_redirect( ''.home_url().'/gracias/' );
        exit;
    }
}



function nuevoformularioslaider($post) {
wp_nonce_field(PLUGIN_BASENAME, 'property_noncename');
global $post;
$todo          = get_post_meta($post->ID, 'imagen_descarga', true);
?>


<div>
<table class="wrap2">
  <tr>
        <td class="alturastd">

            <fieldset class="form_fechas">


            <legend ><h2>Url de Convenio</h2></legend ><br>


<input type="button" id="boton_img" class="botton" value="<?php _e( 'Selecciona pdf', 'imagen_descarga' )?>" />
<input type="text"  class="caja_boton" name="imagen_descarga" id="imagen_descarga" value="<?php echo htmlspecialchars($todo);?>" />


          </fieldset>
        </td>
      </tr>
    </table>
  </div>




<?php
}


function pdf_pag() {

global $typenow;

    if( $typenow == 'page' ) {
        wp_enqueue_media();
        wp_register_script( 'meta-box-imagen_descarga',get_template_directory_uri().'/js/admin.js?ver:1.01', array( 'jquery' ) );
        wp_localize_script( 'meta-box-imagen_descarga', 'meta_imagen_descarga',
            array(
                'title' => __( 'PDF', 'imagen_descarga' ),
                'button' => __( 'Usar pdf', 'imagen_descarga' ),
                'library' => 'pdf'
            )
        );
        wp_enqueue_script( 'meta-box-imagen_descarga' );
   }
}
add_action( 'admin_enqueue_scripts', 'pdf_pag' );






function Page_Home() {

$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
 if ($post_id == '677'){
  //add_meta_box( 'MI_META_BOX', __( 'Formulario', 'INFORMACION_EDITORES' ), 'Editores_home', 'page' );
  add_meta_box('property-gallery-section', __('Slider Mathasa', 'reales'), 'nuevoformularioslaider', 'page', 'normal', 'default');
 }
}

add_action( 'add_meta_boxes', 'Page_Home' );


 /**
 * Adjust the quantity input values
 */
add_filter( 'woocommerce_quantity_input_args', 'jk_woocommerce_quantity_input_args', 10, 2 ); // Simple products

function jk_woocommerce_quantity_input_args( $args, $product ) {

  if ( is_singular( 'product' ) ) {
    $args['input_value']  = 2;  // Starting value (we only want to affect product pages, not cart)
  }
  $args['max_value']  = 80;   // Maximum value
  $args['min_value']  = 0;    // Minimum value
  $args['step']     = 0;    // Quantity steps
  return $args;
}

add_filter( 'woocommerce_available_variation', 'jk_woocommerce_available_variation' ); // Variations

function jk_woocommerce_available_variation( $args ) {


  $args['max_qty'] = 80;    // Maximum value (variations)
  $args['min_qty'] = 0;     // Minimum value (variations)
  return $args;
}


// add_filter( 'woocommerce_loop_add_to_cart_link', 'quantity_inputs_for_woocommerce_loop_add_to_cart_link', 10, 2 );
// function quantity_inputs_for_woocommerce_loop_add_to_cart_link( $html, $product ) {
//   if ( $product && $product->is_type( 'simple' ) && $product->is_purchasable() && $product->is_in_stock() && ! $product->is_sold_individually() ) {
//     $html = '<form action="' . esc_url( $product->add_to_cart_url() ) . '" class="cart" method="post" enctype="multipart/form-data">';
//     $html .= woocommerce_quantity_input( array(), $product, false );
//     $html .= '<button type="submit" class="button alt">' . esc_html( $product->add_to_cart_text() ) . '</button>';
//     $html .= '</form>';
//   }
//   return $html;
// }




function mostrar_redes(){   ?>
 <form class="" method="POST" action="options.php">
<?php
settings_fields('conasa-max-length-content-settings-group');
do_settings_sections( 'conasa-max-length-content-settings-group' );
?>




<table class="wrap2" >
  <tr>
    <td class="alturastd">
    	    <span class="fa-stack fa-1x">
            <i class="color_circulo  fa fa-circle fa-stack-2x"></i>
            <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
            </span>
            <input  class="cajaredsociales" type="text" name="Facebook" id="Facebook" value="<?php echo get_option('Facebook'); ?>" placeholder=" Coloca Url Facebook " />
   </td>
   <td class="alturastd">
    	   <span class="fa-stack fa-1x">
           <i class="color_circulo  fa fa-circle fa-stack-2x"></i>
           <i class="fa fa-instagram fa-stack-1x fa-inverse"></i>
           </span>
           <input class="cajaredsociales" type="text" name="Instagram" id="Instagram" value="<?php echo get_option('Instagram'); ?>" placeholder=" Coloca Url Instagram " />
    </td>

    <td class="alturastd">
			<span class="fa-stack fa-1x">
			<i class="color_circulo  fa fa-circle fa-stack-2x"></i>
			  <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
			</span>
			<input class="cajaredsociales" type="url" name="Twitter" id="Twitter" value="<?php echo get_option('Twitter'); ?>" placeholder=" Coloca Url Twitter " />

    </td>
</tr>
<tr>
<td class="alturastd">
			<span class="fa-stack fa-1x">
		    <i class=" color_circulo fa fa-circle fa-stack-2x"></i>
		    <i class="fa fa-linkedin fa-stack-1x fa-inverse"></i>
		    </span>
		    <input class="cajaredsociales" type="url" name="LinkedIn" id="LinkedIn" value="<?php echo get_option('LinkedIn'); ?>" placeholder=" Coloca Url LinkedIn " />
</td>
<td class="alturastd">
			<span class="fa-stack fa-1x">
			<i class=" color_circulo fa fa-circle fa-stack-2x"></i>
			  <i class="fa fa-vimeo-square fa-stack-1x fa-inverse"></i>
			</span>
			<input class="cajaredsociales" type="url" name="Vimeo" id="Vimeo" value="<?php echo get_option('Vimeo'); ?>" placeholder=" Coloca Url Vimeo " />
</td>
<td class="alturastd">
			<span class="fa-stack fa-1x">
			<i class=" color_circulo fa fa-circle fa-stack-2x"></i>
			  <i class="fa fa-youtube fa-stack-1x fa-inverse"></i>
			</span>
			<input class="cajaredsociales"  type="url"  name="Youtube" id="Youtube" value="<?php echo get_option('Youtube'); ?>" placeholder=" Coloca Url Youtube " />
</td>
</tr>
<tr>
<td class="alturastd">
			<span class="fa-stack fa-1x">
			<i class="color_circulo  fa fa-circle fa-stack-2x"></i>
			  <i class="fa fa-pinterest-p fa-stack-1x fa-inverse"></i>
			</span>
			 <input class="cajaredsociales" type="url" name="Pinterest" id="Pinterest" value="<?php echo get_option('Pinterest'); ?>" placeholder=" Coloca Url Pinterest " />
</td>
<td class="alturastd">
<span class="fa-stack fa-1x">
<i class="color_circulo  fa fa-circle fa-stack-2x"></i>
  <i class="fa fa-google-plus fa-stack-1x fa-inverse"></i>
</span>
                    <input  class="cajaredsociales"

                             type="url"

                             name="googleplus"

                             id="googleplus"

                             value="<?php echo get_option('googleplus'); ?>" placeholder=" Coloca url de Google Plus" />
</td>
<td class="alturastd">
<span class="fa-stack fa-1x">

<i class="color_circulo  fa fa-circle fa-stack-2x"></i>
  <i class="fa fa-envelope-o  fa-stack-1x fa-inverse"></i>
</span>
                    <input  class="cajaredsociales"

                             type="email"

                             name="correo1"

                             id="correo1"

                             value="<?php echo get_option('correo1'); ?>" placeholder=" Coloca E-mail" />
</td>
</tr>
<tr>
<td class="alturastd">
<span class="fa-stack fa-1x">
<i class=" color_circulo fa fa-circle fa-stack-2x"></i>
  <i class="fa fa-phone  fa-stack-1x fa-inverse"></i>
</span>
                    <input  class="cajaredsociales"

                             type="tel"

                             name="telefono"

                             id="telefono"

                             value="<?php echo get_option('telefono'); ?>" placeholder=" Coloca Telefono" />
</td>

<td class="alturastd">
					<span class="fa-stack fa-1x">
					<i class="color_circulo fa fa-circle fa-stack-2x"></i>
					  <i class="fa fa-map-marker  fa-stack-1x fa-inverse"></i>
					</span>
					    <textarea class="cajaredsociales" name="ubicacion" id="ubicacion"

					     placeholder=" Coloca la Ubicación" /><?php echo get_option('ubicacion'); ?></textarea>
</td>
<td class="alturastd">
					<span class="fa-stack fa-1x">


					<i class="color_circulo  fa fa-circle fa-stack-2x"></i>
					  <i class="fa fa-bar-chart fa-stack-1x fa-inverse"></i>
					</span>
					<input class="cajaredsociales" type="text" name="Analytics"  id="Analytics" value="<?php echo get_option('Analytics'); ?>" placeholder=" Coloca tus digitos de Analytics " />
</td>






  </tr>

</table>



  <div style="clear:both"></div>

<table id="table_mer" >
  <tr style="">
    <td class="alturastd" >

<input class="cajaredsociales"  style="width: 50%;"  type="text" name="nombre_reporte_ejecutivo" data-entradas="<?php echo get_option('nombre_reporte_ejecutivo'); ?>"  id="nombre_reporte_ejecutivo" value="<?php echo get_option('nombre_reporte_ejecutivo'); ?>" placeholder="Nombre reporte" />

<input  style="width: 50%;"  id="miexel" type="button" value="Selecciona archivo"><br>
<input style="width: 50%;" class="cajaredsociales" type="text" name="reporte_ejecutivo" data-entradas="<?php echo get_option('reporte_ejecutivo'); ?>"  id="reporte_ejecutivo" value="<?php echo get_option('reporte_ejecutivo'); ?>" placeholder=" " />
</td>
  </tr>
</table>
<?php submit_button(); ?>

</form>


<?php
}


function redes_sociales() {

add_menu_page( 'Redes_sociales', 'Redes sociales', 'manage_options', '/Redes_sociales/', 'mostrar_redes', 'dashicons-share', 20);
wp_enqueue_media();
wp_register_script( 'meta-box-imagen_descarga',get_template_directory_uri().'/js/admin.js?ver:1.01', array( 'jquery' ) );
wp_localize_script( 'meta-box-imagen_descarga', 'meta_imagen_descarga',
    array(
        'title' => __( 'Exel', 'imagen_descarga' ),
        'button' => __( 'Usar exel', 'imagen_descarga' ),
        'library' => 'exel'
    )
);
wp_enqueue_script( 'meta-box-imagen_descarga' );

}
add_action( 'admin_menu', 'redes_sociales' );

function conasa_max_length_content_settings(){

      register_setting('conasa-max-length-content-settings-group',

                     'Facebook'

                     );


      register_setting('conasa-max-length-content-settings-group',

                     'Instagram'

                     );

      register_setting('conasa-max-length-content-settings-group',

                     'LinkedIn'

                     );

      register_setting('conasa-max-length-content-settings-group',

                     'Youtube'

                     );

      register_setting('conasa-max-length-content-settings-group',

                     'Vimeo'

                     );

      register_setting('conasa-max-length-content-settings-group',

                     'Twitter'

                     );

      register_setting('conasa-max-length-content-settings-group',

                     'Analytics'

                     );

      register_setting('conasa-max-length-content-settings-group',

                     'Pinterest'

                     );

      register_setting('conasa-max-length-content-settings-group',

                     'correo1'

                     );

      register_setting('conasa-max-length-content-settings-group',

                     'telefono'

                     );
      register_setting('conasa-max-length-content-settings-group',

                    'ubicacion'

                    );
      register_setting('conasa-max-length-content-settings-group',

                     'googleplus'

                     );
     register_setting('conasa-max-length-content-settings-group',

                     'reporte_ejecutivo'

                     );
    register_setting('conasa-max-length-content-settings-group',

                                     'nombre_reporte_ejecutivo'

                                     );

}

add_action('admin_init','conasa_max_length_content_settings');

?>

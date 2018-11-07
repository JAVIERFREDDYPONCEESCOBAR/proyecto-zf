<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);
define('WP_USE_THEMES', false);
require('../../../../wp-load.php');

$nombre       = $_REQUEST['nombre'];
$email        = $_REQUEST['email'];
$email_contac = $_REQUEST['email_contacto'];
$contrasena   = $_REQUEST['pwd'];
$rol          = $_REQUEST['rol'];
$apellidos    = $_REQUEST['apellidos'];
$id_usuario   = $_REQUEST['id_usuario'];
$password = md5($contrasena);

       wp_update_user( array(
           'ID'         => $id_usuario,
           'user_pass'  =>  $contrasena,
           'user_email' => $email
      ) );

       update_user_meta( $id_usuario, 'first_name', $nombre );
       update_user_meta( $id_usuario, 'last_name', $apellidos );
       update_user_meta( $id_usuario, 'billing_first_name', $nombre );
       update_user_meta( $id_usuario, 'billing_last_name', $apellidos );
       update_user_meta( $id_usuario, 'billing_email', $email );
       update_user_meta( $id_usuario, 'user_email', $email );
       update_user_meta( $id_usuario, 'user_email_contacto', $email_contac );
       wp_new_user_notification( $id_usuario, 'both' );
     //}
     echo "listo";
?>

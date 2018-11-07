<?php 
include 'header.php';
if ( is_user_logged_in() ) { 
if ( ($current_user->roles[0] =='administradorpvp')||($current_user->roles[0] =='administrator') ) {
  include 'componentes/menu.php';
}elseif ( ($current_user->roles[0] =='administradordac')||($current_user->roles[0] =='administrator') ) {
  include 'componentes/menu_dac.php';
}


 ?>




















<?php 
include 'componentes/menu_derecha.php';

} else { } 
include 'footer.php';
?>
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
<h1>Cambiar contraseña</h1>
 <form id="form_regustro_user">

   <div class="form-group">
       <label for="nombre">Bienvenido: <?php echo$current_user->data->user_login; ?></label>
       <input type="hidden" class="form-control" name="nombre" id="nombre" value="<?php echo$current_user->data->user_login; ?>">
   </div>

      <!-- <div class="form-group">
          <label for="email">Email:</label> -->
          <input type="hidden" class="form-control" name="email"  id="email" value="<?php echo$current_user->data->user_email; ?>">
      <!-- </div>-->
      <div class="form-group">
          <label for="email">Email de contacto:</label>
          <input type="email" class="form-control" name="email_contacto"  id="email_contacto" value="<?php echo$current_user->data->user_email; ?>">
      </div>
      <div class="form-group">
          <label for="pwd">Password:</label>
         <input type="password" class="form-control" name="pwd" id="pwd" value="<?php echo$current_user->data->user_pass; ?>">
      </div>
      <div class="form-group">
         <input type="hidden" class="form-control" name="rol"        id="rol"        value="<?php echo$current_user->roles[0]; ?>">
         <input type="hidden" class="form-control" name="apellidos"  id="apellidos"  value="<?php echo get_user_meta( $current_user->ID, 'billing_last_name')[0] ?>">
         <input type="hidden" class="form-control" name="id_usuario" id="id_usuario" value="<?php echo$current_user->ID; ?>">
      </div>


  <input type="button" id="frt" class="btn btn-primary" value="Guardar">
</form>

</div>
</div>
</section>



 <?php
 include 'componentes/menu_derecha.php';

 } else { }
 include 'footer.php';
 ?>

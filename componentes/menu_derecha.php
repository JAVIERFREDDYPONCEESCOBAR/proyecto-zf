
<section id="boton_menu">
  <div id="contenido_menup" class="wow pulse infinite">
    <i  id="botton_m" class="colrm fa fa-list fa-3x" aria-hidden="true"></i>
  </div>
</section>

<div class="col-md-12">
      <div id="menu_cat" class="menu_cat">
          <div class="cabecera_menu">
              <div class="container">
                  <div class="row">
                    <div class="col-md-6 text-center">
                        <label>Menu</label>
                    </div>
                    <div class="col-md-6">
                      <div class="acomodod  ">
                         <i id="cerrar"  class=" fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
                      </div>

                    </div>
                  </div>
              </div>
          </div>
            <div class="marco_capa">
              <ul class="nav flex-column">


<?php

if ($current_user->roles[0] =='administradorpvp') {
  //include 'componentes/menu.php';


     $nruy=1;
foreach ($Home_menu_pvp as $Menu_hf) {
  $active = ($url == $actual_link1) ? 'active' : '';
//print_r($Menu_h);
?>
      <li class=" nav-link<?php echo $active; ?>">
        <a class="inim<?php echo$nruy++; ?>" <?php if($Menu_hf->ID ==684){}else{echo 'href="'.$Menu_hf->url.'"';} ?>"><?php echo $Menu_hf->title; ?>
        </a>
      </li>
<?php } ?>


 <li class="nav-link ">
      <a href="<?php echo wp_logout_url( home_url() ); ?>">Cerrar sesión</a>
    </li>






<?php
}elseif($current_user->roles[0] =='administradordac') {

      $nruy=1;
foreach ($Home_menu_dac as $Menu_hf8) {
  $active = ($url == $actual_link1) ? 'active' : '';
//print_r($Menu_h);
?>
      <li class=" nav-link<?php echo $active; ?>">
        <a class="inim<?php echo$nruy++; ?>" <?php if($Menu_hf8->ID ==684){}else{echo 'href="'.$Menu_hf8->url.'"';} ?>"><?php echo $Menu_hf8->title; ?>
        </a>
      </li>
<?php } ?>
 <li class="nav-link ">
      <a href="<?php echo wp_logout_url( home_url() ); ?>">Cerrar sesión</a>
    </li>

    <?php
}

?>


              </ul>
            </div>
      </div>
    </div>

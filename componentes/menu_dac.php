  <section id="menu">
     <div class="container">
          <div class="col-md-12">
               <div class="primera_sec_menu">
     <ul>


        <?php
     $nuy=1;
foreach ($Home_menu_dac as $Menu_h) {
  $active = ($url == $actual_link1) ? 'active' : '';
//print_r($Menu_h);
?>
      <li class="<?php echo $active; ?>">
        <a class="inim<?php echo$nuy++; ?>" <?php if($Menu_h->ID ==684){}else{echo 'href="'.$Menu_h->url.'"';} ?>"><?php echo $Menu_h->title; ?>
        </a>
      </li>
<?php } ?>

    <li>
      <a href="<?php echo get_permalink(get_page_by_path('ajustes-cuenta')->ID); ?>">
        <label class="ttt1">Configuración</label>
        <i class="df1 color_car fa fa-cog fa-2x" aria-hidden="true"></i>
        
      </a>
    </li>

    <li>
      <a href="<?php echo wp_logout_url( home_url() ); ?>">
          <label class="ttt2">Salir</label>
        <i class="df2 color_car fa fa-sign-out fa-2x" aria-hidden="true"></i>
       
      </a>
    </li>


  

    </ul>

    </div>
</div>
</div>

   </section>

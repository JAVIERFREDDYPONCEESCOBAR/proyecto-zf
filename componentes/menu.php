

   <section id="menu">
     <div class="container">
          <div class="col-md-12">
               <div class="primera_sec_menu">
     <ul>


     <?php
     $nuy=1;
foreach ($Home_menu_pvp as $Menu_h) {
  $active = ($url == $actual_link1) ? 'active' : '';
//print_r($Menu_h);
?>
      <li class="<?php echo $active; ?>">
        <a class="inim<?php echo$nuy++; ?>" <?php if($Menu_h->ID ==684){}else{echo 'href="'.$Menu_h->url.'"';} ?>"><?php echo $Menu_h->title; ?>
        </a>
      </li>
<?php } ?>




    <li >
      <a href="<?php echo get_permalink(get_page_by_path('ajustes-cuenta')->ID); ?>">
        <label class="ttt1">Configuración</label>
        <i class="df1 color_car fa fa-cog fa-2x" aria-hidden="true"></i>
          
      </a>
    </li>

    <li >
      <a href="<?php echo wp_logout_url( home_url() ); ?>">
          <label class="ttt2">Salir</label>
        <i class=" df2 color_car fa fa-sign-out fa-2x" aria-hidden="true"></i>
      
      </a>
    </li>


    </ul>




    <div class="tt">
       <a href="<?php echo get_permalink(get_page_by_path('carrito')->ID); ?>">
        <!-- <div class="caritto"> -->
          <div class=" color_car fa fa-shopping-cart fa-2x" aria-hidden="true">
      <?php $var_caar= sprintf (_n( '%d', '%d', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count());
        if ($var_caar==0) { }else{ ?>
 <div class="circulo"><?php echo sprintf (_n( '%d', '%d', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?> </div>

</div>

<?php
}
?>
</a>
    </div>




              </div>



<div class="segunda_sec_menu">

  <div class="col-md-12">

      <div class="row">

        <div class="col-md-4">
          <div class="catalogm">
            <a href="<?php echo get_permalink(get_page_by_path('catalogo-de-canje')->ID); ?>">
              <i class="fa fa-bars fa-2x" aria-hidden="true"></i>TODOS</a><!--
            <i style="color: white;" class="material-icons miicon"> subject</i>TODOS</a> -->
          </div>
         </div>


  <?php
$mis_categories = get_terms('product_cat', array(
                                 'parent'  =>0,
                                 'post_status' => 'publish',
                                 'orderby' => 'title',
                                 'order'=>'ASC',

                                  ));

foreach ($mis_categories as $las_categorias) {
?>


        <div class="col-md-4">
          <div class="catalogm">
            <a href="<?php echo get_category_link($las_categorias->term_id); ?>"><img class="imagen_men "src="<?php echo wp_get_attachment_url(get_woocommerce_term_meta( $las_categorias->term_id, 'thumbnail_id', true )); ?>"><?php echo $las_categorias->name; ?></a>
          </div>
         </div>
        <?php

} ?>



</div>
</div>
</div>

   </section>

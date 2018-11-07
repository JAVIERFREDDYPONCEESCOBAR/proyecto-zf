<?php 
if ( is_user_logged_in() ) { 
include 'header.php';
if ( ($current_user->roles[0] =='administradorpvp')||($current_user->roles[0] =='administrator') ) {
  include 'componentes/menu.php';
}elseif (($current_user->roles[0] =='administradordac')||($current_user->roles[0] =='administrator')) {
  include 'componentes/menu_dac.php';
}

include 'componentes/implem_trimestre.php'; 
include 'componentes/menu_puntos.php'; 
?>




<section id="tienda_detalles"> 
<div class="container ">
  <div class="row ">



    <div class="col-md-12">
      <div class="contenedortitproduct"> 

          <div class="cuadro_grend">
              <div class="row">
                <div class="col-md-12">
                   <h5 id="relativo"></h5>
                 </div>
                 <div class="col-md-12">
                  <a href="<?php echo get_permalink(get_page_by_path('finalizar-comprar')->ID);?>"> <button class="acomu"> PROCESAR CANJE </button> 
                 </div></a>
                 </div>
          </div>



      </div>


<div class="contenedordeproductos ">

<form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
<?php 
$numero=0;
foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {



				$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
					$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
					?>

          
 <div class="col-md-12">
  <div class="mg_boton">
<button type="submit" class="button" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>"><?php esc_html_e( 'Update cart', 'woocommerce' ); ?></button>
</div>
</div>



<div class="separar">
   <div class="col-md-12">
     <div id="newcontentt2" class="row newcontentt">
       <div class="altcheclist">
        <div class="row">
          <div class="col-md-3">
<?php
$imagen_destacda = wp_get_attachment_image_src(get_post_thumbnail_id($cart_item[product_id]) ,'thumb')[0];
$imagen_vacio=''.get_template_directory_uri().'/img/no-image.png';
						?>


          <div class="tamano" style="background: url(<?php if (empty($imagen_destacda)){ echo$imagen_vacio; }else{echo$imagen_destacda;} ?>) no-repeat scroll center center/cover ;">
          </div>
          </div>
          <div class="col-md-6">
                      <div class="altcheclist">
                          <div class="row">
                              <div class="col-md-6">

  <div class="product-name" data-title="<?php esc_attr_e( 'Product', 'woocommerce' ); ?>">                  
                              	<?php
                              		if ( ! $product_permalink ) {
		echo apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;';
	
						} else {
		echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<label class="mas_p"><a href="%s"><b></b>%s</a></label>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key );

						}


  echo wc_get_formatted_cart_item_data( $cart_item );
						?>
  </div>                              
                               </div>

                               <div class="col-md-6">
                                   
<span class="product-price" data-title="<?php esc_attr_e( 'Price', 'woocommerce' ); ?>" >
<?php
  $precio_rebajado = get_post_meta($valor_producto->ID,'_sale_price'); 
  $precio_normal   = get_post_meta($valor_producto->ID,'_regular_price');

echo apply_filters('woocommerce_cart_item_price',WC()->cart->get_product_price($_product),$cart_item,$cart_item_key);
?>
<?php
//echo $prices['regular_price']; 
echo "<span><b> BOGE-POINTS</b></span>";

 //echo get_woocommerce_currency_symbol().''.number_format(get_post_meta($hotel->ID,'_sale_price')[0],2); 
?>

</span>
                                  
                               </div>
                          </div>
                             <p>Capacidad de 14 Servicios. Acero inoxidable resistente a huellas digitales en la puerta. Tina Alta de acero inoxidable. Con el motor más potente del mercado de EUA. Triturador de alimentos de acero inoxidable con 4 cuchillas.</p>
                              <div class="row">
                              <div class="col-md-6">
                                <div class="marg_red2">
           <?php
								
								echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
									'<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s"><div class="boton">Eliminar</div></a>',
									esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
									__( 'Remove this item', 'woocommerce' ),
									esc_attr( $product_id ),
									esc_attr( $_product->get_sku() )
								), $cart_item_key );
							?>


                                  
                                </div>
                               </div>
                               <div class="col-md-6">
                          </div>

                      </div>
                 </div>
</div>



                 <div class="col-md-3">
        <div class="product-quantity altcheclist2" data-title="<?php esc_attr_e( 'Quantity', 'woocommerce' ); ?>" >
                    <?php

                   // print_r($_product->is_sold_individually());
            if ( $_product->is_sold_individually() ) {
              $product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
            } else {
              $product_quantity = woocommerce_quantity_input( array(
                'input_name'    => "cart[{$cart_item_key}][qty]",
                'input_value'   => $cart_item['quantity'],
                'max_value'     => $_product->get_max_purchase_quantity(),
                'min_value'     => '0',
                'product_name'  => $_product->get_name(),
              ), $_product, false );
            }

            echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item );
            ?>
                 </div>
               </div>
        </div>
      </div>
   </div>
 </div>
</div>



<?php 

$total_productos[] = array($numero++=>$cart_item[quantity]);
$array_resultante[]= array_merge(array($cart_item[quantity]));

} 
}

foreach ($array_resultante as $vlor) {
  $mas = array_merge($vlor);
 $lo_guarde[]=$mas[0];
}
$total_productos = array_sum($lo_guarde);

if ($total_productos==1) {
  $ressultado_totales='Total ('.$total_productos.' productos): ';
}else{
  $ressultado_totales='Total ('.$total_productos.' productos): ';
}


?>


      <?php do_action( 'woocommerce_cart_actions' ); ?>
      <?php wp_nonce_field( 'woocommerce-cart' ); ?>
      <?php do_action( 'woocommerce_after_cart_contents' ); ?>
      <?php do_action( 'woocommerce_after_cart_table' ); ?>
</form>

 </div>
  <div class="container-mart">


   <h5 id="todo_tot"><?php echo$ressultado_totales; 
   echo ''.wc_cart_totals_subtotal_html().' <span>BOGE-POINTS</span>'; ?> </h5>
 </div> 




  </div>

</div>

</div>

</section>




<?php 

include 'componentes/menu_derecha.php';

} else { } 
include 'footer.php';
?>
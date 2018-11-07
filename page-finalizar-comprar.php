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
//wc_print_notices();
?>





<section id="contendio">
  <div class="container">
    <div class="col-md-12">
      <h1>Finalizar canje</h1>
<?php 
global $woocommerce;

$checkout = WC()->checkout();
if (!$checkout->is_registration_enabled() && $checkout->is_registration_required() && !is_user_logged_in()) {
	echo apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) );
	return;
}

?>
<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

	<?php if ( $checkout->get_checkout_fields() ) : ?>
		<div class="row" id="customer_details">
			<div class="col-md-6">
           <div class="woocommerce-billing-fields">
	<?php if ( wc_ship_to_billing_address_only() && WC()->cart->needs_shipping() ) : ?>

		

	<?php else : ?>

		<h3>DATOS ENTREGA</h3>

	<?php endif; ?>

	<?php do_action( 'woocommerce_before_checkout_billing_form', $checkout );
	 ?>
	<div class="woocommerce-billing-fields__field-wrapper">
		<div class="row">
		<?php
			$fields = $checkout->get_checkout_fields( 'billing' );

			foreach ( $fields as $key => $field ) {
				if ( isset( $field['country_field'], $fields[ $field['country_field'] ] ) ) {

					$field['country'] = $checkout->get_value( $field['country_field'] );
				}
				$res = ($field[label]==1)? "required" : " ";
				$res_direccion2  = $field[autocomplete];
				$res_placeholder = ( empty($field[placeholder]) )? $field[label] : $field[placeholder] ;

$pais= WC()->countries->get_countries();
$que_pais_estoy = WC()->customer->get_shipping_country();



$estados = WC()->countries->get_states($que_pais_estoy);



 if ($field[label]=='País') {  ?>
 <div class="col-md-6">
 <div class="form-group">

 <label for="<?php echo$key; ?>" class=""><?php echo$field[label]; ?>
 <abbr class="required" title="obligatorio">*</abbr></label>

<span class="woocommerce-input-wrapper anchoboton">
<select name="<?php echo$key; ?>" id="<?php echo$key; ?>" class="country_to_state country_select form-control" autocomplete="country" disabled>
	<?php foreach ($pais as $key_pais => $value_pais) {
		$pais_Actial = ($key_pais == $que_pais_estoy)? "selected='selected'"  : " ";
	
		echo'<option value="'.$key_pais.'" '.$pais_Actial .'>'.$value_pais.'</option>';
	} ?>

</select>
</span>
</div>
</div>
<?php }elseif($field[label]=='Región / Provincia') {  ?>


<div class="col-md-6">
 <div class="form-group">
 <label for="<?php echo$key; ?>" class=""><?php echo $field[label]; ?><abbr class="required" title="obligatorio">*</abbr></label>
<span class="woocommerce-input-wrapper anchoboton">
<select name="<?php echo$key; ?>" id="<?php echo$key; ?>" class="country_to_state country_select form-control " autocomplete="country" disabled>
<?php //echo'<option value="">'.get_user_meta($userid,$key,true).'</option>';
	 


        foreach ($estados as $key_estados => $value_estados) {
		

	    	if (get_user_meta($userid,$key,true) == $key_estados) {
	 	
		echo'<option value="'.$key_estados.'"  selected="selected" >'.$value_estados.'</option>';
	    
	   }
	  } 




	// foreach ($estados as $key_estados => $value_estados) {
	// 	echo'<option value="'.$key_estados.'">'.$value_estados.'</option>';
	// } 


	?>

</select>
</span>
</div>
</div>


<?php }else{ ?>

<div class="col-md-6">
 <div class="form-group">
<p class="form-row form-row-first validate-required" id="billing_first_name_field" data-priority="10">
<label for="<?php echo$key; ?>" class="cajas_de_tst"> 
	<?php if(empty($field[label])){ echo'Dirección apartamento'; }else{echo''.$field[label].'            '; } ?>
	<abbr class="<?php echo$res; ?>" title="obligatorio"></abbr>
</label>


<span class="woocommerce-input-wrapper anchoboton">
<input type="text" class="input-text form-control" name="<?php echo$key; ?>" id="<?php echo$key; ?>" placeholder="<?php echo$res_placeholder; ?>" value="<?php echo get_user_meta($userid,$key,true); ?>" autocomplete="<?php echo$res_direccion2;?>" disabled>
</span>

</p>	
</div>
</div>

<?php
 
 }

 }

 ?>

    
</div>
	</div>

	<?php do_action( 'woocommerce_after_checkout_billing_form', $checkout ); ?>
</div>

<?php if ( ! is_user_logged_in() && $checkout->is_registration_enabled() ) : ?>
	<div class="woocommerce-account-fields">
		<?php if ( ! $checkout->is_registration_required() ) : ?>

			<p class="form-row form-row-wide create-account">
				<label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
					<input class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" id="createaccount" <?php checked( ( true === $checkout->get_value( 'createaccount' ) || ( true === apply_filters( 'woocommerce_create_account_default_checked', false ) ) ), true ) ?> type="checkbox" name="createaccount" value="1" /> <span><?php _e( 'Create an account?', 'woocommerce' ); ?></span>
				</label>
			</p>

		<?php endif; ?>

		<?php do_action( 'woocommerce_before_checkout_registration_form', $checkout ); ?>

		<?php if ( $checkout->get_checkout_fields( 'account' ) ) : ?>

			<div class="create-account">
				<?php foreach ( $checkout->get_checkout_fields( 'account' ) as $key => $field ) : ?>
					<?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>
				<?php endforeach; ?>
				<div class="clear"></div>
			</div>

		<?php endif; ?>

		<?php do_action( 'woocommerce_after_checkout_registration_form', $checkout ); ?>
	</div>
<?php endif; ?>






			</div>
























<div class="col-md-6">
    <h3 id="order_review_heading">DETALLES CANJE</h3>

	<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>
	<div class="marco2">
	<div id="order_review" class="woocommerce-checkout-review-order col-md-12">
    
    <?php
    //do_action( 'woocommerce_checkout_order_review' );
    ?>




<table class="shop_table woocommerce-checkout-review-order-table">
	<thead>
		<tr>
			<th class="product-name"><?php _e( 'Product', 'woocommerce' ); ?></th>
			<th  style="text-align: center;" >Cantidad</th>
			<th class="product-total" style="text-align: center;"><?php _e( 'Total', 'woocommerce' ); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php
			do_action( 'woocommerce_review_order_before_cart_contents' );

			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
				$_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );

				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
					?>
					<tr class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
						<td class="product-name" >
							<?php echo apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;'; ?>

</td>
<td  style="text-align: center;">
							<?php echo apply_filters( 'woocommerce_checkout_cart_item_quantity', ' <strong class="product-quantity" >'.$cart_item['quantity'].'</strong>', $cart_item, $cart_item_key ); ?>


							<?php echo wc_get_formatted_cart_item_data( $cart_item ); ?>
						</td>
						<td class="product-total" style="text-align: center;" >
							<?php echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); echo " BOGE-POINTS"; ?>
						</td>

					</tr>
					<?php
				}
			}

			do_action( 'woocommerce_review_order_after_cart_contents' );
		?>
	</tbody>
	<tfoot>

		<tr class="cart-subtotal">
			<th><?php _e( 'Total', 'woocommerce' ); ?></th>
			<td><?php wc_cart_totals_subtotal_html(); ?></td>
		</tr>

		<?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
			<tr class="cart-discount coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
				<th><?php wc_cart_totals_coupon_label( $coupon ); ?></th>
				<td><?php wc_cart_totals_coupon_html( $coupon ); ?></td>
			</tr>
		<?php endforeach; ?>

		<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

			<?php do_action( 'woocommerce_review_order_before_shipping' ); ?>

			<?php wc_cart_totals_shipping_html(); ?>

			<?php do_action( 'woocommerce_review_order_after_shipping' ); ?>

		<?php endif; ?>

		<?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
			<tr class="fee">
				<th><?php echo esc_html( $fee->name ); ?></th>
				<td><?php wc_cart_totals_fee_html( $fee ); ?></td>
			</tr>
		<?php endforeach; ?>

		<?php if ( wc_tax_enabled() && ! WC()->cart->display_prices_including_tax() ) : ?>
			<?php if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) : ?>
				<?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : ?>
					<tr class="tax-rate tax-rate-<?php echo sanitize_title( $code ); ?>">
						<th><?php echo esc_html( $tax->label ); ?></th>
						<td><?php echo wp_kses_post( $tax->formatted_amount ); ?></td>
					</tr>
				<?php endforeach; ?>
			<?php else : ?>
				<tr class="tax-total">
					<th><?php echo esc_html( WC()->countries->tax_or_vat() ); ?></th>
					<td><?php wc_cart_totals_taxes_total_html(); ?></td>
				</tr>
			<?php endif; ?>
		<?php endif; ?>

		<?php do_action( 'woocommerce_review_order_before_order_total' ); ?>

		<tr class="order-total">
			<th><?php _e( 'Total', 'woocommerce' ); ?></th>
			<td><?php wc_cart_totals_order_total_html(); echo " BOGE-POINTS";?></td>
		</tr>

		<?php do_action( 'woocommerce_review_order_after_order_total' ); ?>

	</tfoot>
</table>








<div id="payment" class="woocommerce-checkout-payment">
	<?php if ( WC()->cart->needs_payment() ) : ?>
		<ul class="wc_payment_methods payment_methods methods">
			<?php
			if ( ! empty( $available_gateways ) ) {
				foreach ( $available_gateways as $gateway ) {
					wc_get_template( 'checkout/payment-method.php', array( 'gateway' => $gateway ) );
				}
			} else {
				echo '<li class="woocommerce-notice woocommerce-notice--info woocommerce-info">' . apply_filters( 'woocommerce_no_available_payment_methods_message', WC()->customer->get_billing_country() ? esc_html__( 'Sorry, it seems that there are no available payment methods for your state. Please contact us if you require assistance or wish to make alternate arrangements.', 'woocommerce' ) : esc_html__( 'Please fill in your details above to see available payment methods.', 'woocommerce' ) ) . '</li>'; // @codingStandardsIgnoreLine
			}
			?>
		</ul>
	<?php endif; ?>
	<div class="form-row place-order">
		<noscript>
			<?php esc_html_e( 'Since your browser does not support JavaScript, or it is disabled, please ensure you click the <em>Update Totals</em> button before placing your order. You may be charged more than the amount stated above if you fail to do so.', 'woocommerce' ); ?>
			<br/><button type="submit" class="button alt" name="woocommerce_checkout_update_totals" value="<?php esc_attr_e( 'Update totals', 'woocommerce' ); ?>"><?php esc_html_e( 'Update totals', 'woocommerce' ); ?></button>
		</noscript>

		<?php wc_get_template( 'checkout/terms.php' ); ?>

		<?php do_action( 'woocommerce_review_order_before_submit' ); ?>

		<?php echo apply_filters( 'woocommerce_order_button_html', '<button type="submit" class="button alt" name="woocommerce_checkout_place_order" id="place_order" value="' . esc_attr( $order_button_text ) . '" data-value="' . esc_attr( $order_button_text ) . '">Realizar el pedido </button>' ); // @codingStandardsIgnoreLine 
		 //esc_html( $order_button_text )?>

		<?php do_action( 'woocommerce_review_order_after_submit' ); ?>

		<?php wp_nonce_field( 'woocommerce-process_checkout', 'woocommerce-process-checkout-nonce' ); ?>
	</div>
</div>
<?php
if ( ! is_ajax() ) {
	do_action( 'woocommerce_review_order_after_payment' );
}

?>
















</div>
	</div>
	   <?php  do_action( 'woocommerce_checkout_after_order_review' ); 

	   ?>
	</div>








			<div class="col-md-12">
<div class="ocultar">	
	<h3>Envio de canje</h3>
<div class="row">		
		<?php 
 
	$fields_shipping = $checkout->get_checkout_fields( 'shipping' );
	foreach ( $fields_shipping as $key => $field2 ) {
	
				if ( isset( $field2['country_field'], $fields[ $field2['country_field'] ] ) ) {

					$field2['country'] = $checkout->get_value( $field2['country_field'] );
				}
				$res = ($field2[label]==1)? "required" : " ";
				$res_direccion2  = $field2[autocomplete];
				$res_placeholder = ( empty($field2[placeholder]) )? $field2[label] : $field2[placeholder] ;

$pais2= WC()->countries->get_countries();
$que_pais_estoy2 = WC()->customer->get_shipping_country();
$estados2 = WC()->countries->get_states($que_pais_estoy);

 if ($field2[label]=='País') { ?>


<div class="col-md-6">
<div class="form-group">
<label for="<?php echo$key; ?>" class=""><?php echo$field2[label]; ?><abbr class="required" title="obligatorio">*</abbr></label>
<span class="woocommerce-input-wrapper anchoboton">
<select name="<?php echo$key; ?>" id="<?php echo$key; ?>" class="country_to_state country_select form-control" autocomplete="country">
<option value="">Elige un país…</option> 

	<?php  foreach ($pais2 as $key_pais => $value_pais) {
		     $pais_Actial = ($key_pais == $que_pais_estoy2)? "selected='selected'"  : " ";
	      	echo'<option value="'.$key_pais.'" '.$pais_Actial .'>'.$value_pais.'</option>';
	    } ?>

</select>
</span>
</div>
</div> 

<?php }elseif($field2[label]=='Región / Provincia') {   ?>


<div class="col-md-6">
 <div class="form-group">
 <label for="<?php echo$key; ?>" class=""><?php echo$field2[label]; ?><abbr class="required" title="obligatorio">*</abbr></label>
<span class="woocommerce-input-wrapper anchoboton">
<select name="<?php echo$key; ?>" id="<?php echo$key; ?>" class="country_to_state country_select form-control " autocomplete="country">
<!--<option value="<?php //echo get_user_meta($userid,$key,true); ?>"> </option>-->
	<?php foreach ($estados2 as $key_estados => $value_estados) {
		
	    	if (get_user_meta($userid,$key,true) == $key_estados) {
	 	
		echo'<option value="'.$key_estados.'">'.$value_estados.'</option>';
	    
	    }
	  } 

	?>

</select>
</span>
</div>
</div> 


<?php }else{ ?>

 <div class="col-md-6">
 <div class="form-group">
<p class="form-row form-row-first validate-required" id="billing_first_name_field" data-priority="10">
<label for="<?php echo$key; ?>" class=""><?php if(empty($field2[label])){echo'Dirección apartamento';}else{echo$field2[label];} ?><abbr class="<?php echo$res; ?>" title="obligatorio"></abbr></label>
<span class="woocommerce-input-wrapper anchoboton">
<input type="text" class="input-text form-control" name="<?php echo$key; ?>" id="<?php echo$key; ?>" placeholder="<?php echo$res_placeholder; ?>" value="<?php echo get_user_meta($userid,$key,true); ?>" autocomplete="<?php echo$res_direccion2;?>">
</span>
</p>	
</div>
</div> 

<?php 
} } 
	foreach ( $checkout->get_checkout_fields( 'order' ) as $key => $field3 ) : 

				$res3 = ($field3[label]==1)? "required" : " ";
				$res_direccion3  = $field3[autocomplete];
				$res_placeholder3 = ( empty($field3[placeholder]) )? $field3[label] : $field3[placeholder] ;
				?>
 <div class="col-md-6">
 <div class="form-group">
<p class="form-row notes" id="order_comments_field" data-priority="">
	<label for="<?php echo$key; ?>" class=""><?php if(empty($field3[label])){echo'Notas del pedido';}else{echo$field3[label];} ?>
		<span class="optional">(opcional)</span>
	</label>
	<span class="woocommerce-input-wrapper">
		<textarea name="<?php echo$key; ?>" class="input-text form-control" id="<?php echo$key; ?>" placeholder="<?php echo$res_placeholder3; ?>" >
		</textarea>
	</span>
</p>
</div>
</div> 

<?php endforeach; ?>

</div>
</div>
</div>













</div>
		<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>
	<?php endif; ?>
</form>





</div>
</div>
</section>



<?php 
include 'componentes/menu_derecha.php';
} else { } 
include 'footer.php';
?>
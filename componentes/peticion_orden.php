<?php 

error_reporting(E_ALL); 
ini_set("display_errors", 1); 
define('WP_USE_THEMES', false);
require('../../../../wp-load.php');
$com_1   = $_REQUEST['id_order'];
//do_action( 'woocommerce_view_order', $com_1); 
if ( ! $order = wc_get_order( $com_1 ) ) {
	return;
}

$order_items           = $order->get_items( apply_filters( 'woocommerce_purchase_order_item_types', 'line_item' ) );
$show_purchase_note    = $order->has_status( apply_filters( 'woocommerce_purchase_note_order_statuses', array( 'completed', 'processing' ) ) );
$show_customer_details = is_user_logged_in() && $order->get_user_id() === get_current_user_id();
$downloads             = $order->get_downloadable_items();
$show_downloads        = $order->has_downloadable_item() && $order->is_download_permitted();

if ( $show_downloads ) {
	wc_get_template( 'order/order-downloads.php', array( 'downloads' => $downloads, 'show_title' => true ) );
}


?>

<section class="woocommerce-order-details">
	<?php do_action( 'woocommerce_order_details_before_order_table', $order ); ?>

	<!-- <h2 >Canje</h2> -->

	<table class="woocommerce-table woocommerce-table--order-details shop_table order_details">

		<thead>
			<tr>
				<th class="woocommerce-table__product-name product-name"><?php _e( 'Product', 'woocommerce' ); ?></th>
				<th style="text-align:center;" class="woocommerce-table__product-table product-total">Cantidad</th>
				<th class="woocommerce-table__product-table product-total"><?php _e( 'Total', 'woocommerce' ); ?></th>
			</tr>
		</thead>

		<tbody>
			<?php
			do_action( 'woocommerce_order_details_before_order_table_items', $order );

			foreach ( $order_items as $item_id => $item ) {
				$product = $item->get_product();



				// wc_get_template( 'order/order-details-item.php', array(
				// 	'order'			     => $order,
				// 	'item_id'		     => $item_id,
				// 	'item'			     => $item,
				// 	'show_purchase_note' => $show_purchase_note,
				// 	'purchase_note'	     => $product ? $product->get_purchase_note() : '',
				// 	'product'	         => $product,
				// ) );
?>
<tr class="<?php echo esc_attr( apply_filters( 'woocommerce_order_item_class', 'woocommerce-table__line-item order_item', $item, $order ) ); ?>">

	<td class="woocommerce-table__product-name product-name">
		<?php
			$is_visible        = $product && $product->is_visible();
			//$product_permalink = apply_filters( 'woocommerce_order_item_permalink', $is_visible ? $product->get_permalink( $item ) : '', $item, $order );

			echo apply_filters( 'woocommerce_order_item_name', $product_permalink ? sprintf( $product_permalink, $item->get_name() ) : $item->get_name(), $item, $is_visible );

		

			do_action( 'woocommerce_order_item_meta_start', $item_id, $item, $order, false );

			wc_display_item_meta( $item );

			//do_action( 'woocommerce_order_item_meta_end', $item_id, $item, $order, false );
		?>
		<td style="text-align:center;"><?php 	echo apply_filters( 'woocommerce_order_item_quantity_html', ' <strong class="product-quantity">' .$item->get_quantity(). '</strong>', $item ); ?></td>
	</td>

	<td class="woocommerce-table__product-total product-total">
		<?php echo '<b>'.$order->get_formatted_line_subtotal($item).'</b>  BOGE-POINTS'; ?>
	</td>

</tr>

<?php if ( $show_purchase_note && $purchase_note ) : ?>

<tr class="woocommerce-table__product-purchase-note product-purchase-note">

	<td colspan="2"><?php echo wpautop( do_shortcode( wp_kses_post( $purchase_note ) ) ); ?></td>

</tr>

<?php endif; 


			}

			//do_action( 'woocommerce_order_details_after_order_table_items', $order );
			?>
		</tbody>

		<tfoot>
			<?php
				foreach ( $order->get_order_item_totals() as $key => $total ) {

                 
                 if ($total['label']=='Método de pago:') {
                 	
                 }elseif ($total['label']=='Subtotal:') {
                 	# code...
                 }else{

					?>
					<tr>
						<th scope="row"><?php echo $total['label']; ?></th>
						<td><?php echo $total['value']; ?> BOGE-POINTS</td>
					</tr>
					<?php
				}
		}
			?>
			<?php if ( $order->get_customer_note() ) : ?>
				<tr>
					<th><?php //_e( 'Note:', 'woocommerce' ); ?></th>
					<td><?php // echo wptexturize( $order->get_customer_note() ); ?></td>
				</tr>
			<?php endif; ?>
		</tfoot>
	</table>

</section>





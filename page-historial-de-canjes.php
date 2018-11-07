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

 
<?php




		// $current_page    = empty( $current_page ) ? 1 : absint( $current_page );
		// $customer_orders = wc_get_orders( apply_filters( 'woocommerce_my_account_my_orders_query', array(
		// 	'customer' => get_current_user_id(),
		// 	'page'     => $current_page,
		// 	'paginate' => true,
		// ) ) );
		// wc_get_template(
		// 	'myaccount/orders.php',
		// 	array(
		// 		'current_page'    => absint( $current_page ),
		// 		'customer_orders' => $customer_orders,
		// 		'has_orders'      => 0 < $customer_orders->total,
		// 	)
		// );
	

$my_orders_columns = apply_filters( 'woocommerce_my_account_my_orders_columns', array(
    'order-number'  => __( 'ID', 'woocommerce' ),
    'order-date'    => __( 'Date', 'woocommerce' ),
    'order-total'   => __( 'Packages', 'woocommerce' ),
    'order-total'   => __( 'Price', 'woocommerce' ),
    'order-status'  => __( 'Status', 'woocommerce' ),
    //'order-actions' => '&nbsp;',
) );

$customer_orders = get_posts( apply_filters( 'woocommerce_my_account_my_orders_query', array(
    'numberposts' => $order_count,
    'meta_key'    => '_customer_user',
    'meta_value'  => get_current_user_id(),
    'post_type'   => wc_get_order_types( 'view-orders' ),
    'post_status' => array_keys( wc_get_order_statuses() )
) ) );

if ($customer_orders) : 


           
             ?>

    

<section id="tienda_detalles"> 
    <div class="container ">
    <div class="col-md-12"> 

     <div class="row">
      <div class="col-md-12 text-center">  <h1><?php echo $post->post_title; ?></h1> </div>
  </div>
    <!--<h2> Canjes<?php //echo apply_filters( 'woocommerce_my_account_my_orders_title', __( 'Recent Orders', 'woocommerce' ) ); ?></h2>
-->
 <!--    <table class="shop_table shop_table_responsive my_account_orders" style="width: 100%">
    <?php //echo $customer_orders['numberposts']. '<br> '; ?>

        <thead>
            <tr>
                <?php //foreach ( $my_orders_columns as $column_id => $column_name ) : ?>
                    <th class="<?php// echo esc_attr( $column_id ); ?>"><span class="nobr"><?php // echo esc_html( $column_name ); ?></span></th>
                <?php //endforeach; ?>
            </tr>
        </thead> -->


<table id="beneficios_table" cellspacing="0" border="0">


    <tr>
        <td height="41" align="center" valign=middle style="background: black; color: white" >
            <font face="Abadi MT Condensed Extra Bold" >No.CANJE</font></td>
        <td height="41" align="center" valign=middle style="background: black; color: white" >
            <font face="Abadi MT Condensed Extra Bold" >FECHA DE CANJE</font></td>
        <td height="41" align="center" valign=middle style="background: black; color: white" >
            <font face="Abadi MT Condensed Extra Bold" >BOGE-POINTS CANJEADOS</font></td>
        <td height="41" align="center" valign=middle style="background: black; color: white" >
            <font face="Abadi MT Condensed Extra Bold" >ESTADO PEDIDO</font></td>
    </tr>
        <tbody>
            <?php 



            foreach ( $customer_orders as $customer_order ) :

                 


                $order      = wc_get_order( $customer_order );
                $item_count = $order->get_item_count();

   // print_r($order->get_order_number());
  //. print_r(wc_format_datetime( $order->get_date_created() )); 
 //   echo date_i18n( __( 'l jS \o\f F Y, h:ia', 'woocommerce' ), strtotime( $note->comment_date ) ); 
//    echo wpautop( wptexturize( $note->comment_content ) ); 
//do_action( 'woocommerce_view_order', $order->get_order_number() )

                ?>
                <tr class="order">
                    <?php foreach ( $my_orders_columns as $column_id => $column_name ) : 




                        ?>
                        <td class="<?php echo esc_attr( $column_id ); ?>" style="text-align: center;" data-title="<?php echo esc_attr( $column_name ); ?>">
                            <?php if ( has_action( 'woocommerce_my_account_my_orders_column_' . $column_id ) ) : ?>
                                <?php do_action( 'woocommerce_my_account_my_orders_column_' . $column_id, $order ); ?>

                            <?php elseif ( 'order-number' === $column_id ) : ?>
                               <!-- <a href="<?php //echo esc_url( $order->get_view_order_url() ); ?>">-->
                                <span class="activar_mob" data-orden="<?php echo$order->get_order_number(); ?>" >
                        <?php echo'#'.$order->get_order_number().''; ?>
                                <!--</a>-->

                                <?php //print_r($order->data[line_items]); ?>
                                </span>

                            <?php elseif ( 'order-date' === $column_id ) : ?>
                                <time datetime="<?php echo date( 'Y-m-d', strtotime( $order->order_date ) ); ?>" title="<?php echo esc_attr( strtotime( $order->order_date ) ); ?>"><?php echo date_i18n( get_option( 'date_format' ), strtotime( $order->order_date ) ); ?></time>

                            <?php elseif ( 'order-status' === $column_id ) : ?>
                                <?php echo wc_get_order_status_name( $order->get_status() ); ?>

                            <?php elseif ( 'order-total' === $column_id ) : ?>
                                <?php echo ''.$order->get_formatted_order_total().' BOGE-POINTS';

                           
                                ?> 
                            <?php endif; ?>
                        </td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
</div>
</div>
</section>







<?php



include 'componentes/menu_derecha.php';

} else { } 
include 'footer.php';
?>
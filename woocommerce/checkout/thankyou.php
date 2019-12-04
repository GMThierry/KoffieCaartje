<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @package 	WooCommerce/Templates
 * @version     3.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<?php
echo do_shortcode('<p>[vc_row content_placement="middle" el_id="banner" css=".vc_custom_1560851337879{background-image: url(https://www.koffiecaartje.nl/wp-content/uploads/KoffieCaartje-Header-placeholder.jpg?id=307) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}" el_class="home"][vc_column][vc_column_text el_class="text-center text-white"]</p> <h1>Bedankt!</h1> <p>[/vc_column_text][/vc_column][/vc_row][vc_row el_class="mt-5 mb-5" el_id="intro"][vc_column width="1/2"][vc_single_image image="308" img_size="full" alignment="center" style="vc_box_rounded"][/vc_column][vc_column width="1/2" el_class="pl-3"][vc_column_text]</p> <h3>Bedankt voor je bestelling!</h3> <p>We gaan er voor zorgen dat we snel jouw KoffieCaartje(s) bij je thuis bezorgen. Je ontvangt deze in de brievenbus, dus je hoeft er niet voor thuis te blijven. Wij wensen je heel veel plezier met je aankoop![/vc_column_text][vc_btn title="Terug naar home" link="url:https%3A%2F%2Fwww.koffiecaartje.nl%2F|title:KoffieCaartje||" el_class="GMButton primaryColor mt-4"][/vc_column][/vc_row][vc_row el_id="socials" el_class="pt-1"][vc_column][vc_raw_html]JTVCaW5zdGFncmFtLWZlZWQlNUQ=[/vc_raw_html][vc_column_text el_class="text-center mt-4"]<a href="https://www.facebook.com/horecaartje" target="_blank" rel="noopener noreferrer"><img class="alignnone wp-image-292 size-full" src="https://www.koffiecaartje.nl/wp-content/uploads/Facebook-Dark.png" alt="" width="57" height="57" /></a> <a href="https://www.instagram.com/horecaartje/" target="_blank" rel="noopener noreferrer"><img class="alignnone wp-image-294 size-full" src="https://www.koffiecaartje.nl/wp-content/uploads/Instagram-Dark.png" alt="" width="57" height="57" /></a>[/vc_column_text][/vc_column][/vc_row]</p>');
?>


<div class="woocommerce-order d-none">

	<?php if ( $order ) : ?>

		<?php if ( $order->has_status( 'failed' ) ) : ?>

			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed"><?php _e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce' ); ?></p>

			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
				<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php _e( 'Pay', 'woocommerce' ) ?></a>
				<?php if ( is_user_logged_in() ) : ?>
					<a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button pay"><?php _e( 'My account', 'woocommerce' ); ?></a>
				<?php endif; ?>
			</p>

		<?php else : ?>

			<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', __( 'Thank you. Your order has been received.', 'woocommerce' ), $order ); ?></p>

			<ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details">

				<li class="woocommerce-order-overview__order order">
					<?php _e( 'Order number:', 'woocommerce' ); ?>
					<strong><?php echo $order->get_order_number(); ?></strong>
				</li>

				<li class="woocommerce-order-overview__date date">
					<?php _e( 'Date:', 'woocommerce' ); ?>
					<strong><?php echo wc_format_datetime( $order->get_date_created() ); ?></strong>
				</li>

				<?php if ( is_user_logged_in() && $order->get_user_id() === get_current_user_id() && $order->get_billing_email() ) : ?>
					<li class="woocommerce-order-overview__email email">
						<?php _e( 'Email:', 'woocommerce' ); ?>
						<strong><?php echo $order->get_billing_email(); ?></strong>
					</li>
				<?php endif; ?>

				<li class="woocommerce-order-overview__total total">
					<?php _e( 'Total:', 'woocommerce' ); ?>
					<strong><?php echo $order->get_formatted_order_total(); ?></strong>
				</li>

				<?php if ( $order->get_payment_method_title() ) : ?>
					<li class="woocommerce-order-overview__payment-method method">
						<?php _e( 'Payment method:', 'woocommerce' ); ?>
						<strong><?php echo wp_kses_post( $order->get_payment_method_title() ); ?></strong>
					</li>
				<?php endif; ?>

			</ul>

		<?php endif; ?>

		<?php do_action( 'woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id() ); ?>
		<?php do_action( 'woocommerce_thankyou', $order->get_id() ); ?>

	<?php else : ?>

		<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', __( 'Thank you. Your order has been received.', 'woocommerce' ), null ); ?></p>

	<?php endif; ?>

</div>

<?php
extract( $args );
?>

<form id="woocommerce-preview-email" action="" method="post" data-url="<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>">
    <table class="form-table">
        <tr>
			<?php
			wp_nonce_field( 'woocommerce_preview_email', 'preview_email' ); ?>
            <th>
                <label for="choose_email"><?php _e( 'Choose Email', 'woo-preview-emails' ); ?></label>
            </th>
            <td>
                <select id="choose_email" name="choose_email" class="regular-text">
                    <option value=""><?php _e( 'Choose Email', 'woo-preview-emails' ); ?></option>
					<?php foreach ( $emails as $index => $email ): ?>
                        <option value="<?php echo $index ?>" <?php selected( $index, $choose_email ); ?>><?php echo $email->title; ?></option>
					<?php endforeach; ?>
                </select>
            </td>
        </tr>
        <tr>
			<?php
			$args   = [
				'posts_per_page' => 10,
				'post_status'    => array_keys( wc_get_order_statuses() ),
			];
			$orders = wc_get_orders( $args );
			?>
            <th>
                <label for="orderID">
					<?php _e( 'Choose Order', 'woo-preview-emails' ); ?>
                </label>
            </th>
            <td>
				<?php if ( ! empty( $orders ) ): ?>
                    <select name="orderID" id="orderID" class="regular-text">
                        <option value=""><?php _e( 'Choose Order', 'woo-preview-emails' ); ?></option>
						<?php
						foreach ( $orders as $order ) {
							$order_id = $order->get_id()
							?>
                            <option value="<?php echo $order_id ?>" <?php selected( $order_id, $orderID ); ?> >#order : <?php echo $order_id; ?></option>
						<?php } ?>
                    </select>
				<?php else: ?>
					<?php esc_html_e( 'There are currently no orders on your site - please add some orders first', 'woo-preview-emails' ); ?>
				<?php endif; ?>
            </td>
        </tr>
        <tr>
            <th><label for="woo_preview_search_orders"><?php _e( 'Search Orders', 'woo-preview-emails' ); ?></label></th>
            <td>
                <select name="search_order" id="woo_preview_search_orders" class="regular-text" class="regular-text">
					<?php
					if ( ! empty( $_POST['search_order'] ) ) {
						?>
                        <option value="<?php echo esc_attr( $_POST['search_order'] ); ?>" selected="selected">#order : <?php echo esc_attr( $_POST['search_order'] ); ?></option>
						<?php
					}
					?>
                    <option value=""><?php _e( 'Search Orders', 'woo-preview-emails' ); ?></option>
                </select>
                <p id="search-description" class="description">
					<?php _e( 'Only use this field if you have particular orders, that are not listed above in the Choose Order Field. Type the Order ID only. Example: 90', 'woo-preview-emails' ); ?>
                </p>
            </td>
        </tr>
        <tr>
            <th>
                <label for="email">
					<?php _e( 'Mail to', 'woo-preview-emails' ); ?>
                </label>
            </th>
            <td>
                <input type="email" name="email" id="email" class="regular-text" value="<?php echo $recipient; ?>"/>
                <input type="button" title="clear" alt="clear" name="clearEmail" id="clearEmail" class="clearEmail button button-primary" value="Clear"/>
            </td>
        </tr>
        <tr>
            <th>
                <label for="email_type">
					<?php _e( 'Email Type', 'woo-preview-emails' ); ?>
                </label>
            </th>
            <td>
                <select name="email_type" id="email_type">
                    <option value="html" <?php selected('html', $email_type) ?>>HTML</option>
                    <option value="plain" <?php selected('plain', $email_type) ?>>Plain / Text</option>
                </select>
            </td>
        </tr>
    </table>
    <p style="text-align: left"><input type="submit" name="submit" value="<?php _e( 'Submit', 'woo-preview-emails' ) ?>" class="button button-primary"></p>
</form>
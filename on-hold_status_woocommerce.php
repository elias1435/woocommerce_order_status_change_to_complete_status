// automatically on-hold to complated order
add_action('woocommerce_thankyou', 'auto_complete_order_on_hold');
function auto_complete_order_on_hold($order_id) {
    if (!$order_id) {
        return;
    }

    // Get the order object
    $order = wc_get_order($order_id);

    // Only update the order if it's 'on-hold'
    if ($order->has_status('on-hold')) {
        // Update the order status to 'completed'
        $order->update_status('completed');
    }
}

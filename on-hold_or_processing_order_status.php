// code need to use in functions.php
// check if on-hold or processing order status it will be change to completed

add_action('woocommerce_thankyou', 'auto_complete_order');
function auto_complete_order($order_id) {
    if (!$order_id) {
        return;
    }

    // Get the order object
    $order = wc_get_order($order_id);

    // Check if the order is either 'on-hold' or 'processing'
    if ($order->has_status(array('on-hold', 'processing'))) {
        // Update the order status to 'completed'
        $order->update_status('completed');
    }
}

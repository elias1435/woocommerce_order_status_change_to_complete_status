// Automatically change order status from "processing" to "completed" for paid orders - use this code in functions.php

add_action('woocommerce_thankyou', 'auto_complete_order');

function auto_complete_order($order_id) {
    if (!$order_id) {
        return;
    }

    $order = wc_get_order($order_id);

    // Check if order is still processing
    if ($order->get_status() === 'processing') {
        // Check if payment is completed (for payment gateways like PayPal, Stripe, etc.)
        if ($order->is_paid()) {
            $order->update_status('completed'); // Set status to completed
        }
    }
}

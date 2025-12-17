<?php
namespace Evemiz\Panel;

use WC_Order;

class Orders {
    public function index() {
        global $wp;

        // گرفتن شناسه سفارش از query vars
        $order_Id = isset($wp->query_vars['vieworders']) ? $wp->query_vars['vieworders'] : 0;
        $order    = wc_get_order($order_Id);

        if (!$order) {
            return '<p>سفارشی یافت نشد.</p>';
        }

        // گرفتن یادداشت‌های سفارش
        $notes = $order->get_customer_order_notes();

        // بارگذاری قالب پیش‌فرض ووکامرس
        ob_start();
        wc_get_template('myaccount/view-order.php', array(
            'order'    => $order,
            'order_id' => $order->get_id(),
            'notes'    => $notes,
        ));
        return ob_get_clean();
    }
}

// پیشنهاد وبکیما
// <?php
// global $wp;
// $order_Id=$wp->query_vars['vieworders'];
// $order=wc_get_order($order_Id);
// $notes=$order->get_customer_order_notes();
//  wc_get_template('myaccount/view-order.php',
//  array(
        // 'order'=> $order,
        // 'order_id'=> $order->get_id(),
    // ) 
// );
// ?>

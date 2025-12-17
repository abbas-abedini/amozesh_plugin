<!-- order.php -->
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>سفارش‌های من</title>
    <style>
        body {
            font-family: Vazirmatn, Tahoma, sans-serif;
            background-color: #f9f9f9;
            padding: 20px;
        }
        .orders-page {
            background: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }
        .orders-page h2 {
            margin-top: 0;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        table th {
            background-color: #0073aa;
            color: #fff;
        }
        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .no-orders {
            color: #888;
            font-style: italic;
        }
    </style>
</head>
<body>
<div class="orders-page">
    <h2>سفارش‌های من</h2>

    <?php
    // گرفتن سفارش‌های کاربر فعلی
    $customer_orders = wc_get_orders([
        'customer_id' => get_current_user_id(),
        'limit'       => 10,
        'orderby'     => 'date',
        'order'       => 'DESC',
    ]);
    ?>

    <?php if (!empty($customer_orders)) : ?>
        <table>
            <thead>
                <tr>
                    <th>شماره سفارش</th>
                    <th>تاریخ</th>
                    <th>وضعیت</th>
                    <th>مجموع</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($customer_orders as $order) : ?>
                    <tr>
                        <td><?php echo esc_html($order->get_id()); ?></td>
                        <td><?php echo esc_html($order->get_date_created()->date_i18n('Y-m-d H:i')); ?></td>
                        <td><?php echo esc_html(wc_get_order_status_name($order->get_status())); ?></td>
                        <td><?php echo wp_kses_post($order->get_formatted_order_total()); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <p class="no-orders">هیچ سفارشی ثبت نشده است.</p>
    <?php endif; ?>
</div>
</body>
</html>


<!-- پیشنهاد وبکیما کد پایین است -->
 
<!-- <div class="evemiz-panel-order">

// $current_page=empty($current_page)? 1: absint($current_page);
// $customer_orders=wc_get_orders( apply_filters('woocomerce_my_account_my_orders_query',
array(
// 'customer'=>get_current_user_id(), page=>$current_page,paginate=>true)));

// wc_get_template('myaccount/orders .php' ,array('current_page'=>absint($current_page) ,
'customer_orders'=>$customer_orders ,'has_orders'=>0<$customer_orders->total,) ,'',$path);
// ?>
</div> -->
   

<!-- نوع سوم که در کلاس اصلی نوشتم این ویو بهتر است برایش  -->

 <!-- <?php if (!empty($message)) : ?> -->
    <!-- <p><?php echo esc_html($message); ?></p> -->
<!-- <?php endif; ?> -->

<!-- <?php if (!empty($orders)) : ?> -->
    <!-- <table> -->
        <!-- <thead> -->
            <!-- <tr> -->
                <!-- <th>شماره سفارش</th> -->
                <!-- <th>تاریخ</th> -->
                <!-- <th>وضعیت</th> -->
                <!-- <th>مجموع</th> -->
            <!-- </tr> -->
        <!-- </thead> -->
        <!-- <tbody> -->
            <!-- <?php foreach ($orders as $order) : ?> -->
                <!-- <tr> -->
                    <!-- <td><?php echo esc_html($order['id']); ?></td> -->
                    <!-- <td><?php echo esc_html($order['date']); ?></td> -->
                    <!-- <td><?php echo esc_html($order['status']); ?></td> -->
                    <!-- <td><?php echo wp_kses_post($order['total']); ?></td> -->
                <!-- </tr> -->
            <!-- <?php endforeach; ?> -->
        <!-- </tbody> -->
    <!-- </table> -->
<!-- <?php endif; ?> -->

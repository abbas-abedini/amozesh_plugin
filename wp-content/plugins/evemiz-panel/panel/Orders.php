
<?php
use Evemiz\Panel\Handler;
use Evemiz\Panel\View;

class Orders extends Handler {
// چون در Handler متد index به صورت public تعریف شده،
// اینجا هم باید public باشد
    // پیاده‌سازی متد index
    public function index() {
        View::load_view('order', []);
    }
// چون در Handler متد get_data به صورت protected static تعریف شده،
// اینجا هم باید همین‌طور باشد
    // پیاده‌سازی متد get_data
    protected static function get_data() {
        // اگر داده‌ها رو از ووکامرس می‌گیری، می‌تونی اینجا خالی بذاری یا بعداً پر کنی
        return [];
    }
}



// کدپایین وقتی که دادهارو خودمون میخواهیم بدیم نه از وکامرس

// <?php
// use Evemiz\Panel\Handler;
// use Evemiz\Panel\View;
// 
// class Orders extends Handler {
// 
    // public function index(){
        // $data = static::get_data();
        // آرایه داده باید به صورت پارامتر دوم پاس داده بشه
        // View::load_view('order', $data);
        // View::load_view('order');
    // }

    // public static function get_data(){
        // $params = [
            // 'test' => 'test',
        // ];
        // return $params;
    // }
// }
// ]چون دادها از خود وکامرس میاد dataرو کامنت کردم




// نوع سوم و تکمیل با استفاده از وکامرس 
// <?php
// use Evemiz\Panel\Handler;
// use Evemiz\Panel\View;
// 
// class Orders extends Handler {
// 
    // متد اصلی برای نمایش ویو
    // public function index() {
        // داده‌ها را از متد get_data می‌گیریم
        // $data = static::get_data();
        // ویو را با داده‌ها لود می‌کنیم
        // View::load_view('order', $data);
    // }
// 
    // واکشی داده‌ها از ووکامرس
    // protected static function get_data() {
        // اگر کاربر لاگین نباشد، آرایه خالی برگردان
        // if (!is_user_logged_in()) {
            // return [
                // 'orders' => [],
                // 'message' => 'لطفاً وارد شوید تا سفارش‌های خود را ببینید.'
            // ];
        // }
// 
        // گرفتن سفارش‌های کاربر فعلی
        // $customer_orders = wc_get_orders([
            // 'customer_id' => get_current_user_id(),
            // 'limit'       => 10,
            // 'orderby'     => 'date',
            // 'order'       => 'DESC',
            // 'return'      => 'objects',
        // ]);
// 
        // آماده‌سازی داده‌ها برای ویو
        // $orders_data = [];
        // foreach ($customer_orders as $order) {
            // $orders_data[] = [
                // 'id'     => $order->get_id(),
                // // 'date'   => $order->get_date_created() ? $order->get_date_created()->date_i18n('Y-m-d H:i') : '—',
                // 'status' => wc_get_order_status_name($order->get_status()),
                // 'total'  => $order->get_formatted_order_total(),
            // ];
        // }
// 
        // return [
            // 'orders' => $orders_data,
            // 'message' => empty($orders_data) ? 'هیچ سفارشی ثبت نشده است.' : ''
        // ];
    // }
// }
// 
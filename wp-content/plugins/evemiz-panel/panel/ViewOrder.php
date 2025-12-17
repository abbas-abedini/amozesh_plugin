<?php
use Evemiz\Panel\Handler;
use Evemiz\Panel\View;

class ViewOrder extends Handler {
// چون در Handler متد index به صورت public تعریف شده،
// اینجا هم باید public باشد
    // پیاده‌سازی متد index
    public function index() {
        $data=static::get_data();
        View::load_view('view-order' ,$data);
    }
// چون در Handler متد get_data به صورت protected static تعریف شده،
// اینجا هم باید همین‌طور باشد
    // پیاده‌سازی متد get_data
    protected static function get_data() {
        global $wp;
        $params=[
     'order_id' => isset($wp->query_vars['vieworder']) ? $wp->query_vars['vieworder'] : 0        ];
        return $params;
    }
}
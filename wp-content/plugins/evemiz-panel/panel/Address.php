<?php
use Evemiz\Panel\Handler;
use Evemiz\Panel\View;

class Address extends Handler {
// چون در Handler متد index به صورت public تعریف شده،
// اینجا هم باید public باشد
    // پیاده‌سازی متد index
    public function index() {
        $data=static::get_data();
        View::load_view('address', $data);
    }
// چون در Handler متد get_data به صورت protected static تعریف شده،
// اینجا هم باید همین‌طور باشد
    // پیاده‌سازی متد get_data
    protected static function get_data() {
        // اگر داده‌ها رو از ووکامرس می‌گیری، می‌تونی اینجا خالی بذاری یا بعداً پر
       $params= [
        'test'=>'test'
       ];
        return $params;
    }
}

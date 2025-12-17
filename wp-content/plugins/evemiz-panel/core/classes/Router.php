<?php
namespace Evemiz\Panel;

class Router {
    public function __construct() {           
        $this->handle_routes();      
    }

    public function handle_routes() {      
        $request_uri = $_SERVER['REQUEST_URI'];

        if (strpos($request_uri, 'dashboard') !== false) {       
            $handler_name = 'Dashboard';
        } elseif (strpos($request_uri, 'profile') !== false) {
            $handler_name = 'Profile';
        } elseif (strpos($request_uri, 'orders') !== false) {
            // مسیر جدید برای نمایش سفارش‌ها
            $handler_name = 'Orders';
        } elseif (strpos($request_uri, 'vieworder') !== false) {
            // مسیر برای نمایش جزئیات یک سفارش خاص
            $handler_name = 'ViewOrder';
        } else {
            return;
        }

        $handler_file  = static::handler_file_path($handler_name);
        $handler_class = static::handler_class_name($handler_name);

        if (file_exists($handler_file)) {
            require_once $handler_file;

            if (class_exists($handler_class)) {
                $handler_instance = new $handler_class();
                if (method_exists($handler_instance, 'index')) {
                    add_filter('the_content', function($content) use ($handler_instance) {
                        return $handler_instance->index();
                    });
                }
            } else {
                error_log("Handler class not found: {$handler_class}");
            }
        } else {
            error_log("Handler file not found: {$handler_file}");
        }
    }

    public static function handler_file_path($handler) {
        return EVEMIZ_PANEL_DIR . 'panel/' . $handler . '.php';
    }

    public static function handler_class_name($handler) {
        return __NAMESPACE__ . '\\' . $handler;
    }
}



// <?php
// namespace Evemiz\Panel;

// class Router {
    // public function __construct() {           /// سازنده کلاس برای مقداردهی اولیه و اجرای متدهای داخلی
        // $this->handle_routes();      //توابع متد زیر مجموعه تابع  مادر را اینجا با کلمه دیس فراخوانی میکنیم 
    // }

    // public function handle_routes() {      
        // $request_uri = $_SERVER['REQUEST_URI'];

        // if (strpos($request_uri, 'dashboard') !== false) {       //strpos موقعیت داشبورد را در url برمیگرداند
            // $handler_name = 'Dashboard';
        // } elseif (strpos($request_uri, 'profile') !== false) {
            // $handler_name = 'Profile';
        // } else {
            // return;
        // }

        // $handler_file  = static::handler_file_path($handler_name);
        // $handler_class = static::handler_class_name($handler_name);

        // if (file_exists($handler_file)) {
            // require_once $handler_file;

            // if (class_exists($handler_class)) {
                // $handler_instance = new $handler_class();
                // if (method_exists($handler_instance, 'index')) {
                    // خروجی فقط یک بار از طریق index()
                    // add_filter('the_content', function($content) use ($handler_instance) {
                        // return $handler_instance->index();
                    // });
                // }
            // } else {
                // error_log("Handler class not found: {$handler_class}");
            // }
        // } else {
            // error_log("Handler file not found: {$handler_file}");
        // }
    // }

    // public static function handler_file_path($handler) {
        // return EVEMIZ_PANEL_DIR . 'panel/' . $handler . '.php';
    // }

    // public static function handler_class_name($handler) {
        // return __NAMESPACE__ . '\\' . $handler;
    // }
// }

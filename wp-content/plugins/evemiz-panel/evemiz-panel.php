<?php
/*
Plugin Name: evemiz-panel
Plugin URI: https://evemiz.com/
Description: این یک افزونه تست و آموزش حساب کاربری هست
Version: 1.0.0
Author: abedini abbas
Author URI: https://evemiz.com/
Text Domain: panel-menu
domain path: languges
*/

// exit if accessed directly
// خط کد پایین ماله خود ورد پرسه و برای امنیته 
if (!defined('ABSPATH')) exit('access_denied');
// نیم اسپیس در واقع مثل آدرس روت اصلی عمل میکنند در آدرس دهی
use Evemiz\Panel\Panel;
use Evemiz\Panel\Base;
use Evemiz\Panel\Plugin;
if (!defined('EVEMIZ_PANEL_DIR')) {
    define('EVEMIZ_PANEL_DIR', plugin_dir_path(__FILE__));
}
// بارگذاری اتوماتیک کلاس‌ها دیگه نیاز به اینکلود صفحات دیگه در این صفحه  نباشه یه فانکشن هم داره پایین نوشتم
//اتو لود  کلاسهای core 
spl_autoload_register(function ($class) {
    // آدرس کلاس جستجو میکندکه با evemiz \panel  شروع شده و خانه صفر داشته باشد هر کدام از خط های پایین و خط بالارو میتونیم با وردامپ تست کنیم 
    if (strpos($class, 'Evemiz\\Panel') === 0) {
        $path = plugin_dir_path(__FILE__) . 'core/classes/';
        $className = str_replace('Evemiz\\Panel\\', '', $class);
        $file = $path . $className . '.php';
        if (file_exists($file)) {
            include_once $file;
        }
    }
});
// بارگذاری اتوماتیک فایل داشبورد خارج از مسیر زیر مجموعه فولدر کلاس مربوط به کد بالا نام کلاس رو برمیگرداند($class)
// //اتو لود  کلاسهای panel 

spl_autoload_register(function ($class) {
    // یک خط کد پایین کلاسهایی رو میگیره که با evemiz\panelشروع شوند بقیه کلاسهای ورد پرس را حذف میکنه
    if (strpos($class, 'Evemiz\\Panel') === 0) {
        $path = plugin_dir_path(__FILE__) . 'panel/';
        $className = str_replace('Evemiz\\Panel\\', '', $class);
        // نام فایل و نام کلاس هماهنگ و یکی میشوندمثل فایل router.php ,و;کلاس evemiz/panel/Roter
        $file = $path . $className . '.php';
        if (file_exists($file)) {
            include_once $file;
        }
    }
});

// فعال و غیر فعال سازی پلاگین با ثبت هوک‌ها
register_activation_hook(__FILE__, [\Evemiz\Panel\Base::class, 'activate']);
register_deactivation_hook(__FILE__, [\Evemiz\Panel\Base::class, 'deactivate']);
register_uninstall_hook(__FILE__, [\Evemiz\Panel\Base::class, 'uninstall']);


// بارگذاری ترجمه و اجرای پلاگین
add_action('plugins_loaded', [Plugin::class, 'loadTextdomain']);
add_action('init', [Plugin::class, 'preInit'], 0);
add_action('init', [Plugin::class, 'init'], 20);
// برای ووکامرس
add_filter('woocommerce_get_endpoint_url',function($url ,$endpoint ,$value ,$permalink){
    if($endpoint==="view-order"){
        $endpoint='vieworder';
    }
$url=str_ireplace('my-accunt','dashboard','permalink').$endpoint. '?='.$value;
return $url;
},10,4 );

// اجرای کلاس اصلی :: نقش $this را دارد یعنی همین متد و کلاس
// فراخوانی آخرین فانکشن داخل فایل panel.php
Panel::getInstance();

// چند خط پایین برای وقتی که صفحات در سرچ بازنویسی نشن میزنیم 
// add_action('init', function() {
    // add_rewrite_rule('^dashboard/?$', 'index.php?evemiz_route=dashboard', 'top');
    // add_rewrite_rule('^profile/?$', 'index.php?evemiz_route=profile', 'top');
// });
// 
// add_filter('query_vars', function($vars) {
    // $vars[] = 'evemiz_route';
    // return $vars;
// });
// 
// add_action('template_redirect', function() {
    // $route = get_query_var('evemiz_route');
    // if ($route === 'dashboard') {
        // $dashboard = new \Evemiz\Panel\Dashboard();
        // echo $dashboard->getContent();
        // exit;
    // }
    // if ($route === 'profile') {
        // $profile = new \Evemiz\Panel\Profile();
        // echo $profile->getContent();
        // exit;
    // }
// });


// چند خط پایین برای وقتی که جای متن هارو در صفحات مشخص میکنیم  میزنیم 

// نمایش داشبورد در پیشخوان وردپرس
// add_action('admin_notices', function() {
    // $dashboard = new \Evemiz\Panel\Dashboard();
    // echo $dashboard->getContent();
// });

// یا نمایش در فرانت‌اند (مثلاً در فوتر)
// add_action('wp_footer', function() {
    // $dashboard = new \Evemiz\Panel\Dashboard();
    // echo $dashboard->getContent();
// });


// نمایش پروفایل در پیشخوان وردپرس
// add_action('admin_notices', function() {
    // $profile = new \Evemiz\Panel\Profile();
    // echo $profile->getContent();
// });
// 
// یا نمایش در فرانت‌اند (مثلاً در فوتر)
// add_action('wp_footer', function() {
    // $profile = new \Evemiz\Panel\Profile();
    // echo $profile->getContent();
// });
// 


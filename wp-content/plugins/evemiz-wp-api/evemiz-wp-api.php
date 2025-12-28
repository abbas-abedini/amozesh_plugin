
<?php
/*
Plugin Name: evemiz-wp-api
Plugin URI: https://evemiz.com/
Description: این یک افزونه تست و آموزش منوی تنظیمات هست
Version: 1.0.0
Author: abedini abbas
Author URI: https://evemiz.comlr
Text Domain: seting-menu
*/

define('WP_API_PATH', plugin_dir_path(__FILE__));
define('WP_API_URL', plugin_dir_url(__FILE__));
define('WP_API_VERSION', '1.0.0');

function wp_api_activation() {
    // add_option( ,evemiz_wp_api_title','عنوان تست' );
    // ساخت نقش جدید
    add_role(
        'seo_manager1',
        'سئوکاری',
        [
            'read'         => true,
            'edit_posts'   => true,
            'delete_posts' => true,
        ]
    );

    // اضافه کردن قابلیت جدید بجز نقش اولیه که در add_rolدادیم به نقش
    $role = get_role('seo_manager1');
    if ($role) {
        $role->add_cap('edit_pages'); // مثال: اضافه کردن قابلیت ویرایش برگه‌ها
    }
}
// یعنی اگر یوزر فعلی دسترسی به کاری دارد اونوقت اجازه انجام چیری بده
// if(current_user_can('edite_posts'));

function wp_api_deactivation() {
    // delete_option( 'evemiz_wp_api_title' );
    // حذف نقش هنگام غیرفعال‌سازی
    remove_role('seo_manager1');
}

register_activation_hook(__FILE__, 'wp_api_activation');
register_deactivation_hook(__FILE__, 'wp_api_deactivation');

// بارگذاری فایل‌های بخش مدیریت
if (is_admin()) {
    require WP_API_PATH . 'admin/menu.php';
    require WP_API_PATH . 'admin/metabox.php';
}
require WP_API_PATH.'admin/ajax.php';



/**
 * Registers a stylesheet.
 */


// function wp_api_evemiz_styles() {

      // wp_register_style('evemiz-wp-api-bootstrap',$style_url1)
      // wp_enqueue_style('evemiz-wp-api-bootstrap');

    //  Build the URL to your plugin's CSS file
    // $style_url = plugin_dir_url(__FILE__) . 'assets/css/style.css';

    // Register the style with a handle
    // wp_register_style(
        // 'evemiz-wp-api-style', // Handle
        // $style_url,            // File URL
        // array(),               // Dependencies
        // '1.0.0',               // Version
    //   'all',                    // Media
        // '(max-width:640px)'                  // Media
    // );

     // Enqueue the style
//  wp_enqueue_style('evemiz-wp-api-style');


// add script
    // $style_url1 = plugin_dir_url(__FILE__) . 'assets/js/main.js';

    //  wp_register_script(
    //  'evemiz-wp-api-script', // Handle
    //  $style_url1,            // File URL
    //  array(),               // Dependencies
    //  '1.0.0',               // Version
//    true                  // load in foter

//  )



// افزودن css , js
function wp_api_evemiz_styles() {
    // افزودنdependenciمثل bootstrap,غیره

    // $style_bootstrap = plugin_dir_url(__FILE__) . 'assets/css/bootstrap.css';
    // اولی نام و دومی آدرس فایلمون بعد هم اگه داشتیم کتابخانه
//   wp_register_style('wp-api-bootstrap', $style_bootstrap, [], '1.0.0', 'all');
    // wp_enqueue_style('wp-api-bootstrap');

// cssافزودنداخل کروشه خالی [wpapi_bootstrap]رو میزاریم
   $style_url = plugin_dir_url(__FILE__) . 'assets/css/style.css';
    wp_register_style('evemiz-wp-api-style', $style_url, [], '1.0.0', 'all');
    wp_enqueue_style('evemiz-wp-api-style');

    // JS
    $script_url = plugin_dir_url(__FILE__) . 'assets/js/main.js';
    wp_register_script('evemiz-wp-api-script', $script_url, ['jquery'], '1.0.0', true);

        wp_localize_script(
    'evemiz-wp-api-script',
    'may_ajax_object',
    array(
        'ajax_url' => admin_url('admin-ajax.php')
    )
);
// با هوک پایین فقط به فرانت اضافه میشوند
wp_enqueue_script('evemiz-wp-api-script');


}
add_action('wp_enqueue_scripts', 'wp_api_evemiz_styles');
// با هوک پایین به ادمین اضافه میشود
add_action('admin_enqueue_scripts', 'wp_api_evemiz_styles');


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

    // اضافه کردن قابلیت جدید به نقش
    $role = get_role('seo_manager1');
    if ($role) {
        $role->add_cap('edit_pages'); // مثال: اضافه کردن قابلیت ویرایش برگه‌ها
    }
}
// if(current_user_can('edite_posts'));

function wp_api_deactivation() {
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




function wp_api_evemiz_styles() {
    // CSS
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

wp_enqueue_script('evemiz-wp-api-script');


}
add_action('wp_enqueue_scripts', 'wp_api_evemiz_styles');
add_action('admin_enqueue_scripts', 'wp_api_evemiz_styles');

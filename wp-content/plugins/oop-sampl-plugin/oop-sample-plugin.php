

<?php
/*
Plugin Name: oop-sample-plugin
Plugin URI: https://evemiz.com/
Description: این یک افزونه تست و آموزش oop هست
Version: 1.0.0
Author: abedini abbas
Author URI: https://evemiz.com
Text Domain: oop-sample-menu
*/

class oop_plugin 
{
    public function __construct() {
        $this->define_const();
        $this->init();
        $this->include_class_file();
    }

    public function define_const() {
        define('OOP_SAMPLE_PATH', plugin_dir_path(__FILE__));
        define('OOP_SAMPLE_URL', plugin_dir_url(__FILE__));
        define('OOP_SAMPLE_VERSION', '1.0.0');
    }

    public function init(){
        register_activation_hook(__FILE__, [ $this , 'activation']);
        register_deactivation_hook(__FILE__, [ $this , 'deactivation']);
        add_action('wp_enqueue_scripts', [ $this, 'register_style_script']);
    }

    public function include_class_file() {
        include_once OOP_SAMPLE_PATH . '/inc/order.class.php';
        include_once OOP_SAMPLE_PATH . '/inc/user.class.php';
    }

    public function register_style_script(){
        wp_enqueue_style( 'oop-style', OOP_SAMPLE_URL . 'assets/css/style.css');
        wp_enqueue_script( 'oop-script', OOP_SAMPLE_URL . 'assets/js/script.js', ['jquery'], OOP_SAMPLE_VERSION, true );
    }

    public function activation() {
        // کدهای مربوط به فعال‌سازی پلاگین
    }

    public function deactivation() {
        // کدهای مربوط به غیرفعال‌سازی پلاگین
    }
    
}

new oop_plugin();
var_dump(OOP_SAMPLE_PATH);

<?php
/*
Plugin Name: evemiz-login
Plugin URI: https://evemiz.com/
Description: این یک افزونه تست و آموزش  ورود وثبت نام  هست
Version: 1.0.0
Author: abedini abbas
Author URI: https://evemiz.com
Text Domain: seting-menu
*/

define('EVEMIZLOGIN_PATH', plugin_dir_path(__FILE__));
define('EVEMIZLOGIN_URL', plugin_dir_url(__FILE__));
define('EVEMIZLOGIN_VERSION', '1.0.0');

    require EVEMIZLOGIN_PATH . 'functions.php';

function evemiz_login_activation() {
   
}

function evemiz_login_deactivation() {

}

register_activation_hook(__FILE__, 'evemiz_login_activation');
register_deactivation_hook(__FILE__, 'evemiz_login_deactivation');



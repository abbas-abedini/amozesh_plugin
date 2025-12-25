<?php
/*Plugin Name:             "لینک ساز "
Plugin URI:                  https:/evemiz.com/
Description: این یک افزونه لینک ساز هست
Version: 1.0.0
Author:abedini abbas
Author URI: https://evemiz.comlr
Text Domain: link-builder
*/
// اختصار uto_link_builder =alb
define('ALB_PATH', plugin_dir_path(__FILE__));
define('ALB_URL',plugin_dir_url(__FILE__));
define('ABL_VERSION', '1.0.0');

function alb_activation(){
//   do somting wen plugin activat
}
function alb_deactivation(){
//   do somting wen plugin deactivat
}
register_activation_hook(__FILE__ ,'alb_activation');
register_deactivation_hook(__FILE__ ,'alb_deactivation');

// function auto_link_builder($content){
// return 'تمام محتوا فعلا حذف شده است ';
// return $content .'متن آموزشی من';
// return $content;
// }
// add_filter('the_content','auto_link_builder' );

function auto_link_builder( $content ) {

    $search_for   = 'آموزش';
    $replace_with = 'دوره';
    $search_for   = 'طراحی';
$replace_with = '<a href="https//webkima.com">طراحی </a>';
    $content = preg_replace('/' . preg_quote($search_for, '/').'/u',$replace_with, $content);

    return $content;
}
add_filter('the_content', 'auto_link_builder');
// regular ecpersionsموارد قابل جستجو در سطح وب


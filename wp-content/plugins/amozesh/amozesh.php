<?php
/*Plugin Name:             "amozesh-plugin "
Plugin URI:                  https:/evemiz.com/
Description:            این یک افزونه تست و آموزشی هست
Version: 1.0.0
Author:abedini abbas
Author URI: https://evemiz.comlr
Text Domain: amozesh
*/
// نام پلاگین بعلاوه path
define('AMOZESH_PLUGIN_PATH', plugin_dir_path(__FILE__));
define('AMOZESH_PLUGIN_URL', plugin_dir_url(__FILE__));
define('AMOZESH_PLUGIN_VERSION', '1.0.0');


// echo AMOZESH_PLUGIN_PATH;
// echo' <br/>';
// echo AMOZESH_PLUGIN_URL;

function amozesh_activation(){
//   do somting wen plugin activat
}
function amozesh_deactivation(){
//   do somting wen plugin deactivat
}
register_activation_hook(__FILE__ ,'amozesh_activation');
register_deactivation_hook(__FILE__ ,'amozesh_deactivation');
// is_admin()
// ? include AMOZESH_PLUGIN_PATH .'/includes/admin/admin.php'
// : include AMOZESH_PLUGIN_PATH .'/includes/front/front.php';


if ( is_admin() ) {
    include AMOZESH_PLUGIN_PATH . '/includes/admin/admin.php';
} else {
    include AMOZESH_PLUGIN_PATH . '/includes/front/front.php';
}

include AMOZESH_PLUGIN_PATH . '/includes/common/public.php';

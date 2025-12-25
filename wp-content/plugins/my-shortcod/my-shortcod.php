<?php
/*Plugin Name:             "amozesh-shortcod "
Plugin URI:                  https:/evemiz.com/
Description:            این یک افزونه تست و آموزش شورت کد هست
Version: 1.0.0
Author:abedini abbas
Author URI: https://evemiz.comlr
Text Domain: shortcod
*/
function check_user_loggedin( $atts, $content = "" ){
   // var_dump ($atts);
   if(is_user_logged_in()){
//  return 'این هم از فایل دانلودی شما ';
// return $content . $atts['product_id'];
// return $content . $atts['title'];
return $content . $atts['product_id'];
   }else{
    return 'برای دانلود فایل وارد حساب کاربری خود شوید ';
   };

//   return "محتوا=$content ";
  return  "تست دو شورت کد";
}
add_shortcode('no_loggin','check_user_loggedin');


// [no_loggin  pruduct_id=10  title='this is title ']
echo do_shortcode('[no_loggin]');

<?php
/*
Plugin Name: oop-plugin
Plugin URI: https://evemiz.com/
Description: این یک افزونه تست و آموزش  oop هست
Version: 1.0.0
Author: abedini abbas
Author URI: https://evemiz.comlr
Text Domain: oop-menu
*/


define('OOP_PATH', plugin_dir_path(__FILE__));
define('OOP_URL', plugin_dir_url(__FILE__));
define('OOP_VERSION', '1.0.0');

class User {
    public $ID;
    public $user_name;
    public $user_email;
    public $user_pass;
    
    public function insert_user($ID, $user_name, $user_email, $user_pass) {
        $this->ID = $ID;
        $this->user_name = $user_name;
        $this->user_email = $user_email;
        $this->user_pass = $user_pass;
    }
}

// $new_user = new User();
// $new_user->insert_user(1, "Ali", "ali@example.com", "123456");
// 
// echo $new_user->user_name; // خروجی: Ali
// 
//////نوع متد آرایه
// class User {
    // public $ID;
    // public $user_name;
    // public $user_email;
    // public $user_pass;
    // 
    // public function insert_user($data) {
        // $this->ID = $data['ID'];
        // $this->user_name = $data['user_name'];
        // $this->user_email = $data['user_email'];
        // $this->user_pass = $data['user_pass'];
    // }
// }
// 
// $new_user = new User();
// $new_user->insert_user([
    // 'ID' => 1,
    // 'user_name' => 'Ali',
    // 'user_email' => 'ali@example.com',
    // 'user_pass' => '123456'
// ]);
// 
// echo $new_user->user_email; // خروجی: ali@example.com

include OOP_PATH.  '/class-vhicel.php';















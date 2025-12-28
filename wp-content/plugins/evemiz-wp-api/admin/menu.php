<?php

use PgSql\Result;

add_action('admin_menu', 'add_menu_plugin');
// https://developer.wordpress.org/resource/dashicons/#lockz
function add_menu_plugin() {
    add_menu_page(
        'تنظیمات پلاگینم',   // عنوان صفحه
        'تنظیمات پلاگین',   // عنوان منو
        'manage_options',   // سطح دسترسی
        'wp_api_amozesh',   // slug منو
        'main_menu_page',   // تابع callback
        'dashicons-admin-generic', // آیکون منو
        30                  // موقعیت منو
    );

    // add_submenu_page(
        // 'wp_api_amozesh',   // slug منوی اصلی
        // 'تنظیمات عمومی',    // عنوان صفحه
        // 'تنظیمات عمومی',    // عنوان زیرمنو
        // 'manage_options',   // سطح دسترسی
        // 'wp_api_general',   // slug زیرمنو
        // 'general_menu_page' // تابع callback
    // );

    add_submenu_page(
    'wp_api_amozesh',   // slug منوی اصلی
    'نمایش دیتابیس ',    // عنوان صفحه
    ' نمایش دیتابیس',    // عنوان زیرمنو
    'manage_options',   // سطح دسترسی
    'wp_api_general',   // slug زیرمنو
    'wpdp_menu_page' // تابع callback
);
 add_submenu_page(
 'wp_api_amozesh',   // slug منوی اصلی
 'نمایش کاربران ویژه ',    // عنوان صفحه
 ' نمایش کاربران ویژه',    // عنوان زیرمنو
 'manage_options',   // سطح دسترسی
 'wp_api_users_vip',   // slug زیرمنو
 'wpdp_users_vip_page' // تابع callback
 );
}
// نوع دیگری از کد پایین
// function main_menu_page() {
    // echo '<h1>تنظیمات صفحه بالا</h1>';
// $activate_plugin=null;
    // var_dump($_POST['activate_plugin']);
// if(isset($_POST['activate_plugin'])) {
// $activate_plugin=1;
// }else{
// $activate_plugin=0;
// }
// var_dump($activate_plugin);
// var_dump($_POST);
// var_dump($_POST['activate_plugin'] );
// var_dump($activate_plugin);
// $activate_plugin=isset($_POST['activate_plugin'])?1:0;
// add_option('wp_amozesh_api',$activate_plugin);
    // include  WP_API_PATH . 'admin/templates/main-menu.php' ;
// }
// function general_menu_page() {
    // echo '<h1>تنظیمات عمومی بالا</h1>';
    // include  WP_API_PATH . 'admin/templates/general.php' ;
// }

function main_menu_page() {
    // $option=get_option('wp_amozesh_api');
    // کد پایین اگر اینجا باشد تیک باید رفرش کنیم تا بیاد پس میبریم بیرون کد پایین تر
    // $is_plugin_activ=get_option('wp_amozesh_api');
    // var_dump($option);
   $activate_plugin=0;
    if(isset($_POST['submit'])){
//    Determine if plugin is activated
    $activate_plugin = isset($_POST['activate_plugin']) ? 1 : 0;

    // Save or update the option in WordPress
    update_option('wp_amozesh_api', $activate_plugin);
    update_option('wp_amozesh_api_title',$_POST['title_plugin']);

    // add nam and wareble in database
// add_option('wp_amozesh_api',$activate_plugin);
    }

        $is_plugin_activ=get_option('wp_amozesh_api');
        $title=get_option('wp_amozesh_api_title')?get_option('wp_amozesh_api_title'):'تنظیمات پیشفرض';

    // Load the admin template
    include WP_API_PATH . 'admin/templates/main-menu.php';
}

// function general_menu_page() {
    // echo '<h1>تنظیمات عمومی بالا</h1>';


    // include  WP_API_PATH . 'admin/templates/general.php' ;
//
// }
function wpdp_menu_page() {

//    create userآموزش
// $password = wp_generate_password(10); // generate a random 10-character password
// $user_id  = wp_create_user('usertest', $password, 'usertest@gmail.com');

// if ( is_wp_error($user_id) ) {
    // echo 'خطا در ساخت کاربر: ' . $user_id->get_error_message();
// } else {
    // echo 'کاربر جدید ساخته شد با ID: ' . $user_id;
    // echo 'رمز عبور: ' . $password; // فقط برای تست، در عمل نباید رمز را چاپ کنید
// }


// آموزش insert user


// $password = wp_generate_password(10);

// $userdata = array(
    // 'user_pass'     => $password,
    // 'user_login'    => 'test2',
    // 'user_nicename' => 'محمدعلی',
    // 'user_email'    => 'mohamad@gmail.com',
    // 'display_name'  => 'ممدعلی',
    // 'first_name'    => 'محمد',
    // 'last_name'     => 'عابدیان فر',
    // 'description'   => 'برای آموزش اینسرت یوزر',
    // 'role'          => 'administrator'
// );

// $user_id = wp_insert_user($userdata);

// if ( is_wp_error($user_id) ) {
    // echo 'خطا در ساخت کاربر: ' . $user_id->get_error_message();
// } else {
    // echo 'کاربر جدید ساخته شد با ID: ' . $user_id;
    // echo 'رمز عبور: ' . $password; // فقط برای تست
// }

// آموزش wp_update _user
// wp_update_user([
    // 'ID'=>3,
    // 'nickname'=>'یورز آموزشی'
// ]);

// آموزش wp_delete_user
// wp_delete_user(2);



    global $wpdb;

    $action = isset($_GET['action']) ? sanitize_text_field($_GET['action']) : '';

    // Handle delete action
    if ($action === 'delete' && isset($_GET['id'])) {
        $id = intval($_GET['id']);

        $deleted = $wpdb->delete(
            "{$wpdb->prefix}amozesh",
            [ 'ID' => $id ],
            [ '%d' ]
        );

        if ($deleted) {
            echo '<div class="notice notice-success"><p>Row deleted successfully.</p></div>';
        } else {
            echo '<div class="notice notice-error"><p>No row deleted.</p></div>';
        }
    }

    // Handle add action

if ( $action === 'add' ) {
    if ( isset($_POST['submit']) ) {
        global $wpdb;
// firstname اولی از دیتابیس ودومی از فرم هست وبقیه هم همینطور
        $firstname = sanitize_text_field($_POST['firstname']);
        $lastname  = sanitize_text_field($_POST['lastname']);
        $mobil    = sanitize_text_field($_POST['mobil']); // مطمئن شوید نام ستون همین است

        $wpdb->insert(
            $wpdb->prefix . 'amozesh',
            [
                'firstname' => $firstname,
                'lastname'  => $lastname,
                'mobil'     => $mobil,
            ],
        );
    }

    include WP_API_PATH . 'admin/templates/add.php';

} elseif ( $action === 'edit' ) {
    global $wpdb;

    $id = intval($_GET['id']);




    if ( isset($_POST['edit_form']) ) {
        $firstname = sanitize_text_field($_POST['firstname']);
        $lastname  = sanitize_text_field($_POST['lastname']);
        $mobil    = sanitize_text_field($_POST['mobil']);

        $wpdb->update(
            $wpdb->prefix . 'amozesh',
            [
                'firstname' => $firstname,
                'lastname'  => $lastname,
                'mobil'     => $mobil,
            ],
            [ 'id' => $id ],
        );
    }
    $result = $wpdb->get_row(
    $wpdb->prepare("SELECT * FROM {$wpdb->prefix}amozesh WHERE id = %d", $id)
);

    include WP_API_PATH . 'admin/templates/edit.php';

} else {
    global $wpdb;

    // Query all rows
    $results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}amozesh");

    // Debugging (optional)
    // var_dump($results);

    // Include template
    include WP_API_PATH . '/admin/templates/wpdb-general.php';
}
}

function wpdp_users_vip_page(){
global  $wpdb;
if ( isset($_GET['action']) && $_GET['action'] === 'edit' ) {
    // کدی که باید در حالت ویرایش اجرا شود
    $user_id=intval($_GET['id']);
    if(isset($_POST['edit_user'])){
        update_user_meta($user_id ,'mobile',$_POST['mobile']);
        update_user_meta($user_id ,'nickname',$_POST['nickname']);
    }
    $mobile=get_user_meta($user_id, 'mobile' , true);
    $nickname=get_user_meta($user_id, 'nickname' , true);
            include WP_API_PATH . '/admin/templates/edit-users.php';
return;
}

if ( isset($_GET['action']) && $_GET['action'] === 'delete' ) {
    // کدی که باید در حالت ویرایش اجرا شود
    $user_id=intval($_GET['id']);
    delete_user_meta($user_id ,'mobile');
    delete_user_meta($user_id ,'nickname');

}

// داخل پرانتز پایین اسامی رو از wp_user دیتابیس میاریم
     $users = $wpdb->get_results("SELECT ID,user_email,user_login,user_registered FROM
{$wpdb->users}");
    //  var_dump($users)
        include WP_API_PATH . '/admin/templates/vip-users.php';
}

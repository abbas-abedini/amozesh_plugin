<?php
namespace Evemiz\Panel;

use Evemiz\Panel\Handler;
use Evemiz\Panel\View;

class Profile extends Handler {

    private $content;

    public function __construct() {
        // $this->content = "Profile page loaded";

        // بررسی اینکه فرم ارسال شده و برای امنیت کدهامون
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit-form'])) {
            static::update_user_data(); // آپدیت اطلاعات پروفایل
            if (!empty($_POST['last_password'])) {
                static::update_user_password(); // آپدیت پسورد
            }
        }
    }

    public function index() {
        return View::load_view('profile', array_merge(static::get_data(), [
            'title'   => 'پروفایل',
            'content' => $this->content
        ]));
    }

    protected static function get_data() {
        return [
            'first_name'   => get_user_meta(get_current_user_id(), 'first_name', true),
            'last_name'    => get_user_meta(get_current_user_id(), 'last_name', true),
            'email'        => get_userdata(get_current_user_id())->user_email ?? '',
            'display_name' => get_userdata(get_current_user_id())->display_name ?? '',
            // 'nickname' => get_userdata(get_current_user_id())->nickname?? ''
        ];
    }

    protected static function user_data() {
        return get_userdata(get_current_user_id());
    }

    // آپدیت اطلاعات پروفایل کاربر
    protected static function update_user_data() {
        $user_id = get_current_user_id();
// sanitize_text_fieldبرای اینکه چک کند متن کاربر درست و منطقی هست
        if (!empty($_POST['first_name'])) {
            update_user_meta($user_id, 'first_name', sanitize_text_field($_POST['first_name']));
        }
        if (!empty($_POST['last_name'])) {
            update_user_meta($user_id, 'last_name', sanitize_text_field($_POST['last_name']));
        }
        if (!empty($_POST['display_name'])) {
            wp_update_user([
                'ID'           => $user_id,
                'display_name' => sanitize_text_field($_POST['display_name']),
            ]);
        }
            if (!empty($_POST['email'])) {
        wp_update_user([
            'ID'         => $user_id,
            'user_email' => sanitize_email($_POST['email']),
        ]);
    }
        // نیک نام در فرم ما نیست میتونیم در آیتم فرمها اضافه کنیم فقط بابت آموزش
        //    if (!empty($_POST['nickname'])) {
    //    wp_update_user([
        //    'ID'           => $user_id,
        //    'nickname' => sanitize_text_field($_POST['nickname']),
    //    ]);
    //   }
    }

    // آپدیت پسورد کاربر
    protected static function update_user_password() {
        if (!empty($_POST['last_password'])) {
            $passdata = $_POST;
            $user = wp_get_current_user();

            $x = wp_check_password($passdata['last_password'], $user->user_pass, $user->ID);
// udataهمون user data هست
            if ($x) {
                if (!empty($passdata['new_password']) && !empty($passdata['confirm_password'])) {
                    if ($passdata['new_password'] === $passdata['confirm_password']) {
                        $udata = [
                            'ID'        => $user->ID,
                            'user_pass' => $passdata['new_password']
                        ];
                        $uid = wp_update_user($udata);

                        if ($uid) {
                            $passupdatemsg  = "The password has been updated successfully";
                            $passupdatetype = 'successed';
                        } else {
                            $passupdatemsg  = "Sorry! Failed to update your account details.";
                            $passupdatetype = 'errored';
                        }
                    } else {
                        $passupdatemsg  = "Confirm password doesn't match with new password";
                        $passupdatetype = 'errored';
                    }
                } else {
                    $passupdatemsg  = "Please enter new password and confirm password";
                    $passupdatetype = 'errored';
                }
            } else {
                $passupdatemsg  = "Old Password doesn't match the existing password";
                $passupdatetype = 'errored';
            }
        }
    }
}

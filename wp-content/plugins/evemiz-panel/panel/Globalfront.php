<?php
namespace Evemiz\Panel;

class Globalfront {

    public static function get_data() {
        $params = [
            'avatar_url'   => static::get_avatar(),
            'display_name' => static::get_user_display_name(),
        ];
        return $params;
    }

    protected static function get_avatar() {
        $avatar = get_avatar_data(get_current_user_id(), ['size' => 300]);
        $avatar_url = $avatar['url'] ?? EVEMIZ_PANEL_ASSETS_URL . 'image/avatar.webp';
        return $avatar_url;
    }

    protected static function get_user_display_name() {
        $user_data = get_userdata(get_current_user_id());

        if ($user_data) {
            // اگر کاربر لاگین است
            return !empty($user_data->display_name) 
                ? $user_data->display_name 
                : $user_data->user_login;
        }

        // اگر کاربر مهمان است
        return "کاربر مهمان";
    }
}

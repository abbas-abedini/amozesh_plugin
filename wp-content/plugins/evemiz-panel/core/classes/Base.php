<?php
namespace Evemiz\Panel;

class Base
{
    public static function activate()
    {
        // کلاس baseبرای مدیریت هوک های اصلی است
        // برای فراخوانی از دیتابیس
        // global $wpdb;
        // $table_name = $wpdb->prefix . 'evemiz_panel';

        // $charset_collate = $wpdb->get_charset_collate();
        // $sql = "CREATE TABLE $table_name (
            // id mediumint(9) NOT NULL AUTO_INCREMENT,
            // name varchar(100) NOT NULL,
            // created_at datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
            // PRIMARY KEY  (id)
        // ) $charset_collate;";

        // require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        // dbDelta($sql);

        // add_option('evemiz_panel_version', EVEMIZ_PANEL_VER);
    }

    public static function deactivate()
    {
        // wp_clear_scheduled_hook('evemiz_panel_cron');
    }

    public static function uninstall()
    {
        // global $wpdb;
        // $table_name = $wpdb->prefix . 'evemiz_panel';
        // $wpdb->query("DROP TABLE IF EXISTS $table_name");

        // delete_option('evemiz_panel_version');
    }
}



/////
// نوع ساده کد با توضیحات
// <?php
// namespace Evemiz\Panel;
/**
 * کلاس Base برای مدیریت هوک‌های اصلی پلاگین
 */
// class Base
// {
    /**
     * اجرا هنگام فعال‌سازی پلاگین
     */
    // public static function activate()
    // {
        // مثال: ساخت جدول یا ذخیره تنظیمات اولیه
    // }

    /**
     * اجرا هنگام غیرفعال‌سازی پلاگین
     */
    // public static function deactivate()
    // {
        // مثال: پاک کردن کرون‌جاب‌ها یا ریست کش
    // }

    /**
     * اجرا هنگام حذف کامل پلاگین
     */
    // public static function uninstall()
    // {
        // مثال: پاک کردن داده‌ها از دیتابیس یا wp_options
    // }
// }
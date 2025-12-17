<?php
namespace Evemiz\Panel;

class Plugin
{
    const PREFIX = 'EVEMIZ-PANEL';
    const L10N   = 'panel-menu'; // باید با Text Domain در هدر پلاگین یکی باشد

    public static function preInit()
    {
        // بارگذاری ترجمه‌ها
        add_action('plugins_loaded', [self::class, 'loadTextdomain']);

        // اجرای کدهای اصلی پلاگین
        add_action('init', [self::class, 'init']);
    }

    public static function init()
    {
        // اینجا کدهای اصلی پلاگین قرار می‌گیرند
        // مثل ثبت CPT، shortcode، enqueue کردن اسکریپت‌ها و ...
    }

    public static function loadTextdomain()
    {
        load_plugin_textdomain(
            static::L10N,
            false,
            dirname(plugin_basename(__FILE__)) . '/languages/'
        );
    }
}



// ارتباط فایلهای پلاگین به شکل زیر است 
// [کاربر درخواست می‌دهد از طریق مرورگر]
                // │
                // ▼
        //   router.php
//    (تعیین مسیر و هدایت درخواست)
                // │
                // ▼
        //   base.php
//    (بارگذاری تنظیمات پایه، اتصال به دیتابیس،
    // آماده‌سازی کلاس‌ها و توابع عمومی)
                // │
                // ▼
        //  plugin.php
//    (فعال‌سازی افزونه‌ها و امکانات جانبی
    // مثل ماژول پرداخت یا گزارش‌گیری)
                // │
                // ▼
        //  panel.php
//    (نمایش پنل مدیریت یا رابط کاربری
    // برای کنترل و مدیریت سیستم)
                // │
                // ▼
        //   [خروجی به کاربر]

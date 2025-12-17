<?php
namespace Evemiz\Panel;

final class Panel
{
    // بااین یک خط کد پایین وفانکشن انتهای کدها مطمعن میشیم کدهای ثابت ما فقط یکبار اجرا میشوند 
    private static $instance = null;

    private function __construct()
    {
        $this->defineConst();
        add_action('init', [$this, 'startRouter']); // اجرای Router در هوک init
    }

    private function defineConst()
    {
        if (!defined('EVEMIZ_PANEL_URL'))
            define('EVEMIZ_PANEL_URL', plugin_dir_url(__FILE__));
        if (!defined('EVEMIZ_PANEL_DIR'))
            define('EVEMIZ_PANEL_DIR', plugin_dir_path(__FILE__));
        // بوسیله خط پایین پوشه classes رو بطور کامل فراخوانی میکنیم
        if (!defined('EVEMIZ_PANEL_CLASSES'))
            define('EVEMIZ_PANEL_CLASSES', EVEMIZ_PANEL_DIR . 'core/classes/');
        if (!defined('EVEMIZ_PANEL_ASSETS_URL'))
       define('EVEMIZ_PANEL_ASSETS_URL', EVEMIZ_PANEL_URL . 'assets/');
        if (!defined('EVEMIZ_PANEL_VER'))
            define('EVEMIZ_PANEL_VER', '1.0.0');
    }

    public function startRouter()
    {
        if (class_exists(\Evemiz\Panel\Router::class)) {
            // فراخوانی کلاس روتر با خط پایین
            $router = new \Evemiz\Panel\Router();
                        // فراخوانی متد هندلر روتس کلاس روتر با خط پایین
            $router->handle_routes();
        } else {
            error_log("Router class not found");
        }
    }

// با فانکش پایین مطمعن میشیم کدهای بالا فقط یکبار در اسکوپ وردپرس ما اجرا میشوند 
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new Panel();
        }
        return self::$instance;
    }
}
// کلاسها با  newو اسم اون کلاس فراخوانی میشوند و با <- متد هایشان فراخوانی میشود
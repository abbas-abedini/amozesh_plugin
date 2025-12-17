<?php
namespace Evemiz\Panel;
use Evemiz\Panel\Globalfront;    // برای دسترسی به کلاس Globalfront

class View {
     // گرفتن داده‌های عمومی
    public static function load_view($view_file, $data = []) {
        if (!empty($data) && is_array($data)) {
        }
        // extract($data)بعد از ترکیب به صورت زیر تغییر میدهیم
        // مسیر فایل view
        $view_file_path = EVEMIZ_PANEL_DIR . 'panel/views/layouts/' . $view_file . '.php';
        $view_file_path = EVEMIZ_PANEL_DIR . 'panel/views/' . $view_file . '.php';
        if (file_exists($view_file_path)&&is_readable($view_file_path)) {
            $global_front_init=new Globalfront;
            // get_dataهمون نام فانکشن استاتیک صفحه globalfront هست
            $data_in_global_front=$global_front_init::get_data();
            // ترکیب دو تا داده‌ها
           $combin_data=array_merge($data_in_global_front,$data);
            // استخراج متغیرها برای استفاده در view
           extract($combin_data);

      ob_start();
            include $view_file_path;
            return ob_get_clean();
        } else {
            return "<div style='color:red;'>View '{$view_file}' not found!</div>";
        }
    }
}










// namespace Evemiz\Panel;
// 
// use Evemiz\Panel\Globalfront; // برای دسترسی به کلاس Globalfront
// 
// class View {
    // public static function load_view($view_file, $data = []) {
        // گرفتن داده‌های عمومی
        // $data_in_global_front = Globalfront::get_data();
        // ترکیب داده‌ها
        // $combin_data = array_merge($data_in_global_front, $data);
        // استخراج متغیرها برای استفاده در view
        // extract($combin_data);
// 
        // مسیر فایل view
        // $view_file_path = EVEMIZ_PANEL_DIR . 'panel/views/' . $view_file . '.php';
// 
        // if (file_exists($view_file_path) && is_readable($view_file_path)) {
            // ob_start();
            // include $view_file_path;
            // return ob_get_clean();
        // } else {
            // return "<div style='color:red;'>View '{$view_file}' not found!</div>";
        // }
    // }
// }
// 
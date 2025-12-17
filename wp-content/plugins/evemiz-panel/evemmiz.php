<?PHP
/*
Plugin Name: evemiz-panel
Plugin URI: https://evemiz.com/
Description: این یک افزونه تست و آموزش  حساب کاربری  هست
Version: 1.0.0
Author: abedini abbas
Author URI: https://evemiz.com
Text Domain: panel-menu
*/
// کد پایین ماله وردپرسه و یعنی اگه دیفاین نشده بود یکی داره غیر مجاز استفاده میکنه وخارج شو 
                                                //   if(!defined('ABSPATH'))exit('access_denied');



// final بدلیل اینکه این کلاس نهایی ما هست اولش میاریم
                                                        //    final class Evemiz_panel
                                                        //    {
    // باعث میشود کد ما فقط یک بار اجرا شود وبصورت دستی است نه دینامیک
                                                        // public static $instanse=null;



                                                        //    public function __construct()
                                                            //   {
        // var_dump(12345);
                                                        //  $this->define_const();
        // کد پایین رو کامنت کنیم دیگه فانکشن رجیستر ها چون فعلا نداریم اجرا نمیشه 
        // $this->init();
        // در پایان برای بهتر شدن کدهامون کد زیر را قرار میدهیم که اگر شرط بالا بود بالا وگرنه پایینی اجرا شود 
                                                                // if(function_exists('__autoload')){
                                                                    // spl_autoload_register( '__autoload' );
                                                                        //  }
        
        // کد زیر برای اتو لود هست برای خود phpهست وبعدش لازم نیست کلاسهای روتر را اینکلود کنیم
                                                                        //   spl_autoload_register([$this, 
// 'autoload' ]);
    //   یا این
    //   spl_autoload_register([new Evemiz_panel(), 'autoload']);
    // فانکشن پایین صفحه رو اینجا فراخوانی میکنیم 
                                                                    //   $this->start_router();

      
        // var_dump قبل از اینستنس اجرا میشه ولی بعدش نه تا زمانیکه متد پایین فراخوانی بشه 
        // var_dump(EVEMIZ_PANEL_URL);
        // بعد از ساخت routerپصورت پایین فراخوانی میکنیم 
//    include_once EVEMIZ_PANEL_DIR .'core/classes/Router.php';
// بعد از دیفاین کلاسسز اینکلود عوض میشه
//    include_once EVEMIZ_PANEL_CLASSES .'/Router.php';
//    $router=new evemiz_panel_router;
//    وردامپها بعد از هر تغییر به شکلهای زیر تست میشوند 
//    var_dump(EVEMIZ_PANEL_DIR .'/core/classes/Router.php');
//    var_dump(EVEMIZ_PANEL_CLASSES);
//    var_dump(EVEMIZ_PANEL_CLASSES .'Router.php');
                                                                    //   }



                                                                    //   private function define_const()
                                                                    //   {
    // define('EVEMIZ_PANEL_URL',plugin_dir_url(__FILE__));
    // برای امنیت بیشتر کدهام بصورت زیر 
                                                                        // if(!defined('EVEMIZ_PANEL_URL'))
                                                            //    define('EVEMIZ_PANEL_URL',plugin_dir_url(__FILE__));
                                                            //   if(!defined('EVEMIZ_PANEL_DIR'))
                                                            //  define('EVEMIZ_PANEL_DIR',plugin_dir_path(__FILE__));
        // بعد از ساخت روتر این فایل پایین رو دیفاین میکنیم
                                                                //    if(!defined('EVEMIZ_PANEL_CLASSES'))
                                                    //  define('EVEMIZ_PANEL_CLASSES',EVEMIZ_PANEL_DIR .'core/classes/
// ');
                                                    //  if(!defined('EVEMIZ_PANEL_VER'))
                                                    //  define('EVEMIZ_PANEL_VER','1.0.0');
                                                        // }

    


                                                                // public function init(){
                                                    //  register_activation_hook(__FILE__, [ $this , 'activation']);
                                        // /   register_deactivation_hook(__FILE__, [ $this , 'deactivation']);

                                               // add_action('wp_enqueue_scripts', [ $this, 'register_style_script']);
                                            //  }
                                        //    public function activation() {
    // کدهای مربوط به فعال‌سازی پلاگین
                                            // }
                                            //   public function deactivation() {
    // کدهای مربوط به غیرفعال‌سازی پلاگین
                                                //  }



                                                        //    private function register_style_script(){
                                        // wp_enqueue_style( 'oop-style', OOP_SAMPLE_URL . 'assets/css/style.css');
                                        //    wp_enqueue_script( 'oop-script', OOP_SAMPLE_URL . 'assets/js/script.js', 
// ['jquery'], OOP_SAMPLE_VERSION,
                                                // true );
                                                    //   }

// اتولود بالارو اینجا میاریم اسم کلاس رو برمیگرداند 
                                                    // public function autoload($class)
                                                    //    {
// برای اینکه فقط کلاسهای مد نظر مارو لود کنه کد پایین رو میزاریم 
                                            //    if(FALSE !==strpos($class,'evemiz_panel')){
                                            //   $file_name=strtolower(end(explode('_', $class)));
                                            //    $class_file_path=EVEMIZ_PANEL_CLASSES. $file_name.'.php'; 
//  include_once $class_file_path;
// برای حرفه ای تر شدن 
                                //   if(is_file($class_file_path)&& file_exists($class_file_path)){
                                    //   include_once $class_file_path;  
                                        //  }

                                                        // }

    // $file_name=explode('_', $class);
    // برای اینکه به خونه آخر دسترسی داشته باشم 
    // $file_name=end(explode('_', $class));
    // برای اینکه همرو به حروف کوچک تبدیل کند 
    // $file_name=strtolower(end(explode('_', $class)));
    // همیشه کلاس ها با اینکلود وانس انجام میشن و کد پایین برای آدرس کلاس هست 
    // $class_file_path=EVEMIZ_PANEL_CLASSES. $file_name.'.php';
    // include_once $class_file_path;
// var_dump($class);
// var_dump($file_name);
// برای اینکه خطا نده پایینی رو میاریم 
// die();
// وردامپ و دای رو کامنت میکنیم تا وردامپ داخل روتر لود شود 
                                                                //   }
// ازبالا حذف و میاریم اینجاوتی من کپی و بالا رو کامنت کردم 
                                            //    public function start_router(){
                                                //  $router=new evemiz_panel_router;
                                            //    $router->router();
                                                //   }


                                                //  public static function get_instanse(){
        // self::در اصل همون $this هست برای کدهای استاتیک
                                                        // if(self::$instanse==null){
                                                    //  self::$instanse=new Evemiz_panel;
                                                // }
                                                    // return self :: $instanse;
                                                        //   }
                                                            //  }
// بالا بصورت جدید فراخوانی کردیم
// new Evemiz_panel;

// فراخوانی متد اینستنس تا مطمعن بشیم کدهای بالا یکبار بیشتر اجرا نمیشوند 
                                                                //   Evemiz_panel:: get_instanse();
// ساختار کدهای بالارو تغییر دادم و کدهای اصلی بالا رو با اسپیس بردم جلو و کامنت کردم تا قابل تشخیص باشه





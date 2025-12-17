<?php
namespace Evemiz\Panel;

use Evemiz\Panel\Handler;
use Evemiz\Panel\View;

class Dashboard extends Handler {

    private $content;

    public function __construct() {
        $this->content = "Dashboard page loaded";
    }
 public function index() {
        return View::load_view('dashboard', [
            'title'         => 'داشبورد',
            'content'       => $this->content,
            // اگر متد دیتارو در هندلر نداشتیم کدهای دیتارو هم میتونستیم همینجا بزاریم 
            // 'register_days' => static::get_register_days(),
            // 'comment_count' => static::get_comment_count(),
            // 'total_orders'  => static::get_customer_total_orders(),
        ]);
    
    }
    protected static function get_data(){
        $params=[
            // 'test'=>'تست',
            // این پارامتر رو میبریم داخل htmlبا php  میزاریم داخل تعداد روزهای همرای بصورت متغییریعنی با $
        //  'register_days'=>'123',
         'register_days'=>static:: get_register_days(),
         'comment_count'=>static:: get_comment_count(),
         'total_orders'=>static:: get_customer_total_orders(),
        //  هرکدام را در html خودمون در قسمت مد نطر قرار میدهیم
            // 'status'=>'فعال',
            // 'version'=>'1.0.0'
        ];
        return $params;
    }
    // برای اینکه عدد هم داینامیک شود به این شکل یک فانکشن و جلوی متد قرارمیدهیم 
     protected static function get_register_days(){
    //  return 123;
    //  از آدرس زیرباز هم برای داینامیک کردن اعداد دانلود کد پایین 
    // Source - https://stackoverflow.com/questions/58046364/wordpress-count-time-from-registration-date-to-today

    $today_date = new \DateTime( date( 'Y-m-d', strtotime( 'today' ) ) );
    $register_date  = get_the_author_meta( 'user_registered', get_current_user_id() );

    if( !$register_date){
        return 0;
    }
    $registered = new \DateTime( date( 'Y-m-d', strtotime($register_date ) ) );
    $interval_date   = $today_date->diff($registered );
    // به پایینی هااگر نیاز داشتیم استفاده میکنیم 
        // if( $interval_date->days < 31 ) {
            // echo 'With us ' . $interval_date->format('%d days');
            // }
        // elseif( $interval_date->days < 365 ) {
            // echo 'With us ' . $interval_date->format('%m months %d days');
            // }
        // elseif( $interval_date->days > 365 ) {
            // echo 'With us ' . $interval_date->format('%y years %m month %d days');
            // }
   return $interval_date->days;
 }
//    https://wordpress.stackexchange.com/questions/358986/author-comment-count-in-author-pageآدرس کد پایین
 /* user commnet count */
  protected static function get_comment_count(  ) {
    global $wpdb;

   return  $wpdb->get_var(
        $wpdb->prepare(
             "SELECT COUNT(comment_ID)
              FROM {$wpdb->comments} 
              WHERE user_id = %d ", get_current_user_id()
               )
    );

}

// https://stackoverflow.com/questions/67797526/display-a-customers-total-order-numberآدرس کد پایین


   protected static function get_customer_total_orders(  ) {
    $customer_orders = get_posts( array(
        'numberposts' => -1,
        'meta_key'    => '_customer_user',
        'meta_value'  => get_current_user_id(),
        // 'post_type'   => wc_get_order_types(),       // سفارشهای کامل و در حال انتظار
        'post_status' => array( 'wc_completed' )// فقط سفارشهای کامل 
    ) );

    $total_orders = count($customer_orders);
    
    // If customer has any orders then only show total number of orders.
    if ( !$total_orders ) {
         return  __('no order', 'evemiz-menu');      //با تابع ترجمه زدم
    }
              return $total_orders;
}
}

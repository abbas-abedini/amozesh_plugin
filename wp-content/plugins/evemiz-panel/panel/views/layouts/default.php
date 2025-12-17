<?php
// این فایل یک view ساده است
?>
<div style="padding:15px; background:#f5f5f5; border:1px solid #ccc; margin:10px 0;">
    <h2><?php echo isset($title) ? htmlspecialchars($title) : 'خروجی از View'; ?></h2>
    <p><?php echo isset($content) ? htmlspecialchars($content) : 'هیچ محتوایی ارسال نشده است.'; ?></p>
</div>

<!-- کد html -->

<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>حساب کاربری</title>

    <!-- فونت -->
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- استایل اصلی -->
    <link rel="stylesheet" href="<?= EVEMIZ_PANEL_ASSETS_URL ?>css/style.css">

    <!-- استایل دارک مود -->
    <link rel="stylesheet" href="<?= EVEMIZ_PANEL_ASSETS_URL ?>css/dark.css" id="dark-style" disabled>
</head>
<body>
    <!-- بخشی از این وسط میبریم به فایل داشبورد داخل ویو  وبجاش اینجا اینکلود میکنیم  -->
<?php include EVEMIZ_PANEL_DIR.'panel/views/' . $view_file .'.php';?>
    <!-- محتوای اصلی -->
    <section class="content">
         <!-- گفتیم اگر تصویر آواتار داشت قراربده نداشت تصویر htmlمنو بزار -->
    <!-- <?php  $avatar_url=get_avatar_url(get_current_user_id(  ))  ??EVEMIZ_PANEL_ASSETS_URL.'image/avatar.webp'; ?>   -->
     <!-- برای اینکه عکسمون با کیفیف بشه کد بالا حذف کد پایین  -->
     <!-- <?php  $avatar_url=get_avatar_data(get_current_user_id(  ),['size'=>300])['url'] ??EVEMIZ_PANEL_ASSETS_URL.'image/avatar.webp'; ?> -->
    <!-- //  حالا متغیر $avatar_urlرو با phpمیزاریم داخل کد html تصویرمون -->
    <!-- //  برای نشان دادن نام  -->
    <!-- //  $user_data=get_userdata($get_current_user_id()); -->
    <!-- //  $disply_name=$user_data->display_name ?? $user_data->user_login; -->
    <!-- //  ?>      -->
      <!-- این کد را داخل قسمت نام کد html  خودمون میزاریم البته با پی اچ پیucfirst($disply_name) -->

        <!-- باکس‌های آمار -->
        <div class="stats">
            <!-- برای نشان دادن سفارشات داشبورد اینجوری لینک میدیم  -->
            <a chref="<?php echo get_home_url(null,'/panel/views/orders'); ?>"
                         <!-- برای نشان دادن آدرس داشبورد اینجوری لینک میدیم   -->
            <a chref="<?php echo get_home_url(null,'/panel/adress'); ?>"
            <div class="stat-box">
                <span>📨</span>
                <p>تعداد نظرات</p>
                <strong>0 نظر ثبت کرده‌اید</strong>
            </div>

            <div class="stat-box">
                <span>💳</span>
                <p>موجودی کیف پول</p>
                <strong>0 تومان</strong>
            </div>

            <div class="stat-box">
                <span>🎞️</span>
                <p>تعداد دوره‌ها</p>
                <strong>1 دوره</strong>
            </div>

            <div class="stat-box">
                <span>💎</span>
                <p>همراه‌کیمیا</p>
                <strong>1121 امتیاز</strong>
            </div>
        </div>

        <!-- دوره‌ها -->
        <!-- <h3 class="section-title">دوره های آموزشی</h3> -->
        <!-- <div class="courses"> -->

            <!-- <div class="course-card"> -->
                <!-- <img src="https://i.imgur.com/O5F4Qpg.jpeg" alt=""> -->
                <!-- <h4>آموزش برنامه‌نویسی قالب وردپرس</h4> -->
            <!-- </div> -->

            <!-- <div class="course-card"> -->
                <!-- <img src="https://i.imgur.com/j2zDDJp.jpeg" alt=""> -->
                <!-- <h4>آموزش امنیت وردپرس</h4> -->
            <!-- </div> -->

        <!-- </div> -->

        <!-- آموزش‌های رایگان -->
        <!-- <h3 class="section-title">آموزش‌های رایگان</h3> -->
        <!-- <div class="courses small"> -->
<!--  -->
            <!-- <div class="course-card"> -->
                <!-- <img src="https://i.imgur.com/Hp8E4Uo.jpeg" alt=""> -->
                <!-- <h4>ووکامرس چیست؟</h4> -->
            <!-- </div> -->
<!--  -->
            <!-- <div class="course-card"> -->
                <!-- <img src="https://i.imgur.com/s6o0k96.jpeg" alt=""> -->
                <!-- <h4>آموزش نصب AMP در وردپرس</h4> -->
            <!-- </div> -->
<!--  -->
            <!-- <div class="course-card"> -->
                <!-- <img src="https://i.imgur.com/RMf0uf0.jpeg" alt=""> -->
                <!-- <h4>ویجت چیست؟</h4> -->
            <!-- </div> -->
<!--  -->
        <!-- </div> -->

    </section>

</main>

<!-- جاوااسکریپت -->
<script src="<?= EVEMIZ_PANEL_ASSETS_URL  ?>js/ script.js"></script>

</body>
</html>

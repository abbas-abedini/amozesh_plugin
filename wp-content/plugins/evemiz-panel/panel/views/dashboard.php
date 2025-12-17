<?php
// var_dump('test');
// فقط باید کدهای وسط رو میاوردم چون ناقص بود فعلا همرو آوردم
?>
<!-- هدر سایت -->
 <!-- برای ترجمه باید موارد انگلیسی داخل phpو با ضمیمه تکست دامین نوشته شود -->
<header class=<?php _e('header' , 'panel-menu') ?>   >
    <div class="container header-inner">

        <div class="logo">EVEMIZ</div>

        <!-- دکمه منوی موبایل -->
        <div class="menu-btn" id="menu-btn">☰</div>

        <!-- دکمه‌های سمت راست -->
        <div class="header-actions">
            <button id="toggle-dark" class="switch-btn">🌙</button>
            <button id="toggle-dir" class="switch-btn">⇆</button>
        </div>

    </div>
</header>

<!-- منوی موبایل -->
<nav class="mobile-menu" id="mobile-menu">
    <ul>
        <li>پیشخوان</li>
        <li>دوره‌های من</li>
        <li>سفارش‌ها</li>
        <li>دانلودها</li>
        <li>علاقه‌مندی‌ها</li>
        <li>جزئیات حساب</li>
        <li>پشتیبانی</li>
        <li class="logout">خروج</li>
    </ul>
</nav>

<!-- هدر بخش حساب -->
<section class="account-header">
   <!--اگر کلمه ای حالت 'داشت داخل دابل کوتیشن میزاریم برای ترجمه به روش زیر عمل میکنیم   -->
<!-- <h2>حساب کاربری</h2> -->
    <h2> <?php _e( 'حساب کاربری','panel-menu');?> </h2>
    <!-- تگ های اچ تی ام ال هم داخل و هم بیرون میشه  -->
</section>

<main class="container layout">
    <!-- نوار کناری -->
    <aside class="sidebar">
        <div class="profile">
            <img src="https://i.imgur.com/dxjd7fb.png" class="avatar" alt="">
            <h3>aabedini</h3>
        </div>

        <ul class="menu">
            <li>پیشخوان</li>
            <li>دوره‌های من</li>
            <li>سفارش‌ها</li>
            <li>دانلودها</li>
            <li>علاقه‌مندی‌ها</li>
            <li>جزئیات حساب</li>
            <li>پشتیبانی</li>
            <li class="logout">خروج از حساب</li>
        </ul>
    </aside>

    <!-- محتوای اصلی -->
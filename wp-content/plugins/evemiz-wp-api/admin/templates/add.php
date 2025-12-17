<div class="wrap">
    <h1>افزودن  اطلاعات از  وردپرس به دیتابیس </h1>
<form method="post" action=" ">
    <table class="form-table">
        <tr valign="top">
        <th scope="row">نام</th>
        <td><input type="text" name="firstname" value="<?php echo esc_attr(get_option('new_option_name')); ?>" /></td>
        </tr>
         
        <tr valign="top">
        <th scope="row"> نام خانوادگی</th>
        <td><input type="text" name="lastname" value="<?php echo esc_attr(get_option('some_other_option')); ?>" /></td>
        </tr>
        <tr valign="top">
        <th scope="row">موبایل</th>
        <td><input type="text" name="mobil" value="<?php echo esc_attr(get_option('option_etc')); ?>" /></td>
        </tr>
    </جدول>
    
    <?php submit_button('افزودن'); ?>
</div>


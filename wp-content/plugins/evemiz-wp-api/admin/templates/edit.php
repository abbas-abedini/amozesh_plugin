<div class="wrap">
    <h1>افزودن  اطلاعات از  وردپرس به دیتابیس </h1>
<form method="post" action=" ">
    <table class="form-table">
        <tr valign="top">
        <th scope="row">نام</th>
        <td><input type="text" name="firstname" value="<?php echo $result->firstname;?>"/></td>
        </tr>
         
        <tr valign="top">
        <th scope="row"> نام خانوادگی</th>
        <td><input type="text" name="lastname" value="<?php echo $result->lastname; ?>" /></td>
        </tr>
        <tr valign="top">
        <th scope="row">موبایل</th>
        <td><input type="text" name="mobil" value="<?php echo $result->mobil; ?>" /></td>
        </tr>
    </جدول>
        <td><input class="button button-primary" type="submit" name="edit_form" value="ذخیره تغییرات" /></td>

</div>


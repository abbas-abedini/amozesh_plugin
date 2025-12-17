<!-- <div class="panel-box">
 <form action="">
  <div class="tree-col">
   <div class="form-input">
      <label for="first-name">first name</label>
      <input type="text" id="first-name" name="first-name" value="<?= esc_attr($first_name); ?>">
   </div>

   <div class="form-input">
      <label for="last-name">last name</label>
      <input type="text" id="last-name" name="last-name" value="<?= esc_attr($last_name); ?>">
   </div>

   <div class="form-input">
      <label for="display-name">display name</label>
      <input type="text" id="display-name" name="display-name" value="<?= esc_attr($display_name); ?>">
   </div>

   <div class="form-input">
      <label for="email">email</label>
      <input type="email" id="email" name="email" value="<?= esc_attr($email); ?>">
   </div>

   <div class="change-password">
      <h2>change password</h2> 
   </div>

   <div class="tree-col">
      <div class="form-input">
         <label for="last-password">last password</label>
         <input type="password" id="last-password" name="last-password">
      </div>
   </div>

   <div class="form-input">
      <label for="new-password">new password</label>
      <input type="password" id="new-password" name="new-password">
   </div>

   <div class="form-input">
      <label for="confirm_password">confirm password</label>
      <input type="password" id="confirm_password" name="confirm_password">
   </div>
  </div>

  <button type="submit" class="form-btn" name="submit-form">save</button>
 </form>
</div> -->
  


<form method="post" action="">
    <input type="hidden" name="submit-form" value="1">

    <h3>اطلاعات پروفایل</h3>
    <label>نام:</label>
    <input type="text" name="first_name" value="<?php echo esc_attr($first_name); ?>"><br>

    <label>نام خانوادگی:</label>
    <input type="text" name="last_name" value="<?php echo esc_attr($last_name); ?>"><br>

    <label>ایمیل:</label>
    <input type="email" name="email" value="<?php echo esc_attr($email); ?>"><br>

    <label>نام نمایشی:</label>
    <input type="text" name="display_name" value="<?php echo esc_attr($display_name); ?>"><br>

    <h3>تغییر رمز عبور</h3>
    <label>رمز عبور فعلی:</label>
    <input type="password" name="last_password"><br>

    <label>رمز عبور جدید:</label>
    <input type="password" name="new_password"><br>

    <label>تکرار رمز عبور جدید:</label>
    <input type="password" name="confirm_password"><br>

    <button type="submit">ذخیره تغییرات</button>
</form>

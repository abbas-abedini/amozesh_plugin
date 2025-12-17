<!-- <h1 style="color: red;">تنظیمات پلاگین </h1> -->
 <!-- به کمک خود تنظبمات وردپرس کدهای زیر را نوشتیم  -->
   <div class="wrap">
    <h1><?php echo $title; ?> </h1>

    <form method="post" action="">
        <table class="form-table">
            <tbody>
                <tr>
                    <th scope="row">
                        <label for="activate_plugin">فعال‌سازی پلاگین</label>
                    </th>
                    <td>
                        <!-- <input name="activate_plugin" type="checkbox" id="activate_plugin"  -->
                        <!-- <?php echo $is_plugin_activ ? 'checked' : ''; ?> -->
                   
                   <input type="checkbox" name="activate_plugin" <?php echo $is_plugin_activ ? 'checked' : ''; ?>>

                    </td>
                </tr>

                  <tr>
      <th scope="row">
          <label for="title_plugin">عنوان پلاگین</label>
      </th>
      <td>     
     <input type="text" name="title_plugin" id=' title_plugin' value= "<?php echo $title; ?>"   />
      </td>
  </tr>
            </tbody>
        </table>

        <p class="submit">
            <input type="submit" name="submit" id="submit"
            class="button button-primary" value="ذخیرهٔ تغییرات">
        </p>
    </form>
</div>

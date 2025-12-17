<div class="wrap">
    <h1>نمایش کاربران ویژه </h1>

                <a class="button button-primary" style="margin: 2rem  0;"    href="<?php echo add_query_arg(['action'=>'add',]) ?>">افزودن</a>

</div>
<table class="widefat">
    <thead>
        <tr>
            <th>شناسه</th>
            <th> نام کاربری</th>
            <th> ایمیل </th>
            <th>تاریخ ثبت نام</th>
            <th> لقب</th>
            <th> موبایل</th>
            <th colspan="2">عملیات</th>
        </tr>
    </thead>
     <tbody>
        <?php  foreach($users as $user): ?>
     <tr>
         <td><?php echo $user->ID; ?></td>
         <td><?php echo $user->user_login; ?></td>
         <td><?php echo $user->user_email; ?></td>
         <td><?php echo $user->user_registered; ?></td>
         <td><?php echo get_user_meta($user->ID,'nickname',true); ?></td>
         <td><?php echo get_user_meta($user->ID,'mobile',true); ?></td>
 
       <td>
     <!-- <a href="<?php echo $row->id; ?>">حذف</a> -->
     <a href="<?php echo add_query_arg(['action'=>'edit','id'=>$user->ID]) ?>" >
        <span class="dashicons dashicons-edit"></span></a>
        </td>
 <td>
   <a href="<?php echo add_query_arg(['action'=>'delete','id'=>$user->ID]) ?>"><span
   class="dashicons dashicons-trash"></span></a>
        </td>
        </tr>
     <?php endforeach; ?>
 </tbody>
</table>


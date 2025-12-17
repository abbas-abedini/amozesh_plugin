<div class="wrap">
    <h1>نمایش اطلاعات جدول دیتابیس </h1>

                <a class="button button-primary" style="margin: 2rem  0;"    href="<?php echo add_query_arg(['action'=>'add',]) ?>">افزودن</a>
                <button  id=myButton  class="button button-primary">ارسال درخواست ایجکس</button>

</div>
<table class="widefat">
    <thead>
        <tr>
            <th>شناسه</th>
            <th>نام</th>
            <th> نام خانوادگی</th>
            <th>موبایل</th>
            <th colspan="2">عملیات</th>
        </tr>
    </thead>
     <tbody>
        <?php  foreach($results as $row): ?>
     <tr>
         <td><?php echo $row->id; ?></td>
         <td><?php echo $row->firstname; ?></td>
         <td><?php echo $row->lastname; ?></td>
         <td><?php echo $row->mobil; ?></td>
         <td>
            <!-- <a href="<?php echo $row->id; ?>">حذف</a> -->
            <a href="<?php echo add_query_arg(['action'=>'delete','id'=>$row->id]) ?>">حذف</a>
        </td>
     </tr>

       <td>
     <!-- <a href="<?php echo $row->id; ?>">حذف</a> -->
     <a href="<?php echo add_query_arg(['action'=>'edit','id'=>$row->id]) ?>">ویرایش</a>
 </td>
        </tr>
     <?php endforeach; ?>
 </tbody>
</table>


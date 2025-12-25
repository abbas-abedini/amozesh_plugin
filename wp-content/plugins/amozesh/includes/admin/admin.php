<?php
// echo   "this is admin.php" ;
function amozesh_plugin_add_menu(){
add_menu_page(
    'منوی پلاگین من',
    'منوی پلاگین خودم',
    'manage_options',
    'amozesh_menu',
'amozesh_menu_callback'
);
}
function amozesh_menu_callback(){
echo "<h1>این صفحه مخصوص افزونه شماست</h1>";
}
// admin_menuپیش فرض و دومی اسم فانکشن بالا
add_action('admin_menu','amozesh_plugin_add_menu');

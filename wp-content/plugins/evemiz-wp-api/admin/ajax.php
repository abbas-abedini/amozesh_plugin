<?php
// Register AJAX actions for both logged-in and non-logged-in users
add_action('wp_ajax_sum', 'evemiz_handle_ajax');
add_action('wp_ajax_nopriv_sum', 'evemiz_handle_ajax');

function evemiz_handle_ajax() {
    // Sanitize inputs
    $num1 = isset($_POST['num1']) ? intval($_POST['num1']) : 0;
    $num2 = isset($_POST['num2']) ? intval($_POST['num2']) : 0;
  $current_user=get_current_user_id(  );
    // Return JSON response
    wp_send_json([
        'success' => true,
        'result'  => $num1 + $num2,
        'user_id' =>$current_user
    ]);
}

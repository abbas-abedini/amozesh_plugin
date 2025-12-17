
<?php
// افزونه لاگین/ثبت‌نام AJAX

// بارگذاری CSS/JS و ارسال ajax_url (و nonce اختیاری)
function evemiz_login_style_script() {
    wp_enqueue_style(
        'evemiz-login-style',
        plugin_dir_url(__FILE__) . 'assets/css/style.css',
        [],
        '1.0.0',
        'all'
    );

    wp_enqueue_script(
        'evemiz-login-script',
        plugin_dir_url(__FILE__) . 'assets/js/script.js',
        ['jquery'],
        '1.0.0',
        true
    );

    // اگر می‌خواهی nonce داشته باشی، این خط را به آرایه اضافه کن: 'nonce' => wp_create_nonce('login_signup_nonce')
    wp_localize_script(
        'evemiz-login-script',
        'login_signup_ajax_object',
        [
            'ajax_url' => admin_url('admin-ajax.php'),
            // 'nonce'    => wp_create_nonce('login_signup_nonce'),
        ]
    );
}
add_action('wp_enqueue_scripts', 'evemiz_login_style_script');
// add_action('admin_enqueue_scripts', 'evemiz_login_style_script');

// شورتکد نمایش فرم یا وضعیت لاگین
function evemiz_login_shortcode($atts, $content = "") {
    if (is_user_logged_in()) {
        include plugin_dir_path(__FILE__) . 'template/logged-in.php';
    } else {
        if (!is_admin()) {
            include plugin_dir_path(__FILE__) . 'template/login-signup.php';
        }
    }
}
add_shortcode('evemiz_logedin', 'evemiz_login_shortcode');


// -------------------- لاگین --------------------

add_action('wp_ajax_evemiz_login', 'evemiz_login_handle_ajax');
add_action('wp_ajax_nopriv_evemiz_login', 'evemiz_login_handle_ajax');

function evemiz_login_handle_ajax() {
    $user_email    = trim(sanitize_email($_POST['user_email'] ?? ''));
    $user_password = trim(sanitize_text_field($_POST['user_password'] ?? ''));

    // اعتبارسنجی

    $validate_result = evemiz_login_validate_form($user_email, $user_password);
if (!$validate_result['is_valid']) {
    wp_send_json_error(['message' => $validate_result['message']]);
}


    // بررسی وجود کاربر
    $user = get_user_by('email', $user_email);
    if (!$user) {
        wp_send_json_error(['message' => 'کاربری با این مشخصات یافت نشد']);
    }

    // تلاش برای ورود
    $login_result = wp_signon([
        'user_login'    => $user->user_login,
        'user_password' => $user_password,
        'remember'      => false,
    ]);

    if (is_wp_error($login_result)) {
        
        wp_send_json_error(['message' => 'نام کاربری یا رمز عبور اشتباه است']);
    }

    wp_send_json_success([
        'message' => 'عملیات ورود با موفقیت انجام شد',
        'user_id' => $login_result->ID
    ]);

}

function evemiz_login_validate_form($email, $password) {
    $errors = [];

    if (empty($email)) {
        $errors[] = 'ایمیل نباید خالی باشد';
    }
    if (empty($password)) {
        $errors[] = 'رمز عبور نباید خالی باشد';
    }
    if (!empty($email) && !is_email($email)) {
        $errors[] = 'ایمیل نامعتبر است';
    }

    if (!empty($errors)) {
        return ['is_valid' => false, 'message' => implode(' | ', $errors)];
    }

    return ['is_valid' => true, 'message' => ''];
}



// -------------------- ثبت‌نام --------------------
add_action('wp_ajax_evemiz_signup', 'evemiz_signup_handle_ajax');
add_action('wp_ajax_nopriv_evemiz_signup', 'evemiz_signup_handle_ajax');

function evemiz_signup_handle_ajax() {
    $user_name     = trim(sanitize_text_field($_POST['user_name'] ?? ''));
    $user_email    = trim(sanitize_email($_POST['user_email'] ?? ''));
    $user_password = trim(sanitize_text_field($_POST['user_password'] ?? ''));

    // اعتبارسنجی
    $validate_result = evemiz_signup_validate_form($user_name, $user_email, $user_password);
    if (!$validate_result['is_valid']) {
        wp_send_json_error(['message' => $validate_result['message']]);
    }

    // بررسی وجود کاربر
    if (email_exists($user_email)) {
        wp_send_json_error(['message' => 'ایمیل وارد شده قبلاً ثبت شده است']);
    }

    // ایجاد کاربر

    // $user_login=explode('@',$user_email);
// var_dump($user_login);
// $new_user=wp_insert_user([
    // 'user_login'=>apply_filters('pre_user_login','$user_login[0] '),
    // 'user_email'=>apply_filters('pre_user_email','$user_email '),
    // 'user_pass'=>apply_filters('pre_user_email','$user_password '),
    // 'user_name'=>apply_filters('pre_user_email','$user_name ')
// ]);
    $user_id = wp_create_user($user_name, $user_password, $user_email);

    if (is_wp_error($user_id)) {
        wp_send_json_error(['message' => 'خطا در ایجاد حساب کاربری']);
    }

    wp_send_json_success([
        'message' => 'ثبت‌نام با موفقیت انجام شد',
        'user_id' => $user_id
    ]);
}


function evemiz_signup_validate_form($user_name, $email, $password) {
    $errors = [];

    if (empty($user_name)) {
        $errors[] = 'نام کاربری نباید خالی باشد';
    }
    if (empty($email)) {
        $errors[] = 'ایمیل نباید خالی باشد';
    }
    if (!empty($email) && !is_email($email)) {
        $errors[] = 'ایمیل نامعتبر است';
    }
    if (empty($password)) {
        $errors[] = 'رمز عبور نباید خالی باشد';
    }

    if (!empty($errors)) {
        return ['is_valid' => false, 'message' => implode(' | ', $errors)];
    }

    return ['is_valid' => true, 'message' => ''];
}

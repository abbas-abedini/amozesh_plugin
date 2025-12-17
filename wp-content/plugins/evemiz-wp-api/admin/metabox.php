
<?php

function wp_api_add_custom_boxe() {
    add_meta_box(
        'wp_api_evemiz',              // ID
        'قیمت',                       // Title
        'wp_api_price_handler',       // Callback
        'post',                       // Screen (post type)
        'normal',                     // Context
        'default'                     // Priority
    );
}
add_action('add_meta_boxes', 'wp_api_add_custom_boxe');

function wp_api_price_handler($post){
    // مقدار ذخیره‌شده قبلی را بخوانیم
    $value = get_post_meta($post->ID, 'wp_api_evemiz', true);
    ?>
    <label for="wp_api_evemiz">قیمت:</label>
    <input type="text" id="wp_api_evemiz" name="wp_api_evemiz" value="<?php echo esc_attr($value); ?>" />
    <?php
}

function wp_api_save_price($post_id){
    // بررسی امنیتی ساده: اگر در حالت ذخیره خودکار بودیم، خارج شویم
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    if(isset($_POST['wp_api_evemiz'])){
        update_post_meta(
            $post_id,
            'wp_api_evemiz',
            sanitize_text_field($_POST['wp_api_evemiz'])
        );

        // add_post_meta 
// delet_post _meta
    }
}
add_action('save_post','wp_api_save_price');


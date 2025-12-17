<?php
function wp_api_register_price_block() {
    register_block_type(__DIR__, array(
        'render_callback' => 'wp_api_render_price_block'
    ));
}
add_action('init', 'wp_api_register_price_block');

function wp_api_render_price_block($attributes, $content) {
    $value = get_post_meta(get_the_ID(), '_wp_api_evemiz', true);
    if ($value) {
        return '<div class="wp-api-price">قیمت: ' . esc_html($value) . '</div>';
    }
    return '';
}

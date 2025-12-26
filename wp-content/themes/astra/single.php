<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

<?php if ( astra_page_layout() === 'left-sidebar' ) { ?>

	<?php get_sidebar(); ?>

<?php } ?>

	<div id="primary" <?php astra_primary_class(); ?>>

		<?php astra_primary_content_top(); ?>
<?php
// نمایش قیمت در صفحه تکی و آرشیو
add_action('astra_entry_content_after', 'wp_api_show_price_archive');

function wp_api_show_price_archive() {
    $post_id = get_the_ID();
    //  کد دو خطی پایین که کامنت شده فقط برای صفحه سینگل هست وکدبعدیش برای هردو
    // if (is_singular('post')) { // یا نوع پست دلخواه $price = get_post_meta(get_the_ID(), 'wp_api_evemiz', true);
    if (!$post_id) return;

    $price = get_post_meta($post_id, 'wp_api_evemiz', true);

    if (!empty($price)) {
        echo '<p class="custom-price">💰 قیمت: ' . esc_html($price) . '</p>';
    }
}
?>
		<?php astra_content_loop(); ?>

		<?php astra_primary_content_bottom(); ?>

	</div><!-- #primary -->

<?php if ( astra_page_layout() === 'right-sidebar' ) { ?>

	<?php get_sidebar(); ?>

<?php } ?>

<?php get_footer(); ?>

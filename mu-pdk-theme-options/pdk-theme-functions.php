<?php
// Remove editor on page editor
function pdk_page_editor() {
    $is_enabled = carbon_get_theme_option('pdk_page_editor');
    if ($is_enabled) {
        remove_post_type_support( 'page', 'editor' );
    }
}
add_action('init', 'pdk_page_editor');

// Favicon
function pdk_favicon() {
    $pdk_favicon = carbon_get_theme_option( 'pdk_favicon' );
    // var_dump($pdk_favicon);
    if ( ! empty( $pdk_favicon ) ) {
        echo '<link rel="icon" href="' . $pdk_favicon . '"  sizes="32x32" />';
    }
}
add_action('wp_head', 'pdk_favicon', 1);
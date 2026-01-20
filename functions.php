<?php
if ( ! defined( '_S_VERSION' ) ) {
    define( '_S_VERSION', '1.0.0' );
}

function np_food_setup() {
    // Hỗ trợ title tag động
    add_theme_support( 'title-tag' );

    // Hỗ trợ ảnh đại diện bài viết
    add_theme_support( 'post-thumbnails' );

    // Đăng ký menu
    register_nav_menus(
        array(
            'menu-1' => esc_html__( 'Primary', 'np-food' ),
        )
    );

    // Hỗ trợ HTML5
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );
}
add_action( 'after_setup_theme', 'np_food_setup' );

function np_food_scripts() {
    wp_enqueue_style( 'np-food-style', get_stylesheet_uri(), array(), _S_VERSION );
}
add_action( 'wp_enqueue_scripts', 'np_food_scripts' );

// Include Recruitment Settings & Logic
require get_template_directory() . '/inc/recruitment-settings.php';

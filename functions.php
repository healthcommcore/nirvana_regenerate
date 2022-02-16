<?php
function nirvana_child_enqueue_styles() {

  $parent_style = 'nirvanas';
  wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css');
  wp_enqueue_style('nirvana_child',
    get_stylesheet_directory_uri() . '/css/style.css',
    array($parent_style), 
    wp_get_theme()->get('Version')
  );
}

add_action('wp_enqueue_scripts', 'nirvana_child_enqueue_styles');

function hero_widgets_init() {
  register_sidebar( array(
    'name' => 'Hero area',
    'id' => 'hero-image-widget',
    'before_widget' => '<div id="%1$s" class="hero-iamge">',
    'after_widget' => '</div>',
    'before_title' => '<h2>',
    'after_title' => '</h2>',
  ) );
}

add_action('widgets_init', 'hero_widgets_init');

function homepage_bottom_widgets_init() {
  register_sidebar( array(
    'name' => 'Homepage bottom area',
    'id' => 'homepage-bottom-widget',
    'before_widget' => '<div id="%1$s" class="hompage-bottom">',
    'after_widget' => '</div>',
    'before_title' => '<h2>',
    'after_title' => '</h2>',
  ) );
}

add_action('widgets_init', 'homepage_bottom_widgets_init');


function footer_bottom_widgets_init() {
  register_sidebar( array(
    'name' => 'Footer bottom',
    'id' => 'footer-bottom-widget',
    'before_widget' => '<div id="%1$s" class="footer-bottom">',
    'after_widget' => '</div>',
  ) );
}

/**
 * Filters the TinyMCE config before init.
 *
 * @param array  $mceInit   An array with TinyMCE config.
 * @param string $editor_id Unique editor identifier, e.g. 'content'.
 */
add_filter( 'tiny_mce_before_init', 'wpse_tiny_mce_before_init', 10, 2 );
function wpse_tiny_mce_before_init( $mceInit, $editor_id ) {
    // Allow javascript: in href attributes.
    $mceInit['allow_script_urls'] = true;

    // Allow onclick attribute in anchor tags.
  if ( ! isset( $mceInit['extended_valid_elements'] ) ) {
        $mceInit['extended_valid_elements'] = '';
    } else {
        $mceInit['extended_valid_elements'] .= ',';
    }
    $mceInit['extended_valid_elements'] .= 'a[href|rel|class|id|style|onclick]';

    return $mceInit;
}

add_action('widgets_init', 'footer_bottom_widgets_init');

<?php

namespace App;

/**
 * Add <body> classes
 */
add_filter('body_class', function (array $classes) {
    /** Add page slug if it doesn't exist */
    if (is_single() || is_page() && !is_front_page()) {
        if (!in_array(basename(get_permalink()), $classes)) {
            $classes[] = basename(get_permalink());
        }
    }

    /** Add class if sidebar is active */
    if (display_sidebar()) {
        $classes[] = 'sidebar-primary';
    }

    /** Clean up class names for custom templates */
    $classes = array_map(function ($class) {
        return preg_replace(['/-blade(-php)?$/', '/^page-template-views/'], '', $class);
    }, $classes);

    return array_filter($classes);
});

/**
 * Add "… Continued" to the excerpt
 */
add_filter('excerpt_more', function () {
    return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
});

/**
 * Template Hierarchy should search for .blade.php files
 */
collect([
    'index', '404', 'archive', 'author', 'category', 'tag', 'taxonomy', 'date', 'home',
    'frontpage', 'page', 'paged', 'search', 'single', 'singular', 'attachment', 'embed'
])->map(function ($type) {
    add_filter("{$type}_template_hierarchy", __NAMESPACE__.'\\filter_templates');
});

/**
 * Render page using Blade
 */
add_filter('template_include', function ($template) {
    collect(['get_header', 'wp_head'])->each(function ($tag) {
        ob_start();
        do_action($tag);
        $output = ob_get_clean();
        remove_all_actions($tag);
        add_action($tag, function () use ($output) {
            echo $output;
        });
    });
    $data = collect(get_body_class())->reduce(function ($data, $class) use ($template) {
        return apply_filters("sage/template/{$class}/data", $data, $template);
    }, []);
    if ($template) {
        echo template($template, $data);
        return get_stylesheet_directory().'/index.php';
    }
    return $template;
}, PHP_INT_MAX);

/**
 * Render comments.blade.php
 */
add_filter('comments_template', function ($comments_template) {
    $comments_template = str_replace(
        [get_stylesheet_directory(), get_template_directory()],
        '',
        $comments_template
    );

    $data = collect(get_body_class())->reduce(function ($data, $class) use ($comments_template) {
        return apply_filters("sage/template/{$class}/data", $data, $comments_template);
    }, []);

    $theme_template = locate_template(["views/{$comments_template}", $comments_template]);

    if ($theme_template) {
        echo template($theme_template, $data);
        return get_stylesheet_directory().'/index.php';
    }

    return $comments_template;
}, 100);

/**
 * Redirect parent page to first child, in menu order
 */
// add_action( 'template_redirect', function () {

//     if (is_page() && !is_admin()) {
//         global $post;
//         $children = get_pages([
//             'child_of' => $post->ID,
//             'sort_order' => 'ASC',
//             'sort_column' => 'menu_order'
//         ]);

//         if (count( $children ) > 0 && $post->post_parent == 0) {
//             wp_redirect( get_the_permalink($children[0]->ID) );
//             exit();
//         }
//     }
// } );

// Infinite Scroll
function wp_infinite_scroll()
{
    // Get post data
    $post_id = $_POST['post_id'];
    $page_no = $_POST['page_no'];

    // Run query
    query_posts([
        'paged' => $page_no,
        'posts_per_page' => 3,
        'post_type' => 'post',
        'post_status' => 'publish',
        'post__not_in' => [$post_id],
        'orderby' => [
            'menu_order' => 'DESC',
            'post_date' => 'DESC',
            'title' => 'ASC'
        ]
    ]);

    // Load the posts
    while(have_posts()) : 
        the_post();
        include template_path(locate_template('views/partials/articles/loop-item.blade.php'));
    endwhile;

    wp_reset_query();

    wp_die();
}
add_action('wp_ajax_infinite_scroll',  __NAMESPACE__ . '\\wp_infinite_scroll');
add_action('wp_ajax_nopriv_infinite_scroll',  __NAMESPACE__ . '\\wp_infinite_scroll');

add_action('admin_head', function () {
    echo '<style>
      .interface-interface-skeleton__editor {
        padding-bottom: 50px;
      }
    </style>';
});

// Disable Post Author Links
function my_author_link() {
    return home_url( '/' );
}
add_filter( 'author_link', __NAMESPACE__ . '\\my_author_link' );


function wpdocs_register_my_custom_menu_page() {
    add_menu_page(
        __( 'Reusable Blocks', 'bikmo' ),
        'Reusable Blocks',
        'manage_options',
        'edit.php?post_type=wp_block',
        '',
        'dashicons-welcome-widgets-menus',
        6
    );
}
add_action( 'admin_menu', __NAMESPACE__ . '\\wpdocs_register_my_custom_menu_page' );


function acf_load_modal_field_choices( $field ) {
    // reset choices
    $field['choices'] = [];

    // if has rows
    if( have_rows('all_available_modals', 'option') ) {
        
        // while has rows
        while( have_rows('all_available_modals', 'option') ) {
            
            // instantiate row
            the_row();
            
            // vars
            $value = get_sub_field('id');
            $label = get_sub_field('source');

            $new_key = $label . '~' . $value;
            
            // append to choices
            $field['choices'][ $new_key ] = $label . '~' . $value;
        }
    }

    // return the field
    return $field;
}
add_filter('acf/load_field/name=modal_id',  __NAMESPACE__ . '\\acf_load_modal_field_choices');

function new_excerpt_more($more) {
    global $post;
    remove_filter('excerpt_more', 'new_excerpt_more'); 
    // return ' <a class="read_more" href="'. get_permalink($post->ID) . '">' . '[...]' . '</a>';
    return '...';
  }
add_filter('excerpt_more', __NAMESPACE__ . '\\new_excerpt_more',11);

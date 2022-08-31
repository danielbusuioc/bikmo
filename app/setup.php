<?php

namespace App;

use Roots\Sage\Container;
use Roots\Sage\Assets\JsonManifest;
use Roots\Sage\Template\Blade;
use Roots\Sage\Template\BladeProvider;

/**
 * Theme assets
 */
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_script('vimeoplayer', 'https://player.vimeo.com/api/player.js');
    wp_enqueue_style('bikmo/main.css', asset_path('styles/main.css'), false, null);
    wp_enqueue_script('bikmo/main.js', asset_path('scripts/main.js'), ['jquery'], null, true);

    if (is_single() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    if (is_page_template('views/template-blog.blade.php')) {
        wp_enqueue_script('bikmo/blog.js', asset_path('scripts/blog.js'), ['jquery'], null, true);
    }

    if (is_page_template('views/template-contact.blade.php')) {
        wp_enqueue_script('maps', 'https://maps.googleapis.com/maps/api/js?key=' . get_field('google_maps_api_key', 'options'));
        wp_enqueue_script('bikmo/contact.js', asset_path('scripts/contact.js'), ['jquery', 'maps'], null, true);
    }

    wp_enqueue_script('bikmo/localization.js', asset_path('scripts/localization.js'), ['jquery'], null, true);
}, 100);

/**
 * Gutenberg assets
 */
add_action('enqueue_block_editor_assets', function () {
    wp_enqueue_style('bikmo/gutenberg.css', asset_path('styles/gutenberg.css'), false, null);
    wp_enqueue_script('bikmo/gutenberg.js', asset_path('scripts/gutenberg.js'), ['jquery'], null, true);
});


/**
 * Theme setup
 */
add_action('after_setup_theme', function () {
    /**
     * Enable features from Soil when plugin is activated
     * @link https://roots.io/plugins/soil/
     */
    add_theme_support('soil-clean-up');
    add_theme_support('soil-jquery-cdn');
    add_theme_support('soil-nav-walker');
    add_theme_support('soil-nice-search');
    add_theme_support('soil-relative-urls');

    /**
     * Enable plugins to manage the document title
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Register navigation menus
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage'),
        'footer_navigation' => __('Footer Navigation', 'sage'),
        'footer_secondary_navigation' => __('Footer Secondary Navigation', 'sage'),
    ]);

    /**
     * Enable post thumbnails
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable HTML5 markup support
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

    /**
     * Enable selective refresh for widgets in customizer
     * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
     */
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Use main stylesheet for visual editor
     * @see resources/assets/styles/layouts/_tinymce.scss
     */
    add_editor_style(asset_path('styles/main.css'));
}, 20);

/**
 * Register sidebars
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ];
    register_sidebar([
        'name'          => __('Primary', 'sage'),
        'id'            => 'sidebar-primary'
    ] + $config);
    register_sidebar([
        'name'          => __('Footer', 'sage'),
        'id'            => 'sidebar-footer'
    ] + $config);
});

/**
 * Updates the `$post` variable on each iteration of the loop.
 * Note: updated value is only available for subsequently loaded views, such as partials
 */
add_action('the_post', function ($post) {
    sage('blade')->share('post', $post);
});

/**
 * Setup Sage options
 */
add_action('after_setup_theme', function () {
    /**
     * Add JsonManifest to Sage container
     */
    sage()->singleton('sage.assets', function () {
        return new JsonManifest(config('assets.manifest'), config('assets.uri'));
    });

    /**
     * Add Blade to Sage container
     */
    sage()->singleton('sage.blade', function (Container $app) {
        $cachePath = config('view.compiled');
        if (!file_exists($cachePath)) {
            wp_mkdir_p($cachePath);
        }
        (new BladeProvider($app))->register();
        return new Blade($app['view']);
    });

    /**
     * Create @asset() Blade directive
     */
    sage('blade')->compiler()->directive('asset', function ($asset) {
        return "<?= " . __NAMESPACE__ . "\\asset_path({$asset}); ?>";
    });
});


function my_acf_init_block_types()
{
    if (function_exists('acf_register_block_type')) {
        acf_register_block_type([
            'name'              => 'bikmocontentblock',
            'title'             => __('Bikmo Content Block'),
            'description'       => __('Bikmo content block.'),
            'render_template'   => 'blocks/bikmocontentblock/bikmocontentblock.php',
            'category'          => 'common',
            'mode'              => 'preview',
            'icon'              => 'block-default',
            'keywords'          => ['bikmo', 'content'],
        ]);

        acf_register_block_type([
            'name'              => 'bikmo3columnsblock',
            'title'             => __('Bikmo 3 Columns Block'),
            'description'       => __('bikmo 3 columns icons block.'),
            'render_template'   => 'blocks/bikmo3columnsblock/bikmo3columnsblock.php',
            'category'          => 'common',
            'mode'              => 'preview',
            'icon'              => 'block-default',
            'keywords'          => ['bikmo', 'columns', '3', 'icons'],
        ]);
        
        acf_register_block_type([
            'name'              => 'bikmobgimageblock',
            'title'             => __('Bikmo BG Image Block'),
            'description'       => __('Background Image with card section block.'),
            'render_template'   => 'blocks/bikmobgimageblock/bikmobgimageblock.php',
            'category'          => 'preview',
            'icon'              => 'block-default',
            'keywords'          => ['bikmo', 'image', 'background'],
        ]);

        acf_register_block_type([
            'name'              => 'bikmoreviewsblock',
            'title'             => __('Bikmo Reviews Block'),
            'description'       => __('Display a list of reviews using the Feefo API.'),
            'render_template'   => 'blocks/bikmoreviewsblock/bikmoreviewsblock.php',
            'category'          => 'preview',
            'icon'              => 'testimonial',
            'keywords'          => ['bikmo', 'review', 'reviews', 'feefo'],
        ]);

        acf_register_block_type([
            'name'              => 'bikmomagazineblock',
            'title'             => __('Bikmo Magazine Block'),
            'description'       => __('Display a nice list of posts.'),
            'render_template'   => 'blocks/bikmomagazineblock/bikmomagazineblock.php',
            'category'          => 'preview',
            'icon'              => 'table-row-before',
            'keywords'          => ['bikmo', 'magazine', 'blog', 'posts'],
        ]);

        acf_register_block_type([
            'name'              => 'bikmofaqblock',
            'title'             => __('Bikmo FAQ Block'),
            'description'       => __('Display a list of questions and answers.'),
            'render_template'   => 'blocks/bikmofaqblock/bikmofaqblock.php',
            'category'          => 'preview',
            'icon'              => 'welcome-learn-more',
            'keywords'          => ['bikmo', 'faq'],
        ]);

        acf_register_block_type([
            'name'              => 'bikmo2columnsblock',
            'title'             => __('Bikmo 2 Columns Block'),
            'description'       => __('bikmo 2 columns block.'),
            'render_template'   => 'blocks/bikmo2columnsblock/bikmo2columnsblock.php',
            'category'          => 'common',
            'mode'              => 'preview',
            'icon'              => 'block-default',
            'keywords'          => ['bikmo', 'columns', '2', 'content'],
        ]);

        acf_register_block_type([
            'name'              => 'bikmopoliciesblock',
            'title'             => __('Bikmo Policies Block'),
            'description'       => __('Display a list of poliecies in card format.'),
            'render_template'   => 'blocks/bikmopoliciesblock/bikmopoliciesblock.php',
            'category'          => 'common',
            'mode'              => 'preview',
            'icon'              => 'block-default',
            'keywords'          => ['bikmo', 'policies', 'policy', '2', '3', '4', 'columns'],
        ]);

        acf_register_block_type([
            'name'              => 'bikmotableblock',
            'title'             => __('Bikmo Table Block'),
            'description'       => __('Display a list of products and features in table format.'),
            'render_template'   => 'blocks/bikmotableblock/bikmotableblock.php',
            'category'          => 'common',
            'mode'              => 'preview',
            'icon'              => 'screenoptions',
            'keywords'          => ['bikmo', 'features', 'table', 'price', 'product'],
        ]);

        acf_register_block_type([
            'name'              => 'bikmoiconsgridblock',
            'title'             => __('Bikmo Icons Grid Block'),
            'description'       => __('Display a list of elements with icon above, in grid format.'),
            'render_template'   => 'blocks/bikmoiconsgridblock/bikmoiconsgridblock.php',
            'category'          => 'common',
            'mode'              => 'preview',
            'icon'              => 'grid-view',
            'keywords'          => ['bikmo', 'icons', 'grid'],
        ]);

        acf_register_block_type([
            'name'              => 'bikmocategorized1block',
            'title'             => __('Bikmo Categorized 1 Block'),
            'description'       => __('Display a list of elements with icon above, in grid format.'),
            'render_template'   => 'blocks/bikmocategorized1block/bikmocategorized1block.php',
            'category'          => 'common',
            'mode'              => 'preview',
            'icon'              => 'excerpt-view',
            'keywords'          => ['bikmo', 'categorized', 'one', '1', 'grid'],
        ]);

        acf_register_block_type([
            'name'              => 'bikmocategorized2block',
            'title'             => __('Bikmo Categorized 2 Block'),
            'description'       => __('Display a list of downloadable files, in grid format, plus a company card.'),
            'render_template'   => 'blocks/bikmocategorized2block/bikmocategorized2block.php',
            'category'          => 'common',
            'mode'              => 'preview',
            'icon'              => 'excerpt-view',
            'keywords'          => ['bikmo', 'categorized', 'two', '2', 'grid'],
        ]);

        acf_register_block_type([
            'name'              => 'bikmocategorized3block',
            'title'             => __('Bikmo Categorized 3 Block'),
            'description'       => __('Display a table of data, some text lines or a bullet list in the categorized block fashion.'),
            'render_template'   => 'blocks/bikmocategorized3block/bikmocategorized3block.php',
            'category'          => 'common',
            'mode'              => 'preview',
            'icon'              => 'excerpt-view',
            'keywords'          => ['bikmo', 'categorized', 'three', '3', 'grid'],
        ]);

        acf_register_block_type([
            'name'              => 'bikmobrandsblock',
            'title'             => __('Bikmo Brands Block'),
            'description'       => __('Display a list of logos.'),
            'render_template'   => 'blocks/bikmobrandsblock/bikmobrandsblock.php',
            'category'          => 'common',
            'mode'              => 'preview',
            'icon'              => 'format-gallery',
            'keywords'          => ['bikmo', 'brand', 'brands', 'logo'],
        ]);

        acf_register_block_type([
            'name'              => 'bikmoteamblock',
            'title'             => __('Bikmo Team Block'),
            'description'       => __('Display a list of team members in a grid of cards.'),
            'render_template'   => 'blocks/bikmoteamblock/bikmoteamblock.php',
            'category'          => 'common',
            'mode'              => 'preview',
            'icon'              => 'businessperson',
            'keywords'          => ['bikmo', 'team', 'members'],
        ]);

        acf_register_block_type([
            'name'              => 'bikmojobsblock',
            'title'             => __('Bikmo Jobs Block'),
            'description'       => __('Display a list open job positions in a grid of cards.'),
            'render_template'   => 'blocks/bikmojobsblock/bikmojobsblock.php',
            'category'          => 'common',
            'mode'              => 'preview',
            'icon'              => 'carrot',
            'keywords'          => ['bikmo', 'jobs', 'grid', 'careears'],
        ]);

        acf_register_block_type([
            'name'              => 'bikmotestimonialsblock',
            'title'             => __('Bikmo Testimonials Block'),
            'description'       => __('Displays the bikmo testimonials.'),
            'render_template'   => 'blocks/bikmotestimonialsblock/bikmotestimonialsblock.php',
            'category'          => 'common',
            'mode'              => 'preview',
            'icon'              => 'testimonial',
            'keywords'          => ['bikmo', 'testimonials'],
        ]);

        acf_register_block_type([
            'name'              => 'bikmo3columns123block',
            'title'             => __('Bikmo Columns 123 Block'),
            'description'       => __('Displays a fancy numbered list on items.'),
            'render_template'   => 'blocks/bikmo3columns123block/bikmo3columns123block.php',
            'category'          => 'common',
            'mode'              => 'preview',
            'icon'              => 'palmtree',
            'keywords'          => ['bikmo', 'columns', 'numbers', '123', 'one', 'two', 'three'],
        ]);

        acf_register_block_type([
            'name'              => 'bikmo3columnsextrablock',
            'title'             => __('Bikmo 3 Columns Extra Block'),
            'description'       => __('Displays a fancy numbered list on cards.'),
            'render_template'   => 'blocks/bikmo3columnsextrablock/bikmo3columnsextrablock.php',
            'category'          => 'common',
            'mode'              => 'preview',
            'icon'              => 'palmtree',
            'keywords'          => ['bikmo', 'columns', 'numbers', 'extra'],
        ]);

        acf_register_block_type([
            'name'              => 'bikmo3columnsaltblock',
            'title'             => __('Bikmo 3 Columns ALT Block'),
            'description'       => __('Displays a fancy list on cards.'),
            'render_template'   => 'blocks/bikmo3columnsaltblock/bikmo3columnsaltblock.php',
            'category'          => 'common',
            'mode'              => 'preview',
            'icon'              => 'tickets-alt',
            'keywords'          => ['bikmo', 'columns', 'numbers', 'alt', 'cards'],
        ]);


    }
}
add_action('acf/init',  __NAMESPACE__ . '\\my_acf_init_block_types');


/*
* Creating a function to create our CPT
*/
function my_custom_post_types() {

    // Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Documents', 'Post Type General Name', 'bikmo' ),
        'singular_name'       => _x( 'Document', 'Post Type Singular Name', 'bikmo' ),
        'menu_name'           => __( 'Documents', 'bikmo' ),
        'parent_item_colon'   => __( 'Parent Document', 'bikmo' ),
        'all_items'           => __( 'All Documents', 'bikmo' ),
        'view_item'           => __( 'View Document', 'bikmo' ),
        'add_new_item'        => __( 'Add New Document', 'bikmo' ),
        'add_new'             => __( 'Add New', 'bikmo' ),
        'edit_item'           => __( 'Edit Document', 'bikmo' ),
        'update_item'         => __( 'Update Document', 'bikmo' ),
        'search_items'        => __( 'Search Documents', 'bikmo' ),
        'not_found'           => __( 'Not Found', 'bikmo' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'bikmo' ),
    );
         
    // Set other options for Custom Post Type
    $args = [
        'label'               => __( 'documents', 'bikmo' ),
        'description'         => __( 'Bikmo Documents', 'bikmo' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => [ 'title', 'editor', 'author', 'thumbnail', 'revisions', 'custom-fields' ],
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => [],
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
        'show_in_rest' => true,
        'rewrite'     => [
            'slug' => 'documents',
            'with_front' => false
        ],
    ];
         
    // Registering your Custom Post Type
    register_post_type( 'documents', $args );
}
add_action( 'init', __NAMESPACE__ . '\\my_custom_post_types', 0 );


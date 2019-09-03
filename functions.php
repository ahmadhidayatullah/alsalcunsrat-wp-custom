
<?php
// Untuk memudahkan pemanggilan path dan url di tema
define('tpath', get_template_directory());
define('turi', get_template_directory_uri());
// Register Nav Walker class_alias
require_once 'wp_bootstrap_navwalker.php';

// Inisisasi tema. Semua setting awal yang dibutuhkan oleh tema
if (!function_exists('theme_setup')) {
    function theme_setup()
    {
        load_theme_textdomain('alsalcunsrat', tpath . '/languages');
        add_theme_support('automatic-feed-links');
        add_theme_support('title-tag');
        add_theme_support('customize-selective-refresh-widgets');
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));
        add_theme_support('post-formats', array(
            'aside',
            'image',
            'video',
            'quote',
            'link',
        ));
        add_theme_support('post-thumbnails');
        register_nav_menus(
            array(
                'primary-menu' => esc_html__('Primary'),
                'footer-1' => esc_html__('Footer 1'),
                'footer-2' => esc_html__('Footer 2'),
                'footer-3' => esc_html__('Footer 3'),
                'footer-4' => esc_html__('Footer 4'),
            )
        );
    }

    add_image_size('logo', 100, 100, false);
    add_image_size('banner', 304, 120, false);
    add_image_size('sidebar-menu', 80, 80, false);
    add_image_size('news-front', 360, 389, false);
}
add_action('after_setup_theme', 'theme_setup'); //Mode inisiasi function di atas agar dieksekusi oleh wordpress

add_filter('nav_menu_css_class', 'special_nav_class', 10, 2);

function special_nav_class($classes, $item)
{
    if (in_array('current-menu-item', $classes)) {
        $classes[] = 'active ';
    }
    return $classes;
}

function load_stylesheets()
{
    wp_register_style('bootstrap', turi . '/assets/css/bootstrap.min.css', array(), 1, 'all');
    wp_enqueue_style('bootstrap');

    wp_register_style('animate', turi . '/assets/css/animate.css', array(), 1, 'all');
    wp_enqueue_style('animate');

    wp_register_style('owl', turi . '/assets/css/owl.carousel.min.css', array(), 1, 'all');
    wp_enqueue_style('owl');

    wp_register_style('themify', turi . '/assets/css/themify-icons.css', array(), 1, 'all');
    wp_enqueue_style('themify');

    wp_register_style('flaticon', turi . '/assets/css/flaticon.css', array(), 1, 'all');
    wp_enqueue_style('flaticon');

    wp_register_style('magnific', turi . '/assets/css/magnific-popup.css', array(), 1, 'all');
    wp_enqueue_style('magnific');

    wp_register_style('slick', turi . '/assets/css/slick.css', array(), 1, 'all');
    wp_enqueue_style('slick');

    wp_register_style('mystyle', turi . '/assets/css/style.css', array(), 1, 'all');
    wp_enqueue_style('mystyle');

    // js
    wp_deregister_script('jquery');
    wp_register_script('jquery', turi . '/assets/js/jquery-1.12.1.min.js', array(), null);
    wp_enqueue_script('jquery');

}

add_action('wp_enqueue_scripts', 'load_stylesheets');

function _tn_addjs()
{
    wp_register_script('popper', turi . '/assets/js/popper.min.js', array(), 1, 1, 1);
    wp_enqueue_script('popper');

    wp_register_script('bootstrap', turi . '/assets/js/bootstrap.min.js', array(), 1, 1, 1);
    wp_enqueue_script('bootstrap');

    wp_register_script('magnific-popup', turi . '/assets/js/jquery.magnific-popup.js', array(), 1, 1, 1);
    wp_enqueue_script('magnific-popup');

    wp_register_script('swiper', turi . '/assets/js/swiper.min.js', array(), 1, 1, 1);
    wp_enqueue_script('swiper');

    wp_register_script('isotope', turi . '/assets/js/isotope.pkgd.min.js', array(), 1, 1, 1);
    wp_enqueue_script('isotope');

    wp_register_script('owl', turi . '/assets/js/owl.carousel.min.js', array(), 1, 1, 1);
    wp_enqueue_script('owl');

    wp_register_script('nice-select', turi . '/assets/js/jquery.nice-select.min.js', array(), 1, 1, 1);
    wp_enqueue_script('nice-select');

    wp_register_script('slick', turi . '/assets/js/slick.min.js', array(), 1, 1, 1);
    wp_enqueue_script('slick');

    wp_register_script('counterup', turi . '/assets/js/jquery.counterup.min.js', array(), 1, 1, 1);
    wp_enqueue_script('counterup');

    wp_register_script('waypoints', turi . '/assets/js/waypoints.min.js', array(), 1, 1, 1);
    wp_enqueue_script('waypoints');

    wp_register_script('custom', turi . '/assets/js/custom.js', array(), 1, 1, 1);
    wp_enqueue_script('custom');


}
add_action('_tn_addjs', '_tn_addjs');

function wpdocs_my_search_form($form)
{
    $form = '<form role="search" method="get" action="' . home_url('/') . '" >
    <div class="form-group">
          <div class="input-group mb-3">
             <input type="text" class="form-control" placeholder="Search Keyword" name="s" id="s" value="' . get_search_query() . '">
             <div class="input-group-append">
                <button class="btn" type="button"><i class="ti-search"></i></button>
             </div>
          </div>
    </div>
    <button class="button rounded-0 primary-bg text-white w-100 btn_1" type="submit">Search</button>
    </form>';

    return $form;
}
add_filter('get_search_form', 'wpdocs_my_search_form');


// Excerpt Length Control
function set_excerpt_length()
{
    return 25;
}
add_filter('excerpt_length', 'set_excerpt_length');

require get_template_directory() . '/inc/general-function.php';
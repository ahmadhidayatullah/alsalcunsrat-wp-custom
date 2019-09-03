<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title><?php bloginfo('name');?> |
      <?php is_front_page() ? bloginfo('description') : wp_title();?>
</title>

    <!-- Favicon -->
    <link rel="icon" href="<?php bloginfo('template_directory')?>/assets/img/logo.png">
    <?php
if (is_single()) {
    ?>
<!-- Facebook -->
    <meta property="fb:use_automatic_ad_placement" content="enable=true ad_density=default" />
    <!-- <meta property="fb:pages" content="842759755832085" /> -->
    <!-- <meta property="fb:app_id" content="886851341690424"/> -->
    <meta property="og:site_name" content="alsalcunsrat.com"/>
    <meta property="og:locale" content="id_ID"/>
    <meta property="og:type" content="article"/>
    <meta property="og:url" content="<?php echo esc_url(get_permalink()); ?>"/>
    <meta property="og:title" content="<?php ucwords(the_title())?>"/>
    <meta property="og:description" content="<?php echo wp_strip_all_tags(get_the_excerpt()); ?>"/>
    <meta property="og:image" content="<?php the_post_thumbnail_url();?>"/>

<!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image"/>
    <meta name="twitter:site" content="@alsalcunsrat"/>
    <meta name="twitter:site:id" content="@alsalcunsrat"/>
    <meta name="twitter:creator" content="@alsalcunsrat"/>
    <meta name="twitter:title" content="<?php ucwords(the_title())?>"/>
    <meta name="twitter:url" content="<?php echo esc_url(get_permalink()); ?>"/>
    <meta property="og:description" content="<?php echo wp_strip_all_tags(get_the_excerpt()); ?>"/>
    <meta name="twitter:image" content="<?php the_post_thumbnail_url();?>"/>
    <?php
} elseif (is_front_page() || is_home()) {
    ?>
<!-- Facebook -->
    <meta property="fb:use_automatic_ad_placement" content="enable=true ad_density=default" />
    <!-- <meta property="fb:pages" content="842759755832085" /> -->
    <!-- <meta property="fb:app_id" content="886851341690424"/> -->
    <meta property="og:site_name" content="alsalcunsrat.com"/>
    <meta property="og:locale" content="id_ID"/>
    <meta property="og:type" content="article"/>
    <meta property="og:url" content="<?php echo esc_url(home_url('/')); ?>"/>
    <meta property="og:title" content="alsalcunsrat.com"/>
    <meta property="og:description" content="Website Resmi ALSA Local Chapter  | Universitas SAM Ratulangi"/>
    <meta property="og:image" content="<?php bloginfo('template_directory');?>/assets/img/logo2.PNG"/>

<!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image"/>
    <meta name="twitter:site" content="@alsalcunsrat"/>
    <meta name="twitter:site:id" content="@alsalcunsrat"/>
    <meta name="twitter:creator" content="@alsalcunsrat"/>
    <meta name="twitter:title" content="alsalcunsrat.com"/>
    <meta name="twitter:url" content="<?php echo esc_url(home_url('/')); ?>"/>
    <meta name="twitter:description" content="Website Resmi ALSA Local Chapter  | Universitas SAM Ratulangi"/>
    <meta name="twitter:image" content="<?php bloginfo('template_directory');?>/assets/img/logo2.PNG"/>

        <?php
}
?>

    <?php wp_head()?>

</head>

<body>
    <!--::header part start::-->
    <header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>"> <img src="<?php bloginfo('template_directory');?>/assets/img/logo.png" alt="logo"> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="ti-menu"></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item justify-content-end"
                            id="navbarSupportedContent">
                            <?php
$args = array(
    'menu' => 'primary',
    'theme_location' => 'primary-menu',
    'depth' => 2,
    'container' => 'ul',
    // 'container_class' => 'navbar-nav align-items-center',
    // 'container_id' => 'bs-example-navbar-collapse-1',
    'menu_class' => 'navbar-nav align-items-center',
    'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
    'walker' => new wp_bootstrap_navwalker(),
);
?>

                                        <?php wp_nav_menu($args);?>

                                        <ul class="navbar-nav align-items-center">
                                <li class="d-none d-lg-block">
                                    <a class="btn_1" href="#">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header part end-->
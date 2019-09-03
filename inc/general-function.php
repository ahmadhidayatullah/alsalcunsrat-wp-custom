<?php

function wpb_set_post_views($postID)
{
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
//To keep the count accurate, lets get rid of prefetching
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

function wpb_get_post_views($postID)
{
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count . ' Views';
}

function css_tag_category($slug)
{
    if ($slug == 'artikel') {
        return 'cat-1';
    } elseif ($slug == 'agenda') {
        return 'cat-2';
    } else {
        return 'cat-4';
    }

}

function _tn_header_tag($postID)
{
    if (is_category()) {
        $slugs = explode('/', get_query_var('category_name'));
        $getCategory = get_category_by_slug($slugs[0]);
        $li = get_cat_name($getCategory->term_id);
        $h1 = get_cat_name($getCategory->term_id);
    } elseif (is_page()) {
        $li = get_the_title();
        $h1 = get_the_title();
    } elseif (is_search()) {
        $li = get_search_query();
        $h1 = get_search_query();
    }

    ?>

<section class="breadcrumb breadcrumb_bg align-items-center">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-sm-6">
                <div class="breadcrumb_tittle text-left">
                    <h2><?php echo $li; ?></h2>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="breadcrumb_content text-right">
                    <p>Home<span>/</span><?php echo $li; ?></p>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
}
add_action('_tn_header_tag', '_tn_header_tag');

function _tn_header_single($postID)
{
    ?>
<!-- Page Header -->
<section class="breadcrumb breadcrumb_bg align-items-center">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-sm-6">
                <div class="breadcrumb_tittle text-left">
                    <h2><?php echo ucwords(get_the_title()) ?></h2>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="breadcrumb_content text-right">
                    <p>Home<span>/</span><?php echo ucwords(get_the_title()) ?></p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /Page Header -->
    <?php
}
add_action('_tn_header_single', '_tn_header_single');

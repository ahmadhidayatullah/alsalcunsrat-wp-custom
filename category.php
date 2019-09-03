<?php get_header();?>

<!-- breadcrumb start-->
    <?php do_action('_tn_header_tag'); ?>
    <!-- breadcrumb start-->


    <!--================Blog Area =================-->
    <section class="blog_area section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                        <?php
                        $slugs = explode('/', get_query_var('category_name'));
$args = array(
    'posts_per_page' => 5, // we need only the latest post, so get that post only
    'category_name' => $slugs[0],
    'order' => 'DESC',
);
$q = new WP_Query($args);
if ($q->have_posts()) {
    while ($q->have_posts()) {
        $q->the_post();
        //Your template tags and markup like:
        $image = get_the_post_thumbnail_url(get_the_ID(), 'list-category');
        $getCategory = get_category_by_slug($slugs[0]);
                ?>
                        <article class="blog_item">
                            <div class="blog_item_img">
                                <img class="card-img rounded-0" src="<?php echo $image;?>" alt="<?php the_title()?>">
                                <a href="#" class="blog_item_date">
                                    <h3><?php echo get_the_date('d'); ?></h3>
                                    <p><?php echo get_the_date('M'); ?></p>
                                </a>
                            </div>

                            <div class="blog_details">
                                <a class="d-inline-block" href="<?php echo esc_url(get_permalink()); ?>" alt="<?php the_title()?>">
                                    <h2><?php echo ucwords(get_the_title()) ?></h2>
                                </a>
                                <?php the_excerpt();?>
                                <ul class="blog-info-link">
                                    <li><a href="#"><i class="far fa-user"></i> Travel, Lifestyle</a></li>
                                    <li><a href="#"><i class="far fa-comments"></i> 03 Comments</a></li>
                                </ul>
                            </div>
                        </article>
                    <?php
}
    wp_reset_postdata();
}
?>


                        <nav class="blog-pagination justify-content-center d-flex">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Previous">
                                        <i class="ti-angle-left"></i>
                                    </a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link">1</a>
                                </li>
                                <li class="page-item active">
                                    <a href="#" class="page-link">2</a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Next">
                                        <i class="ti-angle-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">
                            <?php get_search_form();?>
                            
                         </aside>

                        <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title">Category</h4>
                            <ul class="list cat-list">
                                <?php
$categories = get_categories(array(
    'orderby' => 'name',
    'order' => 'ASC',
));
foreach ($categories as $category) {
    if ($category->slug != 'uncategorized') {

        ?>
    <li>
        <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>" class="d-flex">
            <p><?php echo get_cat_name($category->term_id); ?></p>
            <p>(<?php echo $category->count ?>)</p>
        </a>
    </li>
    <?php
}
}
?>
                            </ul>
                        </aside>

                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">Recent Post</h3>
                            <?php
$args = array(
    'posts_per_page' => 4, // we need only the latest post, so get that post only
    // 'category_name' => 'artikel',
    'order' => 'DESC',
);
$q = new WP_Query($args);
if ($q->have_posts()) {
    while ($q->have_posts()) {
        $q->the_post();
        //Your template tags and markup like:
        $image = get_the_post_thumbnail_url(get_the_ID(), 'sidebar-menu');
        $getCategory = get_category_by_slug('artikel');
                ?>
                            <div class="media post_item">
                                <img src="<?php echo $image; ?>" alt="<?php the_title()?>">
                                <div class="media-body">
                                    <a href="single-blog.html">
                                        <h3><?php echo ucwords(get_the_title()) ?></h3>
                                    </a>
                                    <p><?php the_date();?></p>
                                </div>
                            </div>
                            <?php
}
    wp_reset_postdata();
}
?>
                        </aside>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->

<?php get_footer();?>

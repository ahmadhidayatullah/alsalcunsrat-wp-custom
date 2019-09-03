<?php get_header();?>

<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-8">
                <div class="row">


                <?php
if (have_posts()) {
    while (have_posts()) {
        the_post();
        //Your template tags and markup like:
        $image = get_the_post_thumbnail_url(get_the_ID(), 'section-artikel');
        $getCategory = get_the_category(get_the_ID());
        ?>
                    <!-- post -->
                    <div class="col-md-12">
                        <div class="post post-row">
                            <a class="post-img" href="<?php echo esc_url(get_permalink()); ?>"><img src="<?php echo $image; ?>" alt="<?php the_title()?>"></a>
                            <div class="post-body">
                                <div class="post-meta">
                                    <a class="post-category <?php echo css_tag_category($getCategory[0]->slug); ?>" href="<?php echo esc_url(get_category_link($getCategory[0]->term_id)); ?>"><?php echo $getCategory[0]->name; ?></a>
                                    <span class="post-date"><?php the_date();?></span>
                                </div>
                                <h3 class="post-title"><a href="<?php echo esc_url(get_permalink()); ?>"><?php echo ucwords(get_the_title()) ?></a></h3>
                                <?php the_excerpt();?>
                            </div>
                        </div>
                    </div>
                    <!-- /post -->
                    <?php
}
    wp_reset_postdata();
} else {
    echo "<h2>Tidak ada hasil</h2>";
}
?>

                    <div class="col-md-12">
                        <div class="section-row">
                            <button class="primary-button center-block">Load More</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <!-- anu -->
                <div class="aside-widget text-center">
                    <a target="_blank" href="http://psb.sditalmadinahmaros.sch.id" style="display: inline-block;margin: auto;">
                        <img class="img-responsive" src="<?php bloginfo('template_directory');?>/assets/img/registrasi.png" alt="">
                    </a>
                </div>
                <!-- /anu -->

                <!-- post widget -->
                <div class="aside-widget">
                    <div class="section-title">
                        <h2><?php echo (($slugs[0] == 'pengumuman') ? 'Artikel' : 'Pengumuman') ?></h2>
                    </div>
                    <?php
$args = array(
    'posts_per_page' => 7, // we need only the latest post, so get that post only
    'category_name' => (($slugs[0] == 'pengumuman') ? 'artikel' : 'pengumuman'),
    'order' => 'DESC',
);
$q = new WP_Query($args);

if ($q->have_posts()) {
    while ($q->have_posts()) {
        $q->the_post();
        //Your template tags and markup like:
        $image = get_the_post_thumbnail_url(get_the_ID(), 'sidebar-menu');
        ?>
                    <!-- pengumuman -->
                    <div class="post post-widget">
                        <a class="post-img" href="<?php echo esc_url(get_permalink()); ?>"><img src="<?php echo $image; ?>" alt="<?php the_title()?>"></a>
                        <div class="post-body">
                            <h3 class="post-title"><a href="<?php echo esc_url(get_permalink()); ?>"><?php echo ucwords(get_the_title()) ?></a></h3>
                            <span class="post-date"><?php the_date();?></span>
                        </div>
                    </div>
                    <!-- /pengumuman -->
                    <?php
}
    wp_reset_postdata();
}
?>
                </div>
                <!-- /post widget -->

                 <!-- catagories -->
                 <div class="aside-widget">
                    <div class="section-title">
                        <h2>Kategori</h2>
                    </div>
                    <div class="category-widget">
                        <ul>
<?php
$categories = get_categories(array(
    'orderby' => 'name',
    'order' => 'ASC',
));
foreach ($categories as $category) {
    if ($category->slug != 'uncategorized') {

        ?>
    <li><a href="<?php echo esc_url(get_category_link($category->term_id)); ?>" class="<?php echo css_tag_category($category->slug); ?>"><?php echo get_cat_name($category->term_id); ?><span><?php echo $category->count ?></span></a></li>
    <?php
}
}
?>
                        </ul>
                    </div>
                </div>
                <!-- /catagories -->

                <!-- tags -->
                <div class="aside-widget">
                    <div class="tags-widget">
                        <ul>
<?php
$tags = get_tags(array(
    'orderby' => 'name',
    'order' => 'ASC',
));
foreach ($tags as $tag) {
    ?>
    <li><a href="#"><?php echo ucwords($tag->name); ?></a></li>
    <?php
}
?>
                        </ul>
                    </div>
                </div>
                <!-- /tags -->
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->

<?php get_footer();?>

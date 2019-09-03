<?php get_header();?>
<!-- breadcrumb start-->
<?php do_action('_tn_header_single');?>
    
    <!-- breadcrumb start-->

   <!--================Blog Area =================-->
   <section class="blog_area single-post-area section_padding">
      <div class="container">
         <div class="row">
            <div class="col-lg-8 posts-list">
                                <?php
$slugs = explode('/', get_query_var('category_name'));
if (have_posts()) {
    while (have_posts()) {
        the_post();
        wpb_set_post_views(get_the_ID());
        //Your template tags and markup like:
        $image = get_the_post_thumbnail_url(get_the_ID(), 'list-blog');
        $getCategory = get_category_by_slug($slugs[0]);
        ?>
               <div class="single-post">
                  <div class="feature-img">
                     <img class="img-fluid" src="<?php echo $image ?>" alt="<?php the_title()?>">
                  </div>
                  <div class="blog_details">
                     <h2><?php echo ucwords(get_the_title()) ?></h2>
                     <ul class="blog-info-link mt-3 mb-4">
                        <li><a href="#"><i class="far fa-user"></i> Travel, Lifestyle</a></li>
                        <li><a href="#"><i class="far fa-comments"></i> 03 Comments</a></li>
                     </ul>
                     <?php the_content();?>
                     
                  </div>
               </div>
               <div class="navigation-top">
                  <div class="d-sm-flex justify-content-between text-center">
                     <p class="like-info"><span class="align-middle"><i class="far fa-heart"></i></span> Lily and 4
                        people like this</p>
                     <div class="col-sm-4 text-center my-2 my-sm-0">
                        <!-- <p class="comment-count"><span class="align-middle"><i class="far fa-comment"></i></span> 06 Comments</p> -->
                     </div>
                     <ul class="social-icons">
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                        <li><a href="#"><i class="fab fa-behance"></i></a></li>
                     </ul>
                  </div>
                  <div class="navigation-area">
                     <div class="row">
                        <div
                           class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                           <div class="thumb">
                              <a href="#">
                                 <img class="img-fluid" src="<?php bloginfo('template_directory');?>/assets/img/post/preview.png" alt="">
                              </a>
                           </div>
                           <div class="arrow">
                              <a href="#">
                                 <span class="lnr text-white ti-arrow-left"></span>
                              </a>
                           </div>
                           <div class="detials">
                              <p>Prev Post</p>
                              <a href="#">
                                 <h4>Space The Final Frontier</h4>
                              </a>
                           </div>
                        </div>
                        <div
                           class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                           <div class="detials">
                              <p>Next Post</p>
                              <a href="#">
                                 <h4>Telescopes 101</h4>
                              </a>
                           </div>
                           <div class="arrow">
                              <a href="#">
                                 <span class="lnr text-white ti-arrow-right"></span>
                              </a>
                           </div>
                           <div class="thumb">
                              <a href="#">
                                 <img class="img-fluid" src="<?php bloginfo('template_directory');?>/assets/img/post/next.png" alt="">
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="blog-author">
                <?php
$user = wp_get_current_user();
?>
                  <div class="media align-items-center">
                     <img src="<?php echo esc_url(get_avatar_url($user->ID)); ?>" alt="">
                     <div class="media-body">
                        <a href="#">
                           <h4><?php echo ucwords(get_the_author()) ?></h4>
                        </a>
                        <p><?php echo the_author_description();?></p>
                     </div>
                  </div>
               </div>
                                   <?php
}
    wp_reset_postdata();
}
?>
<!-- comments -->
                        <div id="disqus_thread"></div>
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

var disqus_config = function () {
this.page.url = '<?php echo esc_url(get_permalink()); ?>';  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = '<?php echo esc_url(get_permalink()); ?>'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};

(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://sditalmadinahmaros.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                        <!-- /comments -->
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
   <!--================Blog Area end =================-->
<?php get_footer();?>
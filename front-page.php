<?php get_header();?>

    <!-- banner part start-->
    <section class="banner_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-xl-6">
                    <div class="banner_text">
                        <div class="banner_text_iner">
                            <h1>Welcome to
                                <br><span>ALSA LC Unsrat</span></h1>
                            <p>Disini adalah tempat slogan. Disini adalah tempat slogan. Disini adalah tempat slogan.
                            Disini adalah tempat slogan. Disini adalah tempat slogan. Disini adalah tempat slogan.
                        Disini adalah tempat slogan. Disini adalah tempat slogan. Disini adalah tempat slogan.</p>
                            <a href="#" class="btn_1">Contanct </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner part start-->

    <!-- about part start-->
    <section class="about_part experiance_part section_padding">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-6 col-lg-6">
                    <div class="about_part_text">
                        <h2>MEET THE DIRECTOR</h2>
                        <p>Disini kata sambutan.Disini kata sambutan.Disini kata sambutan.Disini kata sambutan.
                        Disini kata sambutan.Disini kata sambutan.Disini kata sambutan.Disini kata sambutan.
                    Disini kata sambutan.Disini kata sambutan.Disini kata sambutan.Disini kata sambutan.</p>
                        <div class="about_text_iner">
                            <div class="about_text_counter">
                                <h2>20</h2>
                            </div>
                            <div class="about_iner_content">
                                <h3>year <span>of Experience</span></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="about_part_img">
                        <img src="<?php bloginfo('template_directory');?>/assets/img/experiance_img.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about part end-->

    <!-- our_service start-->
    <section class="our_service padding_top">
        <div class="container">
            <div class="row">
                <div class="col-xl-5">
                    <div class="section_tittle">
                        <h2>our services</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-xl-4">
                    <div class="single_feature">
                        <div class="single_service">
                            <span class="flaticon-ui"></span>
                            <h4>Event</h4>
                            <p>Disini kamu akan mendapatkan info terbaru</p>
                            <a href="#" class="btn_3">read more</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-4">
                    <div class="single_feature">
                        <div class="single_service">
                                <span class="flaticon-ui"></span>
                            <h4>New Magazine</h4>
                            <p>Disini kamu akan mendapatkan info terbaru</p>
                            <a href="#" class="btn_3">read more</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-4">
                    <div class="single_feature">
                        <div class="single_service single_service_2">
                                <span class="flaticon-ui"></span>
                            <h4>Library</h4>
                            <p>Disini kamu akan mendapatkan info terbaru</p>
                            <a href="#" class="btn_3">read more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- our_service part end-->

    <!-- about part start-->
    <section class="about_part section_padding">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-6 col-lg-6">
                    <div class="about_part_img">
                        <img src="<?php bloginfo('template_directory');?>/assets/img/about_part_img.png" alt="">
                    </div>
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="about_part_text">
                        <h2>alsalcunsrat.com</h2>
                        <p>Disini penjelasan singkat tentang alsalcunsrat.com.
                        Disini penjelasan singkat tentang alsalcunsrat.com.
                    Disini penjelasan singkat tentang alsalcunsrat.com.</p>
                        <ul>
                            <li>
                                <span class="flaticon-drop"></span>
                                <h3>Visi</h3>
                                <p>Terwujudnya <b>alsa lc unsrat</b> yg berkonpeten dividing akademik, mandir Dan berkripadian berlandaskan kekeluargaan. </p>
                            </li>
                            <li>
                                <span class="flaticon-ui"></span>
                                <h3>Misi</h3>
                                <p>Terwujudnya <b>alsa lc unsrat</b> yg berkonpeten dividing akademik, mandir Dan berkripadian berlandaskan kekeluargaan. </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about part end-->

    <!--::blog_part start::-->
    <section class="blog_part section_padding">
        <div class="container">
            <div class="row ">
                <div class="col-xl-5">
                    <div class="section_tittle ">
                        <h2>New Magazine</h2>
                    </div>
                </div>
            </div>
            <div class="row">
<?php
$args = array(
    'posts_per_page' => 3, // we need only the latest post, so get that post only
    // 'category_name' => 'artikel',
    'order' => 'DESC',
);
$q = new WP_Query($args);
if ($q->have_posts()) {
    while ($q->have_posts()) {
        $q->the_post();
        //Your template tags and markup like:
        $image = get_the_post_thumbnail_url(get_the_ID(), 'news-front');
        $getCategory = get_category_by_slug('artikel');
                ?>
                <div class="col-sm-6 col-lg-4 col-xl-4">
                    <div class="single-home-blog">
                        <div class="card">
                            <img src="<?php echo $image; ?>" class="card-img-top" alt="<?php the_title()?>">
                            <div class="card-body">
                                <ul>
                                    <li> <span class="ti-comments"></span>2 Comments</li>
                                    <li> <span class="ti-heart"></span>2k Like</li>
                                </ul>
                                <a href="<?php echo esc_url(get_permalink()); ?>" alt="<?php the_title()?>">
                                    <h5 class="card-title"><?php echo ucwords(get_the_title()) ?></h5>
                                </a>
                                <a href="<?php echo esc_url(get_permalink()); ?>" class="btn_3">read more</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
}
    wp_reset_postdata();
}
?>
            </div>
        </div>
    </section>
    <!--::blog_part end::-->


<?php get_footer();?>

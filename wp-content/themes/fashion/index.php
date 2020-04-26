<?php get_header(); ?>
    <div class="body-content outer-top-xs" id="top-banner-and-menu">
      <div class="container">
        <div class="row">
          <?php get_template_part("left-sidebar") ?>
          <!-- CONTENT -->
          <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
            <!-- SECTION – HERO -->
            <div id="hero">
              <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
                <?php
                    $arg = array(
                       'post_type'         => 'slider',
                       'posts_per_page'    => 5,
                       'order'             => 'ASC'
                    );
                    $slider = new WP_Query($arg);
                    while($slider->have_posts()) : $slider->the_post();
                    $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' );
                 ?>
                  <div class="item" style="background-image: url(<?php echo $url; ?>);">
                  <div class="container-fluid">
                    <div class="caption bg-color vertical-center text-left">
                        <div class="slider-header fadeInDown-1"><?php the_excerpt(); ?></div>
                      <div class="big-text fadeInDown-1"><?php the_title(); ?></div>
                      <div class="excerpt fadeInDown-2 hidden-xs">
                          <span><?php the_content(); ?></span>
                      </div>
                      <div class="button-holder fadeInDown-3">
                        <a href="<?php echo get_post_meta(get_the_ID(),'_slider_link_value_key', true); ?>" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a>
                      </div>
                    </div>
                  </div>
                </div>
                <?php
                    endwhile;
                    wp_reset_query();
                ?>
              </div>
            </div>
            <!-- INFO BOXES  -->
            <div class="info-boxes wow fadeInUp">
              <div class="info-boxes-inner">
                <div class="row">
                  <div class="col-md-6 col-sm-4 col-lg-4">
                    <div class="info-box">
                      <div class="row">
                        <div class="col-xs-12">
                          <h4 class="info-box-heading green">money back</h4>
                        </div>
                      </div>
                      <h6 class="text">30 Days Money Back Guarantee</h6>
                    </div>
                  </div>
                  <div class="hidden-md col-sm-4 col-lg-4">
                    <div class="info-box">
                      <div class="row">
                        <div class="col-xs-12">
                          <h4 class="info-box-heading green">free shipping</h4>
                        </div>
                      </div>
                      <h6 class="text">Shipping on orders over $99</h6>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-4 col-lg-4">
                    <div class="info-box">
                      <div class="row">
                        <div class="col-xs-12">
                          <h4 class="info-box-heading green">Special Sale</h4>
                        </div>
                      </div>
                      <h6 class="text">Extra $5 off on all items </h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- BEST PRODUCTS  -->
            <?php get_template_part('best-product'); ?>
            <!-- FEATURED PRODUCTS  -->
            <?php get_template_part('featured-product'); ?>
            <!--  WIDE PRODUCTS  -->
            <div class="wide-banners wow fadeInUp outer-bottom-xs">
              <div class="row">
                <div class="col-md-7 col-sm-7">
                  <div class="wide-banner cnt-strip">
                    <div class="image">
                      <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/images/banners/home-banner1.jpg" alt="">
                    </div>
                  </div>
                </div>
                <div class="col-md-5 col-sm-5">
                  <div class="wide-banner cnt-strip">
                    <div class="image">
                      <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/images/banners/home-banner2.jpg" alt="">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--  LATEST PRODUCTS  -->
            <?php get_template_part("latest-product"); ?>
            <!--  WIDE PRODUCTS -->
            <div class="wide-banners wow fadeInUp outer-bottom-xs">
              <div class="row">
                <div class="col-md-12">
                  <div class="wide-banner cnt-strip">
                    <div class="image">
                      <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/images/banners/home-banner.jpg" alt="">
                    </div>
                    <div class="strip strip-text">
                      <div class="strip-inner">
                        <h2 class="text-right">New Mens Fashion<br>
                          <span class="shopping-needs">Save up to 40% off</span>
                        </h2>
                      </div>
                    </div>
                    <div class="new-label">
                      <div class="text">NEW</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- BEST SELLER  -->
            <?php get_template_part('popular-product'); ?>
            <!--  BLOG SLIDER  -->
            <section class="section latest-blog outer-bottom-vs wow fadeInUp">
              <h3 class="section-title">latest form blog</h3>
              <div class="blog-slider-container outer-top-xs">
                <div class="owl-carousel blog-slider custom-carousel">
                  <div class="item">
                    <div class="blog-post">
                      <div class="blog-post-image">
                        <div class="image">
                          <a href="blog.html"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog-post/post1.jpg" alt=""></a>
                        </div>
                      </div>
                      <div class="blog-post-info text-left">
                        <h3 class="name"><a href="#">Voluptatem accusantium doloremque laudantium</a></h3>
                        <span class="info">By Jone Doe &nbsp;|&nbsp; 21 March 2016 </span>
                        <p class="text">Sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                        <a href="#" class="lnk btn btn-primary">Read more</a>
                      </div>
                    </div>
                  </div>
                  <div class="item">
                    <div class="blog-post">
                      <div class="blog-post-image">
                        <div class="image">
                          <a href="blog.html"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog-post/post2.jpg" alt=""></a>
                        </div>
                      </div>
                      <div class="blog-post-info text-left">
                        <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>
                        <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                        <p class="text">Sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                        <a href="#" class="lnk btn btn-primary">Read more</a>
                      </div>
                    </div>
                  </div>
                  <div class="item">
                    <div class="blog-post">
                      <div class="blog-post-image">
                        <div class="image">
                          <a href="blog.html"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog-post/post1.jpg" alt=""></a>
                        </div>
                      </div>
                      <div class="blog-post-info text-left">
                        <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>
                        <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                        <p class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
                        <a href="#" class="lnk btn btn-primary">Read more</a>
                      </div>
                    </div>
                  </div>
                  <div class="item">
                    <div class="blog-post">
                      <div class="blog-post-image">
                        <div class="image">
                          <a href="blog.html"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog-post/post2.jpg" alt=""></a>
                        </div>
                      </div>
                      <div class="blog-post-info text-left">
                        <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>
                        <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                        <p class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
                        <a href="#" class="lnk btn btn-primary">Read more</a>
                      </div>
                    </div>
                  </div>
                  <div class="item">
                    <div class="blog-post">
                      <div class="blog-post-image">
                        <div class="image">
                          <a href="blog.html"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog-post/post1.jpg" alt=""></a>
                        </div>
                      </div>
                      <div class="blog-post-info text-left">
                        <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>
                        <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                        <p class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
                        <a href="#" class="lnk btn btn-primary">Read more</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </div>
        </div>
      </div>
    </div>
<?php get_footer(); ?>
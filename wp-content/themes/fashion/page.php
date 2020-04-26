<?php get_header(); ?>
    <div class="breadcrumb">
      <div class="container">
        <div class="breadcrumb-inner">
          <ul class="list-inline list-unstyled">
            <li><a href="#">Home</a></li>
            <li class='active'>Blog</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="body-content">
      <div class="container">
        <div class="row">
          <div class="blog-page">
            <div class="col-md-9">
            <?php while(have_posts()) : the_post(); ?>
              <div class="blog-post  wow fadeInUp">
                <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                <?php the_content(); ?>
              </div>
            <?php endwhile; ?>
            </div>
            <?php get_template_part("right-sidebar"); ?>
          </div>
        </div>
        <div id="brands-carousel" class="logo-slider wow fadeInUp">
          <div class="logo-slider-inner">
            <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
              <div class="item m-t-15">
                <a href="#" class="image">
                <img data-echo="<?php echo get_template_directory_uri(); ?>/assets/images/brand4.png" src="<?php echo get_template_directory_uri(); ?>/assets/images/blank.gif" alt="">
                </a>	
              </div>
              <div class="item m-t-10">
                <a href="#" class="image">
                <img data-echo="<?php echo get_template_directory_uri(); ?>/assets/images/brand4.png" src="<?php echo get_template_directory_uri(); ?>/assets/images/blank.gif" alt="">
                </a>	
              </div>
              <div class="item">
                <a href="#" class="image">
                <img data-echo="<?php echo get_template_directory_uri(); ?>/assets/images/brand4.png" src="<?php echo get_template_directory_uri(); ?>/assets/images/blank.gif" alt="">
                </a>	
              </div>
              <div class="item">
                <a href="#" class="image">
                <img data-echo="<?php echo get_template_directory_uri(); ?>/assets/images/brand4.png" src="<?php echo get_template_directory_uri(); ?>/assets/images/blank.gif" alt="">
                </a>	
              </div>
              <div class="item">
                <a href="#" class="image">
                <img data-echo="<?php echo get_template_directory_uri(); ?>/assets/images/brand4.png" src="<?php echo get_template_directory_uri(); ?>/assets/images/blank.gif" alt="">
                </a>	
              </div>
              <div class="item">
                <a href="#" class="image">
                <img data-echo="<?php echo get_template_directory_uri(); ?>/assets/images/brand4.png" src="<?php echo get_template_directory_uri(); ?>/assets/images/blank.gif" alt="">
                </a>	
              </div>
              <div class="item">
                <a href="#" class="image">
                <img data-echo="<?php echo get_template_directory_uri(); ?>/assets/images/brand4.png" src="<?php echo get_template_directory_uri(); ?>/assets/images/blank.gif" alt="">
                </a>	
              </div>
              <div class="item">
                <a href="#" class="image">
                <img data-echo="<?php echo get_template_directory_uri(); ?>/assets/images/brand4.png" src="<?php echo get_template_directory_uri(); ?>/assets/images/blank.gif" alt="">
                </a>	
              </div>
              <div class="item">
                <a href="#" class="image">
                <img data-echo="<?php echo get_template_directory_uri(); ?>/assets/images/brand4.png" src="<?php echo get_template_directory_uri(); ?>/assets/images/blank.gif" alt="">
                </a>	
              </div>
              <div class="item">
                <a href="#" class="image">
                <img data-echo="<?php echo get_template_directory_uri(); ?>/assets/images/brand4.png" src="<?php echo get_template_directory_uri(); ?>/assets/images/blank.gif" alt="">
                </a>	
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php get_footer(); ?>
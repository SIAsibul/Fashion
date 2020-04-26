<section class="section wow fadeInUp new-arriavls">
<h3 class="section-title">Best Products</h3>
    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
    <?php 
        $args = array(
            'post_type'           => 'product',
            'post_status'         => 'publish',
            'posts_per_page'      => 10,
            'meta_key'            => array(
                                        '_wc_review_count',
                                        '_wc_average_rating'
                                    ),
            'orderby'             => array(
                                        'meta_value_num' => 'desc',
                                        'total_sales'    => 'desc'
                                    ),
            'meta_query'          => array(
                                        array(
                                            'key' => '_stock_status',
                                            'value' => 'instock'
                                        )
                                    ),
            'stock'               => 0
        );

        $featured_query = new WP_Query( $args );
        $count = 1;
        if ($featured_query->have_posts()) {
            while ($featured_query->have_posts()) : $featured_query->the_post();
                $product = wc_get_product( $featured_query->post->ID );
                
      ?>
    <div class="item item-carousel">
      <div class="products">
        <div class="product">
          <div class="product-image">
            <div class="image">
              <a href="<?php the_permalink(); ?>"><?php echo woocommerce_get_product_thumbnail(); ?></a>
            </div>
            <div class="tag new"><span>new</span></div>
          </div>
          <div class="product-info text-left">
            <h3 class="name"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
            <div class="star-rating">
                <div class="rating-custom">
                    <?php wc_get_template( 'single-product/rating.php' ); ?>
                </div>
            </div>
            <div class="description"></div>
            <div class="product-price">	
              <span class="price"><?php echo $product->get_price_html(); ?></span>
            </div>
          </div>
          <?php woocommerce_template_loop_add_to_cart(); ?>
        </div>
      </div>
    </div>
    <?php
            endwhile;
       } else {
           echo __( 'No products found' );
       }
       wp_reset_postdata();
     ?>
  </div>
</section>
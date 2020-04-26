<div class="best-deal wow fadeInUp outer-bottom-xs">
  <h3 class="section-title">Popular Products</h3>
  <div class="sidebar-widget-body outer-top-xs">
    <div class="owl-carousel best-seller custom-carousel owl-theme outer-top-xs">
      <?php 
        $args = array(
            'post_type'           => 'product',
            'post_status'         => 'publish',
            'posts_per_page'      => 10,
            'meta_key'            => 'total_sales',
            'orderby'             => 'meta_value_num',
            'order'               => 'desc',
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
      <?php if($count%2 == 1){ echo '<div class="item">'; } ?>
        <div class="products best-product">
          <div class="product">
            <div class="product-micro">
              <div class="row product-micro-row">
                <div class="col col-xs-5">
                  <div class="product-image">
                    <div class="image">
                      <a href="<?php the_permalink(); ?>">
                      <?php echo woocommerce_get_product_thumbnail(); ?>
                      </a>					
                    </div>
                  </div>
                </div>
                <div class="col2 col-xs-7">
                  <div class="product-info">
                    <h3 class="name"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
                    <div class="star-rating">
                        <div class="rating-custom">
                            <?php wc_get_template( 'single-product/rating.php' ); ?>
                        </div>
                    </div>
                    <div class="product-price">	
                      <span class="price"><?php echo $product->get_price_html(); ?></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php if($count%2 == 0){ echo '</div>'; } $count++; ?>
        
     <?php
             endwhile;
        } else {
            echo __( 'No products found' );
        }
        wp_reset_postdata();
      ?>
    </div>
  </div>
</div>
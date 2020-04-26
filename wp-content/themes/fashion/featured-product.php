<!-- FEATURED PRODUCTS  -->
<section class="section featured-product wow fadeInUp">
  <h3 class="section-title">Featured products</h3>
  <!-- /.nav-tabs -->
  <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
      <?php 
        $meta_query  = WC()->query->get_meta_query();
        $tax_query   = WC()->query->get_tax_query();
        $tax_query[] = array(
            'taxonomy' => 'product_visibility',
            'field'    => 'name',
            'terms'    => 'featured',
            'operator' => 'IN',
        );

        $args = array(
            'post_type'           => 'product',
            'post_status'         => 'publish',
            'posts_per_page'      => 10,
            'orderby'             => 'total_sales',
            'order'               => 'DESC',
            'meta_query'          => array(
                                        array(
                                            'key' => '_stock_status',
                                            'value' => 'instock'
                                        )
                                    ),
            'tax_query'           => $tax_query,
            'stock'               => 1
        );

        $featured_query = new WP_Query( $args );

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
             <?php
                if(get_post_meta( $product->get_id(), '_hotcheckbox', true ) == 'yes'){
                    echo '<div class="tag hot"><span>hot</span></div>';
                } else if(get_post_meta( $product->get_id(), '_newcheckbox', true ) == 'yes'){
                    echo '<div class="tag new"><span>new</span></div>';
                } else if(get_post_meta( $product->get_id(), '_salecheckbox', true ) == 'yes'){
                     echo '<div class="tag sale"><span>sale</span></div>';
                }
             ?>
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
    <div class="owl-controls clickable" style="display: none;">
        <div class="owl-buttons">
            <div class="owl-prev"></div>
            <div class="owl-next"></div>
        </div>
    </div>
  </div>
</section>
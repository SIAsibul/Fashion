<?php 
    $all_cats;
?>
<div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
  <div class="more-info-tab clearfix ">
    <h3 class="new-product-title pull-left">Latest Products</h3>
    <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
        <li><a class="active" data-transition-type="backSlide" href="#all" data-toggle="tab">All</a></li>
        <?php
            $taxonomy     = 'product_cat';
            $orderby      = 'name';  
            $show_count   = 0;     
            $pad_counts   = 0;     
            $hierarchical = 1;     
            $title        = '';  
            $empty        = 0;
            $args = array(
                'taxonomy'     => $taxonomy,
                'orderby'      => $orderby,
                'show_count'   => $show_count,
                'pad_counts'   => $pad_counts,
                'hierarchical' => $hierarchical,
                'title_li'     => $title,
                'hide_empty'   => $empty,
                'number'       => null,
            );
            $all_categories = get_categories( $args );
            $all_cats = $all_categories;
            foreach ($all_categories as $cat) {
                if($cat->category_parent == 0) {
                    $category_id = $cat->term_id;
                    $thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true );
                    $image = wp_get_attachment_url( $thumbnail_id );
        ?>
            <li><a data-transition-type="backSlide" href="#<?php echo $cat->name; ?>" data-toggle="tab"><?php echo $cat->name; ?></a></li>
      <?php
                }
            }
      ?>
    </ul>
    <!-- /.nav-tabs -->
  </div>
    
    
  <div class="tab-content outer-top-xs">
        <div class="tab-pane in active" id="all">
      <div class="product-slider">
        <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
        <?php 
            $args = array(
                'post_type'           => 'product',
                'post_status'         => 'publish',
                'posts_per_page'      => 10,
                'meta_query'          => array(
                                        array(
                                            'key' => '_stock_status',
                                            'value' => 'instock'
                                        )
                                    ),
                'stock'               => 1,
                'orderby'             =>'date',
                'order'               => 'DESC'
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
      </div>
    </div>
      <?php
        foreach ($all_cats as $cat){
            if($cat->category_parent == 0){
                $category_id = $cat->term_id;
      ?>
     <div class="tab-pane" id="<?php echo $cat->name; ?>">
      <div class="product-slider">
        <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
          <?php 
            $meta_query  = WC()->query->get_meta_query();
            $args = array(
                'post_type'           => 'product',
                'post_status'         => 'publish',
                'posts_per_page'      => 10,
                'product_cat'         => $cat->name,
                'meta_query'          => $meta_query,
                'stock'               => 1,
                'orderby'             =>'date',
                'order'               => 'DESC'
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
      </div>
    </div>
      <?php
            }
        }
      ?>
  </div>
</div>


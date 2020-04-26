<?php
    add_theme_support("title-tag");
    
    function mytheme_add_woocommerce_support() {
        add_theme_support( 'woocommerce' );
    }
    add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );
    
    function woocommerce_enqueue_scripts(){
        //Bootstrap Core CSS
        wp_enqueue_style("bootstrap", get_template_directory_uri()."/assets/css/bootstrap.min.css", array(), "1.0");
        //Customizable CSS
        wp_enqueue_style("main", get_template_directory_uri()."/assets/css/main.css", array(), "1.0");
        wp_enqueue_style("blue", get_template_directory_uri()."/assets/css/blue.css", array(), "1.0");
        wp_enqueue_style("carousel", get_template_directory_uri()."/assets/css/owl.carousel.css", array(), "1.0");
        wp_enqueue_style("transitions", get_template_directory_uri()."/assets/css/owl.transitions.css", array(), "1.0");
        wp_enqueue_style("animate", get_template_directory_uri()."/assets/css/animate.min.css", array(), "1.0");
        wp_enqueue_style("rateit", get_template_directory_uri()."/assets/css/rateit.css", array(), "1.0");
        wp_enqueue_style("bootstrap-select", get_template_directory_uri()."/assets/css/bootstrap-select.min.css", array(), "1.0");
        wp_enqueue_style("font-awesome", get_template_directory_uri()."/assets/css/font-awesome.css", array(), "1.0");
        wp_enqueue_style("custom-css", get_template_directory_uri()."/style.css", array(), "1.0");
    
        //Enqueue Scripts
        wp_enqueue_script("jquery");
        wp_enqueue_script("bootstrap", get_template_directory_uri()."/assets/js/bootstrap.min.js", array(), "1.0", true);
        wp_enqueue_script("dropdown", get_template_directory_uri()."/assets/js/bootstrap-hover-dropdown.min.js", array(), "1.0", true);
        wp_enqueue_script("carouseljs", get_template_directory_uri()."/assets/js/owl.carousel.min.js", array(), "1.0", true);
        wp_enqueue_script("echo", get_template_directory_uri()."/assets/js/echo.min.js", array(), "1.0", true);
        wp_enqueue_script("jquery.easing-1.3", get_template_directory_uri()."/assets/js/jquery.easing-1.3.min.js", array(), "1.0", true);
        wp_enqueue_script("bootstrap-slider", get_template_directory_uri()."/assets/js/bootstrap-slider.min.js", array(), "1.0", true);
        wp_enqueue_script("rateitjs", get_template_directory_uri()."/assets/js/jquery.rateit.min.js", array(), "1.0", true);
        wp_enqueue_script("lightbox", get_template_directory_uri()."/assets/js/lightbox.min.js", array(), "1.0", true);
        wp_enqueue_script("bootstrap-selectjs", get_template_directory_uri()."/assets/js/bootstrap-select.min.js", array(), "1.0", true);
        wp_enqueue_script("wow", get_template_directory_uri()."/assets/js/wow.min.js", array(), "1.0", true);
        wp_enqueue_script("scriptsc", get_template_directory_uri()."/assets/js/scripts.js", array(), "1.0", true);
        
    }
    
    add_action("wp_enqueue_scripts", "woocommerce_enqueue_scripts");
    
    
    
    /**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
    include_once get_template_directory() . '/inc/wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );
    

function custom_menu_support(){
    add_theme_support('menus');
    register_nav_menu('category-menu', 'Category Menu');
}
add_action('init', 'custom_menu_support');


//Custom Menu
function wooco_custom_menu() {
  register_nav_menu('topbar-menu',__( 'Topbar Menu' ));
  register_nav_menu('mega-menu',__( 'Mega Menu' ));
}
add_action( 'init', 'wooco_custom_menu' );



    /**
 * Change number or products per row to 3
 */
    add_filter('loop_shop_columns', 'loop_columns', 999);
    if (!function_exists('loop_columns')) {
            function loop_columns() {
                    return 3; // 3 products per row
            }
    }
    
    
    
    /**
 * Change several of the breadcrumb defaults
 */
add_filter( 'woocommerce_breadcrumb_defaults', 'jk_woocommerce_breadcrumbs' );
function jk_woocommerce_breadcrumbs() {
    return array(
            'delimiter'   => ' &#47; ',
            'wrap_before' => '<div class="breadcrumb-inner">
          <ul class="list-inline list-unstyled">',
            'wrap_after'  => '</ul>
        </div>',
            'before'      => '',
            'after'       => '',
            'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
        );
}





//Remove pagination
add_action('init', 'add_or_remove_woocommerce_hooks');
function add_or_remove_woocommerce_hooks(){
    //Remove woocommerce_breadcrumb
    remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
    //Remove woocommerce_result_count
    remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20, 0);
    //Remove ordering
    remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30, 0);
    //Remove pagination
    remove_action('woocommerce_after_shop_loop', 'woocommerce_pagination', 10, 0);
    //Remove price
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10, 0);
    //Add price to another place
    add_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 25, 0);
    //Remove woocommerce_template_single_meta
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40, 0);
}

//Pagination
function woocommerce_custom_pagination() {

global $wp_query;

if ( $wp_query->max_num_pages <= 1 ) return; 

$big = 999999999; // need an unlikely integer

$pages = paginate_links( array(
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format' => '?paged=%#%',
        'current' => max( 1, get_query_var('paged') ),
        'total' => $wp_query->max_num_pages,
        'type'  => 'array',
        'prev_next'          => true,
	'prev_text'          => __('<i class="fa fa-angle-left"></i>'),
	'next_text'          => __('<i class="fa fa-angle-right"></i>'),
    ) );
    if( is_array( $pages ) ) {
        $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
        echo '<div class="pagination-container">
                    <ul class="list-inline list-unstyled">';
        foreach ( $pages as $page ) {
                echo "<li>$page</li>";
        }
       echo '</ul></div>';
        }
}



//Create the function to house our form

function woocommerce_product_per_page() {
?>
<?php echo '<div class="lbl-cnt">
                <div class="middle">
                <span class="lbl">Show</span>
                    <div class="fld inline">
                      <div class="dropdown dropdown-small dropdown-med dropdown-white inline">' ?>
    <form action="" method="POST" name="results" class="woocommerce-ordering">
    <select name="woocommerce-sort-by-columns" id="woocommerce-sort-by-columns" class="sortby" onchange="this.form.submit()">
<?php

//Get products on page reload
if  (isset($_POST['woocommerce-sort-by-columns']) && (($_COOKIE['shop_pageResults'] <> $_POST['woocommerce-sort-by-columns']))) {
        $numberOfProductsPerPage = $_POST['woocommerce-sort-by-columns'];
          } else {
        $numberOfProductsPerPage = $_COOKIE['shop_pageResults'];
          }

//  This is where you can change the amounts per page that the user will use  feel free to change the numbers and text as you want, in my case we had 4 products per row so I chose to have multiples of four for the user to select.
            $shopCatalog_orderby = apply_filters('woocommerce_sortby_page', array(
            //Add as many of these as you like, -1 shows all products per page
              //  ''       => __('Results per page', 'woocommerce'),
                '5'        => __('5', 'woocommerce'),
                '10'        => __('10', 'woocommerce'),
                '15'        => __('15', 'woocommerce'),
                '20'        => __('20', 'woocommerce'),
                '-1'        => __('All', 'woocommerce'),
            ));

        foreach ( $shopCatalog_orderby as $sort_id => $sort_name )
            echo '<option value="' . $sort_id . '" ' . selected( $numberOfProductsPerPage, $sort_id, true ) . ' >' . $sort_name . '</option>';
?>
</select>
</form>

<?php echo '</div>
                </div>
                    </div>
                </div>' ?>
<?php
}

// now we set our cookie if we need to
function dl_sort_by_page($count) {
  if (isset($_COOKIE['shop_pageResults'])) { // if normal page load with cookie
     $count = $_COOKIE['shop_pageResults'];
  }
  if (isset($_POST['woocommerce-sort-by-columns'])) { //if form submitted
    setcookie('shop_pageResults', $_POST['woocommerce-sort-by-columns'], time()+1209600, '/', 'www.your-domain-goes-here.com', false); //this will fail if any part of page has been output- hope this works!
    $count = $_POST['woocommerce-sort-by-columns'];
  }
  // else normal page load and no cookie
  return $count;
}

add_filter('loop_shop_per_page','dl_sort_by_page');

/**
 * Add custom sorting options (asc/desc)
 */

add_filter( 'woocommerce_catalog_orderby', 'custom_woocommerce_catalog_orderby' );
function custom_woocommerce_catalog_orderby( $sortby ) {
	$sortby['menu_order'] = 'Position';
	$sortby['popularity'] = 'Popularity';
	$sortby['rating'] = 'Rating';
	$sortby['date'] = 'Newest';
	$sortby['price'] = 'Lower Price';
	$sortby['price-desc'] = 'Higher Price';
	return $sortby;
}

//Sidebar Register
add_action( 'widgets_init', 'fashion_sidebars' );
function fashion_sidebars() {
    register_sidebar(
        array(
            'id'            => 'sidebar',
            'name'          => __( 'Sidebar' ),
            'description'   => __( 'A short description of the sidebar.' ),
            'before_widget' => '<div class="side-menu animate-dropdown outer-bottom-xs">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="head">',
            'after_title'   => '</div>',
        )
    );
}



//Category Start

function custom_product_categories( $atts ) {
        global $woocommerce_loop;

        $atts = shortcode_atts( array(
            'number'     => null,
            'orderby'    => 'id',
            'order'      => 'ASC',
            'columns'    => '1',
            'hide_empty' => 0,
            'parent'     => '0',
            'ids'        => ''
        ), $atts );

        if ( isset( $atts['ids'] ) ) {
            $ids = explode( ',', $atts['ids'] );
            $ids = array_map( 'trim', $ids );
        } else {
            $ids = array();
        }

        $hide_empty = ( $atts['hide_empty'] == true || $atts['hide_empty'] == 1 ) ? 1 : 0;

        // get terms and workaround WP bug with parents/pad counts
        $args = array(
            'orderby'    => $atts['orderby'],
            'order'      => $atts['order'],
            'hide_empty' => $hide_empty,
            'include'    => $ids,
            'pad_counts' => true,
            'child_of'   => $atts['parent']
        );

        $product_categories = get_terms( 'product_cat', $args );

        if ( '' !== $atts['parent'] ) {
            $product_categories = wp_list_filter( $product_categories, array( 'parent' => $atts['parent'] ) );
        }

        if ( $hide_empty ) {
            foreach ( $product_categories as $key => $category ) {
                if ( $category->count == 0 ) {
                    unset( $product_categories[ $key ] );
                }
            }
        }

        if ( $atts['number'] ) {
            $product_categories = array_slice( $product_categories, 0, $atts['number'] );
        }

        $columns = absint( $atts['columns'] );
        $woocommerce_loop['columns'] = $columns;

        ob_start();

        if ( $product_categories ) {
            ?>
            <div class="yamm megamenu-horizontal" role="navigation">
                <ul class="nav">
            <?php
            foreach ( $product_categories as $category ) {
                $term = get_term_by('name', $category->name, 'product_cat');
                $children = get_term_children($term->term_id, $category->taxonomy);
                ?>
                <li class="dropdown menu-item">
                    <a class="dropdown-toggle" <?php if(!empty($children)) { echo 'data-hover="dropdown" data-toggle="dropdown"'; } ?> href="<?php echo get_category_link($category); ?>">
                        <i class="icon fa fa-shopping-bag" aria-hidden="true"></i>
                        <?php
                             $thumbnail_id = get_term_meta( $category->term_id, 'thumbnail_id', true );
                                $image = wp_get_attachment_url( $thumbnail_id );
                                if ( $image ) {
                                    echo '<img src="' . $image . '" alt="" />';
                                }
                        ?>
                        <?php echo $category->name; ?>
                     </a>
                     <ul class="dropdown-menu mega-menu">
                      <li class="yamm-content">
                        <div class="row">
                              <?php
                                $IDbyNAME = get_term_by('name', $category->name, 'product_cat');
                                  $product_cat_ID = $IDbyNAME->term_id;
                                    $args = array(
                                        'number' => null,
                                        'hierarchical' => 1,
                                        'orderby' => 'id',
                                        'order' => 'ASC',
                                        'show_option_none' => '',
                                        'hide_empty' => 0,
                                        'parent' => $product_cat_ID,
                                        'taxonomy' => 'product_cat'
                                    );
                                  $subcats = get_categories($args);
                                ?>
                            
                                    <div class="col-md-12">
                                      <ul class="links">
                                          <div class="dropdown-content">   
                                                <div class="row">
                                                <?php 
                                                      foreach ($subcats as $sc) { 
                                                          $link = get_term_link( $sc->slug, $sc->taxonomy );
                                                ?>      
                                                    
                                                        <div class="column">
                                                            <h3>
                                                                <?php echo $sc->name?></h3>
                                                                <?php
                                                                    $idFromName = get_term_by('name', $sc->name, 'product_cat');
                                                                    $cat_ID = $idFromName->term_id;
                                                                    $args1 = array(
                                                                        'number' => null,
                                                                        'hierarchical' => 1,
                                                                        'orderby' => 'id',
                                                                        'order' => 'ASC',
                                                                        'show_option_none' => '',
                                                                        'hide_empty' => 0,
                                                                        'parent' => $cat_ID,
                                                                        'taxonomy' => 'product_cat'
                                                                    );
                                                                  $subcats1 = get_categories($args1);
                                                                  foreach ($subcats1 as $sc1) { 
                                                                      $link = get_term_link( $sc1->slug, $sc1->taxonomy );
                                                              ?>
                                                              <a href="<?php echo $link; ?>"><?php echo $sc1->name; ?></a>
                                                            <?php }   ?>
                                                            
                                                        </div>
                                                    
                                                
                                                <?php }   ?>
                                                </div>
                                           </div>
                                      </ul>
                                    </div>
                            
                        </div>
                      </li>
                    </ul>
                </li>         
                <?php
            }

            woocommerce_product_loop_end();
            ?>
                </ul>
            </div>
            <?php
        }

        woocommerce_reset_loop();

        return ob_get_clean();
    }
    
    
add_action( 'init', function(){
    // Remove the shortcode.
    remove_shortcode( 'product_categories' );

    //Add it back, but using our callback.
    add_shortcode( 'product_categories', 'custom_product_categories' );
}, 11 );

//Category ends


//Custom Logo

add_theme_support( 'custom-logo' );

function woocommerce_custom_logo_setup() {
 $defaults = array(
 'height'      => 500,
 'width'       => 600,
 'flex-height' => true,
 'flex-width'  => true,
 'header-text' => array( 'site-title', 'site-description' ),
 );
 add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'woocommerce_custom_logo_setup' );



/**
 * Show cart contents / total Ajax
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );

function woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;

	ob_start();

	?>
            <div class="col-xs-12 col-sm-12 col-md-3 animate-dropdown top-cart-row">
              <!-- SHOPPING CART DROPDOWN -->
              <div class="dropdown dropdown-cart">
                <a href="<?php echo wc_get_cart_url(); ?>" class="dropdown-toggle lnk-cart" data-hover="dropdown" data-toggle="dropdown">
                  <div class="items-cart-inner">
                    <div class="basket">
                      <i class="glyphicon glyphicon-shopping-cart"></i>
                    </div>
                    <div class="basket-item-count"><span class="count"><?php echo WC()->cart->get_cart_contents_count(); ?></span></div>
                    <div class="total-price-basket">
                      <span class="lbl">cart -</span>
                      <span class="total-price">
                        <span class="value"><?php echo WC()->cart->get_cart_total(); ?></span>
                      </span>
                    </div>
                  </div>
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <?php
                        global $woocommerce;
                        $items = $woocommerce->cart->get_cart();
                            foreach($items as $item => $values) { 
                                $_product =  wc_get_product( $values['data']->get_id() );
                                $getProductDetail = wc_get_product( $values['product_id'] );
                    ?>
                      <div class="cart-item product-summary">
                      <div class="row">
                        <div class="col-xs-4">
                          <div class="image">
                            <a href="<?php echo get_permalink($values['product_id']); ?>"><?php echo $getProductDetail->get_image(array(40, 40)); ?></a>
                          </div>
                        </div>
                        <div class="col-xs-7">
                          <h3 class="name"><a href="<?php echo get_permalink($values['product_id']); ?>"><?php echo $_product->get_title(); ?></a></h3>
                          <div class="price"><?php echo get_post_meta($values['product_id'] , '_price', true); ?></div>
                        </div>
                        <div class="col-xs-1 action">
                            
                        </div>
                      </div>
                     </div>
                    <div class="clearfix"></div>
                  <hr>
                    <?php } ?>
                    <div class="clearfix cart-total">
                      <div class="pull-right">
                        <span class="text">Sub Total :</span><span class='price'><?php echo WC()->cart->get_cart_total(); ?></span>
                      </div>
                      <div class="clearfix"></div>
                      <a href="<?php echo wc_get_cart_url(); ?>" class="btn btn-upper btn-primary btn-block m-t-20">Cart</a>	
                    </div>
                  </li>
                </ul>
              </div>
              <!-- SHOPPING CART DROPDOWN : END -->				
            </div>
        <?php
	$fragments['div.top-cart-row'] = ob_get_clean();
	return $fragments;
}


//Hot Attribute


function hot_woo_add_custom_general_field() {

 global $woocommerce, $post;

 echo '<div class="options_group">';

 // Checkbox Attribute Product
 woocommerce_wp_checkbox( 
array( 
'id'            => '_hotcheckbox', 
'wrapper_class' => 'show_if_simple', 
'label'         => __('HOT', 'woocommerce' ), 
'description'   => __( 'Check for Hot Product', 'woocommerce' )
)
);

echo '</div>';

}


// Display Fields
add_action( 'woocommerce_product_options_general_product_data', 'hot_woo_add_custom_general_field' );

function hot_woo_add_custom_general_fields_save( $post_id ){

  $woocommerce_checkbox = isset( $_POST['_hotcheckbox'] ) ? 'yes' : 'no';
  update_post_meta( $post_id, '_hotcheckbox', $woocommerce_checkbox );
}
add_action( 'woocommerce_process_product_meta', 'hot_woo_add_custom_general_fields_save' );




// Save Fields



function new_woo_add_custom_general_field() {

 global $woocommerce, $post;

 echo '<div class="options_group">';

 // Checkbox Attribute Product
 woocommerce_wp_checkbox( 
array( 
'id'            => '_newcheckbox', 
'wrapper_class' => 'show_if_simple', 
'label'         => __('NEW', 'woocommerce' ), 
'description'   => __( 'Check for New Product', 'woocommerce' )
)
);

echo '</div>';

}


// Display Fields
add_action( 'woocommerce_product_options_general_product_data', 'new_woo_add_custom_general_field' );

function new_woo_add_custom_general_fields_save( $post_id ){

  $woocommerce_checkbox = isset( $_POST['_newcheckbox'] ) ? 'yes' : 'no';
  update_post_meta( $post_id, '_newcheckbox', $woocommerce_checkbox );
}

add_action( 'woocommerce_process_product_meta', 'new_woo_add_custom_general_fields_save' );


//Sale checkbox



function sale_woo_add_custom_general_field() {

 global $woocommerce, $post;

 echo '<div class="options_group">';

 // Checkbox Attribute Product
 woocommerce_wp_checkbox( 
array( 
'id'            => '_salecheckbox', 
'wrapper_class' => 'show_if_simple', 
'label'         => __('SALE', 'woocommerce' ), 
'description'   => __( 'Check for Sale Product', 'woocommerce' )
)
);

echo '</div>';

}
// Display Fields
add_action( 'woocommerce_product_options_general_product_data', 'sale_woo_add_custom_general_field' );

function sale_woo_add_custom_general_fields_save( $post_id ){

  $woocommerce_checkbox = isset( $_POST['_salecheckbox'] ) ? 'yes' : 'no';
  update_post_meta( $post_id, '_salecheckbox', $woocommerce_checkbox );
}

add_action( 'woocommerce_process_product_meta', 'sale_woo_add_custom_general_fields_save' );

/**
 * Create Custo Post Type for Slideres
 */

function create_slider_post_type() {

	$labels = array(
		'name' => __( 'Sliders' ),
		'singular_name' => __( 'Sliders' ),
		'all_items'           => __( 'All Sliders' ),
		'view_item'           => __( 'View Slider' ),
		'add_new_item'        => __( 'Add New Slider' ),
		'add_new'             => __( 'Add New Slider' ),
		'edit_item'           => __( 'Edit Slider' ),
		'update_item'         => __( 'Update Slider' ),
		'search_items'        => __( 'Search Slider' ),
		'search_items' => __('Sliders')
	);

	$args = array(
		'labels' => $labels,
		'description' => 'Add New Slider contents',
		'menu_position' => 27,
		'public' => true,
		'has_archive' => true,
		'map_meta_cap' => true,
		'capability_type' => 'post',
		'hierarchical' => true,
		'rewrite' => array('slug' => false),
		'menu_icon'=>'dashicons-format-image',
		'supports' => array(
			'title',
                        'editor',
			'thumbnail',
                        'excerpt',
		),
	);
	register_post_type( 'slider', $args);

}
add_action( 'init', 'create_slider_post_type' );

add_action( 'init', function() {
    //remove_post_type_support( 'slider', 'editor' );
    remove_post_type_support( 'slider', 'slug' );
} );

function cih_theme_support(){

   add_theme_support( 'post-thumbnails' );
   add_image_size( 'slider_image','1024','720',true);

}
add_action('after_setup_theme','cih_theme_support');

function sliderLink_add_meta_box() {
   add_meta_box('slider_link','Slider Link','slider_link_callback','slider');
}

function slider_link_callback( $post ) {

   wp_nonce_field('slider_link_save','slider_link_meta_box_nonce');
   $value = get_post_meta($post->ID,'_slider_link_value_key',true);
   ?>
    <input type="text" name="slider_link_field" id="slider_link_field" value="<?php echo esc_attr( $value ); ?>" required="required" size="100" />
   <?php
}
add_action('add_meta_boxes','sliderLink_add_meta_box');


function slider_link_save( $post_id ) {
   if( ! isset($_POST['slider_link_meta_box_nonce'])) {
      return;
   }
   if( ! wp_verify_nonce( $_POST['slider_link_meta_box_nonce'], 'slider_link_save') ) {
      return;
   }
   if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
      return;
   }
   if( ! current_user_can('edit_post', $post_id)) {
      return;
   }
   if( ! isset($_POST['slider_link_field'])) {
      return;
   }
   $slider_link = sanitize_text_field($_POST['slider_link_field']);
   update_post_meta( $post_id,'_slider_link_value_key', $slider_link );
}
add_action('save_post','slider_link_save');




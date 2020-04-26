
<!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>
  <head>
    <!-- Meta -->
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <!-- Fonts --> 
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <!--  HEADER  -->
    <header class="header-style-1">
      <div class="top-bar animate-dropdown">
        <div class="container">
          <div class="header-top-inner">
            <div class="cnt-account">
                <?php
                    wp_nav_menu( array(
                        'theme_location' => 'topbar-menu', 
                        'container_class' => 'list-unstyled' ) ); 
                ?>
            </div>
            <div class="cnt-block">
              <ul class="list-unstyled list-inline">
                <li class="dropdown dropdown-small">
                  <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value"><?php echo get_woocommerce_currency_symbol(); ?></span><b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="#"><?php echo get_woocommerce_currency_symbol(); ?></a></li>
                    <li><a href="#">USD</a></li>
                  </ul>
                </li>
                <li class="dropdown dropdown-small">
                  <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">English </span><b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">English</a></li>
                    <li><a href="#">French</a></li>
                    <li><a href="#">German</a></li>
                  </ul>
                </li>
              </ul>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
      <div class="main-header">
        <div class="container">
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
              <div class="logo">
                  <a href="<?php echo esc_url(home_url('/')); ?>">
                      <?php
                        $custom_logo_id = get_theme_mod( 'custom_logo' );
                        $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                        if ( has_custom_logo() ) {
                            echo '<img src="'. esc_url( $logo[0] ) .'">';
                        }
                      ?>
                </a>
              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 top-search-holder">
              <div class="search-area">
                <form>
                  <div class="control-group">
                    <?php echo do_shortcode('[wcas-search-form]'); ?>    
                  </div>
                </form>
              </div>
              <!-- SEARCH AREA : END -->				
            </div>
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
          </div>
        </div>
      </div>
      <!--  NAVBAR -->
      <div class="header-nav animate-dropdown">
        <div class="container">
          <div class="yamm navbar navbar-default" role="navigation">
            <div class="navbar-header">
              <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              </button>
            </div>
            <div class="nav-bg-class">
              <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'mega-menu', 
                        'container'     => 'div',
                        'container_class' => 'nav-outer',
                        'menu_class' => 'nav navbar-nav',
                        'depth' => '3',
                        'fallback_cb'   => false,
                        'add_li_class'  => 'active dropdown yamm-fw'
                        ) ); 
                ?>
                  <div class="clearfix"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!--  HEADER : END  -->
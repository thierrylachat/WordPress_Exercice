<?php
/**
 * The header for our theme 
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="<?php echo esc_url( __( 'http://gmpg.org/xfn/11', 'tanawul-bakery' ) ); ?>">

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php if ( function_exists( 'wp_body_open' ) ) {
	  wp_body_open(); 
	} else { 
	  do_action( 'wp_body_open' ); 
	} ?>	
	<?php if(get_theme_mod('tanawul_bakery_loader_setting',true)){ ?>
	    <div id="pre-loader">
			<div class='demo'>
				<?php $tanawul_bakery_theme_lay = get_theme_mod( 'tanawul_bakery_preloader_types','Default');
				if($tanawul_bakery_theme_lay == 'Default'){ ?>
					<div class='circle'>
						<div class='inner'></div>
					</div>
					<div class='circle'>
						<div class='inner'></div>
					</div>
					<div class='circle'>
						<div class='inner'></div>
					</div>
				<?php }elseif($tanawul_bakery_theme_lay == 'Circle'){ ?>
					<div class='circle'>
						<div class='inner'></div>
					</div>
				<?php }elseif($tanawul_bakery_theme_lay == 'Two Circle'){ ?>
					<div class='circle'>
						<div class='inner'></div>
					</div>
					<div class='circle'>
						<div class='inner'></div>
					</div>
				<?php } ?>
			</div>
	    </div>
	<?php }?>
	<a class="screen-reader-text skip-link" href="#main"><?php esc_html_e( 'Skip to content', 'tanawul-bakery' ); ?></a>
	<div id="page" class="site">
		<header id="masthead" class="site-header" role="banner">
			<div class="container">
				<?php if( get_theme_mod('tanawul_bakery_show_hide_topbar',true) != '' || get_theme_mod('tanawul_bakery_enable_disable_topbar',true) != ''){ ?>
					<div class="topbar">
						<div class="row">
							<div class="col-lg-6 col-md-6">
								<div class="contact-detail">
									<div class="row">
										<div class="col-lg-4 col-md-5">
											<?php if( get_theme_mod( 'tanawul_bakery_contact_number','' ) != '') { ?>
								                <p class="call"><i class="fa fa-phone" aria-hidden="true"></i><?php echo esc_html( get_theme_mod('tanawul_bakery_contact_number','' )); ?></p>
								            <?php } ?>
								        </div>
								        <div class="col-lg-8 col-md-7">
											<?php if( get_theme_mod( 'tanawul_bakery_email_address','' ) != '') { ?>
								                <p class="email"><i class="fa fa-envelope" aria-hidden="true"></i><?php echo esc_html( get_theme_mod('tanawul_bakery_email_address','') ); ?></p>
								            <?php } ?>
								        </div>
							        </div>
						        </div>
							</div>
							<div class="col-lg-6 col-md-6">
								<div class="social-icon">
									<?php if( get_theme_mod( 'tanawul_bakery_facebook_url') != '') { ?>
									    <a href="<?php echo esc_url( get_theme_mod( 'tanawul_bakery_facebook_url','' ) ); ?>"><i class="fab fa-facebook-f" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_attr_e( 'Facebook','tanawul-bakery' );?></span></a>
									<?php } ?>
									<?php if( get_theme_mod( 'tanawul_bakery_twitter_url') != '') { ?>
									    <a href="<?php echo esc_url( get_theme_mod( 'tanawul_bakery_twitter_url','' ) ); ?>"><i class="fab fa-twitter"></i><span class="screen-reader-text"><?php esc_attr_e( 'Twitter','tanawul-bakery' );?></span></a>
									<?php } ?>
									<?php if( get_theme_mod( 'tanawul_bakery_youtube_url') != '') { ?>
									    <a href="<?php echo esc_url( get_theme_mod( 'tanawul_bakery_youtube_url','' ) ); ?>"><i class="fab fa-youtube"></i><span class="screen-reader-text"><?php esc_attr_e( 'Youtube','tanawul-bakery' );?></span></a>
									<?php } ?>
									<?php if( get_theme_mod( 'tanawul_bakery_linkedin_url') != '') { ?>
									    <a href="<?php echo esc_url( get_theme_mod( 'tanawul_bakery_linkedin_url','' ) ); ?>"><i class="fab fa-linkedin-in"></i><span class="screen-reader-text"><?php esc_attr_e( 'Linkedin','tanawul-bakery' );?></span></a>
									<?php } ?>
									<?php if(class_exists('woocommerce')){ ?>
									    <span class="cart_icon">
									        <a class="cart-contents" href="<?php if(function_exists('wc_get_cart_url')){ echo esc_url(wc_get_cart_url()); } ?>"><i class="fas fa-shopping-basket"></i><span class="screen-reader-text"><?php esc_attr_e( 'Shopping-basket','tanawul-bakery' );?></span></a>
								            <li class="cart_box">
								              <span class="cart-value"> <?php echo wp_kses_data( WC()->cart->get_cart_contents_count() );?></span>
								            </li>
									    </span>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
				<div class="main-header">
					<div class="navigation-top">
						<div class="responsive">
							<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'tanawul-bakery' ); ?>">
								<button role="tab" class="menu-toggle" aria-controls="top-menu" aria-expanded="false">
									<?php
										esc_html_e( 'Menus', 'tanawul-bakery' );
									?>
								</button>
								<?php wp_nav_menu( array(
									'theme_location' => 'responsive-menu',
									'menu_id'        => 'top-menu',
								) ); ?>
							</nav>
						</div>
						<?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
					</div>
				</div>
			</div>
		</header>
	</div>

	<div class="site-content-contain">
		<div id="content">
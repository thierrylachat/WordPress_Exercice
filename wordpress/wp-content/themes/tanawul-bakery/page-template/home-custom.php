<?php
/**
 * Template Name: Home Custom Page
 */
get_header(); ?>

<main id="main" role="main">
  <?php do_action( 'tanawul_bakery_before_slider' ); ?>

  <?php if( get_theme_mod('tanawul_bakery_slider_arrows', false) != '' || get_theme_mod('tanawul_bakery_enable_disable_slider', false) != ''){ ?>
  <section id="slider">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="<?php echo esc_attr(get_theme_mod('tanawul_bakery_slider_speed', 3000)); ?>"> 
      <?php $tanawul_bakery_slider_pages = array();
        for ( $count = 1; $count <= 4; $count++ ) {
          $mod = intval( get_theme_mod( 'tanawul_bakery_slide_page' . $count ));
          if ( 'page-none-selected' != $mod ) {
            $tanawul_bakery_slider_pages[] = $mod;
          }
        }
        if( !empty($tanawul_bakery_slider_pages) ) :
        $args = array(
          'post_type' => 'page',
          'post__in' => $tanawul_bakery_slider_pages,
          'orderby' => 'post__in'
        );
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) :
          $i = 1;
      ?>
      <div class="carousel-inner" role="listbox">
        <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
          <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
            <?php the_post_thumbnail(); ?>
            <div class="carousel-caption">
              <div class="inner_carousel">
                <?php if( get_theme_mod('tanawul_bakery_slider_title',true) != ''){ ?>
                  <h1><?php esc_html(the_title());?></h1>
                <?php } ?>
                <?php if( get_theme_mod('tanawul_bakery_slider_content',true) != ''){ ?>
                  <p><?php $excerpt = get_the_excerpt(); echo esc_html( tanawul_bakery_string_limit_words( $excerpt, esc_attr(get_theme_mod('tanawul_bakery_slider_excerpt_number','20')))); ?></p>
                <?php } ?>
                <?php if (get_theme_mod( 'tanawul_bakery_slider_button',true) != '' || get_theme_mod( 'tanawul_bakery_show_hide_slider_button',true) != ''){ ?>
                  <?php if( get_theme_mod('tanawul_bakery_slider_button_text','Read More') != ''){ ?>
                    <div class ="readbutton">
                      <span><a href="<?php esc_url(the_permalink()); ?>"><?php echo esc_html(get_theme_mod('tanawul_bakery_slider_button_text','Read More'));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('tanawul_bakery_slider_button_text','Read More'));?></span></a></span>
                    </div>
                  <?php } ?>
                <?php } ?>
              </div>
            </div>
          </div>
        <?php $i++; endwhile; 
        wp_reset_postdata();?>
      </div>
      <?php else : ?>
      <div class="no-postfound"></div>
        <?php endif;
      endif;?>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
        <span class="screen-reader-text"><?php esc_attr_e( 'Previous','tanawul-bakery' );?></span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
        <span class="screen-reader-text"><?php esc_attr_e( 'Next','tanawul-bakery' );?></span>
      </a>
    </div> 
    <div class="clearfix"></div>
  </section>
  <img role="img" src="<?php echo esc_html(get_template_directory_uri() . '/assets/images/design2.png');?>" class="slider-design" alt="<?php esc_attr_e( 'Border Image','tanawul-bakery' );?>">
  <?php }?>

  <?php do_action( 'tanawul_bakery_after_slider' ); ?>

  <?php if( get_theme_mod('tanawul_bakery_we_offer_title') != '' || get_theme_mod('tanawul_bakery_we_offer_category') != '' || get_theme_mod('tanawul_bakery_text') != ''){ ?>
    <section id="we-offer">
      <div class="container">      
        <?php if( get_theme_mod( 'tanawul_bakery_text','' ) != '') { ?>
          <p><?php echo esc_html( get_theme_mod('tanawul_bakery_text','') ); ?></p>
        <?php } ?>
        <?php if( get_theme_mod('tanawul_bakery_we_offer_title') != ''){ ?>
          <h2><?php echo esc_html(get_theme_mod('tanawul_bakery_we_offer_title','')); ?></h2>
          <img role="img" src="<?php echo esc_html(get_template_directory_uri() . '/assets/images/titledesign.png');?>" class="title-design" alt="<?php esc_attr_e( 'Title Image','tanawul-bakery' );?>">
        <?php }?>
        <div class="row">
          <?php 
            $tanawul_bakery_catData=  get_theme_mod('tanawul_bakery_we_offer_category');
            if($tanawul_bakery_catData){
              $page_query = new WP_Query(array( 'category_name' => esc_html( $tanawul_bakery_catData ,'tanawul-bakery')));?>
              <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
                <div class="col-lg-3 col-md-6">
                  <div class="features-content">
                    <?php the_post_thumbnail(); ?>
                    <h3><a href="<?php echo esc_url( get_permalink() );?>"><?php esc_html(the_title());?><span class="screen-reader-text"><?php esc_html(the_title()); ?></span></a></h3>
                  </div>
                </div>
              <?php endwhile;
              wp_reset_postdata();
            } 
          ?>
        </div>
      </div>
    </section>
  <?php }?>

  <?php do_action( 'tanawul_bakery_after_we_offer' ); ?>

  <div class="container">
    <?php while ( have_posts() ) : the_post();?>
      <?php the_content(); ?>
    <?php endwhile; // End of the loop.
    wp_reset_postdata(); ?>
  </div>
</main>

<?php get_footer(); ?>
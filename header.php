<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php if(get_field('site_googleanalytics', 'option')): ?><?php the_field('site_googleanalytics', 'option'); ?><?php endif; ?>
<!-- Google Tag Manager 20230222-mk -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WFVPRJB');</script>
<!-- End Google Tag Manager -->
<?php wp_head(); ?>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/1.4.1/jquery-migrate.min.js'></script>
<script src="https://kit.fontawesome.com/e6e2ec4795.js" crossorigin="anonymous"></script>

</head>
<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WFVPRJB"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<header class="header">
  <div class="header_in">
    <?php if ( is_home() || is_front_page() ) : ?>
      <h1 class="header_logo"><a href="<?php echo esc_url(home_url()); ?>" rel="home"><img src="<?php the_field('site_logo', 'option'); ?>" alt="<?php the_field('site_shopname', 'option'); ?>" class="mk pc-only"><img src="<?php the_field('site_logo_sp', 'option'); ?>" alt="<?php the_field('site_shopname', 'option'); ?>" class="mk sp-only""></a></h1>
    <?php else : ?>
      <p class="header_logo"><a href="<?php echo esc_url(home_url()); ?>" rel="home"><img src="<?php the_field('site_logo', 'option'); ?>" alt="<?php the_field('site_shopname', 'option'); ?>" class="mk pc-only""><img src="<?php the_field('site_logo_sp', 'option'); ?>" alt="<?php the_field('site_shopname', 'option'); ?>" class="mk sp-only""></a></p>
		<?php endif; ?>
		<nav id="header_nav" class="header_nav">
			<p class="nav_home"><a href=""><img src="<?php echo get_template_directory_uri(); ?>/lib/img/share/icon_home.png" alt="芦屋川デンタルクリニックトップページ"></a></p>
			<?php wp_nav_menu( array(
				'theme_location'=>'gnav',
				'menu_class'    =>'header_nav_list',
				'container'       => '',
				'container_class' => '',
				'container_id'    => '',
				'items_wrap'      => '<ul class="%2$s">%3$s</ul>',));
			?>
		</nav>
		<div class="header_tel">
			<p class="tel"><img src="<?php echo get_template_directory_uri(); ?>/lib/img/share/header_tel.png" class="pc-only" alt="0797-38-3155">
			<a href="tel:0797-38-3155" class="sp-only"><img src="<?php echo get_template_directory_uri(); ?>/lib/img/share/icon_sp_tel.png" alt="0797-38-3155"></p></a>
			<p class="text">阪急神戸線芦屋川駅南徒歩1分<span>土日診療</span></p>
		</div>
  </div>
  <div class="toggle_nav_box">
    <div class="toggle_nav">
      <span></span><span></span><span></span><span>menu</span>
    </div>
    <span class="toggle_nav_bg"></span>
  </div>
  <div class="drawer">
  <?php wp_nav_menu( array(
    'theme_location'=>'spnav',
    'menu_class'    =>'drawer_menu',
    'container'       => '',
    'items_wrap'      => '<ul class="%2$s">%3$s</ul>',));
  ?>
  </div>
</header><!-- /header -->
<main><!-- /main -->
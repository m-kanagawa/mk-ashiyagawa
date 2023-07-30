<?php /*Template Name: page-free */ ?>
<?php get_header(); ?>
<?php get_template_part("lib/parts/parts-h1"); ?>
<?php get_template_part("lib/parts/parts-breadcrumb"); ?>

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  	<?php get_template_part("lib/parts/content-parts"); ?>
	<?php endwhile; endif; ?>
	<?php get_template_part("lib/parts/content-introduction"); ?>
	<?php get_template_part("lib/parts/content-access"); ?>
<?php get_footer(); ?>

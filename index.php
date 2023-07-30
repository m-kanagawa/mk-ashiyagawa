<?php get_header(); ?>
<?php get_template_part("lib/parts/parts-h1"); ?>
<?php get_template_part("lib/parts/parts-breadcrumb"); ?>

  <?php //do_shortcode('[mwform_formkey key="12"]'); //MW WP Form ショートコードを反映させるための記述 ?>

  <?php if ( is_page('sitemap') ) : ?>
    <?php get_template_part("lib/parts/content-sitemap"); ?>
  <?php endif; ?>
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <section>
    <div class="inner post_box">
      <?php the_content(); ?>
      <?php get_template_part("lib/parts/content-parts"); ?>
    </div><!-- /.post -->
  </section>
  <?php endwhile; endif; ?>

	<?php if ( !is_page('introduction') && !is_page('access') ) : ?>
		<?php get_template_part("lib/parts/content-introduction"); ?>
	<?php endif; ?>
	<?php get_template_part("lib/parts/content-access"); ?>
<?php get_footer(); ?>

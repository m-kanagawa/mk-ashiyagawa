<?php get_header(); ?>
<?php get_template_part("lib/parts/parts-h1"); ?>
<?php get_template_part("lib/parts/parts-breadcrumb"); ?>

  <div class="inner post_box archive_box">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article class="archive_box_inner custom_content">
      <h2 class="archive_ttl"><?php the_title(); ?></h2>
      <p class="archive_data"><?php the_time('Y/m/d'); ?></p>
      <div class="archive_txt_box"><?php the_excerpt(); ?></div>
      <p class="btn_more"><a href="<?php the_permalink(); ?>" >続きを読む</a></p>
    </article>
  <?php endwhile; endif; ?>
  </div><!-- /.inner -->


<?php get_template_part("lib/parts/parts-pagination"); ?>

<?php get_footer(); ?>

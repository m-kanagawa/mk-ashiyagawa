<?php get_header(); ?>
<?php get_template_part("lib/parts/parts-h1"); ?>
<?php get_template_part("lib/parts/parts-breadcrumb"); ?>

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <article>
    <div class="container gutters single_box">
      <div class="row custom_content">
        <div class="col span_12">
          <h2 class="style_ttl"><?php the_title(); ?></h2>
          <p class="data"><?php the_time('Y/m/d'); ?></p>
          <div class="single_txt_box"><?php the_content(); ?></div>
        </div>
      </div>
    </div>
  </article>
  <?php endwhile; endif; ?>

<?php get_footer(); ?>
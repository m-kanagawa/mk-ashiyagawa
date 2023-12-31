<?php get_header(); ?>

  <div class="breadcrumbBox">
    <?php if ( function_exists( 'bread_crumb' ) ) { bread_crumb(); } ?>
  </div>
  <article>
    <div class="inner post_box box404">
      <h2>指定されたページは存在しませんでした。</h2>
      <p>このページの URL ：
      <span class="error_msg">
      http://<?php echo esc_html($_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']); ?>
      </span></p>
      <p>現在表示する記事がありません。</p>
      <p><a href="<?php echo home_url(); ?>">トップページへ戻る</a></p>
    </div><!-- /.inner -->
  </article>

<?php get_footer(); ?>
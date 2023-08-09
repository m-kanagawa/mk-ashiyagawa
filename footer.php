</main>
<footer class="footer">
  <p class="pageTop"><a href="#">page top</a></p>
	<?php if( is_page('home_visits') ) : ?>
		<div class="cta home-visits">
			<div class="cta__inner">
				<p class="text"><span>無料</span>訪問歯科検診の<br>お申し込みはお電話で</p>
				<p class="tel mk-btn01"><a href="tel:0120-96-9975" style="padding: 10px 0;"><span class="tel-num">0120-96-9975</span></a></p>
			</div>
		</div>
	<?php else:?>
	<div class="floating_box">
		<p class="tel sp-only"><a href="tel:0797-38-3155"><img src="<?php echo get_template_directory_uri(); ?>/lib/img/share/icon_sp_tel.png" alt="0797-38-3155"></a></p>
		<ul>
			<li class="js-ani"><a href="https://v2.apodent.jp/app//entry/795/ashiya/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/lib/img/share/icon_all.svg" alt=""><span>WEB予約</span></a></li>
			<li class="js-ani delay1"><a href="<?php echo home_url(); ?>/access/"><img src="<?php echo get_template_directory_uri(); ?>/lib/img/share/icon_parking.svg" alt="アクセス案内"><span>アクセス案内</span></a></li>
		</ul>
	</div>
	<?php endif; ?>
  <?php wp_nav_menu( array(
    'theme_location'=>'fnav',
    'container'       => 'div',
    'container_class' => 'footer_nav_list',
    'menu_class'    =>'',
    'items_wrap'      => '<ul class="%2$s">%3$s</ul>',));
  ?>
  <p class="copyright"><small>&copy; 2020 <a href="<?php echo esc_url(home_url()); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></small></p>
</footer>
<?php wp_footer(); ?>
<?php
  global $template;
  $temp_name = basename($template); // パスの最後の名前（ファイル名）を取得
  echo '<!-- Template file currently in use:'.$temp_name.' -->'; // ファイル名の表示
?>
</body>
</html>

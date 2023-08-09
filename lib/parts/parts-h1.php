<section class="sec_page_top">
	<div class="sec_page_top_in">
		<?php if(is_post_type_archive('news') || is_singular('news')):?>
			<?php if(is_post_type_archive('news')):?>
				<h1 class="page_ttl"><?php the_archive_title(); ?></h1>
			<?php else:?>
				<h1 class="page_ttl"><?php the_title(); ?></h1>
			<?php endif; ?>
			<figure><img src="<?php echo get_template_directory_uri(); ?>/lib/img/page/page_img_news.png" alt="<?php the_title(); ?>"></figure>
		<?php elseif( is_page('home_visits') ) : ?>
			<h1 class="page_home_visits_ttl"><img src="<?php echo get_template_directory_uri(); ?>/lib/img/page/page_home_visits_lp.jpg" class="pc-only" alt="訪問歯科診療"><img src="<?php echo get_template_directory_uri(); ?>/lib/img/page/page_home_visits_lp_sp.jpg" class="sp-only" alt="訪問歯科診療"></h1>
		<?php else:?>
			<h1 class="page_ttl"><?php the_title(); ?></h1>
		<figure><img src="<?php if(get_field('page_ttl_bg')): ?><?php the_field('page_ttl_bg'); ?><?php else:?><?php echo get_template_directory_uri(); ?>/lib/img/page/page_img.png<?php endif; ?>" alt="<?php the_title(); ?>"></figure>
		<?php endif; ?>
		<?php if( !is_page('home_visits') ) : ?>
		<div class="three_point">
			<a href="<?php echo home_url(); ?>/access/">
				<ul>
					<li><p><span>土<span class="color_red">日</span></span>も診療</p></li>
					<li><p>阪急芦屋川駅<br>徒歩<span>1</span>分</p></li>
					<li><p>駐車場<br>あります</p></li>
				</ul>
			</a>
		</div>
		<?php endif; ?>
	</div>
</section>

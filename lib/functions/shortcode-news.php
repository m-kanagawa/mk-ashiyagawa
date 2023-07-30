<?php
	function getNewItems($atts) {
		extract(shortcode_atts(array(
			"num" => '',	//最新記事リストの取得数
			"cat" => ''	//表示する記事のカテゴリー指定
		), $atts));
		global $post;
		$oldpost = $post;
		$myposts = get_posts('post_type=news&numberposts='.$num.'&order=DESC&orderby=post_date&taxonomy=news&term='.$cat);
		$retHtml='<dl>';
		foreach($myposts as $post) :
		$cat = get_the_terms($post->ID,'');//get_the_categoryをget_the_termsに変更
		$catname = $cat[0]->cat_name;
		$catslug = $cat[0]->slug;
		setup_postdata($post);
		$days=14; //Newをつける日数
		$today=date_i18n('U'); $entry=get_the_time('U');
		$diff1=date('U',($today - $entry))/86400;
		// if(has_post_thumbnail()){
		// 	$retHtml.=get_the_post_thumbnail($page->ID,'medium');
		// }
		$retHtml.='<dt>'.get_the_date().'</dt>';
		$retHtml.='<dd>';
		if ($days > $diff1) {
			$retHtml.='<span class="iconNew">New!</span>';
		}
		$retHtml.='<a href="'.get_permalink().'">'.the_title("","",false).'</a></dd>';
		endforeach;
		$retHtml.='</dl>';
		$post = $oldpost;
		wp_reset_postdata();
		return $retHtml;
	}
	add_shortcode("news", "getNewItems");
<?php
	function getTestItems($atts) {
		return get_template_part("lib/parts/parts-h1");
	}
	add_shortcode("text", "getTestItems");
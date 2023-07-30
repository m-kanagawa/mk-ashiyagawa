<?php
	function getFuncConcept() {
		return get_template_part("lib/parts/content-concept");
	}
	add_shortcode("concept", "getFuncConcept");
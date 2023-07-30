<?php
	function getFuncConcept() {
		return get_template_part("lib/parts/content-concept");
	}
	add_shortcode("concept", "getFuncConcept");

	function getFuncFlow() {
		return get_template_part("lib/parts/content-flow");
	}
	add_shortcode("flow", "getFuncFlow");

	function getGallery() {
		return get_template_part("lib/parts/content-gallery");
	}
	add_shortcode("gallery", "getGallery");

	 
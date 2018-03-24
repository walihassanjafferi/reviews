(function($) {
	"use strict";
	$(document).ready(function() {
		$(".content-pagein a").on("click", function() {
			$(this).attr("target", "_blank");
			$(this).attr("rel", "noopener noreferrer");
		});
	});
	$(window).load(function() {});
})(jQuery);
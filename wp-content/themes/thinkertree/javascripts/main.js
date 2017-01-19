$(function() {

	function initMixItUp() {
		var containerEl = document.querySelector('.projects-container');
		var mixer = mixitup(containerEl, {
			controls: {
				toggleLogic: 'and'
			}
		});
	}

	function respond() {
		// All responsive functions here
	}

	$(document).ready(function() {
		initMixItUp();
	});

	$(window).load(function() {

	});

	$(window).resize(function() {

	});

	$(window).scroll(function() {

	});

}(jQuery));
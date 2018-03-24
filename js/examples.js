/* Examples */
(function($) {
$('.circle').each(function(){
	var circleValue = ($(this).data('value'));
	var displayValue = (parseFloat(circleValue) * 10).toFixed(2);
	$(this).circleProgress({
		value: circleValue,
		fill: {gradient: ['#fff', '#fff']}
	}).on('circle-animation-progress', function(event, progress, stepValue) {
		$(this).find('strong').text(displayValue);
	});
})
})(jQuery);

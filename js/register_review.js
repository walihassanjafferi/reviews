var reviewsSection;
var category;
var ppp = 6; 
var pageNumber = 1;
$(document).ready(function(){
	category = $('#post-category').val();
	reviewsSection = $('#featured_reviews');
	$("#SliderSingle").val(1);
	$("#submitReview").on('click',function(){
	if($("#frmReview").parsley().isValid()){
		$("#review_notification").removeClass('hidden');
		$.ajax({
			url : register_review_var.ajax_url,
			type : 'post',
			data: "action=register_ajax_review&"+$("#frmReview").serialize(),
			success:function(msg)
			{
				$("#frmReview input,#frmReview textarea").val('').attr('disabled',true);
				$("#submitReview").attr('disabled',true);
				$("#review_content").html("<i class='fa fa-check' style='color:#27c503;clear:both; text-align:center;'></i> Review Submitted Successfully");
			}
		})
	}
	else {
		$("#frmReview").parsley().validate();
	}
})
})


function load_more_reviews(){
	$("#load-more").html('Loading Reviews ...');
	$.ajax({
	url:register_review_var.ajax_url,
	data: "action=load_more_reviews&post_id="+$("#post_id").val()+'&page_no='+$('#load-more').data('page_no'),
	method:"POST",
	success:function(response){
		$('#reviews').append(response);
		var page_no = parseInt($('#load-more').data('page_no'))+1;
		$('#load-more').data('page_no',page_no);
		initializeCounters();
	if($(".latest-reviewsin").length == $("#total_reviews").val())
	{
		$("#load-more").html('No More Reviews!');
		$("#load-more").attr('disabled',true);
	}
	else{
		$("#load-more").html('Load More');
		}
	}
});

}

function sortPosts(element) {
	element = $(element);
	var sortby = element.data('sortby');
	var category = $('#front-category').val();
	if(category == ''){
	//var category = $('#front-category-mobile').val();
	//if(category == ''){
		category = '';
	//}
	}
reviewsSection.html('<h3 class="text-center" style="color:#3e4e5f; clear:both; text-align:center;">Loading Sites...</h3>');
$('.sortby').removeClass('activein');
$(element).addClass('activein');
$.ajax({
	url:register_review_var.ajax_url,
	data: "action=load_sites&length=3&sortby="+sortby+'&category='+category,
	method:"POST",
	success:function (response) {
		reviewsSection.html(response).fadeIn();
		$('#sortby').val(sortby);
		initializeCounters();
		initializeStars();
	$('#loadmoresites').html('Load More').attr('disabled',false);
	}
});
}

function loadMorePosts(){
var sortby = $('#sortby').val();
$.ajax({
	url:register_review_var.ajax_url,
	data: "action=load_sites&length="+$('.allreviews').length+"&sortby="+sortby+'&category='+category,
	method:"POST",
	success:function (response) {
	if(response == '')
	{
		$('#loadmoresites').html('No More Sites!').attr('disabled',true);
	}
		reviewsSection.append(response).fadeIn();
		initializeCounters();
	initializeStars();
	}
});
}
function rsortPosts(element) {
element = $(element);
var sortby = element.data('sortby');
var category = $('#front-category').val();
reviewsSection.html('<h3 class="text-center" style="color:#3e4e5f">Loading Sites...</h3>');
$('.sortby').removeClass('activein');
$(element).addClass('activein');
$.ajax({
	url:register_review_var.ajax_url,
	data: "action=load_review_sites&length=" + 0 + "&sortby="+sortby+'&category='+category,
	method:"POST",
	success:function (response) {
		reviewsSection.html(response).fadeIn();
		$('#sortby').val(sortby);
		initializeCounters();
		initializeStars();
	$('#loadmoresites').html('Load More').attr('disabled',false);
	}
});
pageNumber=1;
}

function rloadMorePosts(){
var sortby = $('#sortby').val();
pageNumber++;
$.ajax({
	url:register_review_var.ajax_url,
	data: "action=load_review_sites&pageNumber=" + pageNumber + '&ppp=' + ppp+"&sortby="+sortby+'&category='+category,
	method:"POST",
	success:function (response) {
		if(response == '')
		{
			$('#loadmoresites').html('No More Sites!').attr('disabled',true);
		}
		reviewsSection.append(response).fadeIn();
		initializeCounters();
		initializeStars();
	}
});
}
function initializeCounters() {
	$('.circle2').each(function(counter){
	var circleValue = ($(this).data('value').toFixed(2));
	var displayValue = (parseFloat(circleValue) * 10).toFixed(2);
	$(this).circleProgress({
		value: circleValue,
		fill: {gradient: ['#fff', '#fff']}
	}).on('circle-animation-progress', function(event, progress, stepValue) {
		$(this).find('strong').text(displayValue);
	}).removeClass('circle2');
});
}

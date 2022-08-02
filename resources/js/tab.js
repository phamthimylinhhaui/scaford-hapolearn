$('ul.tabs li').click(function() {
	var tab_id = $(this).attr('data-tab');
	$('ul.tabs li').removeClass('current');
	$('.tab-content').removeClass('current').hide();
	$(this).addClass('current');
	$("#" + tab_id).addClass('current').fadeIn();
});
//
// $('#btnTeacher').on('click', function() {
// 	$('#contentTest').toggleClass('active');
// })

// $('#js-link-teacher').click(function () {
// 	removeActive();
// 	$('#js-teacher').addClass('active');
// 	$('#js-other-course').addClass('hidden');
// 	$('#js-description-course').removeClass('hidden');
// 	$('#js-info-course').css("margin-top", "30px");
// 	$(this).addClass('active');
// });
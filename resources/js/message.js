$('.jquery-message-btn').on('click',function (){
  $('#contentMessage').toggleClass('active');
})

$('#jqueryBtn').on('click',function (){
  $('#exit').toggleClass('active');
  $('#jqueryBtn').toggleClass('active');
})

// $('#reload').on('click',function (){
// $('#reload').addEventListener("submit" ,function (){
// 	location.reload();
	// $('#description').removeClass('show'),
	// $('#document').addClass('show')
// })

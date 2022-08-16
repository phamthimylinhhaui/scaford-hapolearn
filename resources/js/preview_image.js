$('#input-avatar').change(function(){
  var reader = new FileReader();
  reader.onload = function (e) {
    var img = $('#avatar').first()[0];
    console.log(img);
    img.src = e.target.result;
  };
  reader.readAsDataURL($('#input-avatar').first()[0].files[0]);
});

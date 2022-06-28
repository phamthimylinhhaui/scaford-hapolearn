$(document).ready(function(){
  $('.slide-show').slick({
    infinite: true,
    slidesToShow: 2,
    slidesToScroll: 2,
    prevArrow:"<button type='button' class='slick-prev pull-left'><i class='fas fa-chevron-circle-left slick-arrow' aria-hidden='true'></i></button>",
    nextArrow:"<button type='button' class='slick-next pull-right'><i class='fas fa-chevron-circle-right slick-arrow' aria-hidden='true'></i></button>",
    responsive: [{
      breakpoint: 991,
      settings: {
        slidesToShow: 1,
      }
    }]
  });
});

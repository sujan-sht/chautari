// loader
// $(document).ready(function(){
// 	$('div#loading').removeAttr('id');
// });
var preloader = document.getElementById("loading");
// window.addEventListener('load', function(){
// 	preloader.style.display = 'none';
// 	})
function myFunction() {
    preloader.style.display = "none";
}
// Navigation Js Scroll Starts
$(window).scroll(function () {
    var scroll = $(window).scrollTop();
    if (scroll > 50) {
        $(".navigation-wrap").css("border-bottom", "0.5px solid #FF6A00");
    } else {
        $(".navigation-wrap").css("border-bottom", "unset");
    }
}); // Navigation Js Scroll Ends

// Banner Slick Slider Starts
$(".slick-slider").slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    fade: true,
    speed: 300,
    arrows: false,
    // centerMode: true,
    autoplay: true,
    dots: true,
});
// Banner Slick Slider End
// Lightbox Gallery
$(document).ready(() => {
    $("#lightgallery").lightGallery({
        pager: true,
    });
});

lightGallery(document.getElementById("lightgallery"), {
    speed: 500,
    plugins: [lgVideo],
});

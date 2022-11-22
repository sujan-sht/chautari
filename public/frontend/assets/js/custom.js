// marquee
function handleMarquee() {
  const marquee = document.querySelectorAll('.marquee');
  let speed = 1;
  let lastScrollPos = 0;
  let timer;

  marquee.forEach(function (el) {
    // stop animation on mouseenter
    mouseEntered = false;
    document.querySelector('.inner').addEventListener('mouseenter', function () {
      mouseEntered = true;
    })
    document.querySelector('.inner').addEventListener('mouseleave', function () {
      mouseEntered = false
    })

    const container = el.querySelector('.inner');
    const content = el.querySelector('.inner > *');
    //Get total width
    const elWidth = content.offsetWidth;

    //Duplicate content
    let clone = content.cloneNode(true);
    container.appendChild(clone);

    let progress = 1;

    function loop() {
      if (mouseEntered === false) {
        progress = progress - speed;
      }
      if (progress <= elWidth * -1) {
        progress = 0;
      }
      container.style.transform = 'translateX(' + progress + 'px)';
      window.requestAnimationFrame(loop);
    }
    loop();
  });

  function handleSpeedClear() {
    speed = 4;
  }
};

handleMarquee();

//DROPDOWN

const $dropdown = $(".dropdown");
const $dropdownToggle = $(".dropdown-toggle");
const $dropdownMenu = $(".dropdown-menu");
const showClass = "show";

$(window).on("load resize", function () {
  if (this.matchMedia("(min-width: 768px)").matches) {
    $dropdown.hover(
      function () {
        const $this = $(this);
        $this.addClass(showClass);
        $this.find($dropdownToggle).attr("aria-expanded", "true");
        $this.find($dropdownMenu).addClass(showClass);
      },
      function () {
        const $this = $(this);
        $this.removeClass(showClass);
        $this.find($dropdownToggle).attr("aria-expanded", "false");
        $this.find($dropdownMenu).removeClass(showClass);
      }
    );
  } else {
    $dropdown.off("mouseenter mouseleave");
  }
});
// SIDE NAV
function openNav() {
  document.getElementById("mySidenav").style.width = "320px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
$(document).ready(function () {
  $('textarea#body').summernote({
    height: '300px'
  });
});
// SCROLL TO TOP

mybutton = document.getElementById("myBtn");
window.onscroll = function () {
  scrollFunction()
};
function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}

//FOR SIDENAV DROPDOWN
$(".feat-btn").click(function () {
  $("nav ul .feat-show").toggleClass("show");
  $("nav ul .first").toggleClass("rotate");
});
$(".samachar-btn").click(function () {
  $("nav ul .samachar-show").toggleClass("show1");
  $("nav ul .second").toggleClass("rotate");
});
$(".jeewan-btn").click(function () {
  $("nav ul .jeewan-show").toggleClass("show2");
  $("nav ul .third").toggleClass("rotate");
});
$(".artha-btn").click(function () {
  $("nav ul .artha-show").toggleClass("show3");
  $("nav ul .fourth").toggleClass("rotate");
});
$(".suchana-btn").click(function () {
  $("nav ul .suchana-show").toggleClass("show4");
  $("nav ul .fifth").toggleClass("rotate");
});
$(".khelkud-btn").click(function () {
  $("nav ul .khelkud-show").toggleClass("show5");
  $("nav ul .sixth").toggleClass("rotate");
});
$(".kala-btn").click(function () {
  $("nav ul .kala-show").toggleClass("show6");
  $("nav ul .seventh").toggleClass("rotate");
});
$(".bichar-btn").click(function () {
  $("nav ul .bichar-show").toggleClass("show7");
  $("nav ul .eight").toggleClass("rotate");
});

//SHOW HIDE FOR PRADESH
$(document).ready(function() {
  $('#show-hidden-menu').click(function() {
    $('.hidden-menu').slideToggle("slow");
    // Alternative animation for example
    // slideToggle("fast");
  });
});

//PHOTO GALLERY
$('.owl-carousel.photo-gallery-carousel').owlCarousel({
  loop:true,
  margin:10,
  nav:false,
  autoplay: true,
  responsive:{
      0:{
          items:2
      },
      600:{
          items:3
      },
      1000:{
          items:4
      }
  }
})

//MATCH HEIGHT
//ANTARBARTA TITLE
$(document).ready(function(){
  $('.antarbartaTitle').matchHeight();
})

//ANTARBARTA PARAGRAPH
$(document).ready(function(){
  $('.antarbartaPara').matchHeight();
})

//PRADESH
$(document).ready(function(){
  $('.pradesh-image').matchHeight();
})

//ANTARBARTS CARD
$(document).ready(function () {
  $('.antarbarta-card').matchHeight();
})

// FIXED NAVBAR
$(window).scroll(function () {
  if ($(this).scrollTop() > 120) {
    $(".header-wrapper").addClass("fixed");
  } else {
    $(".header-wrapper").removeClass("fixed");
  }
});


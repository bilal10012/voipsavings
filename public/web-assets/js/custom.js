// blogslider start
$('.blogslid').slick({
  dots: true,
  arrows:true,
  infinite: false,
  speed: 300,
  slidesToShow: 3,
  slidesToScroll: 4,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});

// blogslider end\




// artslider start
$('.artslid').slick({
  dots: false,
  arrows:true,
  infinite: false,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});

// artslider end




 // brand start
 $('.brand-slider').slick({
    infinite: true,
    autoplay: true,
    arrows: false,
    autoplaySpeed: 0,
    cssEase: 'linear',
    speed: 9000,
    slidesToShow: 5,
    slidesToScroll: 1,
    responsive: [{
            breakpoint: 1199,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 1
            }
        }, {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1
            }
        }, {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                cssEase: 'linear',
                speed: 9000,
                slidesToScroll: 1
            }
        }
    ]
});

// blogslider end




// product slider jas start

 $('.slider-for').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false,
  fade: true,
  asNavFor: '.slider-nav'
});
$('.slider-nav').slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  asNavFor: '.slider-for',
  dots: true,
  centerMode: true,
  focusOnSelect: true
});
// product slider jas end

// simple slick slider start
$(".regular").slick({
  dots: true,
  infinite: true,
  speed:300,
  autoplay:true,
  slidesToShow: 3,
  slidesToScroll: 3
});

// simple slick slider end

// wow animation js 

$(function () {
    new WOW().init();
  });


// responsive menu js 

$(function () {
  $('#menu').slicknav();
});



// slick slider in tabs js start

function openCity(evt, cityName) {
  // Declare all variables
  var i, tabcontent, tablinks;

  // Get all elements with class="tabcontent" and hide them
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Get all elements with class="tablinks" and remove the class "active"
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace("active", "");
  }

  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += "active";
}


// slick slider in tabs js end

// header script
$(function() {
  $(".navbar-set li > a").each(function() {
      var href = $(this).attr('href');
      var heading = $(this).text();
      $('.sidenav').append('<a href="' + href + '">' + heading + '<\/a>');
  });
});



function openNav() {
  document.getElementById("mySidenav").style.left = "0px";
}

function closeNav() {
  document.getElementById("mySidenav").style.left = "-250px";
}
// Header Script End




// Counter js Start

$(".count").each(function () {
  $(this)
    .prop("Counter", 0)
    .animate(
      {
        Counter: $(this).text(),
      },
      {
        duration: 4000,

        easing: "swing",

        step: function (now) {
          $(this).text(Math.ceil(now));
        },
      }
    );
});



// Counter Js End







function illyal() {
  var illyals = document.querySelectorAll(".two");

  for (var i = 0; i < illyals.length; i++) {
    var windowHeight = window.innerHeight;
    var elementTop = illyals[i].getBoundingClientRect().top;
    var elementVisible = 150;

    if (elementTop < windowHeight - elementVisible) {
      illyals[i].classList.add("active");
    } else {
      illyals[i].classList.remove("active");
    }
  }
}

window.addEventListener("scroll", illyal);



// Handle mouseover on menu items dynamically
jQuery('#m8K74y54S li a').mouseover(function() {
    const targetSection = jQuery(this).data('target');

    jQuery('[class^="section-"]').removeClass('active');

    jQuery(`.${targetSection}`).addClass('active');

    jQuery('#m8K74y54S li a').removeClass('active');
    jQuery(this).addClass('active');
});

// Remove "active" state when mouse is over non-menu areas
jQuery('.contentArea, .headerLogo, .subfooter, .footerWrap, .videoBannerWrap, .homeBannerWrap, .headerUtilityBar, .utilityBarSearch, .pageBannerSimple, .tabs').mouseover(function() {
    jQuery('[class^="section-"]').removeClass('active');
    jQuery('#m8K74y54S li a').removeClass('active');
});



//-----------------------------------------------------------
// Scroll Anchor
//-----------------------------------------------------------
//

function scrollToAnchor(){
  function findAllLinksToAnchorTags() {
    const links = $("body").find("a");

    const res = links.filter(function( index ) {
      return $(this).attr("href") && $(this).attr("href").includes("#");
    })
    return res;
  }

  function travelToAnchorTag(id)
 {
    const offset = 50;
    const headerHeight = {
      "desktop": 142,
      "mobile": 80
    };

    const mobileDesktopViewBreakPoint = 1300;

    if ($(`#${id}`).length === 0) {
      return;
    }

    const targetElement = $(`#${id}`)[0];

    if ($(window).width() < mobileDesktopViewBreakPoint) {
      $("html, body").animate({scrollTop: $(targetElement).offset().top - headerHeight["mobile"] - offset}, 'slow');
    } else {
      $("html, body").animate({scrollTop: $(targetElement).offset().top - headerHeight["desktop"] - offset}, 'slow');
    }
  }

  // if pathname contains anchor tag, then travel to that
  const url = new URL(window.location.href);

  if (url.href.includes("#")) {
    const id = url.href.split("#")[1];
    document.addEventListener('readystatechange', event => {
      if (event.target.readyState === "complete") {
        travelToAnchorTag(id)
;
    }
    });
  }

  // find all links to anchor tags
  // for all links containing anchor tags,
  findAllLinksToAnchorTags().click(function(e) {

    // if on the same page, find the element with id and navigate to that
    if (this.pathname == window.location.pathname &&
        this.protocol == window.location.protocol &&
        this.host == window.location.host) {
      e.preventDefault();
      const id = $(this).attr("href").split("#")[1];
      travelToAnchorTag(id)
;
    }
  });
}

$(document).ready(function() {
  scrollToAnchor();
})



/*
$(document).ready(function() {
    $('.qmHolder ul').slick({
        dots: false,
        infinite: false,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    infinite: false,
                    dots: false
                }
            },
            {
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
                    slidesToScroll: 1
                }
            }

        ]
    });
});

*/






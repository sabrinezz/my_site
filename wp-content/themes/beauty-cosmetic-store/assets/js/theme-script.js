function beauty_cosmetic_store_openNav() {
  jQuery(".sidenav").addClass('show');
}
function beauty_cosmetic_store_closeNav() {
  jQuery(".sidenav").removeClass('show');
}

( function( window, document ) {
  function beauty_cosmetic_store_keepFocusInMenu() {
    document.addEventListener( 'keydown', function( e ) {
      const beauty_cosmetic_store_nav = document.querySelector( '.sidenav' );

      if ( ! beauty_cosmetic_store_nav || ! beauty_cosmetic_store_nav.classList.contains( 'show' ) ) {
        return;
      }
      const elements = [...beauty_cosmetic_store_nav.querySelectorAll( 'input, a, button' )],
        beauty_cosmetic_store_lastEl = elements[ elements.length - 1 ],
        beauty_cosmetic_store_firstEl = elements[0],
        beauty_cosmetic_store_activeEl = document.activeElement,
        tabKey = e.keyCode === 9,
        shiftKey = e.shiftKey;

      if ( ! shiftKey && tabKey && beauty_cosmetic_store_lastEl === beauty_cosmetic_store_activeEl ) {
        e.preventDefault();
        beauty_cosmetic_store_firstEl.focus();
      }

      if ( shiftKey && tabKey && beauty_cosmetic_store_firstEl === beauty_cosmetic_store_activeEl ) {
        e.preventDefault();
        beauty_cosmetic_store_lastEl.focus();
      }
    } );
  }
  beauty_cosmetic_store_keepFocusInMenu();
} )( window, document );

var beauty_cosmetic_store_btn = jQuery('#button');

jQuery(window).scroll(function() {
  if (jQuery(window).scrollTop() > 300) {
    beauty_cosmetic_store_btn.addClass('show');
  } else {
    beauty_cosmetic_store_btn.removeClass('show');
  }
});

beauty_cosmetic_store_btn.on('click', function(e) {
  e.preventDefault();
  jQuery('html, body').animate({scrollTop:0}, '300');
});

jQuery(document).ready(function() {

    var owl = jQuery('#top-slider .owl-carousel');
    owl.owlCarousel({
    margin: 0,
    nav:false,
    autoplay : true,
    lazyLoad: true,
    autoplayTimeout: 5000,
    loop: false,
    dots: true,
    navText : ['<i class="fa fa-lg fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-lg fa-chevron-right" aria-hidden="true"></i>'],
    responsive: {
      0: {
        items: 1
      },
      576: {
        items: 1
      },
      768: {
        items: 1
      },
      1000: {
        items: 1
      },
      1200: {
        items: 1
      }
    },
    autoplayHoverPause : false,
    mouseDrag: true
  });

    var owl = jQuery('.featured .owl-carousel');
    owl.owlCarousel({
    margin: 40,
    nav:false,
    autoplay : true,
    lazyLoad: true,
    autoplayTimeout: 5000,
    loop: false,
    dots: false,
    navText : ['<i class="fa fa-lg fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-lg fa-chevron-right" aria-hidden="true"></i>'],
    responsive: {
      0: {
        items: 1
      },
      576: {
        items: 3
      },
      768: {
        items: 4
      },
      1000: {
        items: 6
      },
      1200: {
        items: 10
      }
    },
    autoplayHoverPause : false,
    mouseDrag: true
  });
})

window.addEventListener('load', (event) => {
  jQuery(".loading").delay(2000).fadeOut("slow");
});

jQuery(document).ready(function($) {
  $("p.site-title a,h1.site-title a").html(function() {
      var text2 = $(this).text().trim().split(" ");
      var lastWord = text2.pop(); // Remove and store the last word

      if (text2.length > 0) {
          var remainingText = text2.join(" ");
          return `${remainingText} <span class='last_slide_head'>${lastWord}</span>`;
      } else {
          return `<span class='last_slide_head'>${lastWord}</span>`;
      }
  });
});

jQuery(document).ready(function(){
  jQuery("button.cat-btn").click(function(){
    jQuery(".home_product_cat").toggle();
  });
});
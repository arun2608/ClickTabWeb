/*banner slider*/


    var swiper = new Swiper(".banner-slider", {
      slidesPerView: 3,
      spaceBetween: 3,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
		breakpoints: {
        640: {
          slidesPerView: 2,
          spaceBetween: 8,
        },
        768: {
          slidesPerView: 4,
          spaceBetween: 10,
        },
        1024: {
          slidesPerView: 3,
          spaceBetween: 10,
        },
      },
    });



/*category slider*/


    var swiper = new Swiper(".cat-slider", {
      slidesPerView: 2,
      spaceBetween: 10,
      autoplay: {
        delay: 1800,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
		breakpoints: {
        640: {
          slidesPerView: 2,
          spaceBetween: 8,
        },
        768: {
          slidesPerView: 4,
          spaceBetween: 10,
        },
        1024: {
          slidesPerView: 7,
          spaceBetween: 10,
        },
      },
    });


/*brand slider*/


    var swiper = new Swiper(".brand-slider", {
      slidesPerView: 2,
      spaceBetween: 10,
      autoplay: {
        delay: 2400,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
		breakpoints: {
        640: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 4,
          spaceBetween: 40,
        },
        1024: {
          slidesPerView: 5,
          spaceBetween: 20,
        },
      },
    });




/*Festival slider*/

    var swiper = new Swiper(".fest-slider", {
      spaceBetween: 10,
      loop: true,
  centeredSlides: true,
  slidesPerView: 1,

  autoplay: {
    delay: 300,
    disableOnInteraction: false
  },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      
		breakpoints: {
        640: {
          slidesPerView: 1,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 1,
          spaceBetween: 40,
        },
        1024: {
          slidesPerView: 5,
          spaceBetween: 20,
        },
      },
    });




/*top selling slider*/

    var swiper = new Swiper(".top-sell-slider", {
      slidesPerView: 2,
      spaceBetween: 10,
      autoplay: {
        delay: 2400,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
		breakpoints: {
        640: {
          slidesPerView: 1,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 4,
          spaceBetween: 40,
        },
        1024: {
          slidesPerView: 4,
          spaceBetween: 20,
        },
      },
    });



/*testimonial slider*/


	  
	$(document).ready(function () {
  var swiper = new Swiper(".testimonial-swiper", {
    loop: true,
	    autoplay: {
        delay: 7500,
        disableOnInteraction: false,
      },
      
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
      renderBullet: function (index, className) {
        var thumb = document
          .querySelectorAll(".swiper-slide")
          [index].getAttribute("data-bullet-thumb");
        return (
          '<span class="' +
          className +
          '" style="background-image:url(' +
          thumb +
          ')"></span>'
        );
      }
    },

  });
});







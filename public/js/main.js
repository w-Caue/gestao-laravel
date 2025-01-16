function sidebar() {
    return {
        sidebar: {
            full: false,
            navOpen: false
        },
        tooltip: {
            show: false,
            visibleClass: 'block sm:absolute  sm:border border-gray-500 left-16 sm:text-sm sm:bg-gray-800 sm:px-2 sm:py-1 sm:rounded'
        },
        dropdown: {
            open: false,
            toggle(tap) {
                this.open = !this.open;
            },
        },

        dropdownProduto: {
            open: false,
            toggle(tap) {
                this.open = !this.open;
            },
        },

        dropdownMovimentacao: {
            open: false,
            toggle(tap) {
                this.open = !this.open;
            },
        }
    }
}


let swiper = new Swiper(".swiper", {
    // slidesPerView: 4,
    loop: true,
    autoplay: {
      delay: 3000,
    },
  
    pagination: {
      el: ".swiper-pagination",
    },
  
    breakpoints: {
      // when window width is >= 320px
      320: {
        slidesPerView: 2,
        spaceBetween: 20
      },
      // when window width is >= 480px
      480: {
        slidesPerView: 3,
        spaceBetween: 30
      },
      // when window width is >= 640px
      640: {
        slidesPerView: 5,
        // spaceBetween: 10,
      }
    },
  
    // Navigation arrows
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
  
  
  /* NAVBAR */
  const navbar = document.querySelector(".navbar");
  const content = document.querySelector(".content");
  
  const dark = window.localStorage.getItem('dark');
  
  if (dark == 'true') {
    gsap.to(navbar, {
      y: -5,
      padding: 20,
      duration: 2,
      backgroundColor: '#111827',
      scrollTrigger: {
        trigger: content,
        start: 'top',
        end: 'center',
        scrub: true,
      }
    });
  } else {
    gsap.to(navbar, {
      y: -5,
      padding: 20,
      duration: 2,
      backgroundColor: '#ffffff',
      scrollTrigger: {
        trigger: content,
        start: 'top',
        end: 'center',
        scrub: true,
      }
    });
  }
  
  /* /NAVBAR */
  
import Swiper, { Navigation } from 'swiper';
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

Swiper.use([Navigation]);

new Swiper('.hero-slider', {
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  breakpoints: {
    1024: {
      grabCursor: false,
    },
  },
  afterInit() {
    let element = document.querySelector(".hero-slider .swiper-wrapper");
    element.classList.remove("flex");

    if(localStorage.getItem("visited") === null){
      localStorage.setItem("visited", true);
      window.scrollTo(0, 0);
      document.documentElement.scrollIntoView(true);
    }
  }
});

new Swiper('.testimonials-slider', {
  autoHeight: true,
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  breakpoints: {
    1024: {
      grabCursor: false,
    },
  }
});

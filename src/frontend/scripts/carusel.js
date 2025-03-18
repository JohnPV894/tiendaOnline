"use strict";
//Dependencias 
import Swiper from 'swiper';
import 'swiper/css';
const swiper = new Swiper('.slider-wrapper',{

      loop:true,
      grabCursor:true,
      spaceBetween:true,
      pagination:{el:'.swiper-pagination'},
      
      navigation:{
            nextEl:'.swiper-button-next',
            prevEl:'.swiper-button-prev',
      },
      breakpoints:{
            0:{slidesPerView:1},
            620:{slidesPerView:2},
            1024:{slidesPerView:3}
      }


});
/*https://swiperjs.com/get-started*/

// import Swiper JS
import Swiper from 'swiper/bundle';

// Navigation toggle
window.addEventListener('load', function () {
      let main_navigation = document.querySelector('#primary-menu');
      document.querySelector('#primary-menu-toggle').addEventListener('click', function (e) {
            e.preventDefault();
            main_navigation.classList.toggle('hidden');
      });

      var skillsSwiper = new Swiper(".skillsSwiper", {
            slidesPerView: 'auto',
            spaceBetween: 30,
            freeMode: true,
            loop: true,
            autoplay: {
                  delay: 1,
                  disableOnInteraction: false,
                  pauseOnMouseEnter: true,
            },
            speed: 2000,
            pagination: {
                  el: ".swiper-pagination",
                  clickable: true,
            },
      });

      var testimonialsSwiper = new Swiper(".testimonialsSwiper", {
            navigation: {
                  nextEl: ".swiper-button-next",
                  prevEl: ".swiper-button-prev",
            },
            autoplay: {
                  delay: 3000,
                  disableOnInteraction: false,
                  pauseOnMouseEnter: true,
            },
            loop: true,
      });
});

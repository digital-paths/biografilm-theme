import Swiper from "swiper";
import { Navigation, Pagination, A11y } from "swiper/modules";
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";
import "swiper/css/a11y";
import "../hero-carousel/hero-carousel.css";
import "../contents-displayer/contents-displayer.css";
import "./premi.css";

document.addEventListener("DOMContentLoaded", () => {
  Array.from(document.querySelectorAll(".premi-wrapper")).forEach((wrapper) => {
    const swiper = wrapper.querySelector(".premi-swiper");
    const prevEl = wrapper.querySelector(".swiper-button-prev");
    const nextEl = wrapper.querySelector(".swiper-button-next");
    const paginationEl = wrapper.querySelector(".swiper-pagination");

    new Swiper(swiper, {
      modules: [Navigation, Pagination, A11y],
      slidesPerView: 1.1,
      slidesPerGroup: 1,
      spaceBetween: 0,
      speed: 600,
      breakpoints: {
        768: { slidesPerView: 2, slidesPerGroup: 2 },
      },
      a11y: { enabled: true },
      ...(paginationEl && {
        pagination: { el: paginationEl, clickable: true },
      }),
      ...(prevEl && nextEl && {
        navigation: { prevEl, nextEl },
      }),
    });
  });
});

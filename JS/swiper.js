
    var swiper = new Swiper(".swiper-container", {
        slidesPerView: 3,
        spaceBetween: 20,
        centeredSlides: true,
        loop: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        effect: "slide", // Keeps movement smooth
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            320: { slidesPerView: 1 }, /* Mobile: 1 card */
            768: { slidesPerView: 2 }, /* Tablets: 2 cards */
            1024: { slidesPerView: 3 } /* Desktop: 3 cards */
        }
    });




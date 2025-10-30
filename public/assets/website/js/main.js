$(document).ready(function () {
    $("#loading-screen").delay(2000).fadeOut("slow");
    $(".loading").delay(2000).fadeOut("slow");
});
$(".search-btn").on("click", function () {
    $(".search-bar-container").slideToggle(
        "display: inline-block",
        function () {
            if ($(this).is(":visible")) {
                $(".search-bar-container input").focus();
            }
        }
    );
    let searchIcon = document.querySelectorAll(".search-btn i");
    searchIcon.forEach((i) => {
        i.classList.toggle("fa-times");
    });
});
document.addEventListener("DOMContentLoaded", function () {
    if (window.innerWidth < 1025) {
        AOS.init({
            disable: true,
        });
    } else {
        AOS.init();
    }
});
// for lazy load in images
const images = document.querySelectorAll("img");
images.forEach((img) => {
    img.setAttribute("loading", "lazy");
});

const primaryBtn = document.querySelectorAll(".primary-btn");
document.querySelectorAll(".primary-btn").forEach((btn) => {
    if (!btn.querySelector("span")) {
        const text = btn.textContent.trim();
        const span = document.createElement("span");
        span.textContent = text;
        btn.textContent = "";
        btn.appendChild(span);
    }
});
// mobile menu
let navs = document.querySelector(".primary-navs");
let menuIcon = document.querySelectorAll(".menu-toggle");
menuIcon.forEach(function (e) {
    e.addEventListener("click", function () {
        navs.classList.toggle("active");
    });
});
$(".testimonials-slider").slick({
    dots: false,
    infinite: true,
    speed: 300,
    slidesToShow: 1,
    slidesToScroll: 1,
    prevArrow: ".testimonials-arrows .arrow-left",
    nextArrow: ".testimonials-arrows .arrow-right",
    responsive: [
        {
            breakpoint: 1200,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                dots: true,
            },
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            },
        },
    ],
});

$(".slider-for").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: ".slider-nav",
});
$(".slider-nav").slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: ".slider-for",
    dots: true,
    // centerMode: true,
    focusOnSelect: true,
    prevArrow: ".solution-arrows .arrow-left",
    nextArrow: ".solution-arrows .arrow-right",
});
document.addEventListener("DOMContentLoaded", () => {
    const truncatedText = document.getElementById("truncated-text");
    const fullText = document.getElementById("full-text");
    const readMoreLink = document.getElementById("read-more-link");
    if (readMoreLink) {
        readMoreLink.addEventListener("click", () => {
            if (fullText.classList.contains("hidden")) {
                fullText.classList.remove("hidden");
                truncatedText.classList.add("hidden");
                readMoreLink.textContent = "Read Less";
            } else {
                fullText.classList.add("hidden");
                truncatedText.classList.remove("hidden");
                readMoreLink.textContent = "Read More";
            }
        });
    }
});

$(document).ready(function () {
    $(".benefit-slider").slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        speed: 300,
        autoplaySpeed: 3000,
        arrows: true,
        dots: false,
        prevArrow:
            '<button class="slick-prev" title="Click to Previous Slide"><i class="fas fa-chevron-left"></i></button>',
        nextArrow:
            '<button class="slick-next" title="Click to Next Slide"><i class="fas fa-chevron-right"></i></button>',
        infinite: true,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3,
                },
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                },
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1,
                },
            },
        ],
    });

    $(".product-category-slider").slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        speed: 300,
        autoplaySpeed: 3000,
        arrows: true,
        dots: false,
        prevArrow:
            '<button class="slick-prev" title="Click to Previous Slide"><i class="fas fa-chevron-left"></i></button>',
        nextArrow:
            '<button class="slick-next" title="Click to Next Slide"><i class="fas fa-chevron-right"></i></button>',
        infinite: true,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3,
                },
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                },
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1,
                },
            },
        ],
    });
    AOS.refresh();

});
const shopNavSwiper = new Swiper(".shop-nav-swiper", {
    slidesPerView: 12,
    spaceBetween: 0,
    freeMode: true,
    grabCursor: true,
    mousewheel: true,
    breakpoints: {
        320: { spaceBetween: 8 },
        768: { spaceBetween: 10 },
        1024: { spaceBetween: 12 }
    }
});


// document.addEventListener("DOMContentLoaded", function () {
//     const shopNav = document.querySelector(".shop-nav");

//     let isDown = false;
//     let startX;
//     let scrollLeft;

//     // 🖱️ Mouse Events
//     shopNav.addEventListener("mousedown", (e) => {
//         isDown = true;
//         shopNav.classList.add("dragging");
//         startX = e.pageX - shopNav.offsetLeft;
//         scrollLeft = shopNav.scrollLeft;
//     });

//     shopNav.addEventListener("mouseleave", () => {
//         isDown = false;
//         shopNav.classList.remove("dragging");
//     });

//     shopNav.addEventListener("mouseup", () => {
//         isDown = false;
//         shopNav.classList.remove("dragging");
//     });

//     shopNav.addEventListener("mousemove", (e) => {
//         if (!isDown) return;
//         e.preventDefault();
//         const x = e.pageX - shopNav.offsetLeft;
//         const walk = (x - startX) * 1; // scroll speed multiplier
//         shopNav.scrollLeft = scrollLeft - walk;
//     });

//     // 📱 Touch Events (for mobile drag)
//     let touchStartX = 0;
//     let touchScrollLeft = 0;

//     shopNav.addEventListener("touchstart", (e) => {
//         touchStartX = e.touches[0].pageX;
//         touchScrollLeft = shopNav.scrollLeft;
//     });

//     shopNav.addEventListener("touchmove", (e) => {
//         const x = e.touches[0].pageX;
//         const walk = (x - touchStartX) * 1;
//         shopNav.scrollLeft = touchScrollLeft - walk;
//     });

//     let moved = false;

//     shopNav.addEventListener("mousedown", (e) => {
//         isDown = true;
//         moved = false;
//         startX = e.pageX - shopNav.offsetLeft;
//         scrollLeft = shopNav.scrollLeft;
//     });

//     shopNav.addEventListener("mousemove", (e) => {
//         if (!isDown) return;
//         moved = true;
//         const x = e.pageX - shopNav.offsetLeft;
//         const walk = (x - startX);
//         shopNav.scrollLeft = scrollLeft - walk;
//     });

//     shopNav.addEventListener("click", (e) => {
//         if (moved) e.preventDefault(); // stop accidental tab activation
//     });
// });


// $('.shop-nav-slider').slick({
//     dots: true,
//     infinite: true,
//     slidesToShow: 7,
//     slidesToScroll: 1,
//     autoplay: false,
//     speed: 5000,
//     pauseOnHover: true,
//     pauseOnFocus: true,
//     autoplaySpeed: 0,
//     cssEase: 'linear',

//     responsive: [
//         {
//             breakpoint: 1024,
//             settings: {
//                 slidesToShow: 3,
//                 slidesToScroll: 3,
//                 infinite: true,
//                 dots: true
//             }
//         },
//         {
//             breakpoint: 600,
//             settings: {
//                 slidesToShow: 2,
//                 slidesToScroll: 2
//             }
//         },
//         {
//             breakpoint: 480,
//             settings: {
//                 slidesToShow: 1,
//                 slidesToScroll: 1
//             }
//         }
//         // You can unslick at a given breakpoint now by adding:
//         // settings: "unslick"
//         // instead of a settings object
//     ]
// });


var swiper = new Swiper(".mySwiper", {
    slidesPerView: 7,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });

$('#gallery').slick({
    infinite: true,
    slidesToShow: 5,
    slidesToScroll: 1,
    autoplay: false,
    draggable: true,
    speed: 300,
    autoplaySpeed: 1000,
    arrows: false
});

$('.port_slider').slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: false,
    draggable: true,
    speed: 300,
    autoplaySpeed: 1000,
    arrows: false
});
$('.port_service').slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: false,
    draggable: true,
    speed: 200,
    autoplaySpeed: 1000,
    arrows: true,
});
$('.testim_slider').slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: false,
    draggable: true,
    speed: 300,
    autoplaySpeed: 1000,
    arrows: false
});

$(document).ready(function () {
    // Swiper: Slider
    new Swiper('.profo_slider', {
        loop: true,
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        slidesPerView: 2,
        paginationClickable: true,
        autoplay: {
            enabled: true,
            delay: 0,
            pauseOnMouseEnter: false,
            disableOnInteraction: true,
            reverseDirection: true

        },
        centeredSlides: true,
        loop: true,
        navigation: false,
        slidesPerView: 'auto',
        speed: 4000,

        breakpoints: {
            1920: {
                slidesPerView: 2,
                spaceBetween: 30
            },
            1028: {
                slidesPerView: 2,
                spaceBetween: 30
            },
            480: {
                slidesPerView: 1,
                spaceBetween: 10
            }
        }
    });
});


$(document).ready(function () {
    const swiper = new Swiper('.profo_slider_reverse', {
        loop: true,
        slidesPerView: 2,
        paginationClickable: true,
        centeredSlides: true,
        slidesPerView: 'auto',
        speed: 4000,

        breakpoints: {
            1920: {
                slidesPerView: 2,
                spaceBetween: 30
            },
            1028: {
                slidesPerView: 2,
                spaceBetween: 30
            },
            480: {
                slidesPerView: 1,
                spaceBetween: 10
            }
        }
    });

    function reverseAutoplay() {
        swiper.slidePrev(); // Move the slider to the previous slide
    }

    setInterval(reverseAutoplay, 300); // Change slide every 3 seconds (3000ms)
});

$(document).ready(function () {
    // Swiper: Slider
    new Swiper('.services_slider', {
        loop: false,
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        slidesPerView: 1,
        paginationClickable: true,
        centeredSlides: true,
        loop: false,
        navigation: false,
        slidesPerView: 'auto',
        speed: 4000,
        slidesPerView: 3,
    });
});


$(document).ready(function () {
    new Swiper('.testi_slider', {
        speed: 4000,
        autoplay: {
            delay: 5000
        },
        centeredSlides: true,
        slidesPerView: 1,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
});




document.addEventListener('DOMContentLoaded', function () {
    const tabButtons = document.querySelectorAll('.TabButton');
    const tabSections = document.querySelectorAll('.tab-sectionn');

    // Ensure we have found the elements
    if (tabButtons.length === 0 || tabSections.length === 0) {
        console.error("Tab buttons or sections not found.");
        return;
    }

    tabButtons.forEach(button => {
        button.addEventListener('click', () => {
            const targetTab = button.getAttribute('data-tab');

            // Remove active class from all buttons and sections
            tabButtons.forEach(btn => btn.classList.remove('active'));
            tabSections.forEach(section => section.classList.remove('active'));

            // Add active class to the clicked button and the corresponding section
            button.classList.add('active');
            document.querySelector(`.tab-sectionn[data-tab="${targetTab}"]`).classList.add('active');
        });
    });

    // Activate the first tab and section by default
    if (tabButtons[0] && tabSections[0]) {
        tabButtons[0].classList.add('active');
        tabSections[0].classList.add('active');
    }
});


document.addEventListener('DOMContentLoaded', function () {
    const tabButtons = document.querySelectorAll('.TabButton1');
    const tabSections = document.querySelectorAll('.tab-sectionn1');

    // Ensure we have found the elements
    if (tabButtons.length === 0 || tabSections.length === 0) {
        console.error("Tab buttons or sections not found.");
        return;
    }

    tabButtons.forEach(button => {
        button.addEventListener('click', () => {
            const targetTab = button.getAttribute('data-tab');

            // Remove active class from all buttons and sections
            tabButtons.forEach(btn => btn.classList.remove('active1'));
            tabSections.forEach(section => section.classList.remove('active1'));

            // Add active class to the clicked button and the corresponding section
            button.classList.add('active1');
            document.querySelector(`.tab-sectionn1[data-tab="${targetTab}"]`).classList.add('active1');
        });
    });

    // Activate the first tab and section by default
    if (tabButtons[0] && tabSections[0]) {
        tabButtons[0].classList.add('active1');
        tabSections[0].classList.add('active1');
    }
});


document.addEventListener("DOMContentLoaded", function () {
    let startTime = 0; // Starting time
    const timerElement = document.getElementById('timer');
    const sectionElement = document.querySelector('.BeVisible_center-info__kHybt'); // The section to observe

    function updateTimer() {
        timerElement.textContent = startTime < 10 ? `0${startTime}` : startTime;
        startTime++;

        if (startTime <= 7) {
            setTimeout(updateTimer, 100); // Update every second
        }
    }

    // Intersection Observer callback
    const onIntersection = (entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                updateTimer(); // Start the timer when the section enters the viewport
                observer.unobserve(sectionElement); // Stop observing once the timer starts
            }
        });
    };

    // Create an Intersection Observer
    const observer = new IntersectionObserver(onIntersection, {
        threshold: 0.1 // Trigger when at least 10% of the section is visible
    });

    // Observe the target section
    observer.observe(sectionElement);
});



window.addEventListener('load', function () {
    // Hide preloader and show content when page has fully loaded
    const preloader = document.getElementById('preloader');
    const content = document.getElementById('content');

    preloader.style.display = 'none';
    // content.style.display = 'block';
});



document.addEventListener('DOMContentLoaded', () => {
    const menuToggle = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    const menuClose = document.getElementById('menu-close');

    menuToggle.addEventListener('click', () => {
        mobileMenu.classList.toggle('show');
    });

    menuClose.addEventListener('click', () => {
        mobileMenu.classList.remove('show');
    });
});
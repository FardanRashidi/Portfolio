function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });

    restartTypingAnimation();
}

function toggleMenu() {
    const menu = document.getElementById('menu');
    menu.classList.toggle('show-menu');
}
function restartTypingAnimation() {
    const welcomeHeading = document.getElementById('welcome-heading');
    const originalText = welcomeHeading.getAttribute('data-text');

    welcomeHeading.innerText = originalText;

    function typeWriter(index) {
        if (index < originalText.length) {
            welcomeHeading.innerText = originalText.substr(0, index + 1);
            index++;
            setTimeout(function () {
                typeWriter(index);
            }, 150);
        }
    }

    typeWriter(0);
}

document.addEventListener('DOMContentLoaded', function () {
    const appNameLink = document.querySelector('.app-name-link');
    const welcomeHeading = document.getElementById('welcome-heading');
    const menuButton = document.querySelector('.menu-button');

    appNameLink.addEventListener('click', function (event) {
        event.preventDefault();
        scrollToTop();
        welcomeHeading.innerText = '';
    });

    menuButton.addEventListener('click', function () {
        toggleMenu();
    });

    // Restart the typing animation when the page is loaded
    restartTypingAnimation();
});


document.addEventListener('DOMContentLoaded', function () {
    const sliderImages = document.querySelectorAll('.slider-image');
    let currentImageIndex = 0;

    if (sliderImages.length > 0) {
        sliderImages[currentImageIndex].classList.add('active');

        setInterval(function () {
            sliderImages[currentImageIndex].classList.remove('active');
            currentImageIndex = (currentImageIndex + 1) % sliderImages.length;
            sliderImages[currentImageIndex].classList.add('active');
        }, 3000);
    }
});

window.addEventListener('scroll', function() {
    var appName = document.getElementById('app-name');
    var recent = document.getElementById('recent_but');
    var service = document.getElementById('service_but');
    if (window.scrollY > 0) {
        appName.classList.add('scrolled');
        recent.classList.add('scrolled');
        service.classList.add('scrolled');
    } else {
        appName.classList.remove('scrolled');
        recent.classList.remove('scrolled');
        service.classList.remove('scrolled');
    }
});


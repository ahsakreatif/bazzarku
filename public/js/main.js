// Global variables
let currentSlide = 0;
let slides = [];
let indicators = [];
let totalSlides = 0;
let autoSlideInterval;
let mobileMenu;
let sidebar;
let mobileMenuButton;
let closeMobileMenuButton;

// Burger menus
document.addEventListener('DOMContentLoaded', function() {
    // Initialize carousel elements
    slides = document.querySelectorAll('.carousel-item');
    indicators = document.querySelectorAll('#carousel-indicators button');
    totalSlides = slides.length;

    // Initialize mobile menu elements
    mobileMenu = document.getElementById('mobile-menu');
    sidebar = document.getElementById('sidebar');
    mobileMenuButton = document.getElementById('mobile-menu-button');
    closeMobileMenuButton = document.getElementById('close-mobile-menu');

    // open
    const burger = document.querySelectorAll('.navbar-burger');
    const menu = document.querySelectorAll('.navbar-menu');

    if (burger.length && menu.length) {
        for (var i = 0; i < burger.length; i++) {
            burger[i].addEventListener('click', function() {
                for (var j = 0; j < menu.length; j++) {
                    menu[j].classList.toggle('hidden');
                }
            });
        }
    }

    // close
    const close = document.querySelectorAll('.navbar-close');
    const backdrop = document.querySelectorAll('.navbar-backdrop');

    if (close.length) {
        for (var i = 0; i < close.length; i++) {
            close[i].addEventListener('click', function() {
                for (var j = 0; j < menu.length; j++) {
                    menu[j].classList.toggle('hidden');
                }
            });
        }
    }

    if (backdrop.length) {
        for (var i = 0; i < backdrop.length; i++) {
            backdrop[i].addEventListener('click', function() {
                for (var j = 0; j < menu.length; j++) {
                    menu[j].classList.toggle('hidden');
                }
            });
        }
    }

    // Auto-advance slides every 5 seconds
    autoSlideInterval = setInterval(() => moveSlide(1), 5000);

    // Pause auto-advance on hover
    /* const carousel = document.querySelector('.relative.mb-12');
    carousel.addEventListener('mouseenter', () => {
        clearInterval(autoSlideInterval);
    });
    carousel.addEventListener('mouseleave', () => {
        clearInterval(autoSlideInterval);
        autoSlideInterval = setInterval(() => moveSlide(1), 5000);
    }); */

    // Initialize
    updateSlides();

    // Close modal when clicking outside
    document.getElementById('loginModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeLoginModal();
        }
    });

    // Toggle password visibility
    const togglePassword = document.querySelector('button[type="button"]');
    const passwordInput = document.querySelector('input[type="password"]');

    togglePassword?.addEventListener('click', function() {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);

        // Update icon based on password visibility
        const eyeIcon = this.querySelector('svg');
        if (type === 'password') {
            eyeIcon.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
            `;
        } else {
            eyeIcon.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
            `;
        }
    });

    // Close modal when clicking outside
   /*  document.getElementById('eventDetailModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeEventModal();
        }
    }); */

    // Mobile Menu Functions
    mobileMenuButton.addEventListener('click', openMobileMenu);
    closeMobileMenuButton.addEventListener('click', closeMobileMenu);

    // Close menu when clicking outside sidebar
    mobileMenu.addEventListener('click', function(e) {
        if (e.target === this) {
            closeMobileMenu();
        }
    });

    // Close mobile menu on window resize if screen becomes larger
    window.addEventListener('resize', function() {
        if (window.innerWidth >= 768) { // md breakpoint
            closeMobileMenu();
        }
    });

    // Close modal when clicking outside
    document.getElementById('signupModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeSignupModal();
        }
    });

    // Update the toggle password functionality to work for both modals
    const togglePasswords = document.querySelectorAll('button[type="button"]');
    const passwordInputs = document.querySelectorAll('input[type="password"]');

    togglePasswords.forEach((toggle, index) => {
        toggle?.addEventListener('click', function() {
            const passwordInput = passwordInputs[index];
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);

            // Update icon based on password visibility
            const eyeIcon = this.querySelector('svg');
            if (type === 'password') {
                eyeIcon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                `;
            } else {
                eyeIcon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
                `;
            }
        });
    });
});

function updateSlides() {
    slides.forEach(slide => {
        slide.classList.remove('active');
        slide.style.opacity = '0';
    });
    indicators.forEach(indicator => {
        indicator.classList.remove('bg-primary-700');
        indicator.classList.add('bg-gray-300');
    });

    if (slides[currentSlide]) {
        slides[currentSlide].classList.add('active');
        slides[currentSlide].style.opacity = '1';
        indicators[currentSlide].classList.remove('bg-gray-300');
        indicators[currentSlide].classList.add('bg-primary-700');
    }
}

function moveSlide(direction) {
    currentSlide = (currentSlide + direction + totalSlides) % totalSlides;
    updateSlides();
}

function setSlide(slideIndex) {
    currentSlide = slideIndex;
    updateSlides();
}


function closeMenuAndOpenSignup() {
    closeMobileMenu();
    setTimeout(() => {
        openSignupModal();
    }, 300);
}


// Signup Modal Functions
function openSignupModal() {
    document.getElementById('signupModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden'; // Prevent scrolling
}

function closeSignupModal() {
    document.getElementById('signupModal').classList.add('hidden');
    document.body.style.overflow = ''; // Restore scrolling
}


function openMobileMenu() {
    mobileMenu.classList.remove('hidden');
    document.body.style.overflow = 'hidden';
    // Animate sidebar in
    setTimeout(() => {
        sidebar.classList.remove('-translate-x-full');
    }, 50);
}

function closeMobileMenu() {
    // Animate sidebar out
    sidebar.classList.add('-translate-x-full');
    setTimeout(() => {
        mobileMenu.classList.add('hidden');
        document.body.style.overflow = '';
    }, 300);
}

function closeMenuAndOpenLogin() {
    closeMobileMenu();
    setTimeout(() => {
        openLoginModal();
    }, 300);
}


// Add this to your existing script section
/* function openEventModal(event) {
    document.getElementById('eventDetailModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
} */

function closeEventModal() {
    // get element by class
    document.getElementById('eventDetailModal').classList.add('hidden');
    document.body.style.overflow = '';
}


// Login Modal Functions
function openLoginModal() {
    document.getElementById('loginModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden'; // Prevent scrolling
}

function closeLoginModal() {
    document.getElementById('loginModal').classList.add('hidden');
    document.body.style.overflow = ''; // Restore scrolling
}
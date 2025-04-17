let currentSlide = 0;
const slides = document.querySelectorAll('.carousel-item');
const indicators = document.querySelectorAll('#carousel-indicators button');
const totalSlides = slides.length;

// Auto-advance slides every 5 seconds
let autoSlideInterval = setInterval(() => moveSlide(1), 5000);

function updateSlides() {
    slides.forEach(slide => {
        slide.classList.remove('active');
        slide.style.opacity = '0';
    });
    indicators.forEach(indicator => {
        indicator.classList.remove('bg-primary-700');
        indicator.classList.add('bg-gray-300');
    });

    slides[currentSlide].classList.add('active');
    slides[currentSlide].style.opacity = '1';
    indicators[currentSlide].classList.remove('bg-gray-300');
    indicators[currentSlide].classList.add('bg-primary-700');
}

function moveSlide(direction) {
    currentSlide = (currentSlide + direction + totalSlides) % totalSlides;
    updateSlides();
}

function setSlide(slideIndex) {
    currentSlide = slideIndex;
    updateSlides();
}

// Pause auto-advance on hover
const carousel = document.querySelector('.relative.mb-12');
carousel.addEventListener('mouseenter', () => {
    clearInterval(autoSlideInterval);
});
carousel.addEventListener('mouseleave', () => {
    clearInterval(autoSlideInterval);
    autoSlideInterval = setInterval(() => moveSlide(1), 5000);
});

// Initialize
updateSlides();

// Login Modal Functions
function openLoginModal() {
    document.getElementById('loginModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden'; // Prevent scrolling
}

function closeLoginModal() {
    document.getElementById('loginModal').classList.add('hidden');
    document.body.style.overflow = ''; // Restore scrolling
}

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

// Add this to your existing script section
function openEventModal(event) {
    document.getElementById('eventDetailModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closeEventModal() {
    document.getElementById('eventDetailModal').classList.add('hidden');
    document.body.style.overflow = '';
}

// Close modal when clicking outside
document.getElementById('eventDetailModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeEventModal();
    }
});

// Add click handlers to all rental cards
document.querySelectorAll('.group.cursor-pointer').forEach(card => {
    card.addEventListener('click', openEventModal);
});

// Mobile Menu Functions
const mobileMenu = document.getElementById('mobile-menu');
const sidebar = document.getElementById('sidebar');
const mobileMenuButton = document.getElementById('mobile-menu-button');
const closeMobileMenuButton = document.getElementById('close-mobile-menu');

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

// Signup Modal Functions
function openSignupModal() {
    document.getElementById('signupModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden'; // Prevent scrolling
}

function closeSignupModal() {
    document.getElementById('signupModal').classList.add('hidden');
    document.body.style.overflow = ''; // Restore scrolling
}

// Close modal when clicking outside
document.getElementById('signupModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeSignupModal();
    }
});

function closeMenuAndOpenSignup() {
    closeMobileMenu();
    setTimeout(() => {
        openSignupModal();
    }, 300);
}

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

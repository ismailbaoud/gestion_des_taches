// Navigation and section visibility
function showHome() {
    document.getElementById('home-section').style.display = 'block';
    document.getElementById('auth-section').style.display = 'none';
    gsap.from('#home-section', {opacity: 0, y: 20, duration: 0.5});
}

function showLogin() {
    document.getElementById('auth-section').style.display = 'flex';
    document.getElementById('login-form').style.display = 'block';
    document.getElementById('signup-form').style.display = 'none';
    gsap.from('#auth-section', {opacity: 0, scale: 0.95, duration: 0.3});
}

function showSignup() {
    document.getElementById('auth-section').style.display = 'flex';
    document.getElementById('login-form').style.display = 'none';
    document.getElementById('signup-form').style.display = 'block';
    gsap.from('#auth-section', {opacity: 0, scale: 0.95, duration: 0.3});
}

function closeAuth() {
    gsap.to('#auth-section', {
        opacity: 0,
        scale: 0.95,
        duration: 0.3,
        onComplete: () => {
            document.getElementById('auth-section').style.display = 'none';
            document.getElementById('auth-section').style.opacity = 1;
            document.getElementById('auth-section').style.transform = 'none';
        }
    });
}

function switchForm(type) {
    const loginForm = document.getElementById('login-form');
    const signupForm = document.getElementById('signup-form');
    
    if (type === 'login') {
        gsap.to(signupForm, {opacity: 0, x: 50, duration: 0.3, display: 'none'});
        gsap.fromTo(loginForm, 
            {opacity: 0, x: -50, display: 'none'},
            {opacity: 1, x: 0, duration: 0.3, display: 'block'}
        );
    } else {
        gsap.to(loginForm, {opacity: 0, x: -50, duration: 0.3, display: 'none'});
        gsap.fromTo(signupForm,
            {opacity: 0, x: 50, display: 'none'},
            {opacity: 1, x: 0, duration: 0.3, display: 'block'}
        );
    }
}

// Dark mode functionality
const themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
const themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

// Change the icons inside the button based on previous settings
if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    themeToggleLightIcon.classList.remove('hidden');
    document.documentElement.classList.remove('light');
    document.documentElement.classList.add('dark');
    localStorage.setItem('theme', 'dark');
} else {
    themeToggleDarkIcon.classList.remove('hidden');
    document.documentElement.classList.remove('dark');
    document.documentElement.classList.add('light');
    localStorage.setItem('theme', 'light');
}

// Toggle dark mode on button click
document.getElementById('theme-toggle').addEventListener('click', function() {
    // Toggle icons
    themeToggleDarkIcon.classList.toggle('hidden');
    themeToggleLightIcon.classList.toggle('hidden');

    // If is dark mode
    if (document.documentElement.classList.contains('dark')) {
        document.documentElement.classList.remove('dark');
        document.documentElement.classList.add('light');
        localStorage.setItem('theme', 'light');
    } else {
        document.documentElement.classList.remove('light');
        document.documentElement.classList.add('dark');
        localStorage.setItem('theme', 'dark');
    }
});

// Style active nav link
const navLinks = document.querySelectorAll('.nav-link');
navLinks.forEach(link => {
    link.classList.add('px-3', 'py-2', 'rounded-md', 'text-gray-700', 'hover:bg-gray-100');
    link.addEventListener('click', () => {
        navLinks.forEach(l => l.classList.remove('text-blue-600'));
        link.classList.add('text-blue-600');
    });
});

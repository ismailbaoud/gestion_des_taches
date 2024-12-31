// Navigation functions
function showHome() {
    document.getElementById('home-section').style.display = 'block';
    document.getElementById('auth-section').style.display = 'none';
    gsap.from('#home-section', {opacity: 0, y: 20, duration: 0.5});
}

// Initialize navigation
document.addEventListener('DOMContentLoaded', function() {
    // Style active nav link
    const navLinks = document.querySelectorAll('.nav-link');
    navLinks.forEach(link => {
        link.classList.add('px-3', 'py-2', 'rounded-md', 'text-gray-700', 'hover:bg-gray-100');
        link.addEventListener('click', () => {
            navLinks.forEach(l => l.classList.remove('text-blue-600'));
            link.classList.add('text-blue-600');
        });
    });
});

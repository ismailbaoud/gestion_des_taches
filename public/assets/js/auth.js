// Authentication related functions
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

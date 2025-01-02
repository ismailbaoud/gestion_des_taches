// Check for saved theme preference, otherwise use system preference
if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    document.documentElement.classList.add('dark');
} else {
    document.documentElement.classList.remove('dark');
}

// Dark mode functionality
const initTheme = () => {
    const themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
    const themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');
    const themeToggleBtn = document.getElementById('theme-toggle');

    if (!themeToggleDarkIcon || !themeToggleLightIcon || !themeToggleBtn) return;

    // Change the icons inside the button based on previous settings
    if (document.documentElement.classList.contains('dark')) {
        themeToggleDarkIcon.classList.add('hidden');
        themeToggleLightIcon.classList.remove('hidden');
    } else {
        themeToggleDarkIcon.classList.remove('hidden');
        themeToggleLightIcon.classList.add('hidden');
    }

    // Toggle dark mode on button click
    themeToggleBtn.addEventListener('click', function() {
        // Toggle icons
        themeToggleDarkIcon.classList.toggle('hidden');
        themeToggleLightIcon.classList.toggle('hidden');

        // Toggle dark mode class
        if (document.documentElement.classList.contains('dark')) {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('theme', 'light');
        } else {
            document.documentElement.classList.add('dark');
            localStorage.setItem('theme', 'dark');
        }
    });
};

// Watch for system theme changes
window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', ({ matches }) => {
    if (!localStorage.getItem('theme')) {
        if (matches) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
        initTheme();
    }
});

// Initialize theme when DOM is loaded
document.addEventListener('DOMContentLoaded', initTheme);

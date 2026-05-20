/**
 * Theme Manager - Handles light/dark mode switching
 * Features:
 * - Saves preference to localStorage
 * - Detects system preference on first visit
 * - Applies theme to html element (for Tailwind dark: strategy)
 * - Provides smooth transitions
 */

(function() {
    'use strict';

    const THEME_STORAGE_KEY = 'theme-preference';
    const DARK_CLASS = 'dark';
    
    // Detect system preference
    function getSystemTheme() {
        if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
            return 'dark';
        }
        return 'light';
    }

    // Get the saved theme or system preference
    function getSavedTheme() {
        const saved = localStorage.getItem(THEME_STORAGE_KEY);
        if (saved === 'dark' || saved === 'light') {
            return saved;
        }
        return 'dark';
    }

    // Apply theme to DOM
    function applyTheme(theme) {
        const html = document.documentElement;
        if (theme === 'dark') {
            html.classList.add(DARK_CLASS);
        } else {
            html.classList.remove(DARK_CLASS);
        }
        localStorage.setItem(THEME_STORAGE_KEY, theme);
        updateToggleButtons(theme);
    }

    // Update toggle button states
    function updateToggleButtons(theme) {
        const toggles = document.querySelectorAll('[data-theme-toggle]');
        toggles.forEach(toggle => {
            const sunIcon = toggle.querySelector('[data-sun-icon]');
            const moonIcon = toggle.querySelector('[data-moon-icon]');
            
            if (theme === 'dark') {
                sunIcon?.classList.add('hidden');
                moonIcon?.classList.remove('hidden');
            } else {
                sunIcon?.classList.remove('hidden');
                moonIcon?.classList.add('hidden');
            }
        });
    }

    // Toggle between themes
    function toggleTheme() {
        const current = document.documentElement.classList.contains(DARK_CLASS) ? 'dark' : 'light';
        const newTheme = current === 'dark' ? 'light' : 'dark';
        applyTheme(newTheme);
    }

    // Initialize theme on page load
    function initTheme() {
        const theme = getSavedTheme();
        applyTheme(theme);
    }

    // Set up event listeners for toggle buttons
    function setupToggleListeners() {
        document.addEventListener('click', function(e) {
            if (e.target.closest('[data-theme-toggle]')) {
                toggleTheme();
            }
        });
    }

    // Watch for system theme changes
    function watchSystemTheme() {
        if (!window.matchMedia) return;
        
        const mediaQuery = window.matchMedia('(prefers-color-scheme: dark)');
        mediaQuery.addEventListener('change', function(e) {
            // Only auto-switch if user hasn't manually set a preference
            if (!localStorage.getItem(THEME_STORAGE_KEY)) {
                const newTheme = e.matches ? 'dark' : 'light';
                applyTheme(newTheme);
            }
        });
    }

    // Initialize on DOM ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', function() {
            initTheme();
            setupToggleListeners();
            watchSystemTheme();
        });
    } else {
        initTheme();
        setupToggleListeners();
        watchSystemTheme();
    }

    // Expose toggle function globally
    window.toggleTheme = toggleTheme;
})();

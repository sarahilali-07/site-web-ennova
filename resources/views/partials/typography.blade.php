<style>
@font-face {
    font-family: 'Cabinet Grotesk';
    font-style: normal;
    font-weight: 400;
    font-display: swap;
    src: url('{{ asset('fonts/CabinetGrotesk-Regular.woff2') }}') format('woff2');
}

@font-face {
    font-family: 'Cabinet Grotesk';
    font-style: normal;
    font-weight: 500;
    font-display: swap;
    src: url('{{ asset('fonts/CabinetGrotesk-Medium.woff2') }}') format('woff2');
}

@font-face {
    font-family: 'Cabinet Grotesk';
    font-style: normal;
    font-weight: 700;
    font-display: swap;
    src: url('{{ asset('fonts/CabinetGrotesk-Bold.woff2') }}') format('woff2');
}

:root {
    color-scheme: dark light;
    font-family: 'DM Sans', sans-serif;
    font-weight: 400;
    font-size: 16px;
    line-height: 1.75;
    text-rendering: optimizeLegibility;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-size-adjust: 100%;
}

html {
    font-size: 100%;
}

body {
    margin: 0;
    min-height: 100%;
    font-family: 'DM Sans', sans-serif;
    font-weight: 400;
    font-size: 1rem;
    line-height: 1.75;
    letter-spacing: 0.01em;
    background-color: inherit;
    color: inherit;
}

html.dark body {
    color: #F9FAFB;
}

h1, h2, h3, h4, h5, h6, .font-display, .navbar-brand, .brand-heading, .sidebar-title, .card-title, .section-title, .hero-title, .cta-button, .btn, .nav-link, .sidebar-link {
    font-family: 'Cabinet Grotesk', sans-serif;
    letter-spacing: -0.02em;
    font-weight: 700;
}

h1 {
    font-size: clamp(2.75rem, 4vw, 4.5rem);
    line-height: 1.02;
    margin-bottom: 0.75rem;
}

h2 {
    font-size: clamp(2.1rem, 3.2vw, 3rem);
    line-height: 1.08;
    margin-bottom: 0.75rem;
}

h3 {
    font-size: clamp(1.65rem, 2.4vw, 2.2rem);
    line-height: 1.12;
    margin-bottom: 0.75rem;
}

h4 {
    font-size: clamp(1.25rem, 1.9vw, 1.75rem);
    line-height: 1.25;
    margin-bottom: 0.75rem;
}

p, span, a, li, label, input, select, textarea, button {
    font-family: 'DM Sans', sans-serif;
}

button, .btn, .cta-button {
    font-family: 'Cabinet Grotesk', sans-serif;
    font-weight: 700;
    letter-spacing: 0.02em;
    text-transform: uppercase;
}

button, input, select, textarea {
    line-height: 1.6;
}

input, select, textarea {
    font-size: 1rem;
}

section, .container, .card, .panel {
    letter-spacing: 0.01em;
}

button, .btn, input, select, textarea {
    border-radius: 1rem;
}

@media (max-width: 768px) {
    h1 { font-size: clamp(2.25rem, 7vw, 3.5rem); }
    h2 { font-size: clamp(1.85rem, 5vw, 2.5rem); }
    h3 { font-size: clamp(1.4rem, 4vw, 1.95rem); }
}
</style>

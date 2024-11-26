/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'selector',
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                outfit: ['Outfit', 'serif'],
            },
            container: {
                center: true,
                padding: '1rem',
                screens: {
                    sm: "100%",
                    md: "100%",
                    lg: "1024px",
                    xl: "1200px",
                },
            },
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
    ],
}

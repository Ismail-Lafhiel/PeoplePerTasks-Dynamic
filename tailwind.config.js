/* @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{html,php,js}", "./node_modules/flowbite/**/*.js"],
  plugins: [
    require('@tailwindcss/forms'),
  ],
  darkMode: "class",
  theme: {
    extend: {
      fontFamily: {
        poppins: ["Poppins", "sans-serif"],
      },
      screens: {
        'tablet': '1360px',
        'smXl': '800px'
      },
      maxWidth: {
        '1/2': '50%',
      },
      fontFamily: {
        'inter': ['Inter', 'sans-serif'],
      },
    },
  },
};

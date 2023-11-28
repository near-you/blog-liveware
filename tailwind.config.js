/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    // "./pages/**/*.{html,js}",
    // "./components/**/*.{html,js}",
  ],
  theme: {
    extend: {
      fontFamily: {
        mulish: ['Mulish', 'sans-serif'],
        poppins: ['Poppins', 'sans-serif'],
        montserrat: ['Montserrat', 'sans-serif'],
        opensans: ['Open Sans', 'sans-serif'],
      },
      // container: {
      //   center: true,
      // },
      colors: {
        "main-gray": "#767676",
        "secondary-gray": "#f8f8f8",
        "dunkel-gray": "#333",
      }
    },
  },
  plugins: [],
}


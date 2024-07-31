/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: 'class',
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {
      colors: {
        primary: {
          '50': '#effef0',
          '100': '#dafedd',
          '200': '#b7fbbd',
          '300': '#7ff68b',
          '400': '#40e851',
          '500': '#16c829',
          '600': '#0cad1d',
          '700': '#0e871b',
          '800': '#116a1c',
          '900': '#105719',
          '950': '#02310a',
        }
      }
    },
    fontFamily: {
      'body': [
        'Rubik', 'sans-serif'
      ],
      'sans': [
        'Rubik', 'sans-serif'
      ]
    }
  },
  plugins: [
    require('flowbite/plugin')
  ],
}


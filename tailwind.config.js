const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
  content: ["./resources/**/*.blade.php", "./resources/**/*.php", "./resources/**/*.css", "./search-filter/*.php"],
  theme: {
    colors: {
      'white': '#fff',
      transparent: 'transparent',
      black: '#000',
      primary: {
        default: '#ff0000',
        '50': '#ffb8b8',
        '100': '#ffa3a3',
        '200': '#ff7a7a',
        '300': '#ff5252',
        '400': '#ff2929',
        '500': '#ff0000',
        '600': '#c70000',
        '700': '#8f0000',
        '800': '#570000',
        '900': '#1f0000'
      },
      gray: {
        default: '#323032',
        '50': '#a39fa3',
        '100': '#999599',
        '150': '#f4f4f4',
        '175': '#4e4e4e',
        '200': '#858085',
        '250': '#bebebe',
        '300': '#706c70',
        '400': '#5c585c',
        '500': '#474447',
        '600': '#323032',
        '700': '#151515',
        '800': '#000000',
        '900': '#000000'
      },
    },
    fontFamily: {},
    container: {
      screens: {
        xl: '1200px',
        '2xl': '1364px'
      },
      center: true,
    },
    extend: {
    },
  },
  plugins: [],
  safelist: [],
}
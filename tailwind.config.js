const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
  content: ["./resources/**/*.blade.php", "./resources/**/*.php", "./resources/**/*.css", "./search-filter/*.php"],
  theme: {
    colors: { // https://www.tailwindshades.com/
      'white': '#fff',
      transparent: 'transparent',
      black: '#000',
      primary: {
        default: '#009dff',
        '50': '#b8e4ff',
        '100': '#a3dcff',
        '200': '#7accff',
        '300': '#52bcff',
        '400': '#29adff',
        '500': '#009dff',
        '600': '#007ac7',
        '700': '#00588f',
        '800': '#003557',
        '900': '#00131f'
      },
      secondary: {
        default: '#fff600',
        '50': '#fffcb8',
        '100': '#fffca3',
        '200': '#fffa7a',
        '300': '#fff952',
        '400': '#fff729',
        '500': '#fff600',
        '600': '#c7c000',
        '700': '#8f8a00',
        '800': '#575400',
        '900': '#1f1e00'
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
  safelist: [
    "my-4",
    "my-8",
    "my-12",
    "my-16",
  ],
}
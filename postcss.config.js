module.exports = {
  plugins: [
    require('postcss-import'),
    require('tailwindcss'),
    require('postcss-nested'),
    require('postcss-inset'),
    require('postcss-simple-vars'),
    require('autoprefixer')
  ]
};

let mix = require('laravel-mix');
const target = process.env.DEVURL;

mix
.options({ processCssUrls: false })
.js('resources/js/app.js', 'public/js')
.js('resources/js/blocks/**/*.js', 'public/js/blocks')
.postCss("resources/css/app.css", "public/css")
.postCss("resources/css/admin.css", "public/css")
.options({
    postCss: [
        require('postcss-import'),
        require('tailwindcss'),
        require('postcss-nested'),
        require('postcss-simple-vars'),
        require('autoprefixer')
    ]
})
.browserSync({
    proxy: target,
    ghostMode: false,
    open: false
});
const fs = require('fs');
const mix = require('laravel-mix');
const target = process.env.DEVURL;

mix
.options({ processCssUrls: false })
.js('resources/js/app.js', 'public/js')

// compile all js files in the blocks folder individually and put them in the public/js/blocks folder
fs.readdirSync('./resources/js/blocks/').forEach(file => {
    mix.js(`resources/js/blocks/${file}`, 'public/js/blocks')
});

mix
.webpackConfig({
    watchOptions: {
        ignored: '/node_modules/'
      }
})
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
})
.disableNotifications();

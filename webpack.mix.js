const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
   .ts('resources/js/mainfile.ts', 'public/js')
   .ts('resources/js/angular-admin/mainangular.ts', 'public/js')
   .copy('resources/img/*', 'public/img')
   .copy('resources/templates/admin/*.html', 'public/admin/templates')
   .webpackConfig({
       module: {
           rules: [
               {
                   test: /\.tsx?$/,
                   loader: 'ts-loader',
                   exclude: '/node_modules/'
               }
           ]
        },
        resolve: {
            extensions: ['*', '.js', '.jsx', '.vue', '.ts', '.tsx']
        },
        devtool: "source-map"
   })

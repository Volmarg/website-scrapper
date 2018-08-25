let mix = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
    .scripts(
        [
            'resources/assets/js/myScripts/forms/lib/formEvents.js',
            'resources/assets/js/myScripts/forms/lib/htmlElements.js',
            'resources/assets/js/myScripts/forms/inputFormScripts.js',
            'resources/assets/js/myScripts/loadFormsScripts.js'

        ],
        'public/js/forms_bundle.js'
    )
    .sass('resources/assets/sass/app.scss', 'public/css')
    .sass('resources/assets/sass/formGrid.scss', 'public/css');

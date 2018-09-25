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
/*
 |--------------------------------------------------------------------------
 | My Scripts mixing
 |--------------------------------------------------------------------------
 */
mix.js('resources/assets/js/app.js', 'public/js');

    mix.scripts(
        [
            'resources/assets/js/forms/LayoutSwitcher.js',
            'resources/assets/js/forms/TextExtInvoker.js',
            'resources/assets/js/InputFormScripts.js'

        ],
        'public/js/forms_bundle.js'
    )
    .sass('resources/assets/sass/app.scss', 'public/css')
    .sass('resources/assets/sass/formGrid.scss', 'public/css')
    .sass('resources/assets/sass/textExt.scss', 'public/css');

/*
|--------------------------------------------------------------------------
| texttext - js plugin for creating tags from for example INPUT fields
|--------------------------------------------------------------------------
*/

var pathJs='resources/assets/js/libs/jquery-textext-master/js/';
var pathCss='resources/assets/js/libs/jquery-textext-master/css/';

mix.scripts(
    [
        pathJs+'textext.core.js',
        pathJs+'textext.plugin.ajax.js',
        pathJs+'textext.plugin.arrow.js',
        pathJs+'textext.plugin.autocomplete.js',
        pathJs+'textext.plugin.clear.js',
        pathJs+'textext.plugin.filter.js',
        pathJs+'textext.plugin.focus.js',
        pathJs+'textext.plugin.prompt.js',
        pathJs+'textext.plugin.suggestions.js',
        pathJs+'textext.plugin.tags.js'
    ],
    'public/js/libs/texttext/texttext_tags.js'
).styles(
       [
            pathCss+'textext.core.css',
            pathCss+'textext.plugin.arrow.css',
            pathCss+'textext.plugin.autocomplete.css',
            pathCss+'textext.plugin.clear.css',
            pathCss+'textext.plugin.focus.css',
            pathCss+'textext.plugin.prompt.css',
            pathCss+'textext.plugin.tags.css'
        ],
        'public/js/libs/texttext/texttext_tags.css'
    );
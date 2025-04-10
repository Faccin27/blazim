import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/assets/site/js/app.js',
                'resources/assets/site/js/jqueryFunctions.js',
                'resources/assets/site/css/style.css',
                'resources/assets/site/css/responsive.css',
                'resources/assets/site/css/slides.css',
                'resources/assets/site/css/ckeditor/ckeditorFront.css',

                'resources/assets/site/js/app.js',
                'resources/assets/site/js/ckeditor-init.js',

                'resources/assets/admin/js/app.js',
                'resources/assets/admin/js/ckEditorFacade.js',
                'resources/assets/admin/js/auth.js',
                'resources/assets/admin/js/cropperInput.js',
            ],
            refresh: true,
        }),
    ],
});

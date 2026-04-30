import { defineConfig } from 'vite';
import laravel,  { refreshPaths }  from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: [
                'app/Filament/**',           // Watches Resources, Pages, Clusters
                'app/Models/**',             // Watches Eloquent models
                'app/Providers/Filament/**', // Watches Panel configuration
                'resources/views/**',        // Watches Blade templates
            ],
        }),
        tailwindcss(),
    ],
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});

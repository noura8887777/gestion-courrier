import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            build: {
                outDir: 'public/build',
                manifest: true,
              },
              server: {
                watch: {
                  usePolling: true,
                },
              },
            refresh: true,
        }),
    ],
});

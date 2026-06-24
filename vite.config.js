import laravel from 'laravel-vite-plugin'
import { defineConfig } from 'vite'

const host = 'monkey-support.local'

export default defineConfig({
    server: {
        host: host,
        hmr: {
            host: host,
        },
    },
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
})

import laravel from 'laravel-vite-plugin'
import { defineConfig } from 'vite'

import livewire from '@defstudio/vite-livewire-plugin'

const host = 'cm-tickets.local'

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
            // refresh: true,
        }),

        livewire({
            refresh: ['resources/css/app.css'],
        }),
    ],
})

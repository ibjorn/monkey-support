import './bootstrap'

import Alpine from 'alpinejs'

import { livewire_hot_reload } from 'virtual:livewire-hot-reload'

livewire_hot_reload()

window.Alpine = Alpine

Alpine.store('darkMode', {
    init() {
        const colorMode = localStorage.getItem('dark')
        const preferredColorMode = window.matchMedia(
            '(prefers-color-scheme: dark)'
        ).matches

        if (colorMode === null) {
            localStorage.setItem('dark', preferredColorMode)
        }

        this.on = localStorage.getItem('dark') === 'true'
    },

    on: false,

    changeColor() {
        this.on
            ? localStorage.setItem('dark', true)
            : localStorage.setItem('dark', false)
    },

    toggle() {
        this.on = !this.on
        this.changeColor()
    },
})

Alpine.start()

import './bootstrap'

// Livewire v3 bundles and starts Alpine itself, so we no longer import or start
// Alpine here. We register our custom stores on the `alpine:init` event, which
// Livewire fires before booting Alpine.
document.addEventListener('alpine:init', () => {
    window.Alpine.store('darkMode', {
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
})

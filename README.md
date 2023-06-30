# Monkey Support
## For Demo Purposes ONLY

A support ticket app developed as a test of full stack skills with the following technologies:

- Laravel
- Livewire
- Blade components
- AlpineJS
- TailwindCSS

### Installation

1. Copy .env.example to .env and make necessary changes.
2. Run `composer install`

#### Docker

Laravel Sail configured with Nginx and devcontainer.

### Access

Admin:
Username: admin@monkey-support.local
Password: bananas101

User:
Username: grab any email from DB after seeding.
Password: monkeybiz (for all users)

### Known Issues

- Deletion confirm modal multiple rendering issue. Cancel button needs to be clicked multiple times.
- Dark mode doesn't stay consistent. Using Alpine.store(), probably a logic issue with the localStorage check. Else, perhaps storing state in Livewire preferable. 


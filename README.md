# Monkey Support

## For Demo Purposes ONLY

A demo support ticket app, for practice purposes, with the following technologies:

- Laravel
- Livewire
- Blade components
- AlpineJS
- TailwindCSS

## Installation

### **LEMP Environment**

1. Copy `.env.example` to `.env`.
2. Adjust config for your environment (at the least, only needs MySQL).
3. For Docker, check Docker Compose section below before continuing.
4. Run `composer install`.
5. Run `npm install && npm run dev` (for dev purposes, runs with hot reload). `npm run build` for production build.
6. Once up and running, `php artisan migrate --seed` to populate database. Leave off `--seed` if you don't want dummy records.

### **Docker Compose**

If you're running Docker, Laravel Sail is installed and configured with Nginx and phpmyadmin.

If you're changing the `APP_SERVICE` and `APP_URL` variables in `.env`, be sure to also update the following files to match the value set for `APP_SERVICE` (find/replace should do the trick):

- `.devcontainer/devcontainer.json`
- `vite.config.js`

Don't forget to update your `hosts` file to match the domain, i.e., `127.0.0.1 yourdomain.choice`.

Once set up, run like a regular Sail app, except, no need to run `php artisan serve` as that's now handled by Nginx.

phpmyadmin available at `localhost:8081`

If you jumped here from point 3. above, continue from 4.

### **Access**

Admin:
Username: admin@monkey-support.local
Password: bananas101

User:
Username: grab any email from DB after seeding.
Password: monkeybiz (for all users)

## Known Issues

- ~~Deletion confirm modal multiple rendering issue. Cancel button needs to be clicked multiple times.~~
- ~~Dark mode doesn't stay consistent. Using Alpine.store(), probably a logic issue with the localStorage check. Else, perhaps storing state in Livewire preferable.~~
- When using the seeder, the logic for ticket statuses might seem odd. The logic, in practice, is sound though.

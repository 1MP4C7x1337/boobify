# Boobify

Boobify is a Laravel-based platform for managing model services, orders and referrals. This repository contains the application's backend and frontend assets.

## Requirements

- PHP ^7.3 or ^8.0
- Composer
- Node.js and npm
- MySQL or another database supported by Laravel

## Installation

1. Copy `.env.example` to `.env` and configure your environment variables. A valid `APP_KEY` is required for the application to run. You can generate one with `php artisan key:generate`.
2. Install PHP dependencies:
   ```bash
   composer install
   ```
3. Install JavaScript dependencies:
   ```bash
   npm install
   ```
4. Run database migrations:
   ```bash
   php artisan migrate
   ```

## Usage

Start the local development server:

```bash
php artisan serve
```

The application will be available at `http://localhost:8000` by default.

### Automatic scripts

Two helper scripts are provided in the `scripts/` directory:

- `scripts/auto-update.sh` – pulls the latest code, installs dependencies and runs migrations.
- `scripts/auto-start.sh` – ensures dependencies are installed and launches `php artisan serve`.

Make the scripts executable and run them as needed:

```bash
chmod +x scripts/*.sh
./scripts/auto-update.sh
./scripts/auto-start.sh
```

## Security

- Never commit sensitive credentials. Use the `.env` file for secrets. The file `gmailacc.txt` has been removed and added to `.gitignore` to prevent accidental exposure.
- Routes handling sensitive operations are protected by authentication middleware.
- User-submitted input is validated on the server side to mitigate injection attacks.
- Run `npm audit` and `composer audit` regularly to check for vulnerable dependencies.

## Testing

Execute the test suite with:

```bash
phpunit
```

The default configuration catches database connection issues and returns an empty result set so tests can run without a configured database.

## License

This project is open-sourced software licensed under the [MIT license](LICENSE).

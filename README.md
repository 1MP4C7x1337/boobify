# Boobify

Boobify is a Laravel-based platform for managing model services, orders and referrals. This repository contains the application's backend and frontend assets.

## Requirements

- PHP ^7.3 or ^8.0
- Composer
- Node.js and npm

## Installation

1. Copy `.env.example` to `.env` and configure your environment variables.
2. Install PHP dependencies:
   ```bash
   composer install
   ```
3. Install JavaScript dependencies:
   ```bash
   npm install
   ```
4. Generate the application key:
   ```bash
   php artisan key:generate
   ```
5. Run database migrations:
   ```bash
   php artisan migrate
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

## License

This project is open-sourced software licensed under the [MIT license](LICENSE).

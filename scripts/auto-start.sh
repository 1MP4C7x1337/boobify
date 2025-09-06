#!/usr/bin/env bash
set -e

# Ensure dependencies are installed
if [ ! -d vendor ]; then
  composer install --no-interaction --prefer-dist
fi

if [ ! -d node_modules ]; then
  npm install --no-audit --quiet
fi

# Start the Laravel development server
php artisan serve --host=0.0.0.0 --port="${PORT:-8000}"

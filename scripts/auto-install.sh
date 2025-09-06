#!/usr/bin/env bash
set -e

echo "Installing PHP dependencies..."
composer install --no-interaction --prefer-dist

echo "Installing Node dependencies..."
npm install --no-audit --quiet

if [ ! -f .env ]; then
  echo "Copying environment file..."
  cp .env.example .env
fi

echo "Generating application key..."
php artisan key:generate --ansi

echo "Running database migrations..."
php artisan migrate --force || true

echo "Installation complete."


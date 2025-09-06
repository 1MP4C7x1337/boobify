#!/usr/bin/env bash
set -e

echo "Updating repository..."
if [ -d .git ]; then
  git pull --rebase
fi

echo "Installing PHP dependencies..."
composer install --no-interaction --prefer-dist

echo "Installing Node dependencies..."
npm install --no-audit --quiet

echo "Running database migrations..."
php artisan migrate --force || true

echo "Update complete."

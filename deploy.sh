#!/bin/bash

echo "🚀 Starting deployment process..."

# Install dependencies
echo "📦 Installing PHP dependencies..."
composer install --no-dev --optimize-autoloader

# Install Node.js dependencies and build assets
echo "🎨 Installing and building frontend assets..."
npm install
npm run build

# Generate application key if not exists
echo "🔑 Generating application key..."
php artisan key:generate --force

# Run database migrations
echo "🗄️ Running database migrations..."
php artisan migrate --force

# Clear and cache config
echo "⚡ Optimizing application..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Set proper permissions for storage and bootstrap cache
echo "🔒 Setting proper permissions..."
chmod -R 755 storage
chmod -R 755 bootstrap/cache

# Create SQLite database if it doesn't exist
touch database/database.sqlite
chmod 666 database/database.sqlite

echo "✅ Deployment completed successfully!"
echo "🎉 Your Laravel inventory system is ready to deploy!"

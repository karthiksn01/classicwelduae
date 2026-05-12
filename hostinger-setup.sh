#!/usr/bin/env bash

# Hostinger Deployment Setup Utility
# Use this script to finalize your deployment once you have SSH access.

echo "--- Hostinger Cleanup & Setup ---"

# Clear all caches
echo "Clearing caches..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Create storage link
echo "Creating storage link..."
php artisan storage:link

# Run migrations
echo "Running database migrations..."
php artisan migrate --force

echo "--- Setup Complete! ---"

#!/bin/bash

# Laravel Upgrade Test Script
# Author: vanmaikhai
# Date: 2024-02-25

set -e

echo "🚀 Starting Laravel upgrade test..."

# Colors for output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

# Function to print colored output
print_status() {
    echo -e "${GREEN}[INFO]${NC} $1"
}

print_warning() {
    echo -e "${YELLOW}[WARNING]${NC} $1"
}

print_error() {
    echo -e "${RED}[ERROR]${NC} $1"
}

# Check if we're in the right directory
if [ ! -f "composer.json" ]; then
    print_error "composer.json not found. Please run this script from the project root."
    exit 1
fi

# Backup current state
print_status "Creating backup..."
git stash push -m "Pre-upgrade backup $(date)"

# Check current Laravel version
print_status "Current Laravel version:"
php artisan --version

# Check for available updates
print_status "Checking for Laravel updates..."
composer outdated laravel/framework --direct

# Ask for confirmation
read -p "Do you want to proceed with the upgrade? (y/N): " -n 1 -r
echo
if [[ ! $REPLY =~ ^[Yy]$ ]]; then
    print_warning "Upgrade cancelled."
    exit 0
fi

# Run pre-upgrade tests
print_status "Running pre-upgrade tests..."
if ! php artisan test; then
    print_error "Pre-upgrade tests failed. Aborting upgrade."
    git stash pop
    exit 1
fi

# Update Laravel
print_status "Updating Laravel framework..."
composer update laravel/framework --with-dependencies

# Clear caches
print_status "Clearing caches..."
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Run migrations
print_status "Running migrations..."
php artisan migrate --force

# Run post-upgrade tests
print_status "Running post-upgrade tests..."
if ! php artisan test; then
    print_error "Post-upgrade tests failed. Consider rolling back."
    exit 1
fi

# Show new version
print_status "New Laravel version:"
php artisan --version

print_status "✅ Laravel upgrade completed successfully!"
print_warning "Don't forget to commit your changes and test thoroughly."

echo
echo "Next steps:"
echo "1. Review the changes: git diff"
echo "2. Test your application manually"
echo "3. Commit changes: git add . && git commit -m 'chore: upgrade Laravel framework'"
echo "4. Push to repository: git push"

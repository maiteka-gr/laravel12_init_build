# GitHub Actions Setup

**Author:** maiteka-gr  
**Created:** 2024-02-25  
**Last Updated:** 2025-12-12

## Laravel Auto-Upgrade System

This repository includes automated Laravel upgrade workflows to keep your application up-to-date and secure.

### Workflows

#### 1. Laravel Auto Upgrade (`laravel-upgrade.yml`)
- **Schedule:** Every Monday at 2 AM UTC
- **Trigger:** Manual dispatch available
- **Function:** Automatically checks and upgrades Laravel framework
- **Output:** Creates PR with upgrade changes

#### 2. Laravel Rollback (`laravel-rollback.yml`)
- **Trigger:** Manual dispatch only
- **Function:** Emergency rollback to specific commit
- **Input Required:** Target commit hash and reason

#### 3. Security Check (`security-check.yml`)
- **Schedule:** Daily at 6 AM UTC
- **Trigger:** On composer.json/lock changes
- **Function:** Scans for security vulnerabilities
- **Output:** Creates GitHub issue if vulnerabilities found

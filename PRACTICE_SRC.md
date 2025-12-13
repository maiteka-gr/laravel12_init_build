# Build SRC

**Author:** maiteka-gr  
**Created:** 2024-02-25  
**Last Updated:** 2025-12-12

## Overview

1. Clone SRC

```
git clone https://github.com/maiteka-gr/laravel12_init_build.git
cd laravel12_init_build
```

2. Build SRC use Docker

```
docker compose up -d
# NOTED : If you use docker-compose, then should change command.
docker-compose up -d
```

```
docker compose exec app composer install
```

3. Exec dump data

-- Migrate DB :
```
docker compose exec app php artisan migrate
```
-- Dump data :
```
docker compose exec app php artisan db:seed
```

4. Test API

```
http://127.0.0.1:8080/api/tests/
```

## About Task Scheduler App

Task Scheduler App is an application that handles periodic data cleaning and caching of a frequently accessed API.
---

## Features

- Utilizes **Redis** for caching to enhance performance.
- Employs **PostgreSQL** as the primary database.
- Built using **Laravel** for backend services.

---

## Requirements

Make sure you have the following installed Locally:

    ## Redis

    - Install PHP Redis Extension: Ensure that the Redis PHP extension is installed. Laravel uses the phpredis extension for Redis interactions.
    - For Windows: Download the appropriate DLL file for your PHP version from PECL and enable the extension in your php.ini.

    ## PostgreSQL

    - Ensure you have PostGreSQL installed Locally

--- 

## App Setup

- .env file:
  - APP_NAME=Laravel
    APP_ENV=local
    APP_KEY=
    APP_DEBUG=true
    APP_TIMEZONE=UTC
    APP_URL=http://localhost
  - DB_HOST=
    DB_PORT=
    DB_DATABASE=
    DB_USERNAME=
    DB_PASSWORD=
  - REDIS_CLIENT=phpredis
    REDIS_HOST=127.0.0.1
    REDIS_PORT=6379
    REDIS_PASSWORD=null
    REDIS_DB=0
  - WEATHER_API_KEY
  - NEWS_API_KEY


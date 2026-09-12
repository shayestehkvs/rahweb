# Ticket System

## Requirements

- PHP 8.2+
- Laravel 12
- MySQL
- Node


## Installation

composer install

npm install

cp .env.example .env

php artisan key:generate

php artisan migrate --seed


## Admin Accounts

Admin Level 1:

admin1@test.com

password


Admin Level 2:

admin2@test.com

password



## Features

- User authentication
- Ticket creation
- File upload
- Two level approval
- Queue processing
- Retry mechanism
- Notifications


## Architecture

- Service Layer
- Enum State Management
- Jobs
- Events
- Notifications

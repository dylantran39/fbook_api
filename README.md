<<<<<<< 9a7f5202a4ac73254562f09f983f3dd2d1f5a2d1
# fbook_api
Fbook - for sharing and discussing about book
=======
# Trippa-Backen-RiseUp

## Required

 - Git
 - Composer
 - PHP v.7.x
 - Mysql v.5.7.x
 - Node
 - Npm

## Setup

- git clone git@github.com:framgia/Trippa-BackEnd-RiseUp.git
- composer install --no-scripts
- cp .env.example .env
- php artisan passport:install
- php artisan key:generate
- php artisan migrate:refresh --seed

## Configs

**Creating A Password Grant Client**

`php artisan passport:client --password`

Config API_CLIENT_SECRET and API_CLIENT_id in .env 

## Testing

- phpunit

>>>>>>> Init Project

# Laravel CMS For Nakheel

## Prerequisites
Please follow below steps to install and setup all prerequisites:

- Composer:
  - Make sure to have the Composer installed & running in your computer.
- Nodejs
  - Make sure to have the Node.js installed & running in your computer. If you already have installed Node on your computer, you can skip this step if your existing node version is greater than 10.
- Git
  - Make sure to have the Git installed globally & running on your computer. If you already have installed git on your computer, you can skip this step.

## Installation and set up
- clone the project
```bash
git clone git@bitbucket.org:devteamcr/cms.git
```
- install composer 
```bash
composer install	
```
- install npm and run dev
```bash
npm install	
```
```bash
npm run dev	
```
- copy .env.example to .env
> we change db hots to **app-mysql** as we named in  [docker-compose.yml](https://bitbucket.org/devteamcr/cms/src/master/docker-compose.yml)

```bash
DB_CONNECTION=mysql
DB_HOST=app-mysql
DB_PORT=3306
DB_DATABASE=app-mysql
DB_USERNAME= your_user_name
DB_PASSWORD= your_password
```
- run docker compose 
  - #### Notes :
    - Make sure the ports 80:80 , 33061:3306 , 1025:1025 not running in your device
    - you can open [docker-compose.yml](https://bitbucket.org/devteamcr/cms/src/master/docker-compose.yml) and change ports.
```bash
docker-compose up -d 
```
- generate app key 
```bash
docker-compose exec app php artisan key:generate 
```
- migrate database
```bash
docker-compose exec app php artisan migrate
```

 

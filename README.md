# Location Database Contribution System

## Setup

```sh
git clone git@github.com:your-avatar/symfony-boilerplate.git
cd symfony-boilerplate
docker-compose up -d
docker-compose exec api composer install
docker-compose exec front npm install
docker-compose exec api php bin/console doctrine:database:create
docker-compose exec api php bin/console doctrine:migrations:migrate
docker-compose exec api php bin/console doctrine:fixtures:load

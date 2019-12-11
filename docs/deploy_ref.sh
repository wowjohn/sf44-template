export APP_ENV=prod
export APP_DEBUG=0

php bin/console make:migration
php bin/console doctrine:migrations:migrate

composer install --no-dev --optimize-autoloader --no-scripts
composer dump-autoload --optimize --no-dev --classmap-authoritative

php bin/console cache:clear
php bin/console assets:install public

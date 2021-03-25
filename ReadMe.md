# Project Setup

> https://symfony.com/

> https://symfony.com/doc/current/setup.html

> composer create-project symfony/skeleton app2115

> php -S 127.0.0.1:8000 -t public

> symfony server:start

> composer dump-autoload

> composer create-project symfony/website-skeleton ./ "5.0.*"

``` 
<VirtualHost *:80>   
	ServerName local.app2115
	DocumentRoot "C:\xampp\htdocs\app2115\public" 
</VirtualHost>

<VirtualHost *:80>   
	ServerName local.app2115.client
	DocumentRoot "C:\xampp\htdocs\app2115\client" 
</VirtualHost>
```

```
127.0.0.1        local.app2115.client
```

> https://symfony.com/download

> symfony check:requirements

> composer require symfony/requirements-checker

> http://local.app2115/check.php

> composer remove symfony/requirements-checker

> http://local.app2115/admin

> http://local.app2115/api


# Symfony Packages

> https://symfony.com/doc/current/bundles/EasyAdminBundle/index.html

> composer require admin

> composer require easycorp/easyadmin-bundle

> composer require api

> composer require --dev api-platform/schema-generator

> ERROR: Update composer.json and remove

```
"symfony/polyfill-php72": "*"
```

> composer update

> ERROR: Or Replace in composer.json with

```
"symfony/polyfill-php73": "*"
```

> composer update

> https://packagist.org/packages/vich/uploader-bundle

> https://github.com/dustin10/VichUploaderBundle

> https://symfony.com/doc/2.x/bundles/EasyAdminBundle/integration/vichuploaderbundle.html

> composer require vich/uploader-bundle

> composer require symfony/security-bundle

> composer require doctrine maker

> composer require orm-fixtures --dev

> composer require --dev symfony/profiler-pack

> composer require nelmio/cors-bundle


# Database 

> https://developers.google.com/search/docs/data-types/product

> https://schema.org/Product

> vendor/bin/schema generate-types src/ config/schema.yaml

> .env

```
DATABASE_URL="sqlite:///%kernel.project_dir%/var/data.db"
```

> bin/console doctrine:database:create
 
> bin/console doctrine:schema:update --force

> bin/console make:admin:dashboard

> php bin/console make:admin:crud

> Update Admin/DashboardController

```
//...

use App\Entity\Offer;
use App\Entity\Product;

//...

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Offer', 'fa fa-home', Offer::class);
        yield MenuItem::linkToCrud('Product', 'fa fa-home', Product::class);      
    }

//...

```

> bin/console doctrine:schema:drop -n -q --force --full-database

```
bin/console doctrine:schema:drop -n -q --force --full-database &&
rm migrations/*.php &&
bin/console doctrine:schema:update --force &&
bin/console doctrine:fixtures:load -n -q
```

> bin/console make:entity Product

> bin/console make:entity Offer

> bin/console make:user

> bin/console make:auth

> bin/console security:encode-password

> php bin/console make:fixtures UserFixtures


# .htaccess file in public folder

```
<IfModule mod_rewrite.c>
    Options -MultiViews
    RewriteEngine On
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^(.*)$ index.php [QSA,L]
</IfModule>

<IfModule !mod_rewrite.c>
    <IfModule mod_alias.c>
        RedirectMatch 302 ^/$ /index.php/
    </IfModule>
</IfModule>
```


# Webpack Encore

> npm init

> npm install @symfony/webpack-encore --save-dev

> npm install --save jquery

> touch webpack.config.js

```
var Encore = require('@symfony/webpack-encore');

Encore
    .setOutputPath('public/build/')
    .setPublicPath('/build')
    .addEntry('js/custom', './build/js/custom.js')
    .addStyleEntry('css/custom', ['./build/css/custom.css'])
    // .autoProvidejQuery()
;

module.exports = Encore.getWebpackConfig();
```

> ./node_modules/.bin/encore production

> ./node_modules/.bin/encore dev --watch


# Commands

> bin/console

> bin/console make:controller WelcomeController

> bin/console doctrine:database:create

> bin/console make:entity

> bin/console make:migration

> bin/console make:fixture

> bin/console make:twig-extension

> bin/console doctrine:migrations:migrate

> bin/console debug:container

> bin/console cache:clear

> bin/console list doctrine

> bin/console doctrine:fixtures:load -n -q

> bin/console debug:router

> bin/console debug:autowiring

> bin/console help make:migration

> bin/console about

> bin/console debug:event-dispatcher

> bin/console debug:event-dispatcher kernel.request

> bin/console make:subscriber

> bin/console make:form VideoFormType

> bin/console swiftmailer:spool:send --time-limit=10

> bin/console make:functional-test

> bin/console make:test

> ./bin/phpunit

> php bin/phpunit

> vendor/bin/phpunit

> php bin/phpunit --coverage-test

> bin/console make:user

> bin/console security:check 

> bin/console make:voter

> bin/console make:entity --regenerate


# Cache/Redis

> composer require symfony/cache

> sudo apt-get install redis-server php-redis


# Swiftmailer

> composer require symfony/swiftmailer-bundle

> bin/console swiftmailer:spool:send --message-limit=10 --env=prod


# Heroku Deployment

## composer.json file update

```
To the composer.json file add the following entry at the "require" section:

"ext-sqlite3": "*", 
"ext-intl" : "*",
"ext-pdo_sqlite" : "*"

then run 

> composer update command.

Inside the Utils folder create cache folder, and copy data.db file from the var directory (this can be empty database).

Change the HerokuCache.php/FilesCache.php file from the Utils folder to look like the file from the downloadable resource from this lecture.
```

## .htaccess for https

```
    # RewriteCond %{HTTP:X-Forwarded-Proto} !https
    # RewriteRule ^ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
```

## .gitignore to get database over heroku

```
/var/cache/
/var/log/
/var/sessions/
/var/spool/
```

> git rm -r --cached .

> git add .

> git commit -m "change"

## Installation and Deployment

> heroku login

> heroku create 

> heroku config:set APP_ENV=heroku

> heroku config:set APP_DEBUG=0

> heroku config:set APP_SECRET=xxxxxxxxxxxxxx

> heroku config:set DATABASE_URL=xxxxxxxxxxxxx

> echo 'web: $(composer config bin-dir)/heroku-php-apache2 public/' > Procfile

> git add .

> git commit -m "change"

> git push heroku master

> heroku open


# Git Repo Setup 

```
git init
git add .
git commit -m "project init"
git remote add origin https://github.com/primarypartition/app2115.git
git push -u origin master
```

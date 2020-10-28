Project Setup:
composer install
npm install

symfony serve //start des lokalen entwicklungsservers



---

Installation with more details:

Fuer den Vendor Ordner im PHP Storm Terminal folgendes durchführen/eingeben:

download composer: 
https://getcomposer.org/

terminal:
composer install

download node.js: 
https://nodejs.org/en/
install node.js

terminal: 
npm install 

build node with:
npm run dev

download and install symfony: 
https://symfony.com/download

start server / terminal: 
symfony serve //start des lokalen entwicklungsservers
symfony server:start

stop server / terminal:
symfony server:stop

---
vue tutorial: 
http://zetcode.com/symfony/vue/

see symfony commands: 
https://symfony.com/doc/current/setup/symfony_server.html
---


if error occurs: WARNING unable to find the application log, run in terminal: 
composer require logger
also solves problem when symfony server:stop doesn't have authorization

if problem still occurs the next time
go to: var/log in project folder and create a dev.log file

(doesn't yet fix the problem: following error still occurs when starting server
Uncaught PHP Exception Symfony\Component\HttpKernel\Exception\NotFoundHttpException: "No route found for "GET /"" at ...)

forum solution: 
https://stackoverflow.com/questions/55678255/uncaught-php-exception-symfony-component-httpkernel-exception-notfoundhttpexcept
---

php bin/console doctrine:migrations:diff
 
php bin/console make:migration
php bin/console doctrine:migrations:migrate
php bin/console doctrine:fixtures:load

npm run watch

---

EMailJS

https://dashboard.emailjs.com/
Email: plantBasePro4@gmail.com

#!/bin/bash

git stash
git pull origin master
php ~/composer.phar install
# rm -rf node_modules/
npm install
npm run dev
php artisan cache:clear

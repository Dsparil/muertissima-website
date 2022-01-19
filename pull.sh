#!/bin/bash

git stash
git pull origin master
composer update
rm -rf node_modules/
npm install
npm run dev

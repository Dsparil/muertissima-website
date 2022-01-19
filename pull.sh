#!/bin/bash

git stash
git pull origin master
rm -rf node_modules/
npm install
npm run dev

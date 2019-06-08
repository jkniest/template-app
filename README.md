# Laravel app template

[![CircleCI](https://circleci.com/gh/jkniest/template-app.svg?style=svg)](https://circleci.com/gh/jkniest/template-app)

## Installation
1. Clone the project: `git clone git@github.com:jkniest/template-app.git`
2. Copy the `.env` to `.env.example`: `cp .env.example .env`
3. Modify all parameters inside the .env file
4. Pull the docker images: `docker-compose pull`
5. Start the whole structure: `docker-compose up -d`

## Included packages
- [laravel-query-builder](https://github.com/spatie/laravel-query-builder)
- [laravel-queueable-action](https://github.com/spatie/laravel-queueable-action)
- [laravel-apidoc-generator](https://github.com/mpociot/laravel-apidoc-generator)
- [laravel-backup](https://github.com/spatie/laravel-backup)
- [laravel-flash](https://github.com/spatie/laravel-flash)
- [laravel-web-tinker](https://github.com/spatie/laravel-web-tinker)
- [horizon](https://github.com/laravel/horizon)
- [laravel-ide-helper](https://github.com/barryvdh/laravel-ide-helper)
- [telescope](https://github.com/laravel/telescope)
- [passport](https://github.com/laravel/passport)
- [scout](https://github.com/laravel/scout)
- [scout-tntsearch-driver](https://github.com/teamtnt/laravel-scout-tntsearch-driver)
- [phpunit-pretty-print](https://github.com/sempro/phpunit-pretty-print)

## Recommended packages
- [laravel-responsecache](https://github.com/spatie/laravel-responsecache) if you need to cache to whole html response


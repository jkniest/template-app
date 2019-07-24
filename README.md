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
- [sentry-laravel](https://github.com/getsentry/sentry-laravel)
- [inertia-laravel](https://github.com/inertiajs/inertia-laravel)

## Recommended packages
- [nova](https://github.com/laravel/nova) if you need a modern admin interface
- [laravel-responsecache](https://github.com/spatie/laravel-responsecache) if you need to cache to whole html response
- [laravel-translatable](https://github.com/spatie/laravel-translatable) if you have a multilingual website
- [schema-org](https://github.com/spatie/schema-org) if the website you are building is for a company
- [laravel-medialibrary](https://github.com/spatie/laravel-medialibrary) if you are handling uploaded media / files
- [enum](https://github.com/spatie/enum) if you are needing good enums with type support
- [nova-backup-tool](https://github.com/spatie/nova-backup-tool) if you are using nova und laravel-backups


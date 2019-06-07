# Laravel app template

// circleci badge

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

## Recommended packages
- [laravel-responsecache](https://github.com/spatie/laravel-responsecache) if you need to cache to whole html response


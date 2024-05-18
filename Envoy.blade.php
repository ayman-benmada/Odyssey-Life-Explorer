@servers(['localhost' => '127.0.0.1'])

@story('web-local-setup')
composer
assets
cache
@endstory

@story('web-production-setup')
down
migrate
cache
up
@endstory

@task('composer')
composer install
@endtask

@task('assets')
npm install
npm run build
@endtask

@task('migrate')
php artisan migrate
@endtask

@task('cache')
php artisan cache:clear
php artisan view:cache
php artisan route:cache
php artisan config:cache
@endtask

@task('up')
php artisan up
@endtask

@task('down')
php artisan down --retry=300
@endtask

FROM composer:2.5

WORKDIR /var/www/laravel_tracker_report

ENTRYPOINT [ "composer", "--ignore-platform-reqs" ]
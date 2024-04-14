FROM nginx:1.25-alpine

ADD conf/nginx.conf /etc/nginx/conf.d/default.conf

WORKDIR /var/www/laravel_tracker_report
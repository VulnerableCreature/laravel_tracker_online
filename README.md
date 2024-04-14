<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>
# Online education (The Ebbinghaus method)

1. Install PHP [Click](https://www.php.net/downloads)
2. Install Git [Click](https://git-scm.com/downloads)
3. Git clone
```bach
https://github.com/VulnerableCreature/laravel_educational_platform.git
```
4. Install Composer [Click](https://getcomposer.org/Composer-Setup.exe)
   after install open cmd and check
```bash
composer -v
```
5. Install IDE - PhpStorm OR VsCode
6. Instal npm [Click](https://nodejs.org/en/download)
7. Install `Docker` [Click](https://www.docker.com/products/docker-desktop/) or `PgAdmin` [Click](https://www.pgadmin.org/download/pgadmin-4-windows/)

> Лучше `Docker`

8. Open IDE
9. Open integreted terminal and use command
```bash

```
> Далее все действия выполняются в терминале!

10. For Docker
```bash
docker-compose up -d postgresql
```

11. Enter folder with project
```bash
cd src
```
```bash
composer install
```
12. Open second terminal and
```bash
npm instal
```

> WAIT

13. Rename file `.env.example` in `.env`
    insert next code
```bash

```

```bash
php artisan migrate
```

```bash
php artisan db:seed
```

```bash
php artisan storage:link
```

```bash
php artisan queue:work
```

14. Open browser go to link
```bash
http://127.0.0.1:8000/
```

Enter how admin

login: `admin`
password: `123`

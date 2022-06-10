# PHP-MVC
A small MVC project using PHP & DOCKER
## Setup
1. Open Terminal and run `sudo nano /etc/hosts`.
2. Add `127.0.0.1    rawphp.test` inside `/etc/hosts` (Otherwise you have to update nginx setup).
3. Run `docker-compose --build` to build with docker.
4. Run `docker-compose up -d` to run docker.
5. Run `docker exec -it rawphp-service bash` and then `composer install`.
6. ALL DONE !!
7. Just open browser and hit `http://rawphp.test`.
8. Inside `public/index.php` you will get all available routes.
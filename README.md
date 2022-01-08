## rest_api-gaji-pegawai V 1.0.0
<p><b>
laravel 8
</b></p>

## Setup
- buka direktori project di terminal anda.
- ketikan command : cp .env.example .env (copy paste file .env.example)
- buat database 

Lalu ketik command dibawah ini
- composer install
- php artisan optimize:clear 
- php artisan key:generate (generate app key)
- php artisan migrate (migrasi database)
- php artisan db:seed 

## Fitur
- GET : http://127.0.0.1:8000/api/pegawais
- POST : http://127.0.0.1:8000/api/pegawais
- GET : http://127.0.0.1:8000/api/gajis
- POST : http://127.0.0.1:8000/api/gaji
- GET : http://127.0.0.1:8000/api/gajis/2022-03
- GET : http://127.0.0.1:8000/api/send-email-gaji

## URL Dokumentasi di Postman

- https://documenter.getpostman.com/view/5049400/UVXercvE
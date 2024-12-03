## Project

Suatu website menggunakan framework Laravel dengan ketentuan konsep Personal Light Intagram, project ini menggunakan beberapa teknologi diantaranya:

- [Laravel]([https://laravel.com/docs/routing](https://laravel.com/docs/master/installation)).
- [Laravel Livewire]([https://laravel.com/docs/container](https://livewire.laravel.com/docs/quickstart)). 
- [Tailwind css]([https://laravel.com/docs/queues](https://tailwindcss.com/docs/installation)).
- [DOMPdf]([https://laravel.com/docs/queues](https://github.com/barryvdh/laravel-dompdf)).
- [Laravel Excel]([https://laravel.com/docs/queues](https://docs.laravel-excel.com/3.1/getting-started/installation.html)). 

 ## Setup Project

Ikuti langkah-langkah berikut untuk menginstal dan menjalankan project ini di lingkungan lokal Anda.

### 1. Install Dependencies 

install:

```bash
composer install
```

### 3. Salin File Konfigurasi
Salin file .env.example dan ubah namanya menjadi .env:

```bash
cp .env.example .env 
```

### 4. Generate Application Key
Jalankan perintah berikut untuk menghasilkan APP_KEY:

```bash
php artisan key:generate
```

### 5. Konfigurasi Database
Buka file .env dan perbarui konfigurasi database Anda: 

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=username_database
DB_PASSWORD=password_database
```

### 6. Jalankan Migrasi dan Seeder
Jalankan migrasi database untuk membuat tabel-tabel yang diperlukan:

```bash
php artisan migrate
```
```bash
php artisan db:seed
```

### 7. Install Laravel Breeze
Jalankan perintah berikut:
```bash
composer require laravel/breeze --dev
php artisan breeze:install
```

### 8. Install Dependencies Frontend dan Compile Asset
Install dependensi frontend menggunakan npm, lalu kompilasi aset:
```bash
npm install
npm run dev
```

### 9. Menjalankan Server Lokal
Untuk menjalankan aplikasi, jalankan perintah berikut:
```bash
php artisan serve
```

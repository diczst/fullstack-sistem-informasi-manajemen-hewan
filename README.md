# INTRODUCTION

`fullstack-sistem-informasi-manajemen-hewan` adalah repositori yang dibangun dengan native android sebagai aplikasi client dan laravel untuk aplikasi web, api dan admin. Awalnya repositori/proyek ini memiliki tujuan utama untuk mempelajari atau mengimplementasikan teknologi-teknologi sebagai berikut:

- Laravel Filament
- Implementasi Firebase Cloud Messaging di :
  - Android client
  - Laravel Backend

Saya berharap kode ini bisa menjadi legacy aka referensi yang dapat digunakan dalam membangun sistem secara fullstack untuk proyek-proyek kedepannya.

# SETUP AWAL LARAVEL

### 1. Instal Livewire

`composer require livewire/livewire`

### 2. Instal Filament

Sebenarnya di tahap ini bisa dilakukan dengan perintah
`composer require filament/filament:"^3.2" -W`
tetapi saya menemukan error saat menjalankan cara ini. Namun, saya menemukan cara alternatif yaitu

1. tambahkan `filament/filament": "^3.2.0"` di bagian require di file `composer.json`
2. jalankan perintah `composer update`

Dengan begitu filament dapat diinstal.

# Setup Filament

1. Install Panel  
   `php artisan filament:install --panels`  
   catatan : pastikan sudah membuat database dan melakukan migration agar bisa menampilkan panel filament.
2. Membuat User  
   Untuk pergi ke dashboard gunakan endpoint `localhost:8000/admin/login`. Untuk membuat user bisa menggunakan command  
   `php artisan make:filament-user`

3. Membuat CRUD  
   3.1 Membuat model dan migration, dalam studi kasus ini :  
   ```php artisan make:model Owner -m```  
   ```php artisan make:model Patient -m```  
   ```php artisan make:model Treatment -m```  
   Siapkan kolom atau tabel yang dibutuhkan, setelah itu lakukan migration.

   3.2 Unguarding Model 
   Unguarding diperlukan agar semua field di model bisa diisi tanpa harus mendefinisikan fillable pada masing-masing model. Caranya adalah dengan menambahkan `Model::unguard()` pada method `boot()` di 
   `app/Providers/AppServiceProvider.php`.

4. Membuat Resource
   Dilakukan dengan perintah `php artisan make:filament-resource Patient`.

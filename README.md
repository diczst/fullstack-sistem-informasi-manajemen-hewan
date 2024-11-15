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

# SETUP FILAMENT

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

   3.3 Membuat Resource
   Dilakukan dengan perintah `php artisan make:filament-resource Patient`.

Lanjutan  
   Ada beberapa fitur lanjutan yang akan sangat membantu dalam pengembangan, misalnya Relation Manager. Relation manager memungkinkan kita untuk menampilkan data yang terkait dengan data tertentu seperti data dengan relasi one to many seperti satu pasien punya banyak treatmen atau satu owner punya banyak pasien. Relation manager memungkinkan kita untuk menampilkan data-data seperti pasien-pasien milik owner
   dan kumpulan treamen yang diberikan ke pasien. Fitur-fitur ini bisa dipelajari lebih lanjut pada dokumentasi filament.

# SETUP JWT DAN API
## INSTAL JWT
1. Install JWT  
   `composer require tymon/jwt-auth`

2. Publish Configuration  
`php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"`

3. Generate Secret Key  
`php artisan jwt:secret`

## INSTAL API  
1. `php artisan install:api`

# Tambahan
Berikut ini adalah package yang dapat membantu selama proses pengembangan
1. `composer require flowframe/laravel-trend`
   Membantu untuk membuat data grafik dari eloquent. Filament bahkan menyarankan ini untuk diinstall jika ingin membuat berbagai grafik di menu dashboard.

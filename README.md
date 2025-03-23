# Aplikasi Point of Sale (POS) Depot Air Minum

Aplikasi Point of Sale (POS) untuk manajemen penjualan depot air minum dengan fitur pencatatan transaksi, manajemen produk, dan pelaporan.

## Teknologi yang Digunakan

-   PHP 8.0+
-   Laravel 8.x
-   MySQL/MariaDB
-   Bootstrap 4
-   JavaScript/jQuery
-   DataTables
-   Font Awesome

## Persyaratan Sistem

-   PHP >= 8.0
-   BCMath PHP Extension
-   Ctype PHP Extension
-   Fileinfo PHP Extension
-   JSON PHP Extension
-   Mbstring PHP Extension
-   OpenSSL PHP Extension
-   PDO PHP Extension
-   Tokenizer PHP Extension
-   XML PHP Extension
-   GD PHP Extension

## Instalasi

1. Clone repositori ini

```bash
git clone [url-repositori]
```

2. Install dependensi PHP menggunakan Composer

```bash
composer install
```

3. Salin file .env.example menjadi .env

```bash
cp .env.example .env
```

4. Generate application key

```bash
php artisan key:generate
```

5. Konfigurasi database di file .env

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=username
DB_PASSWORD=password
```

6. Jalankan migrasi dan seeder

```bash
php artisan migrate --seed
```

7. Buat symbolic link untuk storage

```bash
php artisan storage:link
```

## Struktur Aplikasi

### Models

-   `User.php` - Model untuk manajemen pengguna
-   `Product.php` - Model untuk manajemen produk
-   `Category.php` - Model untuk kategori produk
-   `Transaction.php` - Model untuk transaksi
-   `TransactionDetail.php` - Model untuk detail transaksi
-   `Cart.php` - Model untuk keranjang belanja

### Controllers

-   `Admin/DashboardController.php` - Controller untuk dashboard admin
-   `Admin/ProductController.php` - Controller untuk manajemen produk
-   `Admin/CategoryController.php` - Controller untuk manajemen kategori
-   `Admin/TransactionController.php` - Controller untuk manajemen transaksi
-   `Admin/PosController.php` - Controller untuk point of sale
-   `Admin/ReportController.php` - Controller untuk laporan

### Middleware

-   `isAdmin` - Middleware untuk autentikasi admin

### Views

-   `admin/dashboard.blade.php` - Tampilan dashboard
-   `admin/products/*` - Tampilan manajemen produk
-   `admin/categories/*` - Tampilan manajemen kategori
-   `admin/transactions/*` - Tampilan manajemen transaksi
-   `admin/pos/*` - Tampilan point of sale
-   `admin/reports/*` - Tampilan laporan

## Fitur Utama

### 1. Manajemen Produk

-   Tambah, edit, hapus produk
-   Upload gambar produk
-   Manajemen stok
-   Kategorisasi produk

### 2. Point of Sale (POS)

-   Interface kasir yang user-friendly
-   Pencarian produk
-   Kalkulasi total otomatis
-   Cetak struk

### 3. Manajemen Transaksi

-   Riwayat transaksi
-   Detail transaksi
-   Cetak ulang struk

### 4. Laporan

-   Laporan penjualan harian
-   Laporan pendapatan
-   Filter berdasarkan tanggal

### 5. Manajemen Pengguna

-   Multi-level user (Admin, Kasir)
-   Manajemen hak akses
-   Autentikasi dan otorisasi

## Format Data

### Produk

```json
{
    "id": integer,
    "category_id": integer,
    "name": string,
    "code": string,
    "quantity": integer,
    "price": decimal(15,2)
}
```

### Transaksi

```json
{
    "id": integer,
    "transaction_code": string,
    "name": string,
    "total_price": decimal(15,2),
    "accept": decimal(15,2),
    "return": decimal(15,2)
}
```

### Detail Transaksi

```json
{
    "id": integer,
    "transaction_id": integer,
    "product_id": integer,
    "qty": integer,
    "name": string,
    "base_price": decimal(15,2),
    "base_total": decimal(15,2)
}
```

## API Endpoints

### Products

-   GET `/admin/products` - Daftar produk
-   POST `/admin/products` - Tambah produk baru
-   PUT `/admin/products/{id}` - Update produk
-   DELETE `/admin/products/{id}` - Hapus produk

### Transactions

-   GET `/admin/transactions` - Daftar transaksi
-   POST `/admin/transactions` - Buat transaksi baru
-   GET `/admin/transactions/{id}` - Detail transaksi
-   GET `/admin/transactions/{id}/print_struck` - Cetak struk

### Reports

-   GET `/admin/reports/revenue` - Laporan pendapatan

## Keamanan

1. Autentikasi menggunakan Laravel's built-in authentication
2. CSRF protection untuk semua form
3. Validasi input untuk semua request
4. Middleware untuk kontrol akses
5. Sanitasi output untuk mencegah XSS

## Maintenance

### Database Backup

```bash
php artisan backup:run
```

### Cache Clear

```bash
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

### Update Aplikasi

```bash
git pull origin main
composer install
php artisan migrate
php artisan optimize:clear
```

## Troubleshooting

### Masalah Umum

1. **Gambar Tidak Muncul**

    - Periksa symbolic link storage
    - Periksa permission folder storage
    - Jalankan `php artisan storage:link`

2. **Error 500**

    - Periksa log di `storage/logs/laravel.log`
    - Periksa permission folder storage dan bootstrap/cache
    - Periksa konfigurasi database

3. **Cetak Struk Error**
    - Periksa koneksi printer
    - Periksa konfigurasi printer di sistem

## Kontak Support

Untuk bantuan teknis, silakan hubungi:

-   Email: [email support]
-   Telepon: [nomor telepon]

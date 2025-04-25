# RESTful API CRUD User - Laravel

## Deskripsi

Proyek ini adalah sebuah RESTful API untuk melakukan operasi CRUD (Create, Read, Update, Delete) pada data `User`. API ini dibangun menggunakan **Laravel** dengan fitur autentikasi dan validasi. API ini juga dapat digunakan untuk menyimpan data pengguna seperti nama, email, dan usia.

## Fitur

-   **GET** `/api/users` - Menampilkan semua pengguna.
-   **POST** `/api/users` - Membuat pengguna baru.
-   **GET** `/api/users/{id}` - Menampilkan detail pengguna berdasarkan ID.
-   **PUT** `/api/users/{id}` - Mengupdate pengguna berdasarkan ID.
-   **DELETE** `/api/users/{id}` - Menghapus pengguna berdasarkan ID.

## Teknologi yang Digunakan

-   **Laravel 12.x**
-   **PHP 8.x**
-   **MySQL** untuk database.
-   **Postman** atau **Insomnia** untuk testing API.

## Instalasi

1. **Clone repository** ini:
    ```bash
    git clone https://github.com/username/repo-name.git
    ```
2. **Masuk ke folder proyek**
   cd repo-name
3. **Install dependencies dengan Composer:**
   composer install
4. **Set environment variables. Salin file .env.example ke .env:**
   cp .env.example .env
5. **Generate key aplikasi:**
   php artisan key:generate
6. **Konfigurasi database di .env. Pastikan kamu telah mengonfigurasi database MySQL yang benar:**
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=nama_database
   DB_USERNAME=root
   DB_PASSWORD=
7. **Jalankan migration untuk membuat tabel di database:**
   php artisan migrate
8. **Jalankan server Laravel:**
   php artisan serve

API sekarang dapat diakses di http://127.0.0.1:8000.

Rute API

1. **GET /api/users**
   Menampilkan daftar semua pengguna.

Contoh Response:

json

[
{
"id": 1,
"name": "John Doe",
"email": "john@example.com",
"age": 30,
"created_at": "2025-04-25T12:00:00.000000Z",
"updated_at": "2025-04-25T12:00:00.000000Z"
}
] 2. **POST /api/users**
Membuat pengguna baru.

Contoh Request:

json

{
"name": "Jane Doe",
"email": "jane@example.com",
"age": 28
}
Contoh Response:

json

{
"id": 2,
"name": "Jane Doe",
"email": "jane@example.com",
"age": 28,
"created_at": "2025-04-25T12:00:00.000000Z",
"updated_at": "2025-04-25T12:00:00.000000Z"
} 3. **GET /api/users/{id}**
Menampilkan detail pengguna berdasarkan ID.

Contoh Response:

json

{
"id": 1,
"name": "John Doe",
"email": "john@example.com",
"age": 30,
"created_at": "2025-04-25T12:00:00.000000Z",
"updated_at": "2025-04-25T12:00:00.000000Z"
} 4. **PUT /api/users/{id}**
Mengupdate data pengguna berdasarkan ID.

Contoh Request:

json
Salin kode
{
"name": "Johnathan Doe",
"email": "johnathan@example.com",
"age": 31
}
Contoh Response:

json

{
"id": 1,
"name": "Johnathan Doe",
"email": "johnathan@example.com",
"age": 31,
"created_at": "2025-04-25T12:00:00.000000Z",
"updated_at": "2025-04-25T12:30:00.000000Z"
} 5. **DELETE /api/users/{id}**
Menghapus pengguna berdasarkan ID.

Contoh Response:

json

{
"message": "User deleted successfully"
}

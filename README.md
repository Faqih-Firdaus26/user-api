# RESTful API CRUD User - Laravel

<p align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
</p>

## 📋 Deskripsi

Proyek ini adalah sebuah RESTful API untuk melakukan operasi CRUD (Create, Read, Update, Delete) pada data `User`. API ini dibangun menggunakan **Laravel** dengan fitur autentikasi dan validasi. API ini juga dapat digunakan untuk menyimpan data pengguna seperti nama, email, password, dan usia.

## ✨ Fitur

-   **GET** `/api/users` - Menampilkan semua pengguna
-   **POST** `/api/users` - Membuat pengguna baru
-   **GET** `/api/users/{id}` - Menampilkan detail pengguna berdasarkan ID
-   **PUT** `/api/users/{id}` - Mengupdate pengguna berdasarkan ID
-   **DELETE** `/api/users/{id}` - Menghapus pengguna berdasarkan ID

## 🚀 Teknologi yang Digunakan

-   **Laravel 10.x**
-   **PHP 8.x**
-   **MySQL** untuk database
-   **Tailwind CSS** untuk UI
-   **Postman** atau **Insomnia** untuk testing API

## 💻 Instalasi

1. **Clone repository** ini:

    ```bash
    git clone https://github.com/Faqih-Firdaus26/user-api
    ```

2. **Masuk ke folder proyek**

    ```bash
    cd user-api
    ```

3. **Install dependencies dengan Composer:**

    ```bash
    composer install
    ```

4. **Set environment variables. Salin file .env.example ke .env:**

    ```bash
    cp .env.example .env
    ```

5. **Generate key aplikasi:**

    ```bash
    php artisan key:generate
    ```

6. **Konfigurasi database di .env. Pastikan kamu telah mengonfigurasi database MySQL yang benar:**

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=nama_database
    DB_USERNAME=root
    DB_PASSWORD=
    ```

7. **Jalankan migration untuk membuat tabel di database:**

    ```bash
    php artisan migrate
    ```

8. **Jalankan server Laravel:**
    ```bash
    php artisan serve
    jika server terlalu lambat bisa menjalankan perintah :
    php artisan serve --port=8080 (sesuaikan port sesuai kebutuhan)
    ```

API sekarang dapat diakses di http://127.0.0.1:8000. atau http://127.0.0.1:8080

## 🔍 Rute API

### 1. **GET /api/users**

Menampilkan daftar semua pengguna.

**Contoh Response:**

```json
[
    {
        "id": 1,
        "name": "Faqih",
        "email": "Faqih@example.com",
        "age": 21,
        "created_at": "2025-04-25T12:00:00.000000Z",
        "updated_at": "2025-04-25T12:00:00.000000Z"
    }
]
```

### 2. **POST /api/users**

Membuat pengguna baru.

**Contoh Request:**

```json
{
    "name": "Faqih Ganteng",
    "email": "FaqihGanteng@example.com",
    "password": "password123",
    "age": 21
}
```

**Contoh Response:**

```json
{
    "id": 2,
    "name": "Faqih Ganteng",
    "email": "FaqihGanteng@example.com",
    "age": 21,
    "created_at": "2025-04-25T12:00:00.000000Z",
    "updated_at": "2025-04-25T12:00:00.000000Z"
}
```

### 3. **GET /api/users/{id}**

Menampilkan detail pengguna berdasarkan ID.

**Contoh Response:**

```json
{
    "id": 1,
    "name": "Faqih",
    "email": "Faqih@example.com",
    "age": 21,
    "created_at": "2025-04-25T12:00:00.000000Z",
    "updated_at": "2025-04-25T12:00:00.000000Z"
}
```

### 4. **PUT /api/users/{id}**

Mengupdate data pengguna berdasarkan ID.

**Contoh Request:**

```json
{
    "name": "Faqih Cuy",
    "email": "FaqihCuy@example.com",
    "age": 21
}
```

**Contoh Response:**

```json
{
    "id": 1,
    "name": "Faqih Cuy",
    "email": "FaqihCuy@example.com",
    "age": 21,
    "created_at": "2025-04-25T12:00:00.000000Z",
    "updated_at": "2025-04-25T12:30:00.000000Z"
}
```

### 5. **DELETE /api/users/{id}**

Menghapus pengguna berdasarkan ID.

**Contoh Response:**

```json
{
    "message": "User deleted"
}
```

## 🌐 Antarmuka Web

Aplikasi ini juga menyediakan antarmuka web sederhana untuk mengelola data pengguna yang dapat diakses melalui:

```
http://127.0.0.1:8000/users
```

## 👨‍💻 Pembuat

Dibuat oleh Faqih Firdaus untuk keperluan Test Fullstack Developer - PT Rimba Ananta Vikasa Indonesia.

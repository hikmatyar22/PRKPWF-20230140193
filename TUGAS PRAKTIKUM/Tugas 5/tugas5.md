# Modul Pertemuan 5: Otorisasi (Authorization) - Role, Gate, dan Policy

**Nama:** Hikmatyar Alghifary  
**NIM:** 20230140193  
**Mata Kuliah:** Praktikum Pemrograman Web Framework


## 🏗️ Konsep Dasar

### 1. Autentikasi vs Otorisasi
| Konsep | Penjelasan | Contoh |
| :--- | :--- | :--- |
| **Autentikasi** | Memverifikasi identitas pengguna (Siapa Anda?) | Login menggunakan email & password. |
| **Otorisasi** | Memverifikasi hak akses pengguna (Apa yang boleh Anda lakukan?) | Apakah user ini boleh menghapus produk? |

### 2. Role (Peran)
Untuk mempermudah manajemen hak akses, kita menggunakan sistem Role. Dalam praktikum ini, kita menambahkan kolom `role` pada tabel `users` untuk membedakan antara **Admin** dan **User**.

---

## 🛡️ Implementasi Keamanan

### 🚪 Pengenalan Gate
Gate digunakan untuk aturan akses yang bersifat umum. Kami mengimplementasikan Gate `manage-product` yang hanya mengizinkan pengguna dengan role `admin` untuk mengakses menu manajemen produk.

> [!TIP]
> Gate sangat efektif digunakan pada Route atau di dalam Blade menggunakan direktif `@can`.

### 📜 Implementasi Policy (ProductPolicy)
Policy digunakan untuk logika yang lebih spesifik pada model. Dalam kasus ini, kita menggunakan `ProductPolicy` untuk memastikan:
- **Admin** memiliki hak penuh.
- **User** hanya bisa melihat data, namun tidak bisa mengubah atau menghapus produk milik orang lain.
- Logika di dalam `update` dan `delete` akan mencocokkan `user_id` pemilik produk dengan ID user yang sedang login.

---

## 📸 Dokumentasi Praktikum

Berikut adalah hasil implementasi fitur Otorisasi pada aplikasi:

### 1. Daftar Produk (Role Admin / Owner)
Menampilkan daftar produk dengan opsi Edit dan Delete yang tersedia karena user memiliki hak akses.
![Daftar Produk User Login](Dokumentasi/Produk%20List%20User%20Login.jpeg)

### 2. Detail Produk (Milik Sendiri)
Saat melihat detail produk milik sendiri, tombol aksi tetap muncul.
![Detail Produk User Login](Dokumentasi/Produk%20Detail%20Punya%20User%20Login.jpeg)

### 3. Batas Akses Produk (Milik User Lain)
Ketika melihat produk milik user lain, tombol Edit dan Delete disembunyikan oleh Policy.
![Detail Produk User Lain](Dokumentasi/Produk%20Detail%20User%20Lain.jpeg)

### 4. Tampilan List untuk User Biasa
User tanpa hak akses admin/owner tidak akan melihat tombol aksi pada daftar produk.
![Daftar Produk User Lain](Dokumentasi/Produk%20List%20User%20Lain.jpeg)

### 5. Fitur Tambah & Edit Produk
Antarmuka untuk mengelola data produk.
![Tambah Produk](Dokumentasi/Tambah%20Produk.jpeg)
![Edit Produk](Dokumentasi/Edit%20Produk.jpeg)

---

## 📝 Kesimpulan
Dengan menggabungkan **Gate** dan **Policy**, aplikasi kini memiliki lapisan keamanan yang kuat. Gate menangani akses menu secara global, sementara Policy memastikan data sensitif hanya bisa dimodifikasi oleh pemiliknya atau admin yang berwenang.

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
Sistem menggunakan kolom `role` pada tabel `users` untuk membedakan antara **Admin** dan **User**. Role ini ditentukan saat pendaftaran atau melalui database, dengan default value adalah `user`.

---

## 🛡️ Implementasi Keamanan

### 🚪 Pengenalan Gate (`manage-product` & `export-product`)
Gate digunakan untuk aturan akses global. 
- **`manage-product`**: Memastikan hanya Admin yang dapat melihat menu navigasi "Product".
- **`export-product`**: Membatasi fitur Export CSV hanya untuk Admin.

### 📜 Implementasi Policy (`ProductPolicy`)
Policy menangani logika otorisasi di level resource (Model). `ProductPolicy` memastikan:
- **Admin**: Memiliki akses penuh (Create, Read, Update, Delete) ke seluruh produk.
- **User (Owner)**: Hanya dapat mengedit (`update`) atau menghapus (`delete`) produk yang mereka tambahkan sendiri.
- **Regular User**: Dapat melihat daftar produk tetapi tidak memiliki akses tombol Edit/Hapus pada produk milik orang lain.

---

## 📸 Dokumentasi Praktikum

Berikut adalah hasil implementasi fitur Otorisasi dengan pembagian perspektif user:

### 1. Perspektif Admin (Akses Penuh)
Admin dapat melihat seluruh produk, tombol Export, serta memiliki tombol Edit/Delete untuk semua data.
![Daftar Produk Admin](Dokumentasi/Produk%20List%20Admin.jpeg)
![Detail Produk Admin](Dokumentasi/Produk%20Detail%20Admin.jpeg)

### 2. Perspektif User Biasa (Terbatas)
User biasa dapat melihat daftar produk, namun tombol Edit/Delete hanya akan muncul pada produk milik mereka sendiri.
![Daftar Produk User Biasa](Dokumentasi/Produk%20List%20User%20Biasa.jpeg)
![Detail Produk User Biasa](Dokumentasi/Produk%20Deyail%20User%20Biasa.jpeg)

### 3. Operasi CRUD
Proses penambahan, pengubahan, dan penghapusan data produk yang telah diamankan.
![Tambah Produk](Dokumentasi/Tambah%20Produk.jpeg)
![Edit Produk](Dokumentasi/Edit%20Produk.jpeg)
![Konfirmasi Hapus](Dokumentasi/Hapus%20Produk.jpeg)

---

## 📝 Kesimpulan
Dengan kombinasi **Gate** untuk proteksi menu navigasi dan **Policy** untuk proteksi data individual, aplikasi memiliki sistem keamanan yang berlapis. Hal ini memastikan integritas data tetap terjaga dimana user hanya bisa mengelola data miliknya sendiri, sementara Admin tetap memiliki visibilitas global.

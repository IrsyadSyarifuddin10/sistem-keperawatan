# 🏥 SIKEP - Sistem Keperawatan

SIKEP adalah aplikasi manajemen logbook dan supervisi untuk tenaga medis di rumah sakit.

![Preview](https://via.placeholder.com/800x400.png)  
*Tampilan utama aplikasi*

---

## ✨ Fitur
✅ Logbook pasien harian  
✅ Supervisi tenaga medis  
✅ Manajemen mentoring  
🚧 Integrasi API (Coming Soon)  

---

## 🛠 Instalasi

1. **Clone repository**  
   ```sh
   git clone https://github.com/username/sikep.git
   cd sikep
   ```

2. **Install dependencies**  
   ```sh
   composer install
   npm install
   ```

3. **Setup database & konfigurasi**  
   - Copy `.env.example` ke `.env`  
     ```sh
     cp .env.example .env
     ```
   - Jalankan migration  
     ```sh
     php artisan migrate --seed
     ```

4. **Jalankan aplikasi**  
   ```sh
   php artisan serve
   ```

---

## 📂 Struktur Folder

```sh
sikep/
│-- app/
│   │-- Http/Controllers/
│   │-- Models/
│   └-- Providers/
│-- database/
│-- resources/views/
│-- routes/
│-- .env.example
│-- composer.json
│-- README.md
```

---

## 🚀 Cara Menggunakan

1. Login dengan akun yang telah dibuat.  
2. Tambahkan logbook harian sesuai pasien yang ditangani.  
3. Supervisi dapat dilakukan oleh mentor dan hasilnya akan tercatat.  

---

## 🏗 Kontribusi

Kami terbuka untuk kontribusi! Silakan buat Pull Request atau buka Issue jika menemukan bug.  

---

## 📜 Lisensi

Proyek ini dirilis di bawah lisensi MIT.

# Sistem Inventaris Laravel

Sistem manajemen inventaris modern yang dibangun dengan Laravel 12, Tailwind CSS, dan Chart.js. Fitur lengkap untuk mengelola barang, kategori, dan laporan inventaris.

## ✨ Fitur Utama

- 🔐 **Autentikasi** - Sistem login dan registrasi yang aman
- 📦 **Manajemen Barang** - Tambah, edit, hapus, dan cari barang
- 🏷️ **Kategori** - Organisasi barang dalam kategori
- 📊 **Dashboard Statistik** - Grafik dan statistik inventaris real-time
- 📤 **Export Data** - Export data ke format CSV
- 🖼️ **Upload Gambar** - Upload gambar barang dengan drag & drop
- 📱 **Responsive Design** - Tampilan yang responsif di semua device
- 🌙 **Dark Mode** - Support untuk tema gelap

## 🚀 Quick Start

### Prerequisites

- PHP 8.2 atau lebih tinggi
- Composer
- Node.js & NPM
- Git

### Installation

1. **Clone repository**
   ```bash
   git clone <your-repo-url>
   cd proyek-inventaris
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node.js dependencies**
   ```bash
   npm install
   ```

4. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Database setup**
   ```bash
   touch database/database.sqlite
   php artisan migrate
   php artisan db:seed
   ```

6. **Build assets**
   ```bash
   npm run build
   ```

7. **Start development server**
   ```bash
   php artisan serve
   ```

Akses aplikasi di `http://localhost:8000`

## 🔧 Konfigurasi Environment

Copy `.env.example` ke `.env` dan sesuaikan:

```env
APP_NAME="Sistem Inventaris"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://yourdomain.com
DB_CONNECTION=sqlite
```

## 📊 Struktur Database

- **users** - Data pengguna
- **kategoris** - Kategori barang
- **barangs** - Data barang inventaris

## 🛠️ Development

```bash
# Jalankan tests
php artisan test

# Jalankan linter
./vendor/bin/pint

# Build assets untuk development
npm run dev

# Build assets untuk production
npm run build
```

## 📝 API Endpoints

- `GET /` - Landing page
- `GET /dashboard` - Dashboard (auth required)
- `GET /barang` - List barang (auth required)
- `POST /barang` - Tambah barang (auth required)
- `GET /kategori` - List kategori (auth required)

## 🤝 Contributing

1. Fork repository
2. Buat feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit changes (`git commit -m 'Add some AmazingFeature'`)
4. Push ke branch (`git push origin feature/AmazingFeature`)
5. Buat Pull Request

## 📄 License

Distributed under the MIT License. See `LICENSE` for more information.

## 📞 Support

Jika ada pertanyaan atau masalah, silakan buat issue di repository ini.

---

**Dibuat dengan menggunakan Laravel Framework**

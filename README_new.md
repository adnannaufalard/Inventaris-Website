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

## 📦 Deployment

### Opsi 1: Heroku (Paling Mudah)

1. **Install Heroku CLI**
   ```bash
   # Download dari https://devcenter.heroku.com/articles/heroku-cli
   ```

2. **Login ke Heroku**
   ```bash
   heroku login
   ```

3. **Buat aplikasi Heroku**
   ```bash
   heroku create nama-aplikasi-anda
   ```

4. **Push ke Heroku**
   ```bash
   git add .
   git commit -m "Ready for deployment"
   git push heroku main
   ```

5. **Jalankan migrations di Heroku**
   ```bash
   heroku run php artisan migrate --force
   ```

### Opsi 2: VPS Manual

1. **Upload files ke server**
   ```bash
   # Upload semua files ke public_html atau folder aplikasi
   ```

2. **Setup environment**
   ```bash
   cp .env.example .env
   # Edit .env dengan konfigurasi production
   ```

3. **Install dependencies**
   ```bash
   composer install --no-dev --optimize-autoloader
   npm install && npm run build
   ```

4. **Setup database dan permissions**
   ```bash
   php artisan key:generate
   php artisan migrate --force
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

### Opsi 3: DigitalOcean App Platform

1. **Connect repository ke DigitalOcean**
2. **Konfigurasi environment variables**
3. **Deploy otomatis**

### Opsi 4: Railway

1. **Connect GitHub repository**
2. **Konfigurasi environment**
3. **Deploy otomatis**

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

**Dibuat dengan ❤️ menggunakan Laravel Framework**

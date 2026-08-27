<div align="center">

🖥️ TechFixAr

**Platform edukasi interaktif untuk perawatan, perbaikan, dan perakitan perangkat keras (hardware) komputer.**

![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=flat&logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=flat&logo=css3&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=flat&logo=javascript&logoColor=black)
![Status](https://img.shields.io/badge/status-in%20development-8b5cf6)
![License](https://img.shields.io/badge/license-MIT-blue)

</div>


📖 Tentang Proyek

**TechFixAr** adalah website panduan hardware komputer berbasis **HTML/CSS/JS statis** dengan tema **ungu (purple)**. Website ini menyediakan kumpulan panduan/tutorial — mulai dari instalasi komponen (mis. pemasangan processor), troubleshooting, hingga tips servis PC — dan dilengkapi panel admin sederhana untuk mengelola konten panduan.

> Cocok dijadikan starting point untuk membangun platform edukasi hardware, portal knowledge base, atau situs company profile jasa servis komputer.

## ✨ Fitur

| Fitur | Deskripsi |
|---|---|
| 🏠 **Landing Page** | Halaman utama berisi perkenalan platform, CTA "mulai simulasi", dan navigasi ke panduan. |
| 📚 **Pusat Panduan** | Daftar panduan, servis, dan troubleshooting PC yang bisa dijelajahi pengguna. |
| 📄 **Halaman Tutorial** | Contoh halaman detail tutorial (mis. *Panduan Memasang Processor AMD AM5*) dengan langkah step-by-step. |
| 🔐 **Panel Admin** | Login, registrasi, verifikasi admin, hingga kelola (create/edit/list) artikel & tutorial. |
| 🌗 **Dark / Light Mode** | Tema mengikuti preferensi sistem, bisa ditoggle manual dan tersimpan di `localStorage`. |
| 🎨 **Tema Konsisten** | Skema warna ungu yang seragam di seluruh halaman, mudah dikustomisasi lewat CSS variables. |

## 📁 Struktur Proyek

```
TechFixAr-Website-Purple-Theme/
├── pages/                          # Semua halaman HTML
│   ├── Landing.html                # Halaman utama (landing page)
│   ├── Panduan.html                # Pusat panduan, servis & troubleshooting
│   ├── Tutorial_panduan.html       # Contoh halaman detail tutorial
│   ├── login_admin.html            # Login admin
│   ├── Registerasi_admin.html      # Registrasi admin
│   ├── verifikasi_admin.html       # Verifikasi admin
│   ├── Kelola_panduan_admin.html   # Manajemen artikel & tutorial (admin)
│   ├── Panduan_baru_admin.html     # Tambah panduan baru (admin)
│   └── Edit_panduan_admin.html     # Edit panduan (admin)
├── assets/
│   ├── css/                        # Stylesheet per halaman + tema global
│   │   ├── globals.css             # Variabel warna, tipografi, gaya dasar
│   │   ├── navbar.css               # Gaya navigasi
│   │   ├── landing.css             # Gaya khusus landing page
│   │   ├── panduan.css             # Gaya khusus halaman panduan
│   │   ├── admin_theme.css         # Gaya dasar halaman admin
│   │   └── ...                     # CSS spesifik tiap halaman admin
│   ├── js/
│   │   └── theme.js                # Logic dark/light mode & tombol admin FAB
│   └── img/                        # Aset gambar
└── README.md
```

## 🚀 Cara Menjalankan

Proyek ini murni statis (HTML/CSS/JS), tidak perlu proses build maupun instalasi dependency.

```bash
# 1. Clone repository
git clone https://github.com/<username>/<repo-name>.git
cd <repo-name>

# 2. Jalankan local server (disarankan, agar path & fetch berjalan normal)
python3 -m http.server 8000
```

Lalu buka di browser:

```
http://localhost:8000/pages/Landing.html
```

Atau, cara paling simpel: buka langsung file `pages/Landing.html` lewat browser.

## 🎨 Kustomisasi

- **Warna & tipografi global** → `assets/css/globals.css`
- **Background hero landing page** (gradasi ungu) → class `.hero-bg` di `assets/css/landing.css`
- **Dark/Light mode** → diatur lewat atribut `data-theme` pada `<html>`, dikontrol oleh `assets/js/theme.js`

## 🛠️ Teknologi

- **HTML5**
- **CSS3** — custom properties (CSS variables) untuk theming
- **Vanilla JavaScript** — tanpa framework/library eksternal

## 🗺️ Roadmap

- [ ] Integrasi backend/database untuk form admin (login, registrasi, CRUD panduan)
- [ ] Sistem autentikasi & otorisasi admin
- [ ] Pencarian & filter panduan
- [ ] Optimasi gambar & performa halaman

## 🤝 Kontribusi

Kontribusi, issue, dan feature request sangat diterima!
Silakan buka [issue](../../issues) atau kirim [pull request](../../pulls).

1. Fork repository ini
2. Buat branch fitur baru (`git checkout -b fitur-baru`)
3. Commit perubahan (`git commit -m 'Menambahkan fitur baru'`)
4. Push ke branch (`git push origin fitur-baru`)
5. Buka Pull Request

## 📌 Catatan

Ini adalah template front-end statis — belum terhubung ke backend/database. Form-form admin (login, registrasi, kelola panduan, dll.) masih berupa tampilan (UI) dan perlu diintegrasikan dengan backend sesuai kebutuhan.

## 📄 Lisensi

Didistribusikan di bawah lisensi **MIT**. Lihat `LICENSE` untuk informasi lebih lanjut.

---

<div align="center">

Dibuat dengan 💜 oleh Tim TechFixAr

</div>

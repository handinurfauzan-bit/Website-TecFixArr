# Website-TecFixArr

Platform Edukasi interaktif untuk perawatan, perbaikan, dan perakitan perangkat keras.

## Struktur integrasi backend

| Folder | Isi |
|--------|-----|
| `assets/css/`, `assets/js/` | **Sumber asli** CSS & JS — edit di sini |
| `pages/*.html` | Template HTML halaman publik |
| `../techfixar-backend/app/` | Logic PHP, admin, database |

CSS/JS **tidak** disimpan di `public/assets/`. Backend menyajikannya lewat route `/assets/css/*` dan `/assets/js/*` langsung dari folder ini.

Jalankan `serve.bat` atau `composer dev` dari folder backend.
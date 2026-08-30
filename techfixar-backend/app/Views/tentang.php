<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta
      name="description"
      content="Tentang TechFixAr — platform edukasi hardware komputer. Kenali visi, misi, nilai, tim, dan teknologi yang kami gunakan."
    />
    <title>Tentang — TechFixAr</title>

    <link rel="stylesheet" href="<?= base_url('assets/css/globals.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/navbar.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/tentang.css') ?>" />

    <script src="<?= base_url('assets/js/theme.js') ?>"></script>
  </head>
  <body>
    <div class="halaman-tentang">

      
      <header class="navbar">
        <div class="navbar__inner">
          <a
            class="navbar__brand"
            href="<?= site_url('/') ?>"
            aria-label="TechFixAr, kembali ke beranda"
          >
            <img
              class="navbar__logo"
              src="<?= base_url('assets/css/img/Logo.jpg') ?>"
              alt=""
            />
            <span class="navbar__title">
              <span class="navbar__title-text">TechFix</span
              ><span class="navbar__title-accent">Ar</span>
            </span>
          </a>
          <nav class="navbar__nav" aria-label="Navigasi utama">
            <a class="navbar__link" href="<?= site_url('/') ?>">Beranda</a>
            <a class="navbar__link" href="<?= site_url('/panduan') ?>">Panduan &amp; Servis</a>
            <a class="navbar__link" href="<?= site_url('/komunitas') ?>">Komunitas</a>
            <a class="navbar__link navbar__link--active" href="<?= site_url('/tentang') ?>" aria-current="page">Tentang</a>
          </nav>
          <button
            class="navbar__theme-toggle"
            data-theme-toggle
            aria-label="Ganti ke mode terang"
            title="Mode Terang"
            type="button"
          >
            <svg class="icon-moon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="18" height="18" aria-hidden="true">
              <path d="M21 12.79A9 9 0 1 1 11.21 3a7 7 0 0 0 9.79 9.79z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <svg class="icon-sun" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="18" height="18" aria-hidden="true">
              <circle cx="12" cy="12" r="5" stroke="currentColor" stroke-width="2"/>
              <path d="M12 2v2M12 20v2M4.22 4.22l1.42 1.42M18.36 18.36l1.42 1.42M2 12h2M20 12h2M4.22 19.78l1.42-1.42M18.36 5.64l1.42-1.42" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            </svg>
          </button>
          <a class="navbar__cta" href="<?= site_url('/login') ?>">Masuk / Daftar</a>
        </div>
      </header>

      
      <main class="tentang-main">

        
        <section class="tentang-hero" aria-labelledby="tentang-title">
          
          <div class="tentang-hero__copy">
            <div class="tentang-hero__badge" aria-hidden="true">
              <span class="tentang-hero__badge-dot"></span>
              TENTANG KAMI
            </div>
            <h1 class="tentang-hero__title" id="tentang-title">
              Panduan Hardware,<br />
              <span>Dibuat dengan Hati</span>
            </h1>
            <p class="tentang-hero__desc">
              TechFixAr lahir dari semangat berbagi ilmu. Kami percaya siapa pun
              bisa belajar merakit, memperbaiki, dan merawat perangkat keras
              komputer — asalkan ada panduan yang tepat, jelas, dan gratis.
            </p>
            <div class="tentang-hero__actions">
              <a class="btn-primary" href="<?= site_url('/panduan') ?>">
                <svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" width="15" height="15" aria-hidden="true">
                  <path d="M4 6h8M4 9h6M4 12h4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                  <rect x="1.5" y="2" width="13" height="12" rx="2" stroke="currentColor" stroke-width="1.5"/>
                </svg>
                Lihat Panduan
              </a>
              <a class="btn-outline" href="<?= site_url('/komunitas') ?>">
                Bergabung Komunitas
                <svg viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg" width="13" height="13" aria-hidden="true">
                  <path d="M3 7H11M8 4L11 7L8 10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </a>
            </div>
          </div>

          
          <div class="tentang-hero__visual" aria-hidden="true">
            <div class="tentang-hero__card">
              <div class="tentang-hero__card-logo">
                <img src="<?= base_url('assets/css/img/Logo.jpg') ?>" alt="Logo TechFixAr" />
              </div>
              <p class="tentang-hero__card-name">
                TechFix<span class="accent">Ar</span>
              </p>
              <p class="tentang-hero__card-tagline">
                Platform edukasi hardware komputer — panduan perakitan, servis,
                dan troubleshooting gratis untuk semua.
              </p>
              <div class="tentang-hero__card-stats">
                <div class="tentang-hero__card-stat">
                  <div class="tentang-hero__card-stat-val">142+</div>
                  <div class="tentang-hero__card-stat-label">Panduan</div>
                </div>
                <div class="tentang-hero__card-stat">
                  <div class="tentang-hero__card-stat-val">4.8K+</div>
                  <div class="tentang-hero__card-stat-label">Pengguna</div>
                </div>
                <div class="tentang-hero__card-stat">
                  <div class="tentang-hero__card-stat-val">3</div>
                  <div class="tentang-hero__card-stat-label">Kategori</div>
                </div>
                <div class="tentang-hero__card-stat">
                  <div class="tentang-hero__card-stat-val">100%</div>
                  <div class="tentang-hero__card-stat-label">Gratis</div>
                </div>
              </div>
            </div>
          </div>
        </section>

        
        <section class="tentang-section tentang-section--bordered" aria-labelledby="vm-title">
          <div class="tentang-section__header">
            <div class="section-pill" aria-hidden="true">VISI &amp; MISI</div>
            <h2 class="tentang-section__title" id="vm-title">Arah dan Tujuan Kami</h2>
            <p class="tentang-section__subtitle">
              Setiap langkah yang kami ambil diarahkan oleh visi dan misi yang
              jelas untuk dunia edukasi hardware Indonesia.
            </p>
          </div>
          <div class="tentang-vm-grid">

            
            <div class="tentang-vm-card">
              <div class="tentang-vm-card__icon" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24" height="24">
                  <circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="2"/>
                  <path d="M2 12C2 12 5.5 5 12 5s10 7 10 7-3.5 7-10 7S2 12 2 12z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </div>
              <div class="tentang-vm-card__label">VISI</div>
              <h3 class="tentang-vm-card__title">Menjadi Referensi Hardware Terpercaya di Indonesia</h3>
              <p class="tentang-vm-card__text">
                Kami ingin menjadi platform panduan hardware nomor satu yang
                dipercaya oleh pelajar, teknisi, dan penggemar komputer di
                seluruh Indonesia — dengan konten berkualitas tinggi, akurat,
                dan selalu diperbarui mengikuti perkembangan teknologi.
              </p>
            </div>

            
            <div class="tentang-vm-card">
              <div class="tentang-vm-card__icon" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24" height="24">
                  <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </div>
              <div class="tentang-vm-card__label">MISI</div>
              <h3 class="tentang-vm-card__title">Hadirkan Edukasi Hardware yang Mudah dan Gratis</h3>
              <p class="tentang-vm-card__text">
                Menyajikan panduan step-by-step yang mudah dipahami oleh semua
                kalangan, mulai dari pemula hingga teknisi profesional. Semua
                panduan kami tersedia gratis, lengkap dengan gambar ilustrasi
                dan tips praktis dari komunitas.
              </p>
            </div>

          </div>
        </section>

        
        <section class="tentang-section tentang-section--bordered" aria-labelledby="nilai-title">
          <div class="tentang-section__header">
            <div class="section-pill" aria-hidden="true">NILAI KAMI</div>
            <h2 class="tentang-section__title" id="nilai-title">Yang Kami Pegang Teguh</h2>
            <p class="tentang-section__subtitle">
              Prinsip-prinsip ini yang membentuk cara kami bekerja dan melayani
              komunitas TechFixAr setiap harinya.
            </p>
          </div>
          <div class="tentang-nilai-grid">

            <div class="tentang-nilai-card">
              <div class="tentang-nilai-card__icon tentang-nilai-card__icon--purple" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="22" height="22">
                  <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </div>
              <h3 class="tentang-nilai-card__title">Akurat &amp; Terpercaya</h3>
              <p class="tentang-nilai-card__desc">
                Setiap panduan diverifikasi oleh teknisi berpengalaman sebelum
                dipublikasikan.
              </p>
            </div>

            <div class="tentang-nilai-card">
              <div class="tentang-nilai-card__icon tentang-nilai-card__icon--green" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="22" height="22">
                  <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  <circle cx="9" cy="7" r="4" stroke="currentColor" stroke-width="2"/>
                  <path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </div>
              <h3 class="tentang-nilai-card__title">Komunitas Pertama</h3>
              <p class="tentang-nilai-card__desc">
                Membangun ekosistem di mana pengguna saling berbagi dan
                membantu satu sama lain.
              </p>
            </div>

            <div class="tentang-nilai-card">
              <div class="tentang-nilai-card__icon tentang-nilai-card__icon--blue" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="22" height="22">
                  <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                  <path d="M2 12h20M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10A15.3 15.3 0 0 1 12 2z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </div>
              <h3 class="tentang-nilai-card__title">Terbuka &amp; Gratis</h3>
              <p class="tentang-nilai-card__desc">
                Semua panduan dapat diakses gratis tanpa perlu registrasi — ilmu
                tidak boleh dibatasi tembok berbayar.
              </p>
            </div>

            <div class="tentang-nilai-card">
              <div class="tentang-nilai-card__icon tentang-nilai-card__icon--orange" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="22" height="22">
                  <path d="M13 2L4.5 13.5H12L11 22L19.5 10.5H12L13 2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </div>
              <h3 class="tentang-nilai-card__title">Selalu Diperbarui</h3>
              <p class="tentang-nilai-card__desc">
                Konten kami terus diperbarui mengikuti teknologi hardware
                terbaru agar tetap relevan dan akurat.
              </p>
            </div>

            <div class="tentang-nilai-card">
              <div class="tentang-nilai-card__icon tentang-nilai-card__icon--red" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="22" height="22">
                  <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </div>
              <h3 class="tentang-nilai-card__title">Dibuat dengan Cinta</h3>
              <p class="tentang-nilai-card__desc">
                TechFixAr dibangun oleh para penggemar hardware yang benar-benar
                peduli dengan kualitas panduan.
              </p>
            </div>

            <div class="tentang-nilai-card">
              <div class="tentang-nilai-card__icon tentang-nilai-card__icon--teal" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="22" height="22">
                  <polyline points="22 12 18 12 15 21 9 3 6 12 2 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </div>
              <h3 class="tentang-nilai-card__title">Praktis &amp; Terstruktur</h3>
              <p class="tentang-nilai-card__desc">
                Panduan disajikan step-by-step dengan bahasa sederhana agar
                mudah diikuti oleh siapa pun.
              </p>
            </div>

          </div>
        </section>

        
        <section class="tentang-section tentang-section--bordered" aria-labelledby="tim-title">
          <div class="tentang-section__header">
            <div class="section-pill" aria-hidden="true">TIM KAMI</div>
            <h2 class="tentang-section__title" id="tim-title">Orang-orang di Balik TechFixAr</h2>
            <p class="tentang-section__subtitle">
              Tim kecil yang bersemangat — penggemar hardware, pengembang, dan
              penulis konten yang berdedikasi.
            </p>
          </div>
          <div class="tentang-tim-grid">

            <div class="tentang-tim-card">
              <div class="tentang-tim-card__avatar tentang-tim-card__avatar--a" aria-hidden="true">H</div>
              <p class="tentang-tim-card__name">Handi Nurfauzan</p>
              <p class="tentang-tim-card__role">Lead Developer</p>
              <p class="tentang-tim-card__bio">
                Pengembang utama platform TechFixAr. Ahli di bidang frontend dan
                arsitektur sistem.
              </p>
            </div>

            <div class="tentang-tim-card">
              <div class="tentang-tim-card__avatar tentang-tim-card__avatar--b" aria-hidden="true">P</div>
              <p class="tentang-tim-card__name">Pramudya Arifudin</p>
              <p class="tentang-tim-card__role">Backend Developer</p>
              <p class="tentang-tim-card__bio">
                Pengembang backend platform TechFixAr. Bertanggung jawab atas
                API, database, dan logika server.
              </p>
            </div>

            <div class="tentang-tim-card">
              <div class="tentang-tim-card__avatar tentang-tim-card__avatar--c" aria-hidden="true">I</div>
              <p class="tentang-tim-card__name">Ibel Magnov Kurniawan</p>
              <p class="tentang-tim-card__role">Backend Developer</p>
              <p class="tentang-tim-card__bio">
                Pengembang backend yang fokus pada keamanan sistem, autentikasi,
                dan integrasi layanan.
              </p>
            </div>

          </div>
        </section>
        <section class="tentang-section tentang-section--bordered" aria-labelledby="tech-title">
          <div class="tentang-section__header">
            <div class="section-pill" aria-hidden="true">TEKNOLOGI</div>
            <h2 class="tentang-section__title" id="tech-title">Dibangun dengan Teknologi Modern</h2>
            <p class="tentang-section__subtitle">
              TechFixAr dibangun menggunakan teknologi web modern yang ringan,
              cepat, dan dapat diandalkan.
            </p>
          </div>
          <div class="tentang-tech-list" role="list" aria-label="Daftar teknologi yang digunakan">
            <div class="tentang-tech-badge" role="listitem">
              <span class="tentang-tech-badge__dot tentang-tech-badge__dot--html"></span>
              HTML5
            </div>
            <div class="tentang-tech-badge" role="listitem">
              <span class="tentang-tech-badge__dot tentang-tech-badge__dot--css"></span>
              CSS3
            </div>
            <div class="tentang-tech-badge" role="listitem">
              <span class="tentang-tech-badge__dot tentang-tech-badge__dot--js"></span>
              JavaScript
            </div>
            <div class="tentang-tech-badge" role="listitem">
              <span class="tentang-tech-badge__dot tentang-tech-badge__dot--php"></span>
              PHP
            </div>
            <div class="tentang-tech-badge" role="listitem">
              <span class="tentang-tech-badge__dot tentang-tech-badge__dot--ci"></span>
              CodeIgniter 4
            </div>
            <div class="tentang-tech-badge" role="listitem">
              <span class="tentang-tech-badge__dot tentang-tech-badge__dot--mysql"></span>
              MySQL
            </div>
          </div>
        </section>
        <section class="tentang-cta" aria-labelledby="cta-title">
          <div class="tentang-cta__inner">
            <h2 class="tentang-cta__title" id="cta-title">
              Siap Mulai Belajar<br />
              <span>Bersama TechFixAr?</span>
            </h2>
            <p class="tentang-cta__desc">
              Jelajahi ratusan panduan hardware gratis atau bergabung dengan
              komunitas untuk berdiskusi dan berbagi pengalaman.
            </p>
            <div class="tentang-cta__actions">
              <a class="btn-primary" href="<?= site_url('/panduan') ?>">
                <svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" width="15" height="15" aria-hidden="true">
                  <path d="M4 6h8M4 9h6M4 12h4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                  <rect x="1.5" y="2" width="13" height="12" rx="2" stroke="currentColor" stroke-width="1.5"/>
                </svg>
                Mulai Belajar
              </a>
              <a class="btn-outline" href="<?= site_url('/komunitas') ?>">
                Gabung Komunitas
                <svg viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg" width="13" height="13" aria-hidden="true">
                  <path d="M3 7H11M8 4L11 7L8 10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </a>
            </div>
          </div>
        </section>
      </main>
      <footer class="tentang-footer">
        <a class="tentang-footer__logo" href="<?= site_url('/') ?>" aria-label="TechFixAr, kembali ke beranda">
          <img class="tentang-footer__logo-img" src="<?= base_url('assets/css/img/Logo.jpg') ?>" alt="" />
          <span class="tentang-footer__logo-name">
            TechFix<span class="accent">Ar</span>
          </span>
        </a>
        <nav class="tentang-footer__nav" aria-label="Navigasi footer">
          <a class="tentang-footer__link" href="<?= site_url('/') ?>">Beranda</a>
          <a class="tentang-footer__link" href="<?= site_url('/panduan') ?>">Panduan</a>
          <a class="tentang-footer__link" href="<?= site_url('/komunitas') ?>">Komunitas</a>
          <a class="tentang-footer__link" href="<?= site_url('/tentang') ?>">Tentang</a>
        </nav>
        <small class="tentang-footer__copy">© 2026 TechFixAr</small>
      </footer>

      
            <?php if (session()->get('logged_in')): ?>
      <a class="admin-fab" href="<?= site_url('/admin/panduan') ?>" aria-label="Masuk ke area admin" title="Admin Panel">
        <span class="admin-fab__icon" aria-hidden="true">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
        </span>
        <span class="admin-fab__label">Admin</span>
      </a>
      <?php endif ?>

    </div>
    <script src="<?= base_url('assets/js/theme.js') ?>"></script>
  </body>
</html>

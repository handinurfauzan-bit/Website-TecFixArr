<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="TechFixAr menyediakan panduan perakitan hardware, servis laptop, troubleshooting, dan perawatan perangkat keras secara lengkap dan interaktif." />
    <title>TechFixAr — Panduan Hardware Terpercaya</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/globals.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/navbar.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/landing.css') ?>" />
    <script src="<?= base_url('assets/js/theme.js') ?>"></script>
  </head>
  <body>
    <div class="responsive-landing">
      <div class="app" aria-hidden="true"><div class="placeholder-for"></div><div class="div"></div></div>
      <div class="grid-bg" aria-hidden="true"></div>

      <!-- HEADER -->
      <header class="navbar">
        <div class="navbar__inner">
          <a class="navbar__brand" href="#beranda" aria-label="TechFixAr, kembali ke beranda">
            <img class="navbar__logo" src="<?= base_url('assets/css/img/Logo.jpg') ?>" alt="" />
            <span class="navbar__title">
              <span class="navbar__title-text">TechFix</span><span class="navbar__title-accent">Ar</span>
            </span>
          </a>
          <nav class="navbar__nav" aria-label="Navigasi utama">
            <a class="navbar__link navbar__link--active" href="#beranda" aria-current="page">Beranda</a>
            <a class="navbar__link" href="<?= site_url('/panduan') ?>">Panduan &amp; Servis</a>
          </nav>
          <button class="navbar__theme-toggle" data-theme-toggle aria-label="Ganti tema" type="button">
            <svg class="icon-moon" viewBox="0 0 24 24" fill="none" width="18" height="18"><path d="M21 12.79A9 9 0 1 1 11.21 3a7 7 0 0 0 9.79 9.79z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            <svg class="icon-sun"  viewBox="0 0 24 24" fill="none" width="18" height="18"><circle cx="12" cy="12" r="5" stroke="currentColor" stroke-width="2"/><path d="M12 2v2M12 20v2M4.22 4.22l1.42 1.42M18.36 18.36l1.42 1.42M2 12h2M20 12h2M4.22 19.78l1.42-1.42M18.36 5.64l1.42-1.42" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
          </button>
          <a class="navbar__cta" href="<?= site_url('/login') ?>">Masuk / Daftar</a>
        </div>
      </header>

      <!-- MAIN -->
      <main class="landing-page" id="beranda">

        <!-- Hero -->
        <section class="section" aria-labelledby="hero-title">
          <div class="container"><div class="container-2"><span class="dot" aria-hidden="true"></span><div class="text"><span class="text-wrapper">PLATFORM PANDUAN HARDWARE TERPERCAYA</span></div></div></div>
          <div class="heading">
            <h1 class="simulasi-PC-anti" id="hero-title">
              <span class="span">Pusat Panduan Perakitan &amp;<br /></span>
              <span class="text-wrapper-2">Servis Hardware Mandiri</span>
            </h1>
          </div>
          <div class="paragraph-margin">
            <p class="uji-kecocokan">Pelajari cara merakit, memperbaiki, dan merawat perangkat keras komputer dengan panduan lengkap, interaktif, dan mudah dipahami.</p>
          </div>
          <div class="container-3">
            <a class="button" href="<?= site_url('/panduan') ?>">
              <span class="icon-simulate" aria-hidden="true"><svg viewBox="0 0 16 16" fill="none" width="16" height="16"><path d="M3 4h10M3 7h10M3 10h6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg></span>
              <span class="text-wrapper-3">Jelajahi Panduan</span>
            </a>
            <a class="button-2" href="#fitur">
              <span class="text-wrapper-4">Lihat Fitur</span>
              <span class="icon" aria-hidden="true"><svg viewBox="0 0 14 14" fill="none" width="14" height="14"><path d="M3 7H11M8 4L11 7L8 10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
            </a>
          </div>
        </section>

        <!-- Fitur -->
        <section class="section-2" id="fitur" aria-labelledby="features-title">
          <div class="container-6">
            <div class="pill-wrapper"><div class="pill"><span class="text-wrapper-5">FITUR UTAMA</span></div></div>
            <div class="div-wrapper"><h2 class="p" id="features-title">Semua yang Kamu Butuhkan, di Satu Tempat</h2></div>
          </div>
          <div class="container-margin">
            <div class="container-7">
              <article class="container-8">
                <div class="container-10">
                  <div class="container-11" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" width="26" height="26"><path d="M4 6h16M4 10h16M4 14h10M4 18h7" stroke="#10b981" stroke-width="1.8" stroke-linecap="round"/></svg></div>
                  <div class="text-2"><span class="text-wrapper-7">PANDUAN</span></div>
                </div>
                <div class="container-12">
                  <div class="heading-2"><h3 class="text-wrapper-8">Panduan Perakitan Step-by-Step</h3></div>
                  <div class="paragraph-margin-2"><p class="text-wrapper-9">Rakit PC dari nol dengan panduan bergambar langkah demi langkah. Cocok untuk pemula maupun yang berpengalaman.</p></div>
                </div>
                <a class="container-13" href="<?= site_url('/panduan?kategori=Assembly') ?>"><span class="text-wrapper-10">Buka Fitur</span></a>
              </article>
              <article class="container-14">
                <div class="container-10">
                  <div class="container-16" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" width="26" height="26"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z" stroke="#3b82f6" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
                  <div class="text-4"><span class="text-wrapper-11">TROUBLESHOOTING</span></div>
                </div>
                <div class="container-12">
                  <div class="heading-2"><h3 class="text-wrapper-8">Panduan &amp; Troubleshooting</h3></div>
                  <div class="solusi-teknis-wrapper"><p class="text-wrapper-9">Solusi teknis penanganan error PC/Laptop serta tutorial pasang hardware step-by-step.</p></div>
                </div>
                <a class="container-17" href="<?= site_url('/panduan?kategori=Troubleshooting') ?>"><span class="text-wrapper-12">Buka Fitur</span></a>
              </article>
              <article class="container-18">
                <div class="container-10">
                  <div class="container-20" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" width="26" height="26"><rect x="2" y="3" width="20" height="14" rx="2" stroke="#8b5cf6" stroke-width="1.8"/><path d="M8 21h8M12 17v4" stroke="#8b5cf6" stroke-width="1.8" stroke-linecap="round"/></svg></div>
                  <div class="text-5"><span class="text-wrapper-13">TIPS & TRIK</span></div>
                </div>
                <div class="container-12">
                  <div class="heading-2"><h3 class="text-wrapper-8">Tips &amp; Perawatan Mandiri</h3></div>
                  <div class="paragraph-margin-2"><p class="text-wrapper-9">Tips maintenance berkala, ganti thermal paste, dan upgrade komponen laptop.</p></div>
                </div>
                <a class="container-21" href="<?= site_url('/panduan?kategori=Tips+%26+Trik') ?>"><span class="text-wrapper-14">Buka Fitur</span></a>
              </article>
            </div>
          </div>
        </section>

        <!-- FOOTER -->
        <footer class="footer">
          <div class="logo">
            <a class="button-6" href="#beranda" aria-label="TechFixAr, kembali ke beranda">
              <img class="techfixar-logo" src="<?= base_url('assets/css/img/Logo.jpg') ?>" alt="" />
              <p class="tech-fix-ar"><span class="text-wrapper-34">TechFix</span><span class="text-wrapper-35">Ar</span></p>
            </a>
          </div>
          <nav class="container-42" aria-label="Navigasi footer">
            <a class="button-7" href="#tentang"><span class="text-wrapper-36">Tentang</span></a>
            <a class="button-8" href="<?= site_url('/panduan') ?>"><span class="text-wrapper-37">Panduan</span></a>
            <a class="button-9" href="#komunitas"><span class="text-wrapper-38">Komunitas</span></a>
            <a class="button-10" href="#kontak"><span class="text-wrapper-39">Kontak</span></a>
          </nav>
          <div class="text-14"><small class="text-wrapper-40">© 2026 TechFixAr</small></div>
        </footer>
      </main>

      <!-- Admin FAB — muncul hanya jika sudah login -->
      <?php if (session()->get('logged_in')): ?>
      <a class="admin-fab" href="<?= site_url('/admin/panduan') ?>" aria-label="Masuk ke area admin" title="Admin Panel">
        <span class="admin-fab__icon" aria-hidden="true">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
        </span>
        <span class="admin-fab__label">Admin</span>
      </a>
      <?php endif ?>
    </div>
  </body>
</html>

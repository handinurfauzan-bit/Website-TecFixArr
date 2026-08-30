<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta
      name="description"
      content="Bergabung dengan komunitas TechFixAr — forum diskusi hardware, troubleshooting, perakitan PC, dan servis laptop bersama ribuan pengguna."
    />
    <title>Komunitas — TechFixAr</title>

    <link rel="stylesheet" href="<?= base_url('assets/css/globals.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/navbar.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/komunitas.css') ?>" />

    <script src="<?= base_url('assets/js/theme.js') ?>"></script>
  </head>
  <body>
    <div class="halaman-komunitas">

      
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
            <a class="navbar__link navbar__link--active" href="<?= site_url('/komunitas') ?>" aria-current="page">Komunitas</a>
            <a class="navbar__link" href="<?= site_url('/simulasi') ?>">Simulasi PC</a>
            <a class="navbar__link" href="<?= site_url('/tentang') ?>">Tentang</a>
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

      
      <main class="komunitas-main">

        
        <section class="komunitas-hero" aria-labelledby="komunitas-title">
          <div class="komunitas-hero__badge" aria-hidden="true">
            <span class="komunitas-hero__badge-dot"></span>
            KOMUNITAS TECHFIXAR
          </div>
          <h1 class="komunitas-hero__title" id="komunitas-title">
            Satu Tempat,<br />
            <span>Seribu Solusi Hardware</span>
          </h1>
          <p class="komunitas-hero__desc">
            Diskusi, berbagi pengalaman, dan tanya jawab seputar perakitan PC,
            servis laptop, dan troubleshooting hardware bersama komunitas
            TechFixAr.
          </p>
          <div class="komunitas-hero__actions">
            <a class="btn-primary" href="#diskusi">
              <svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" width="15" height="15" aria-hidden="true">
                <path d="M14 2H2a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h3l3 2 3-2h3a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/>
              </svg>
              Ikut Diskusi
            </a>
            <a class="btn-outline" href="#channels">
              Lihat Channel
              <svg viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg" width="13" height="13" aria-hidden="true">
                <path d="M3 7H11M8 4L11 7L8 10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </a>
          </div>
        </section>

        
        <div class="komunitas-stats" role="list" aria-label="Statistik komunitas">
          <div class="komunitas-stat" role="listitem">
            <div class="komunitas-stat__value">4.8K+</div>
            <div class="komunitas-stat__label">Anggota</div>
          </div>
          <div class="komunitas-stat" role="listitem">
            <div class="komunitas-stat__value">1.2K+</div>
            <div class="komunitas-stat__label">Diskusi</div>
          </div>
          <div class="komunitas-stat" role="listitem">
            <div class="komunitas-stat__value">320+</div>
            <div class="komunitas-stat__label">Solusi Terjawab</div>
          </div>
          <div class="komunitas-stat" role="listitem">
            <div class="komunitas-stat__value">18</div>
            <div class="komunitas-stat__label">Channel Aktif</div>
          </div>
        </div>

        
        <section class="komunitas-section" id="channels" aria-labelledby="channels-title">
          <div class="komunitas-section__header">
            <div class="section-pill" aria-hidden="true">CHANNELS</div>
            <h2 class="komunitas-section__title" id="channels-title">Pilih Topik yang Kamu Minati</h2>
            <p class="komunitas-section__subtitle">
              Bergabung di channel sesuai keahlian dan minatmu — dari pemula
              hingga teknisi berpengalaman.
            </p>
          </div>
          <div class="komunitas-channels">

            
            <article class="channel-card" tabindex="0" role="button" aria-label="Channel Perakitan PC">
              <div class="channel-card__icon channel-card__icon--blue" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="22" height="22">
                  <rect x="2" y="3" width="20" height="14" rx="2" stroke="currentColor" stroke-width="1.8"/>
                  <path d="M8 21h8M12 17v4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                  <rect x="6" y="7" width="4" height="3" rx="0.5" stroke="currentColor" stroke-width="1.4"/>
                  <path d="M14 8h4M14 11h2" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/>
                </svg>
              </div>
              <h3 class="channel-card__title">Perakitan PC</h3>
              <p class="channel-card__desc">
                Diskusi tentang pemilihan komponen, kompatibilitas motherboard,
                tips build gaming PC dan workstation.
              </p>
              <div class="channel-card__meta">
                <span class="channel-card__count">
                  <svg viewBox="0 0 14 14" fill="none" width="12" height="12"><circle cx="7" cy="5" r="2.5" stroke="currentColor" stroke-width="1.3"/><path d="M2 12c0-2.76 2.24-5 5-5s5 2.24 5 5" stroke="currentColor" stroke-width="1.3" stroke-linecap="round"/></svg>
                  1.4K anggota
                </span>
                <span class="channel-card__count">
                  <svg viewBox="0 0 14 14" fill="none" width="12" height="12"><path d="M12 2H2a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h2.5l2.5 2 2.5-2H12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1z" stroke="currentColor" stroke-width="1.3" stroke-linejoin="round"/></svg>
                  342 diskusi
                </span>
              </div>
            </article>

            
            <article class="channel-card" tabindex="0" role="button" aria-label="Channel Servis Laptop">
              <div class="channel-card__icon channel-card__icon--orange" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="22" height="22">
                  <rect x="3" y="4" width="18" height="13" rx="2" stroke="currentColor" stroke-width="1.8"/>
                  <path d="M1 20h22" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                  <circle cx="12" cy="18.5" r="0.8" fill="currentColor"/>
                </svg>
              </div>
              <h3 class="channel-card__title">Servis Laptop</h3>
              <p class="channel-card__desc">
                Diagnosa kerusakan layar, baterai drop, keyboard, mainboard —
                dan cara perbaikannya secara mandiri.
              </p>
              <div class="channel-card__meta">
                <span class="channel-card__count">
                  <svg viewBox="0 0 14 14" fill="none" width="12" height="12"><circle cx="7" cy="5" r="2.5" stroke="currentColor" stroke-width="1.3"/><path d="M2 12c0-2.76 2.24-5 5-5s5 2.24 5 5" stroke="currentColor" stroke-width="1.3" stroke-linecap="round"/></svg>
                  2.1K anggota
                </span>
                <span class="channel-card__count">
                  <svg viewBox="0 0 14 14" fill="none" width="12" height="12"><path d="M12 2H2a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h2.5l2.5 2 2.5-2H12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1z" stroke="currentColor" stroke-width="1.3" stroke-linejoin="round"/></svg>
                  519 diskusi
                </span>
              </div>
            </article>

            
            <article class="channel-card" tabindex="0" role="button" aria-label="Channel Troubleshooting">
              <div class="channel-card__icon channel-card__icon--purple" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="22" height="22">
                  <path d="M13 2L4.5 13.5H12L11 22L19.5 10.5H12L13 2Z" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </div>
              <h3 class="channel-card__title">Troubleshooting</h3>
              <p class="channel-card__desc">
                Blue screen, freeze, POST error, overclock gagal — temukan
                solusi cepat dari komunitas berpengalaman.
              </p>
              <div class="channel-card__meta">
                <span class="channel-card__count">
                  <svg viewBox="0 0 14 14" fill="none" width="12" height="12"><circle cx="7" cy="5" r="2.5" stroke="currentColor" stroke-width="1.3"/><path d="M2 12c0-2.76 2.24-5 5-5s5 2.24 5 5" stroke="currentColor" stroke-width="1.3" stroke-linecap="round"/></svg>
                  1.8K anggota
                </span>
                <span class="channel-card__count">
                  <svg viewBox="0 0 14 14" fill="none" width="12" height="12"><path d="M12 2H2a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h2.5l2.5 2 2.5-2H12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1z" stroke="currentColor" stroke-width="1.3" stroke-linejoin="round"/></svg>
                  287 diskusi
                </span>
              </div>
            </article>

            
            <article class="channel-card" tabindex="0" role="button" aria-label="Channel Tips & Trik">
              <div class="channel-card__icon channel-card__icon--green" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="22" height="22">
                  <path d="M12 2l2.4 7.4H22l-6.2 4.5 2.4 7.4L12 17l-6.2 4.4 2.4-7.4L2 9.4h7.6L12 2z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/>
                </svg>
              </div>
              <h3 class="channel-card__title">Tips &amp; Trik</h3>
              <p class="channel-card__desc">
                Cara optimasi performa, overclocking aman, manajemen kabel
                rapi, dan tips hemat listrik PC.
              </p>
              <div class="channel-card__meta">
                <span class="channel-card__count">
                  <svg viewBox="0 0 14 14" fill="none" width="12" height="12"><circle cx="7" cy="5" r="2.5" stroke="currentColor" stroke-width="1.3"/><path d="M2 12c0-2.76 2.24-5 5-5s5 2.24 5 5" stroke="currentColor" stroke-width="1.3" stroke-linecap="round"/></svg>
                  980 anggota
                </span>
                <span class="channel-card__count">
                  <svg viewBox="0 0 14 14" fill="none" width="12" height="12"><path d="M12 2H2a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h2.5l2.5 2 2.5-2H12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1z" stroke="currentColor" stroke-width="1.3" stroke-linejoin="round"/></svg>
                  156 diskusi
                </span>
              </div>
            </article>

            
            <article class="channel-card" tabindex="0" role="button" aria-label="Channel Upgrade & Kompatibilitas">
              <div class="channel-card__icon channel-card__icon--blue" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="22" height="22">
                  <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </div>
              <h3 class="channel-card__title">Upgrade &amp; Kompatibilitas</h3>
              <p class="channel-card__desc">
                Mau upgrade RAM, SSD, atau GPU? Tanya soal kompatibilitas dan
                rekomendasi komponen terbaik di sini.
              </p>
              <div class="channel-card__meta">
                <span class="channel-card__count">
                  <svg viewBox="0 0 14 14" fill="none" width="12" height="12"><circle cx="7" cy="5" r="2.5" stroke="currentColor" stroke-width="1.3"/><path d="M2 12c0-2.76 2.24-5 5-5s5 2.24 5 5" stroke="currentColor" stroke-width="1.3" stroke-linecap="round"/></svg>
                  1.1K anggota
                </span>
                <span class="channel-card__count">
                  <svg viewBox="0 0 14 14" fill="none" width="12" height="12"><path d="M12 2H2a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h2.5l2.5 2 2.5-2H12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1z" stroke="currentColor" stroke-width="1.3" stroke-linejoin="round"/></svg>
                  203 diskusi
                </span>
              </div>
            </article>

            
            <article class="channel-card" tabindex="0" role="button" aria-label="Channel Showcase & Build">
              <div class="channel-card__icon channel-card__icon--purple" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="22" height="22">
                  <rect x="3" y="3" width="7" height="7" rx="1" stroke="currentColor" stroke-width="1.8"/>
                  <rect x="14" y="3" width="7" height="7" rx="1" stroke="currentColor" stroke-width="1.8"/>
                  <rect x="3" y="14" width="7" height="7" rx="1" stroke="currentColor" stroke-width="1.8"/>
                  <rect x="14" y="14" width="7" height="7" rx="1" stroke="currentColor" stroke-width="1.8"/>
                </svg>
              </div>
              <h3 class="channel-card__title">Showcase &amp; Build</h3>
              <p class="channel-card__desc">
                Pamer hasil rakitan PC-mu! Bagikan foto setup, spek, dan
                benchmark. Dapatkan feedback dari komunitas.
              </p>
              <div class="channel-card__meta">
                <span class="channel-card__count">
                  <svg viewBox="0 0 14 14" fill="none" width="12" height="12"><circle cx="7" cy="5" r="2.5" stroke="currentColor" stroke-width="1.3"/><path d="M2 12c0-2.76 2.24-5 5-5s5 2.24 5 5" stroke="currentColor" stroke-width="1.3" stroke-linecap="round"/></svg>
                  760 anggota
                </span>
                <span class="channel-card__count">
                  <svg viewBox="0 0 14 14" fill="none" width="12" height="12"><path d="M12 2H2a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h2.5l2.5 2 2.5-2H12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1z" stroke="currentColor" stroke-width="1.3" stroke-linejoin="round"/></svg>
                  98 diskusi
                </span>
              </div>
            </article>

          </div>
        </section>

        
        <section class="komunitas-section" id="diskusi" aria-labelledby="diskusi-title">
          <div class="komunitas-section__header">
            <div class="section-pill" aria-hidden="true">DISKUSI TERBARU</div>
            <h2 class="komunitas-section__title" id="diskusi-title">Percakapan Aktif</h2>
            <p class="komunitas-section__subtitle">
              Diskusi yang sedang ramai dibahas komunitas hari ini.
            </p>
          </div>
          <div class="diskusi-feed" role="list">

            
            <article class="diskusi-item" role="listitem" tabindex="0">
              <div class="diskusi-item__avatar diskusi-item__avatar--a" aria-hidden="true">R</div>
              <div class="diskusi-item__body">
                <h3 class="diskusi-item__title">
                  Ryzen 7 9800X3D vs Intel Core Ultra 9 285K — mana lebih worth buat video editing?
                </h3>
                <p class="diskusi-item__preview">
                  Lagi bingung milih antara dua prosesor ini buat workstation editing 4K. Budget sekitar 6-7 juta.
                  Kalau dari pengalaman teman-teman gimana, apakah perbedaannya signifikan?
                </p>
                <div class="diskusi-item__footer">
                  <span class="diskusi-item__author">RifkiHardware</span>
                  <span class="diskusi-item__time">2 jam lalu</span>
                  <span class="diskusi-item__tag diskusi-item__tag--perakitan">Perakitan</span>
                  <div class="diskusi-item__reactions" aria-label="Reaksi">
                    <button class="diskusi-item__reaction-btn" type="button" aria-label="12 balasan">
                      <svg viewBox="0 0 12 12" fill="none" width="11" height="11"><path d="M10 1H2a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h2l2 2 2-2h2a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z" stroke="currentColor" stroke-width="1.3" stroke-linejoin="round"/></svg>
                      12
                    </button>
                    <button class="diskusi-item__reaction-btn" type="button" aria-label="5 suka">
                      <svg viewBox="0 0 12 12" fill="none" width="11" height="11"><path d="M10.5 4.5H8L9 1.5c.1-.4-.1-.9-.5-1L7.5 1 5 5H1.5v6h8.5l1-4.5z" stroke="currentColor" stroke-width="1.3" stroke-linejoin="round"/></svg>
                      5
                    </button>
                  </div>
                </div>
              </div>
            </article>

            
            <article class="diskusi-item" role="listitem" tabindex="0">
              <div class="diskusi-item__avatar diskusi-item__avatar--b" aria-hidden="true">D</div>
              <div class="diskusi-item__body">
                <h3 class="diskusi-item__title">
                  Laptop ASUS mati total setelah kena air — langkah pertama apa?
                </h3>
                <p class="diskusi-item__preview">
                  Laptop ketumpahan kopi tadi pagi, langsung matiin tapi sekarang tidak mau nyala sama sekali.
                  Sudah coba charge juga tidak ada tanda-tanda. Harus dibawa ke servis atau bisa dicoba sendiri?
                </p>
                <div class="diskusi-item__footer">
                  <span class="diskusi-item__author">DimasTeknik</span>
                  <span class="diskusi-item__time">4 jam lalu</span>
                  <span class="diskusi-item__tag diskusi-item__tag--servis">Servis</span>
                  <div class="diskusi-item__reactions" aria-label="Reaksi">
                    <button class="diskusi-item__reaction-btn" type="button" aria-label="24 balasan">
                      <svg viewBox="0 0 12 12" fill="none" width="11" height="11"><path d="M10 1H2a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h2l2 2 2-2h2a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z" stroke="currentColor" stroke-width="1.3" stroke-linejoin="round"/></svg>
                      24
                    </button>
                    <button class="diskusi-item__reaction-btn" type="button" aria-label="9 suka">
                      <svg viewBox="0 0 12 12" fill="none" width="11" height="11"><path d="M10.5 4.5H8L9 1.5c.1-.4-.1-.9-.5-1L7.5 1 5 5H1.5v6h8.5l1-4.5z" stroke="currentColor" stroke-width="1.3" stroke-linejoin="round"/></svg>
                      9
                    </button>
                  </div>
                </div>
              </div>
            </article>

            
            <article class="diskusi-item" role="listitem" tabindex="0">
              <div class="diskusi-item__avatar diskusi-item__avatar--c" aria-hidden="true">S</div>
              <div class="diskusi-item__body">
                <h3 class="diskusi-item__title">
                  PC blue screen MEMORY_MANAGEMENT setiap kali render Blender, sudah coba apa aja?
                </h3>
                <p class="diskusi-item__preview">
                  Sudah coba memtest86, hasilnya pass semua. Sudah reinstall driver GPU, masih tetap crash.
                  RAM 32GB DDR5, GPU RTX 4070. Ada yang pernah ngalamin hal yang sama?
                </p>
                <div class="diskusi-item__footer">
                  <span class="diskusi-item__author">SandyDesain</span>
                  <span class="diskusi-item__time">6 jam lalu</span>
                  <span class="diskusi-item__tag diskusi-item__tag--troubleshoot">Troubleshoot</span>
                  <div class="diskusi-item__reactions" aria-label="Reaksi">
                    <button class="diskusi-item__reaction-btn" type="button" aria-label="18 balasan">
                      <svg viewBox="0 0 12 12" fill="none" width="11" height="11"><path d="M10 1H2a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h2l2 2 2-2h2a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z" stroke="currentColor" stroke-width="1.3" stroke-linejoin="round"/></svg>
                      18
                    </button>
                    <button class="diskusi-item__reaction-btn" type="button" aria-label="7 suka">
                      <svg viewBox="0 0 12 12" fill="none" width="11" height="11"><path d="M10.5 4.5H8L9 1.5c.1-.4-.1-.9-.5-1L7.5 1 5 5H1.5v6h8.5l1-4.5z" stroke="currentColor" stroke-width="1.3" stroke-linejoin="round"/></svg>
                      7
                    </button>
                  </div>
                </div>
              </div>
            </article>

            
            <article class="diskusi-item" role="listitem" tabindex="0">
              <div class="diskusi-item__avatar diskusi-item__avatar--d" aria-hidden="true">A</div>
              <div class="diskusi-item__body">
                <h3 class="diskusi-item__title">
                  Share: Berhasil pasang SSD NVMe Gen4 di laptop lama, speednya gila!
                </h3>
                <p class="diskusi-item__preview">
                  Laptop Lenovo IdeaPad 2019 ternyata support NVMe Gen4 dengan BIOS update terbaru.
                  Sequential read naik dari 500MB/s ke 6200MB/s. Lumayan buat perpanjang umur laptop ya...
                </p>
                <div class="diskusi-item__footer">
                  <span class="diskusi-item__author">AgusModder</span>
                  <span class="diskusi-item__time">8 jam lalu</span>
                  <span class="diskusi-item__tag diskusi-item__tag--panduan">Panduan</span>
                  <div class="diskusi-item__reactions" aria-label="Reaksi">
                    <button class="diskusi-item__reaction-btn" type="button" aria-label="31 balasan">
                      <svg viewBox="0 0 12 12" fill="none" width="11" height="11"><path d="M10 1H2a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h2l2 2 2-2h2a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z" stroke="currentColor" stroke-width="1.3" stroke-linejoin="round"/></svg>
                      31
                    </button>
                    <button class="diskusi-item__reaction-btn" type="button" aria-label="22 suka">
                      <svg viewBox="0 0 12 12" fill="none" width="11" height="11"><path d="M10.5 4.5H8L9 1.5c.1-.4-.1-.9-.5-1L7.5 1 5 5H1.5v6h8.5l1-4.5z" stroke="currentColor" stroke-width="1.3" stroke-linejoin="round"/></svg>
                      22
                    </button>
                  </div>
                </div>
              </div>
            </article>

            
            <article class="diskusi-item" role="listitem" tabindex="0">
              <div class="diskusi-item__avatar diskusi-item__avatar--e" aria-hidden="true">F</div>
              <div class="diskusi-item__body">
                <h3 class="diskusi-item__title">
                  Ganti thermal paste Acer Nitro 5 — suhu turun 18°C, worth it banget!
                </h3>
                <p class="diskusi-item__preview">
                  Setelah 3 tahun pakai, suhu CPU saat gaming bisa tembus 98°C. Setelah bongkar dan ganti
                  thermal paste dengan Thermal Grizzly Kryonaut, suhu max sekarang cuma 80°C.
                </p>
                <div class="diskusi-item__footer">
                  <span class="diskusi-item__author">FarhanServis</span>
                  <span class="diskusi-item__time">1 hari lalu</span>
                  <span class="diskusi-item__tag diskusi-item__tag--servis">Servis</span>
                  <div class="diskusi-item__reactions" aria-label="Reaksi">
                    <button class="diskusi-item__reaction-btn" type="button" aria-label="15 balasan">
                      <svg viewBox="0 0 12 12" fill="none" width="11" height="11"><path d="M10 1H2a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h2l2 2 2-2h2a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z" stroke="currentColor" stroke-width="1.3" stroke-linejoin="round"/></svg>
                      15
                    </button>
                    <button class="diskusi-item__reaction-btn" type="button" aria-label="18 suka">
                      <svg viewBox="0 0 12 12" fill="none" width="11" height="11"><path d="M10.5 4.5H8L9 1.5c.1-.4-.1-.9-.5-1L7.5 1 5 5H1.5v6h8.5l1-4.5z" stroke="currentColor" stroke-width="1.3" stroke-linejoin="round"/></svg>
                      18
                    </button>
                  </div>
                </div>
              </div>
            </article>

          </div>
        </section>

        
        <section class="komunitas-cta" aria-labelledby="cta-title">
          <div class="komunitas-cta__inner">
            <h2 class="komunitas-cta__title" id="cta-title">
              Siap Bergabung dengan<br />
              <span>Komunitas TechFixAr?</span>
            </h2>
            <p class="komunitas-cta__desc">
              Daftar gratis dan mulai berdiskusi. Dapatkan jawaban dari teknisi
              berpengalaman dan berbagi solusimu dengan ribuan anggota lainnya.
            </p>
            <div class="komunitas-cta__actions">
              <a class="btn-primary" href="<?= site_url('/register') ?>">
                <svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" width="15" height="15" aria-hidden="true">
                  <circle cx="8" cy="5" r="3" stroke="currentColor" stroke-width="1.5"/>
                  <path d="M2 14c0-3.31 2.69-6 6-6s6 2.69 6 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                </svg>
                Daftar Sekarang
              </a>
              <a class="btn-outline" href="<?= site_url('/login') ?>">
                Sudah punya akun? Masuk
              </a>
            </div>
          </div>
        </section>

      </main>

      
      <footer class="komunitas-footer">
        <a class="komunitas-footer__logo" href="<?= site_url('/') ?>" aria-label="TechFixAr, kembali ke beranda">
          <img class="komunitas-footer__logo-img" src="<?= base_url('assets/css/img/Logo.jpg') ?>" alt="" />
          <span class="komunitas-footer__logo-name">
            TechFix<span class="accent">Ar</span>
          </span>
        </a>
        <nav class="komunitas-footer__nav" aria-label="Navigasi footer">
          <a class="komunitas-footer__link" href="<?= site_url('/') ?>">Beranda</a>
          <a class="komunitas-footer__link" href="<?= site_url('/panduan') ?>">Panduan</a>
          <a class="komunitas-footer__link" href="<?= site_url('/komunitas') ?>">Komunitas</a>
        </nav>
        <small class="komunitas-footer__copy">© 2026 TechFixAr</small>
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

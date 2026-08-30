<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="<?= esc($panduan['deskripsi'] ?? $panduan['judul']) ?>" />
    <title><?= esc($panduan['judul']) ?> | TechFixAr</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/globals.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/navbar.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/Tutorial_panduan.css') ?>" />
    <script src="<?= base_url('assets/js/theme.js') ?>"></script>
  </head>
  <body>
    <div class="halaman-panduannya">
      <div class="app"><div class="placeholder-for"></div><div class="div"></div></div>
      <div class="grid-bg" aria-hidden="true"></div>

      <!-- NAVBAR -->
      <header class="navbar">
        <div class="navbar__inner">
          <a class="navbar__brand" href="<?= site_url('/') ?>" aria-label="TechFixAr, kembali ke beranda">
            <img class="navbar__logo" src="<?= base_url('assets/css/img/Logo.jpg') ?>" alt="" />
            <span class="navbar__title">
              <span class="navbar__title-text">TechFix</span><span class="navbar__title-accent">Ar</span>
            </span>
          </a>
          <nav class="navbar__nav" aria-label="Navigasi utama">
            <a class="navbar__link" href="<?= site_url('/') ?>">Beranda</a>
            <a class="navbar__link navbar__link--active" href="<?= site_url('/panduan') ?>">Panduan &amp; Servis</a>
          </nav>
          <button class="navbar__theme-toggle" data-theme-toggle aria-label="Ganti tema" type="button">
            <svg class="icon-moon" viewBox="0 0 24 24" fill="none" width="18" height="18"><path d="M21 12.79A9 9 0 1 1 11.21 3a7 7 0 0 0 9.79 9.79z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            <svg class="icon-sun"  viewBox="0 0 24 24" fill="none" width="18" height="18"><circle cx="12" cy="12" r="5" stroke="currentColor" stroke-width="2"/><path d="M12 2v2M12 20v2M4.22 4.22l1.42 1.42M18.36 18.36l1.42 1.42M2 12h2M20 12h2M4.22 19.78l1.42-1.42M18.36 5.64l1.42-1.42" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
          </button>
          <a class="navbar__cta" href="<?= site_url('/login') ?>">Masuk / Daftar</a>
        </div>
      </header>

      <!-- MAIN -->
      <main class="detail-panduan-page" id="panduan">

        <!-- Breadcrumb -->
        <nav class="navigation" aria-label="Breadcrumb">
          <div class="text">
            <a class="button" href="<?= site_url('/') ?>"><span class="text-wrapper">Beranda</span></a>
            <div class="div-wrapper" aria-hidden="true"><span class="text-wrapper-2">/</span></div>
          </div>
          <div class="text-2">
            <a class="button-2" href="<?= site_url('/panduan') ?>"><span class="text-wrapper-3">Panduan</span></a>
            <div class="div-wrapper" aria-hidden="true"><span class="text-wrapper-2">/</span></div>
          </div>
          <div class="hardware-assembly-wrapper" aria-current="page">
            <span class="text-wrapper"><?= esc($panduan['kategori']) ?></span>
          </div>
        </nav>

        <div class="container-margin">
          <div class="container">

            <!-- ARTIKEL -->
            <article class="container-2">
              <header>
                <div class="heading">
                  <h1 class="panduan-lengkap-cara"><?= esc($panduan['judul']) ?></h1>
                </div>
                <div class="container-wrapper">
                  <div class="container-3">
                    <!-- Penulis -->
                    <div class="container-4">
                      <div class="container-5" aria-hidden="true">
                        <div class="text-3">
                          <span class="text-wrapper-4">
                            <?= strtoupper(substr($panduan['nama_admin'] ?? 'TT', 0, 2)) ?>
                          </span>
                        </div>
                      </div>
                      <div class="tech-team-wrapper">
                        <span class="tech-team"><?= esc($panduan['nama_admin'] ?? 'Tech Team') ?></span>
                      </div>
                    </div>
                    <div class="text-4" aria-hidden="true"></div>
                    <!-- Tanggal -->
                    <div class="text-5">
                      <time class="text-wrapper-5" datetime="<?= date('Y-m-d', strtotime($panduan['created_at'])) ?>">
                        <?= date('d M Y', strtotime($panduan['created_at'])) ?>
                      </time>
                    </div>
                    <div class="text-4" aria-hidden="true"></div>
                    <!-- Kategori -->
                    <div class="text-7">
                      <span class="text-wrapper-7">
                        <?= ['Troubleshooting' => '⚠️', 'Assembly' => '🔧', 'Tips & Trik' => '⚡'][$panduan['kategori']] ?? '📄' ?>
                        <?= esc($panduan['kategori']) ?>
                      </span>
                    </div>
                    <div class="text-4" aria-hidden="true"></div>
                    <!-- Jumlah dibaca -->
                    <div class="text-9" aria-label="<?= number_format($panduan['jumlah_dibaca']) ?> kali dilihat">
                      <span class="icon-eye" aria-hidden="true">
                        <svg viewBox="0 0 11 11" fill="none" width="11" height="11"><path d="M1 5.5C1 5.5 2.5 2 5.5 2C8.5 2 10 5.5 10 5.5C10 5.5 8.5 9 5.5 9C2.5 9 1 5.5 1 5.5Z" stroke="currentColor" stroke-width="1.2" stroke-linecap="round"/><circle cx="5.5" cy="5.5" r="1.5" stroke="currentColor" stroke-width="1.2"/></svg>
                      </span>
                      <span class="text-wrapper-9"><?= number_format($panduan['jumlah_dibaca']) ?>x</span>
                    </div>
                  </div>
                </div>
              </header>

              <!-- Deskripsi singkat -->
              <?php if ($panduan['deskripsi']): ?>
              <section class="container-6" aria-labelledby="pengantar">
                <div class="heading-2">
                  <div class="text-10"><span class="text-wrapper-10">INTRO</span></div>
                  <h2 class="text-wrapper-11" id="pengantar">Pengantar</h2>
                </div>
                <div class="paragraph-margin">
                  <p class="socket"><?= esc($panduan['deskripsi']) ?></p>
                </div>
              </section>
              <?php endif ?>

              <!-- Konten utama -->
              <section class="container-6" aria-labelledby="isi-panduan">
                <div class="heading-2">
                  <div class="text-10"><span class="text-wrapper-10">ISI PANDUAN</span></div>
                  <h2 class="text-wrapper-11" id="isi-panduan">Langkah-Langkah</h2>
                </div>

                <?php
                  $stepsData = [];
                  if (! empty($panduan['steps_data'])) {
                      $decoded = json_decode($panduan['steps_data'], true);
                      if (is_array($decoded)) {
                          $stepsData = $decoded;
                      }
                  }
                ?>

                <?php if ($stepsData !== []): ?>
                  <div class="paragraph-margin panduan-steps">
                    <?php foreach ($stepsData as $i => $step): ?>
                      <article class="panduan-step" style="margin-bottom:32px;">
                        <h3 style="font-size:18px;font-weight:700;margin:0 0 12px;color:var(--text);">
                          Langkah <?= $i + 1 ?><?= ! empty($step['title']) ? ': ' . esc($step['title']) : '' ?>
                        </h3>

                        <?php if (! empty($step['image_path'])): ?>
                          <figure style="margin:0 0 16px;">
                            <img src="<?= base_url($step['image_path']) ?>"
                                 alt="<?= esc($step['title'] ?? 'Gambar langkah ' . ($i + 1)) ?>"
                                 style="max-width:100%;border-radius:12px;border:1px solid var(--border);" />
                          </figure>
                        <?php endif ?>

                        <?php foreach ($step['lines'] ?? [] as $line): ?>
                          <?php if (! empty($line['is_warn'])): ?>
                            <p style="padding:12px 14px;background:rgba(234,179,8,.12);border:1px solid rgba(234,179,8,.35);border-radius:8px;color:var(--text);line-height:1.7;margin:0 0 10px;">
                              ⚠️ <?= esc($line['text'] ?? '') ?>
                            </p>
                          <?php else: ?>
                            <p style="line-height:1.8;color:var(--text);margin:0 0 10px;"><?= esc($line['text'] ?? '') ?></p>
                          <?php endif ?>
                        <?php endforeach ?>
                      </article>
                    <?php endforeach ?>
                  </div>
                <?php else: ?>
                  <div class="paragraph-margin" style="white-space: pre-line; line-height: 1.8; color: var(--text);">
                    <?= esc($panduan['konten']) ?>
                  </div>
                <?php endif ?>
              </section>
            </article>

            <!-- SIDEBAR: Alat dibutuhkan -->
            <aside class="container-25" aria-labelledby="yang-dibutuhkan">
              <div class="container-26">
                <div class="container-27">
                  <div class="icon" aria-hidden="true">
                    <svg viewBox="0 0 14 14" fill="none" width="14" height="14"><path d="M8.5 2.5a3 3 0 0 1 0 4.24L4.5 10.74a1.5 1.5 0 0 1-2.12-2.12L6.26 4.74A3 3 0 0 1 8.5 2.5z" stroke="currentColor" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/><path d="M10 1l1 1-1.5 1.5" stroke="currentColor" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/></svg>
                  </div>
                  <div class="text-16">
                    <h2 class="text-wrapper-20" id="yang-dibutuhkan">Yang Dibutuhkan</h2>
                  </div>
                </div>

                <?php if ($panduan['alat_dibutuhkan']): ?>
                  <ul class="container-28">
                    <?php foreach (explode(',', $panduan['alat_dibutuhkan']) as $alat): ?>
                      <?php $alat = trim($alat); if (!$alat) continue; ?>
                      <li class="container-29">
                        <div class="container-margin-4" aria-hidden="true"><div class="container-30"></div></div>
                        <div class="container-31">
                          <div class="container-32">
                            <span class="text-wrapper-21"><?= esc($alat) ?></span>
                          </div>
                        </div>
                      </li>
                    <?php endforeach ?>
                  </ul>
                <?php else: ?>
                  <p style="color:var(--muted);font-size:13px;margin-top:12px;">Tidak ada alat khusus yang disebutkan.</p>
                <?php endif ?>

                <!-- Tombol kembali -->
                <div style="margin-top: 24px;">
                  <a href="<?= site_url('/panduan') ?>"
                     style="display:flex;align-items:center;gap:8px;color:var(--muted);font-size:13px;font-weight:600;text-decoration:none;">
                    <svg viewBox="0 0 16 16" fill="none" width="14" height="14"><path d="M10 3L5 8L10 13" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    Kembali ke Panduan
                  </a>
                </div>
              </div>
            </aside>

          </div>
        </div>
      </main>

      <!-- FOOTER -->
      <footer class="footer">
        <div class="footer-logo">
          <a class="footer-logo-link" href="<?= site_url('/') ?>" aria-label="TechFixAr, kembali ke beranda">
            <img class="techfixar-logo-footer" src="<?= base_url('assets/css/img/Logo.jpg') ?>" alt="" />
            <p class="footer-brand"><span class="span">TechFix</span><span class="text-wrapper-28">Ar</span></p>
          </a>
        </div>
        <nav class="footer-nav" aria-label="Navigasi footer">
          <a class="footer-link" href="#tentang"><span>Tentang</span></a>
          <a class="footer-link" href="<?= site_url('/panduan') ?>"><span>Panduan</span></a>
          <a class="footer-link" href="#komunitas"><span>Komunitas</span></a>
          <a class="footer-link" href="#kontak"><span>Kontak</span></a>
        </nav>
        <div class="footer-copy"><small>© 2026 TechFixAr</small></div>
      </footer>
    </div>
  </body>
</html>

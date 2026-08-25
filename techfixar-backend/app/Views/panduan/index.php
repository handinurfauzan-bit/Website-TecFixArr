<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Pusat Panduan, Servis & Troubleshooting PC | TechFixAr</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/globals.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/navbar.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/panduan.css') ?>" />
    <script src="<?= base_url('assets/js/theme.js') ?>"></script>
  </head>
  <body>
    <div class="halaman-panduan">
      <div class="grid-bg" aria-hidden="true"></div>

      <!-- HEADER -->
      <header class="navbar">
        <div class="navbar__inner">
          <a class="navbar__brand" href="<?= site_url('/') ?>" aria-label="TechFixAr, kembali ke beranda">
            <img class="navbar__logo" src="<?= base_url('assets/css/img/Logo.jpg') ?>" alt="TechFixAr Logo" />
            <span class="navbar__title">
              <span class="navbar__title-text">TechFix</span><span class="navbar__title-accent">Ar</span>
            </span>
          </a>
          <nav class="navbar__nav" aria-label="Navigasi utama">
            <a class="navbar__link" href="<?= site_url('/') ?>">Beranda</a>
            <a class="navbar__link navbar__link--active" href="<?= site_url('/panduan') ?>" aria-current="page">Panduan &amp; Servis</a>
          </nav>
          <button class="navbar__theme-toggle" data-theme-toggle aria-label="Ganti tema" type="button">
            <svg class="icon-moon" viewBox="0 0 24 24" fill="none" width="18" height="18"><path d="M21 12.79A9 9 0 1 1 11.21 3a7 7 0 0 0 9.79 9.79z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            <svg class="icon-sun"  viewBox="0 0 24 24" fill="none" width="18" height="18"><circle cx="12" cy="12" r="5" stroke="currentColor" stroke-width="2"/><path d="M12 2v2M12 20v2M4.22 4.22l1.42 1.42M18.36 18.36l1.42 1.42M2 12h2M20 12h2M4.22 19.78l1.42-1.42M18.36 5.64l1.42-1.42" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
          </button>
          <a class="navbar__cta" href="<?= site_url('/login') ?>">Masuk / Daftar</a>
        </div>
      </header>

      <main class="container-3">

        <!-- Hero -->
        <section class="container-4" aria-labelledby="page-title">
          <div class="container-5">
            <span class="dot" aria-hidden="true"></span>
            <div class="text"><span class="text-wrapper">PUSAT EDUKASI HARDWARE</span></div>
          </div>
          <div class="heading">
            <h1 id="page-title" class="pusat-panduan-servis">Pusat Panduan, Servis &amp; Troubleshooting PC</h1>
          </div>
          <div class="paragraph">
            <p class="kumpulan-artikel">Kumpulan artikel edukasi perakitan hardware, servis laptop, dan solusi mengatasi error teknis.</p>
          </div>
        </section>

        <!-- Filter -->
        <section class="container-6" aria-label="Filter panduan">
          <div class="container-9" role="group" aria-label="Filter kategori panduan">
            <?php
              $filterList = ['Semua' => $total, 'Troubleshooting' => $countByKat['Troubleshooting'] ?? 0, 'Assembly' => $countByKat['Assembly'] ?? 0, 'Tips & Trik' => $countByKat['Tips & Trik'] ?? 0];
            ?>
            <?php foreach ($filterList as $label => $count): ?>
              <a href="<?= site_url('/panduan?kategori=' . urlencode($label)) ?>"
                 class="button <?= $aktifFilter === $label ? '' : 'button-2' ?>"
                 type="button" aria-pressed="<?= $aktifFilter === $label ? 'true' : 'false' ?>">
                <span><?= esc($label) ?></span>
                <span class="text-2"><span>(<?= $count ?>)</span></span>
              </a>
            <?php endforeach ?>
          </div>
        </section>

        <!-- Daftar Artikel -->
        <section class="container-margin" aria-label="Daftar artikel panduan">
          <div class="container-10">
            <?php if (empty($panduan)): ?>
              <p style="color:var(--muted);grid-column:1/-1;text-align:center;padding:60px 0;">Belum ada panduan yang diterbitkan.</p>
            <?php else: ?>
              <?php foreach ($panduan as $item): ?>
                <a class="artikel-link" href="<?= site_url('/panduan/' . $item['id']) ?>">
                  <article class="container-11">
                    <div class="container-12">
                      <div style="background:var(--panel-2);height:160px;border-radius:10px 10px 0 0;display:flex;align-items:center;justify-content:center;font-size:40px;">
                        <?= ['Troubleshooting' => '⚠️', 'Assembly' => '🔧', 'Tips & Trik' => '⚡'][$item['kategori']] ?? '📄' ?>
                      </div>
                      <div class="container-14">
                        <span class="text-wrapper-8"><?= esc($item['kategori']) ?></span>
                      </div>
                    </div>
                    <div class="container-15">
                      <div class="heading-2"><h2 class="p"><?= esc($item['judul']) ?></h2></div>
                      <?php if ($item['deskripsi']): ?>
                        <div class="paragraph-margin"><p class="text-wrapper-9"><?= esc($item['deskripsi']) ?></p></div>
                      <?php endif ?>
                      <div class="container-wrapper">
                        <div class="container-16">
                          <div class="text-5">
                            <svg viewBox="0 0 11 11" fill="none" width="11" height="11"><path d="M1 8.5C1 8.5 2.5 5 5.5 5C8.5 5 10 8.5 10 8.5" stroke="currentColor" stroke-width="1.2" stroke-linecap="round"/><circle cx="5.5" cy="3.5" r="1.5" stroke="currentColor" stroke-width="1.2"/></svg>
                            <span><?= number_format($item['jumlah_dibaca']) ?>x dibaca</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </article>
                </a>
              <?php endforeach ?>
            <?php endif ?>
          </div>
        </section>

        <!-- Pagination -->
        <?php if ($pager): ?>
          <div style="display:flex;justify-content:center;margin:32px 0;">
            <?= $pager->links() ?>
          </div>
        <?php endif ?>

      </main>
    </div>
  </body>
</html>

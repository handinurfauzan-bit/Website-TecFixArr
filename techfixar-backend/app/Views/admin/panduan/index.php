<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Management Artikel & Tutorial | TechFixAr Admin</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/globals.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/admin_theme.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/Kelola_panduan_admin.css') ?>" />
    <script src="<?= base_url('assets/js/theme.js') ?>"></script>
  </head>
  <body>
    <div class="admin-app">

      <!-- SIDEBAR -->
      <aside class="admin-sidebar" aria-label="Navigasi admin">
        <div class="admin-sidebar__top">
          <a class="admin-brand" href="<?= site_url('/') ?>" aria-label="TechFixAr, kembali ke beranda">
            <span class="admin-brand__mark" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" width="20" height="20">
                <path d="M3 12h4l2-5 4 10 2-5h6" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </span>
            <span class="admin-brand__title">
              <span class="admin-brand__title-text">TechFix</span><span class="admin-brand__title-accent">Ar</span>
            </span>
          </a>

          <div class="admin-status" role="status">
            <span class="admin-status__dot" aria-hidden="true"></span>
            <span class="admin-status__text">System Online</span>
          </div>

          <nav class="admin-nav" aria-label="Menu utama">
            <a class="admin-nav__item admin-nav__item--active" href="<?= site_url('/admin/panduan') ?>" aria-current="page">
              <svg class="admin-nav__icon" viewBox="0 0 24 24" fill="none" width="18" height="18">
                <rect x="3" y="3" width="7" height="7" rx="1.5" stroke="currentColor" stroke-width="1.7"/>
                <rect x="14" y="3" width="7" height="7" rx="1.5" stroke="currentColor" stroke-width="1.7"/>
                <rect x="3" y="14" width="7" height="7" rx="1.5" stroke="currentColor" stroke-width="1.7"/>
                <rect x="14" y="14" width="7" height="7" rx="1.5" stroke="currentColor" stroke-width="1.7"/>
              </svg>
              <span>Kelola Panduan &amp; Troubleshooting</span>
            </a>
            <?php if (session()->get('admin_role') === 'super_admin'): ?>
            <a class="admin-nav__item" href="<?= site_url('/admin/verifikasi') ?>">
              <svg class="admin-nav__icon" viewBox="0 0 24 24" fill="none" width="18" height="18">
                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
              <span>Verifikasi Akun Admin</span>
            </a>
            <?php endif ?>
          </nav>
        </div>

        <div class="admin-user">
          <div class="admin-user__info">
            <span class="admin-user__avatar" aria-hidden="true">
              <?= strtoupper(substr(session()->get('admin_nama') ?? 'A', 0, 2)) ?>
            </span>
            <span class="admin-user__meta">
              <span class="admin-user__name"><?= esc(session()->get('admin_nama')) ?></span>
              <span class="admin-user__role"><?= esc(session()->get('admin_role') === 'super_admin' ? 'Super Admin' : 'Admin') ?></span>
            </span>
          </div>
          <button class="admin-theme-toggle" data-theme-toggle aria-label="Ganti tema" type="button">
            <svg class="icon-moon" viewBox="0 0 24 24" fill="none" width="16" height="16"><path d="M21 12.79A9 9 0 1 1 11.21 3a7 7 0 0 0 9.79 9.79z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            <svg class="icon-sun"  viewBox="0 0 24 24" fill="none" width="16" height="16"><circle cx="12" cy="12" r="5" stroke="currentColor" stroke-width="2"/><path d="M12 2v2M12 20v2M4.22 4.22l1.42 1.42M18.36 18.36l1.42 1.42M2 12h2M20 12h2M4.22 19.78l1.42-1.42M18.36 5.64l1.42-1.42" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
            <span>Mode Terang</span>
          </button>
          <a class="admin-user__logout" href="<?= site_url('/logout') ?>">
            <svg viewBox="0 0 24 24" fill="none" width="16" height="16"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/><path d="M16 17l5-5-5-5M21 12H9" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
            Logout
          </a>
        </div>
      </aside>

      <!-- MAIN -->
      <main class="admin-main">
        <header class="admin-header">
          <div class="admin-header__copy">
            <h1 class="admin-header__title">Management Artikel &amp; Tutorial</h1>
            <p class="admin-header__desc">Kelola seluruh konten panduan, troubleshooting, dan tips hardware.</p>
          </div>
          <a class="admin-header__cta" href="<?= site_url('/admin/panduan/baru') ?>">
            <svg viewBox="0 0 24 24" fill="none" width="18" height="18"><path d="M12 5v14M5 12h14" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"/></svg>
            Tulis Artikel Baru
          </a>
        </header>

        <?php if (session()->getFlashdata('success')): ?>
          <div style="background:rgba(16,185,129,.12);border:1px solid rgba(16,185,129,.4);color:#10b981;padding:10px 14px;border-radius:8px;margin-bottom:16px;font-size:13px;font-weight:600;">
            <?= esc(session()->getFlashdata('success')) ?>
          </div>
        <?php endif ?>

        <!-- Filter tabs -->
        <div class="admin-filters" role="tablist" aria-label="Filter kategori">
          <?php
            $filters = ['Semua' => $total, 'Troubleshooting' => $countByKat['Troubleshooting'] ?? 0, 'Assembly' => $countByKat['Assembly'] ?? 0, 'Tips & Trik' => $countByKat['Tips & Trik'] ?? 0];
          ?>
          <?php foreach ($filters as $label => $count): ?>
            <a class="admin-filter <?= $aktifFilter === $label ? 'admin-filter--active' : '' ?>"
               href="<?= site_url('/admin/panduan?kategori=' . urlencode($label)) ?>"
               role="tab" aria-selected="<?= $aktifFilter === $label ? 'true' : 'false' ?>">
              <?= esc($label) ?> (<?= $count ?>)
            </a>
          <?php endforeach ?>
        </div>

        <!-- Article grid -->
        <section class="article-grid" aria-label="Daftar artikel">
          <?php if (empty($panduan)): ?>
            <p style="color:var(--muted);grid-column:1/-1;text-align:center;padding:40px 0;">Belum ada panduan. <a href="<?= site_url('/admin/panduan/baru') ?>" style="color:var(--accent);">Buat sekarang</a>.</p>
          <?php else: ?>
            <?php foreach ($panduan as $item): ?>
              <?php
                $coverColors = ['Troubleshooting' => 'purple', 'Assembly' => 'teal', 'Tips & Trik' => 'orange'];
                $cover = $coverColors[$item['kategori']] ?? 'blue';
                $emoji = ['Troubleshooting' => '⚠️', 'Assembly' => '🔧', 'Tips & Trik' => '⚡'][$item['kategori']] ?? '📄';
              ?>
              <article class="article-card">
                <div class="article-card__cover article-card__cover--<?= $cover ?>">
                  <span class="article-card__tag"><?= esc(strtoupper($item['kategori'])) ?></span>
                  <span class="article-card__emoji" aria-hidden="true"><?= $emoji ?></span>
                </div>
                <div class="article-card__body">
                  <h2 class="article-card__title"><?= esc($item['judul']) ?></h2>
                  <p class="article-card__meta">
                    <svg viewBox="0 0 24 24" fill="none" width="14" height="14"><path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12Z" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/><circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="1.6"/></svg>
                    <?= number_format($item['jumlah_dibaca']) ?>x Dibaca
                  </p>
                  <div class="article-card__actions">
                    <a class="article-btn article-btn--edit" href="<?= site_url('/admin/panduan/edit/' . $item['id']) ?>">
                      <svg viewBox="0 0 24 24" fill="none" width="14" height="14"><path d="M12 20h9" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/><path d="M16.5 3.5a2.1 2.1 0 0 1 3 3L7 19l-4 1 1-4 12.5-12.5Z" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                      Edit
                    </a>
                    <form action="<?= site_url('/admin/panduan/hapus/' . $item['id']) ?>" method="post" style="display:inline"
                      onsubmit="return confirm('Hapus panduan ini?')">
                      <?= csrf_field() ?>
                      <button class="article-btn article-btn--delete" type="submit">
                        <svg viewBox="0 0 24 24" fill="none" width="14" height="14"><path d="M3 6h18" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/><path d="M8 6V4h8v2M19 6l-1 14H6L5 6" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        Hapus
                      </button>
                    </form>
                  </div>
                </div>
              </article>
            <?php endforeach ?>
          <?php endif ?>
        </section>

        <!-- Pagination -->
        <?php if ($pager): ?>
          <footer class="admin-footer">
            <p class="admin-footer__info">Menampilkan <?= count($panduan) ?> dari <?= $total ?> artikel</p>
            <nav class="admin-pagination" aria-label="Paginasi">
              <?= $pager->links('default', 'admin_pager') ?>
            </nav>
          </footer>
        <?php endif ?>
      </main>
    </div>

    <script>
      (() => {
        const filters = document.querySelectorAll('.admin-filter');
        filters.forEach(btn => {
          btn.addEventListener('click', () => {
            filters.forEach(f => { f.classList.remove('admin-filter--active'); f.setAttribute('aria-selected','false'); });
            btn.classList.add('admin-filter--active');
            btn.setAttribute('aria-selected','true');
          });
        });
      })();
    </script>
  </body>
</html>

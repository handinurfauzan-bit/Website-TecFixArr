<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Verifikasi Admin | TechFixAr</title>
    <script src="<?= base_url('assets/js/theme.js') ?>"></script>
    <link rel="stylesheet" href="<?= base_url('assets/css/globals.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/admin_theme.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/verifikasi_admin.css') ?>" />
  </head>
  <body>
    <div class="admin-app">

      <!-- SIDEBAR -->
      <aside class="admin-sidebar" aria-label="Navigasi admin">
        <div class="admin-sidebar__top">
          <a class="admin-brand" href="<?= site_url('/') ?>" aria-label="TechFixAr, kembali ke beranda">
            <span class="admin-brand__mark" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" width="20" height="20"><path d="M3 12h4l2-5 4 10 2-5h6" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
            <span class="admin-brand__title">
              <span class="admin-brand__title-text">TechFix</span><span class="admin-brand__title-accent">Ar</span>
            </span>
          </a>

          <nav class="admin-nav" aria-label="Menu admin">
            <a href="<?= site_url('/admin/panduan') ?>" class="admin-nav__item">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
              <span>Kelola Panduan</span>
            </a>
            <a href="<?= site_url('/admin/verifikasi') ?>" class="admin-nav__item admin-nav__item--active">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
              <span>Verifikasi Admin</span>
            </a>
          </nav>
        </div>

        <div class="admin-sidebar__bottom">
          <button class="admin-theme-toggle" data-theme-toggle aria-label="Ganti tema">
            <svg class="icon-moon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12.79A9 9 0 1 1 11.21 3a7 7 0 0 0 9.79 9.79z"/></svg>
            <svg class="icon-sun"  width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="5"/><line x1="12" y1="1" x2="12" y2="3"/><line x1="12" y1="21" x2="12" y2="23"/><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/><line x1="1" y1="12" x2="3" y2="12"/><line x1="21" y1="12" x2="23" y2="12"/><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/></svg>
            <span>Tema</span>
          </button>
          <a href="<?= site_url('/logout') ?>" class="admin-logout">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
            <span>Keluar</span>
          </a>
        </div>
      </aside>

      <!-- MAIN -->
      <main class="verif-main">

        <header class="verif-header">
          <div>
            <h1 class="verif-header__title">Verifikasi Akun Admin</h1>
            <p class="verif-header__subtitle">Tinjau dan setujui pendaftaran admin baru sebelum akun aktif.</p>
          </div>
          <?php if ($stats['pending'] > 0): ?>
          <div class="verif-pending-badge">
            <span class="verif-dot verif-dot--yellow"></span>
            <span><?= $stats['pending'] ?> Menunggu Persetujuan</span>
          </div>
          <?php endif ?>
        </header>

        <?php if (session()->getFlashdata('success')): ?>
          <div style="background:rgba(16,185,129,.12);border:1px solid rgba(16,185,129,.4);color:#10b981;padding:10px 14px;border-radius:8px;margin-bottom:16px;font-size:13px;font-weight:600;">
            <?= esc(session()->getFlashdata('success')) ?>
          </div>
        <?php endif ?>
        <?php if (session()->getFlashdata('error')): ?>
          <div style="background:rgba(239,68,68,.12);border:1px solid rgba(239,68,68,.4);color:#ef4444;padding:10px 14px;border-radius:8px;margin-bottom:16px;font-size:13px;font-weight:600;">
            <?= esc(session()->getFlashdata('error')) ?>
          </div>
        <?php endif ?>

        <!-- STATS -->
        <section class="verif-stats" aria-label="Statistik admin">
          <div class="verif-stat-card">
            <div class="verif-stat-card__value verif-stat-card__value--blue"><?= $stats['total'] ?></div>
            <div class="verif-stat-card__info">
              <span class="verif-stat-card__label">TOTAL</span>
              <span class="verif-stat-card__name">Total Admin Terdaftar</span>
            </div>
          </div>
          <div class="verif-stat-card">
            <div class="verif-stat-card__value verif-stat-card__value--green"><?= $stats['aktif'] ?></div>
            <div class="verif-stat-card__info">
              <span class="verif-stat-card__label">AKTIF</span>
              <span class="verif-stat-card__name">Admin Aktif</span>
            </div>
          </div>
          <div class="verif-stat-card">
            <div class="verif-stat-card__value verif-stat-card__value--yellow"><?= $stats['pending'] ?></div>
            <div class="verif-stat-card__info">
              <span class="verif-stat-card__label">PENDING</span>
              <span class="verif-stat-card__name">Menunggu Verifikasi</span>
            </div>
          </div>
        </section>

        <!-- FILTER -->
        <section class="verif-controls">
          <div class="verif-filter-tabs" role="tablist">
            <?php foreach (['semua' => 'Semua ('.$stats['total'].')', 'pending' => 'Pending ('.$stats['pending'].')', 'aktif' => 'Aktif ('.$stats['aktif'].')', 'ditolak' => 'Ditolak ('.$stats['ditolak'].')'] as $val => $label): ?>
              <a href="<?= site_url('/admin/verifikasi?status=' . $val) ?>"
                 class="verif-filter-tab <?= $filter === $val ? 'verif-filter-tab--active' : '' ?>"
                 role="tab"><?= $label ?></a>
            <?php endforeach ?>
          </div>
        </section>

        <!-- TABLE -->
        <section class="verif-table-wrap">
          <table class="verif-table" aria-label="Daftar admin">
            <thead>
              <tr><th>Admin</th><th>Role</th><th>Status</th><th>Terdaftar</th><th>Aksi</th></tr>
            </thead>
            <tbody>
              <?php if (empty($admins)): ?>
                <tr><td colspan="5" style="text-align:center;color:var(--muted);padding:30px 0;">Tidak ada data.</td></tr>
              <?php else: ?>
                <?php foreach ($admins as $adm): ?>
                  <?php
                    $initials = strtoupper(implode('', array_map(fn($w) => $w[0], explode(' ', $adm['nama']))));
                    $initials = substr($initials, 0, 2);
                    $avatarColors = ['blue','green','purple','yellow','red','teal'];
                    $avatarColor  = $avatarColors[crc32($adm['email']) % count($avatarColors)];
                    $badgeClass   = ['pending' => 'verif-badge--pending', 'aktif' => 'verif-badge--active', 'ditolak' => 'verif-badge--rejected'][$adm['status']] ?? '';
                    $dotClass     = ['pending' => 'verif-dot--yellow', 'aktif' => 'verif-dot--green', 'ditolak' => 'verif-dot--red'][$adm['status']] ?? '';
                    $statusLabel  = ['pending' => 'Pending', 'aktif' => 'Aktif', 'ditolak' => 'Ditolak'][$adm['status']] ?? $adm['status'];
                  ?>
                  <tr>
                    <td class="verif-table__user">
                      <div class="verif-avatar verif-avatar--<?= $avatarColor ?>"><?= $initials ?></div>
                      <div>
                        <span class="verif-table__name"><?= esc($adm['nama']) ?></span>
                        <span class="verif-table__email"><?= esc($adm['email']) ?></span>
                      </div>
                    </td>
                    <td><?= esc($adm['role'] === 'super_admin' ? 'Super Admin' : 'Admin') ?></td>
                    <td><span class="verif-badge <?= $badgeClass ?>"><span class="verif-dot <?= $dotClass ?>"></span><?= $statusLabel ?></span></td>
                    <td><?= date('d M Y', strtotime($adm['created_at'])) ?></td>
                    <td class="verif-table__actions">
                      <?php if ($adm['status'] === 'pending'): ?>
                        <form action="<?= site_url('/admin/verifikasi/setujui/' . $adm['id']) ?>" method="post" style="display:inline">
                          <?= csrf_field() ?>
                          <button class="verif-btn verif-btn--approve" type="submit">
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>Setujui
                          </button>
                        </form>
                        <form action="<?= site_url('/admin/verifikasi/tolak/' . $adm['id']) ?>" method="post" style="display:inline">
                          <?= csrf_field() ?>
                          <button class="verif-btn verif-btn--reject" type="submit">
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>Tolak
                          </button>
                        </form>
                      <?php elseif ($adm['status'] === 'aktif'): ?>
                        <span class="verif-table__status-done">
                          <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>Sudah aktif
                        </span>
                      <?php else: ?>
                        <span class="verif-table__status-reject">
                          <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>Ditolak
                        </span>
                      <?php endif ?>
                      <?php if ($adm['id'] !== session()->get('admin_id') && $adm['role'] !== 'super_admin'): ?>
                        <form action="<?= site_url('/admin/verifikasi/hapus/' . $adm['id']) ?>" method="post" style="display:inline"
                          onsubmit="return confirm('Hapus akun <?= esc($adm['nama']) ?>?')">
                          <?= csrf_field() ?>
                          <button class="verif-btn" type="submit" style="border-color:rgba(239,68,68,.4);color:#ef4444;">
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M8 6V4h8v2M19 6l-1 14H6L5 6"/></svg>Hapus
                          </button>
                        </form>
                      <?php endif ?>
                    </td>
                  </tr>
                <?php endforeach ?>
              <?php endif ?>
            </tbody>
          </table>
        </section>

      </main>
    </div>
  </body>
</html>

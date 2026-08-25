<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Daftar Admin | TechFixAr</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/globals.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/Registerasi_admin.css') ?>" />
    <style>
      .flash { padding: 10px 14px; border-radius: 8px; margin-bottom: 14px; font-size: 13px; font-weight: 600; }
      .flash--error   { background: rgba(239,68,68,.12); border: 1px solid rgba(239,68,68,.4); color: #ef4444; }
      .flash--success { background: rgba(16,185,129,.12); border: 1px solid rgba(16,185,129,.4); color: #10b981; }
      .flash ul { margin: 4px 0 0 18px; padding: 0; }
    </style>
  </head>
  <body>
    <main class="halaman-register-admin">
      <div class="register-grid-bg" aria-hidden="true"></div>
      <div class="register-glow" aria-hidden="true"></div>

      <section class="register-shell" aria-labelledby="register-heading">
        <header class="register-brand">
          <a class="register-brand__link" href="<?= site_url('/') ?>" aria-label="TechFixAr, kembali ke beranda">
            <span class="register-brand__mark" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" width="22" height="22">
                <path d="M3 12h4l2-5 4 10 2-5h6" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </span>
            <span class="register-brand__title">
              <span class="register-brand__title-text">TechFix</span><span class="register-brand__title-accent">Ar</span>
            </span>
          </a>
          <p class="register-brand__subtitle">DAFTAR AKUN ADMIN</p>
        </header>

        <?php if (session()->getFlashdata('errors')): ?>
          <div class="flash flash--error">
            <ul>
              <?php foreach (session()->getFlashdata('errors') as $e): ?>
                <li><?= esc($e) ?></li>
              <?php endforeach ?>
            </ul>
          </div>
        <?php endif ?>

        <form class="register-form" action="<?= site_url('/register') ?>" method="post">
          <?= csrf_field() ?>
          <div class="register-form__intro">
            <h1 class="register-form__title" id="register-heading">Buat Akun Admin Baru</h1>
            <p class="register-form__desc">Pendaftaran memerlukan persetujuan Super Admin sebelum aktif.</p>
          </div>

          <div class="register-field">
            <label class="register-field__label" for="nama">NAMA LENGKAP</label>
            <input class="register-field__input" id="nama" name="nama" type="text"
              placeholder="Budi Santoso" autocomplete="name"
              value="<?= esc(old('nama')) ?>" required />
          </div>

          <div class="register-field">
            <label class="register-field__label" for="email">EMAIL</label>
            <input class="register-field__input" id="email" name="email" type="email"
              placeholder="budi@techfixar.id" autocomplete="email"
              value="<?= esc(old('email')) ?>" required />
          </div>

          <div class="register-field">
            <label class="register-field__label" for="password">PASSWORD</label>
            <div class="register-field__password">
              <input class="register-field__input" id="password" name="password" type="password"
                placeholder="Min. 8 karakter" autocomplete="new-password" minlength="8" required />
              <button class="register-field__toggle" type="button" aria-label="Tampilkan password"
                aria-controls="password" aria-pressed="false" data-toggle-password="password">
                <svg class="register-field__eye" viewBox="0 0 24 24" fill="none" width="18" height="18">
                  <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12Z" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                  <circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="1.6"/>
                </svg>
              </button>
            </div>
          </div>

          <div class="register-field">
            <label class="register-field__label" for="password-confirm">KONFIRMASI PASSWORD</label>
            <input class="register-field__input" id="password-confirm" name="password_confirm" type="password"
              placeholder="Ulangi password" autocomplete="new-password" minlength="8" required />
          </div>

          <button class="register-form__submit" type="submit">Kirim Pendaftaran</button>

          <p class="register-form__footer">
            Sudah punya akun?
            <a class="register-form__login" href="<?= site_url('/login') ?>">Masuk</a>
          </p>
        </form>

        <footer class="register-back">
          <a class="register-back__link" href="<?= site_url('/') ?>">← Kembali ke Beranda</a>
        </footer>
      </section>
    </main>

    <script>
      (() => {
        document.querySelectorAll('[data-toggle-password]').forEach(toggle => {
          const input = document.getElementById(toggle.getAttribute('data-toggle-password'));
          if (!input) return;
          toggle.addEventListener('click', () => {
            const visible = input.type === 'text';
            input.type = visible ? 'password' : 'text';
            toggle.setAttribute('aria-pressed', String(!visible));
            toggle.setAttribute('aria-label', visible ? 'Tampilkan password' : 'Sembunyikan password');
          });
        });
      })();
    </script>
  </body>
</html>

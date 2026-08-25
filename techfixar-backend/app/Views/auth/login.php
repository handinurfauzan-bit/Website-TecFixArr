<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin Portal | TechFixAr</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/globals.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/login_admin.css') ?>" />
    <script src="<?= base_url('assets/js/theme.js') ?>"></script>
    <style>
      .page-theme-toggle {
        position: fixed; top: 18px; right: 18px; z-index: 200;
        display: flex; align-items: center; justify-content: center;
        width: 40px; height: 40px; border-radius: 10px;
        border: 1px solid #334155; background: rgba(15,23,42,0.8);
        color: #94a3b8; cursor: pointer; backdrop-filter: blur(8px);
        transition: background-color .2s, border-color .2s, color .2s;
      }
      .page-theme-toggle:hover { background: rgba(255,255,255,.08); color: #f8fafc; border-color: #475569; }
      .page-theme-toggle:focus-visible { outline: 2px solid #10b981; outline-offset: 3px; }
      .page-theme-toggle .icon-moon { display: block; }
      .page-theme-toggle .icon-sun  { display: none; }
      [data-theme="light"] .page-theme-toggle { border-color: #cbd5e1; background: rgba(255,255,255,.85); color: #475569; }
      [data-theme="light"] .page-theme-toggle .icon-moon { display: none; }
      [data-theme="light"] .page-theme-toggle .icon-sun  { display: block; }

      /* Flash messages */
      .flash { padding: 10px 14px; border-radius: 8px; margin-bottom: 14px; font-size: 13px; font-weight: 600; }
      .flash--error   { background: rgba(239,68,68,.12); border: 1px solid rgba(239,68,68,.4); color: #ef4444; }
      .flash--success { background: rgba(16,185,129,.12); border: 1px solid rgba(16,185,129,.4); color: #10b981; }
      .flash ul { margin: 4px 0 0 18px; padding: 0; }
    </style>
  </head>
  <body>
    <button class="page-theme-toggle" data-theme-toggle aria-label="Ganti tema" type="button">
      <svg class="icon-moon" viewBox="0 0 24 24" fill="none" width="18" height="18"><path d="M21 12.79A9 9 0 1 1 11.21 3a7 7 0 0 0 9.79 9.79z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
      <svg class="icon-sun"  viewBox="0 0 24 24" fill="none" width="18" height="18"><circle cx="12" cy="12" r="5" stroke="currentColor" stroke-width="2"/><path d="M12 2v2M12 20v2M4.22 4.22l1.42 1.42M18.36 18.36l1.42 1.42M2 12h2M20 12h2M4.22 19.78l1.42-1.42M18.36 5.64l1.42-1.42" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
    </button>

    <main class="halaman-login-admin">
      <div class="login-grid-bg" aria-hidden="true"></div>
      <div class="login-glow login-glow--top" aria-hidden="true"></div>
      <div class="login-glow login-glow--bottom" aria-hidden="true"></div>

      <section class="login-shell" aria-labelledby="login-heading">
        <header class="login-brand">
          <div class="login-badge">
            <span class="login-badge__dot" aria-hidden="true"></span>
            <span class="login-badge__text">ADMIN PORTAL</span>
          </div>
          <a class="login-brand__link" href="<?= base_url('/') ?>" aria-label="TechFixAr, kembali ke beranda">
            <span class="login-brand__mark" aria-hidden="true">TF</span>
            <span class="login-brand__title">
              <span class="login-brand__title-text">TechFix</span><span class="login-brand__title-accent">Ar</span>
            </span>
          </a>
        </header>

        <?php if (session()->getFlashdata('error')): ?>
          <div class="flash flash--error"><?= esc(session()->getFlashdata('error')) ?></div>
        <?php endif ?>
        <?php if (session()->getFlashdata('success')): ?>
          <div class="flash flash--success"><?= esc(session()->getFlashdata('success')) ?></div>
        <?php endif ?>
        <?php if (session()->getFlashdata('errors')): ?>
          <div class="flash flash--error">
            <ul>
              <?php foreach (session()->getFlashdata('errors') as $e): ?>
                <li><?= esc($e) ?></li>
              <?php endforeach ?>
            </ul>
          </div>
        <?php endif ?>

        <form class="login-form" action="<?= site_url('/login') ?>" method="post">
          <?= csrf_field() ?>
          <div class="login-form__intro">
            <h1 class="login-form__title" id="login-heading">Masuk ke Akun</h1>
            <p class="login-form__desc">Masukkan kredensial admin untuk mengakses dashboard.</p>
          </div>

          <div class="login-field">
            <label class="login-field__label" for="email">EMAIL</label>
            <input class="login-field__input" id="email" name="email" type="email"
              placeholder="admin@techfixar.id" autocomplete="username"
              value="<?= esc(old('email')) ?>" required />
          </div>

          <div class="login-field">
            <label class="login-field__label" for="password">PASSWORD</label>
            <div class="login-field__password">
              <input class="login-field__input" id="password" name="password" type="password"
                placeholder="••••••••" autocomplete="current-password" required />
              <button class="login-field__toggle" type="button" aria-label="Tampilkan password"
                aria-controls="password" aria-pressed="false">
                <svg class="login-field__eye" viewBox="0 0 24 24" fill="none" width="18" height="18">
                  <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12Z" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                  <circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="1.6"/>
                </svg>
              </button>
            </div>
          </div>

          <button class="login-form__submit" type="submit">Masuk</button>

          <p class="login-form__footer">
            Belum punya akun?
            <a class="login-form__register" href="<?= site_url('/register') ?>">Daftar Admin Baru</a>
          </p>
        </form>

        <footer class="login-back">
          <a class="login-back__link" href="<?= site_url('/') ?>">
            <svg viewBox="0 0 16 16" fill="none" width="14" height="14"><path d="M10 3L5 8L10 13" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
            Kembali ke Beranda
          </a>
        </footer>
      </section>
    </main>

    <script>
      (() => {
        const input  = document.getElementById('password');
        const toggle = document.querySelector('.login-field__toggle');
        if (!input || !toggle) return;
        toggle.addEventListener('click', () => {
          const visible = input.type === 'text';
          input.type = visible ? 'password' : 'text';
          toggle.setAttribute('aria-pressed', String(!visible));
          toggle.setAttribute('aria-label', visible ? 'Tampilkan password' : 'Sembunyikan password');
        });
      })();
    </script>
  </body>
</html>
